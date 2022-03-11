<?php
namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait HasAvatar
{
    /**
     * Update the user's avatar photo.
     *
     * @return void
     */
    public function updateAvatar(UploadedFile $photo)
    {
        tap($this->avatar_path, function ($previous) use ($photo) {
            $this->forceFill([
                'avatar_path' => $photo->storePublicly(
                    '/',
                    ['disk' => $this->avatarDisk()]
                ),
            ])->save();

            if ($previous) {
                Storage::disk($this->avatarDisk())->delete($previous);
            }
        });
    }

    /**
     * Delete the user's avatar photo.
     *
     * @return void
     */
    public function deleteAvatar()
    {
        Storage::disk($this->avatarDisk())->delete($this->avatar_path);

        $this->forceFill([
            'avatar_path' => null,
        ])->save();
    }

    /**
     * Get the URL to the user's avatar photo.
     *
     * @return string
     */
    public function getAvatarUrlAttribute()
    {
        return $this->avatar_path
            ? Storage::disk($this->avatarDisk())->url($this->avatar_path)
            : $this->defaultAvatarUrl();
    }

    /**
     * Get the default avatar photo URL if no avatar photo has been uploaded.
     */
    protected function defaultAvatarUrl(): string
    {
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=7F9CF5&background=EBF4FF';
    }

    /**
     * Get the disk that avatar photos should be stored on.
     */
    protected function avatarDisk(): string
    {
        return 'avatars';
    }
}
