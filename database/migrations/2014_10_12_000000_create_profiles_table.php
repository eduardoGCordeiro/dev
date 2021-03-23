<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('number');
            $table->string('office');
            $table->string('observation', 400)->nullable();

            $table->unsignedInteger('education_level_id');
            $table->foreign('education_level_id')
                  ->references('id')
                  ->on('education_levels');

            $table->unsignedInteger('file_id');
            $table->foreign('file_id')
                  ->references('id')
                  ->on('files');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
