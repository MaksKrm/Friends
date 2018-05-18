<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPublishedToAnimals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('animals', function (Blueprint $table) {
            $table->integer('published')->nullable()->after('other_foto');
            $table->text('other_foto')->nullable()->change();
            $table->integer('sex')->change();
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
            $table->dropColumn('published');
            $table->text('other_foto')->change();
            $table->string('sex')->change();
        }, 'animals');
    }
}
