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
            $table->string('state')->default((\App\Enums\JobState::Draft)->value);

            $table->string('avatar_path', 2048)->nullable();


            $table->foreignId('user_id')->unsigned()->index()->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('tenant_id')->index()->nullable()->references('id')->on('tenants')->onDelete('cascade');
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
