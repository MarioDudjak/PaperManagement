<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TaskUserRelations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function($table) {
            $table->dropColumn('mentor_id');
            $table->dropColumn('student_id');
            $table->dropColumn('applied_id');            
        });

        Schema::table('users', function (Blueprint $table) {
            $table -> string('mentor_id');
            $table -> string('student_id');
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
        Schema::table('users', function($table) {
            $table->dropColumn('mentor_id');
            $table->dropColumn('student_id');
            $table->dropColumn('applied_id');            
        });
    }
}
