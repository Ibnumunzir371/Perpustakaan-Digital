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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->String("name");
            $table->enum('type_book',['digital','fisik']);
            $table->String("author");
            $table->String("year");
            $table->String("add");
            $table->String("amount_id");
            $table->String("file_book");
            $table->String("cover_book");
            $table->foreignId("category_id")->constrained("categories")->onUpdate("cascade")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
