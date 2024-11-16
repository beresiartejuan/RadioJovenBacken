<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 25);
            $table->string('email', 200)->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('news', function(Blueprint $table){
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->string('title', 100);
            $table->string('image');
            $table->text('summary');
            $table->boolean('published');
            $table->timestamps();
        });

        Schema::create('news_details', function(Blueprint $table){
            $table->id();
            $table->foreignId('news_id')->references('id')->on('news')->cascadeOnDelete();
            $table->text('content');
            $table->timestamp('published_at');
            $table->timestamps();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        Schema::create('horoscopes', function(Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string("image");
            $table->boolean('published');
            $table->timestamps();
        });

        Schema::create('events', function(Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string("image");
            $table->boolean('published');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news_details');
        Schema::dropIfExists('news');
        Schema::dropIfExists('users');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('horoscopes');
        Schema::dropIfExists('events');
    }
};
