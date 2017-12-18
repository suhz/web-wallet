<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefreshLocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::connection($this->connection)->create('refresh_locks', function (Blueprint $collection) {
            $collection->increments('id');
            $collection->string('address');
            $collection->integer('lastRefreshTime');
             $collection->boolean('isLocked');
            $collection->timestamps();
            $collection->index(['id', 'address']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('refresh_locks');
    }
}