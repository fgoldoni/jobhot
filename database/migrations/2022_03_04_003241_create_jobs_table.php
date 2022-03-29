<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();

            $table->json('name');
            $table->string('slug');
            $table->longText('content')->nullable();
            $table->smallInteger('experience')->unsigned()->nullable();
            $table->integer('salary_min')->unsigned()->nullable();
            $table->integer('salary_max')->unsigned()->nullable();
            $table->string('salary_type')->default((\App\Enums\SalaryType::Year)->value);
            $table->boolean('negotiable')->default(true);
            $table->string('state')->default((\App\Enums\JobState::Draft)->value);

            $table->string('avatar_path', 2048)->nullable();


            $table->foreignId('user_id')->unsigned()->index()->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('country_id')->nullable()->unsigned()->index()->references('id')->on('world_countries')->cascadeOnDelete();
            $table->foreignId('division_id')->nullable()->unsigned()->index()->references('id')->on('world_divisions')->cascadeOnDelete();
            $table->foreignId('city_id')->nullable()->unsigned()->index()->references('id')->on('world_cities')->cascadeOnDelete();
            $table->date('closing_to')->nullable();
            $table->date('featured_to')->nullable();
            $table->date('urgent_to')->nullable();
            $table->date('highlight_to')->nullable();
            $table->datetime('live_at')->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->unique('slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('jobs');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
};
