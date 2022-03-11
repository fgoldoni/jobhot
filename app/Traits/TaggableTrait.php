<?php
namespace App\Traits;

use App\Models\Tag;

/**
 * Class TaggableTrait.
 */
trait TaggableTrait
{
    public function tags(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function saveTags($tags): static
    {
        $tags = array_filter(array_unique(array_map(fn ($item) => trim($item), $tags)), fn ($item) => !empty($item));
        $persistedTags = Tag::whereIn('name', $tags)->get();
        $tagsToCreate = array_diff($tags, $persistedTags->pluck('name')->all());
        $tagsToCreate = array_map(fn ($tag) => ['name' => $tag, 'slug' => str_slug($tag)], $tagsToCreate);

        $createdTags = $this->tags()->createMany($tagsToCreate);
        $persistedTags = $persistedTags->merge($createdTags);
        $this->tags()->sync($persistedTags);

        return $this;
    }
}
