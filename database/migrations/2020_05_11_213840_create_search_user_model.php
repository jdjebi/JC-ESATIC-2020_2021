<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSearchUserModel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SearchUserIndex', function (Blueprint $table) {
            $table->id();

            $table->foreignId('users_id')
                  ->constrained()
                  ->onDelete('cascade')
                  ->nullable(true);

            $table->text('keywords');

            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('SearchUserIndex');
    }
}
