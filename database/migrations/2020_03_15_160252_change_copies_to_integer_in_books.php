<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeCopiesToIntegerInBooks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            DB::statement("UPDATE `books` SET copies = '0' WHERE copies = '';");
            $table->bigInteger('copies')->default(1)->charset(null)->collation(null)->change();
            $table->renameColumn('auther', 'author');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->string('copies')->change();
            $table->renameColumn('author', 'auther');
        });
    }
}
