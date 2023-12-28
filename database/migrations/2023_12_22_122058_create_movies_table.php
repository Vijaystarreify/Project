<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('title', 255);
            $table->date('release_date');
            $table->string('genre', 100); 
            $table->string('directors', 255);
            $table->string('cast', 255); 
            $table->text('description');
            $table->integer('duration'); 
            $table->string('language', 50);
            $table->string('country', 50); 
            $table->string('image')->nullable()->default('default_poster.jpg'); 
            $table->string('trailer_url')->nullable(); 
            $table->string('rating', 10); 
            $table->decimal('ticket_price', 8, 2); 
            $table->text('showtimes'); 
            $table->string('theater_name', 100); 
            $table->string('location', 255);
            $table->integer('screen_number')->nullable(); 
            $table->timestamps();
            // Indexes
            $table->index('user_id');

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
