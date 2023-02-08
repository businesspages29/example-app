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
            $table->id();
            $table->integer('user_id');
            //full name
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('middle_name')->nullable();


            $table->enum('gender', ['', 'Male', 'Female'])->nullable();
            $table->date('dob')->nullable();
            $table->string('birthplace')->nullable();

            //location
            // $table->string('address', 255)->nullable();
            // $table->string('street', 100)->nullable();
            // $table->string('city', 100)->nullable();
            // $table->string('district', 100)->nullable();
            // $table->string('state', 100)->nullable();
            // $table->integer('country')->nullable();


            $table->enum('status', ['New', 'Active', 'Suspended', 'Locked'])->default('New')->nullable();
            $table->boolean('private_mode')->default(1);
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
