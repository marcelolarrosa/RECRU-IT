<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('email');
            $table->string('position');
            $table->string('phone');
            $table->string('address');
            $table->string('portfolio_link')->nullable();
            $table->string('github_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('behance_link')->nullable();
            $table->string('notes')->nullable();
            $table->string('resume_url')->nullable();
            $table->string('profile_pic_url')->nullable();
            $table->string('skype')->nullable();
            $table->string('bestcandidate')->nullable();
            $table->string('interview_date')->nullable();
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
        Schema::dropIfExists('candidates');
    }
}
