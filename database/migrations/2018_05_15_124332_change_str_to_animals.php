<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeStrToAnimals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('animals', function (Blueprint $table) {
            $table->string('name')->nullable()->change();
            $table->string('breed')->nullable()->change();
            $table->string('age')->nullable()->change();
            $table->text('notes')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(function($table) {
            $table->string('name')->change();
            $table->string('breed')->change();
            $table->string('age')->change();
            $table->text('notes')->change();
        }, 'animals');
    }
}
