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
    /*    Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        }); */
    
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('main_image')->nullable();
            $table->json('ancillary_images')->nullable(); // Store ancillary images as a JSON array
            $table->text('description');
            $table->string('author_name');
            $table->date('date');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
};
