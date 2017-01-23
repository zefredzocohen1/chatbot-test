<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Jenssegers\Mongodb\Schema\Blueprint;

class UserMongo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    protected $connection = 'mongodb';
    public function up()
    {
        Schema::connection($this->connection)
            ->table('users', function (Blueprint $collection)
            {
                $collection->index('name');
                $collection->index('email');
                $collection->index('password');
                $collection->index('authority');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection($this->connection)
            ->table('users', function (Blueprint $collection)
            {
                $collection->drop();
            });
    }
}
