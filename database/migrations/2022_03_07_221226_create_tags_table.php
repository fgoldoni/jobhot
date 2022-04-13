<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');

            $table->morphs('taggable');
        });

        Schema::create('job_tag', function (Blueprint $table) {
            $table->foreignId('tag_id')->nullable()->unsigned()->index()->references('id')->on('tags')->onDelete('cascade');
            $table->foreignId('job_id')->nullable()->unsigned()->index()->references('id')->on('jobs')->onDelete('cascade');
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
        Schema::dropIfExists('tags');
        Schema::dropIfExists('job_tag');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
};
