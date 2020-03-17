<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLeasedUntilToLeaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('book-leasedby-user', function (Blueprint $table) {
            $table->timestamp('leased_until')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('book-leasedby-user', function (Blueprint $table) {
            Schema::dropColumn('leased_until');
        });
    }
}
