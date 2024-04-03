<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('movie_id');
            $table->integer('rating'); // Rating score from 1 to 10 or any other scale you prefer
            $table->timestamp('rated_at')->useCurrent();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('movie_id')
                ->references('id')->on('movies')
                ->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->unique(['user_id', 'movie_id'], 'user_movie_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
