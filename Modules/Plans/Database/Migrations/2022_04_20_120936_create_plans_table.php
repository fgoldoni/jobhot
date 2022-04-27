<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->double('price', 10, 2)->default(0);
            $table->string('key')->unique();
            $table->text('description')->nullable();
        });

        if (Schema::hasTable('users') && !Schema::hasColumn('users', 'plan_id')) {
            Schema::table('users', function (Blueprint $table) {
                $table->foreignId('plan_id')->after('email')->nullable()->unsigned()->index()->references('id')->on('plans')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        Schema::dropIfExists('plans');

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }
};
