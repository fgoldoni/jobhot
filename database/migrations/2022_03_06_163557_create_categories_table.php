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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            $table->json('name');
            $table->string('slug');
            $table->string('icon')->default('folder');
            $table->string('type')->default('area');
            $table->integer('position')->unsigned()->nullable();
            $table->integer('parent_id')->nullable()->unsigned()->index();
            $table->boolean('online')->default(true);

            $table->softDeletes();
            $table->timestamps();

            // Indexes
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
        Schema::dropIfExists('categories');
    }
};
