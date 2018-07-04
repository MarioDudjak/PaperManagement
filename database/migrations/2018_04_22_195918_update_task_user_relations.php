<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTaskUserRelations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function($table) {
            $table->dropColumn('confirmed_id');
            $table->dropColumn('created_id');
        });

        Schema::table('tasks', function (Blueprint $table) {
            $table -> string('mentor_id');
            $table -> string('student_id');
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
            $table->dropColumn('mentor_id');
            $table->dropColumn('student_id');
        });
    }
}
