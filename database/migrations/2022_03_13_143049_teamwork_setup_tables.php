<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class TeamworkSetupTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(\Config::get('teamwork.users_table'), function (Blueprint $table) {
            $table->foreignId('current_team_id')->after('remember_token')->nullable();
        });

        Schema::create(\Config::get('teamwork.teams_table'), function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->constrained(\Config::get('teamwork.users_table'))->index();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create(\Config::get('teamwork.team_user_table'), function (Blueprint $table) {
            $table->foreignId('user_id')->constrained(\Config::get('teamwork.users_table'))->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('team_id')->constrained(\Config::get('teamwork.teams_table'))->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['team_id', 'user_id']);
        });

        Schema::create(\Config::get('teamwork.team_invites_table'), function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained(\Config::get('teamwork.teams_table'))->cascadeOnDelete();
            $table->bigInteger('user_id')->unsigned();
            $table->enum('type', ['invite', 'request']);
            $table->string('email');
            $table->string('accept_token');
            $table->string('deny_token');
            $table->timestamps();

            $table->unique(['team_id', 'email']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(\Config::get('teamwork.users_table'), function (Blueprint $table) {
            $table->dropColumn('current_team_id');
        });

        Schema::table(\Config::get('teamwork.team_user_table'), function (Blueprint $table) {
            if (DB::getDriverName() !== 'sqlite') {
                $table->dropForeign(\Config::get('teamwork.team_user_table').'_user_id_foreign');
            }
            if (DB::getDriverName() !== 'sqlite') {
                $table->dropForeign(\Config::get('teamwork.team_user_table').'_team_id_foreign');
            }
        });

        Schema::drop(\Config::get('teamwork.team_user_table'));
        Schema::drop(\Config::get('teamwork.team_invites_table'));
        Schema::drop(\Config::get('teamwork.teams_table'));
    }
}
