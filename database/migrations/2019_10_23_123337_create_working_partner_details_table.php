<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkingPartnerDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('working_partner_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nationality')->nullable();
            $table->string('language')->nullable();
            $table->string('city');
            $table->string('previous_work')->nullable();
            $table->string('current_work')->nullable();
            $table->string('business_experience')->nullable();
            $table->string('qualifications');
            $table->string('interest')->nullable();
            $table->string('hobbies')->nullable();
            $table->string('strengths')->nullable();
            $table->string('weakness')->nullable();
            $table->string('source_of_finance')->nullable();
            $table->string('funding_available');
            $table->string('what_if')->nullable();
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
        Schema::dropIfExists('working_partner_details');
    }
}
