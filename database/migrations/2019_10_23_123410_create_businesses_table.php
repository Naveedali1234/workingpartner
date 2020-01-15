<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('province');
            $table->string('city');
            $table->string('sector');
            $table->string('industry');
            $table->string('franchise');
            $table->boolean('status')->default(0);
            $table->string('title')->nullable();
            $table->string('asking_price_from')->nullable();
            $table->string('asking_price_to')->nullable();
            $table->boolean('featured_business')->default('0');
            $table->boolean('social_media_boosting')->default('0');
            $table->string('shares_percent_from')->nullable();
            $table->string('shares_percent_to')->nullable();
            $table->string('shares_available_from')->nullable();
            $table->string('shares_available_to')->nullable();
            $table->string('working_salary_from')->nullable();
            $table->string('working_salary_to')->nullable();
            $table->string('pictures')->nullable();
            $table->string('business_description')->nullable();
            $table->string('shares_available_description')->nullable();
            $table->string('working_condition_description')->nullable();
            $table->string('what_if')->nullable();
            $table->string('other_details')->nullable();
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
        Schema::dropIfExists('businesses');
    }
}
