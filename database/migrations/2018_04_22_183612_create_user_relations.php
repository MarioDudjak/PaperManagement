<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRelations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table -> string('created_id');
            $table -> string('confirmed_id');
            $table -> string('applied_id');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function($table) {
            $table->dropColumn('created_id');
            $table->dropColumn('confirmed_id');
            $table->dropColumn('applied_id');            
        });
    }
}
