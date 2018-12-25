<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateForeignkey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('users', 'organisation_id'))
        {
            Schema::table('users', function(Blueprint $table) {
                $table->dropColumn('organisation_id');
            });
        }

        if (!Schema::hasColumn('organisations', 'user_id'))
        {
            Schema::table('organisations', function(Blueprint $table) {
                $table->integer('user_id');
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
        if (Schema::hasColumn('users', 'organisation_id'))
        {
            Schema::table('users', function(Blueprint $table) {
                $table->dropColumn('organisation_id');
            });
        }
    }
}
