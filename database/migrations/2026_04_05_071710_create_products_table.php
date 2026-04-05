<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sv123_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('sv123_categories')->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->integer('stock_quantity');
            $table->string('image_path')->nullable();
            $table->enum('status', ['draft', 'published', 'out_of_stock'])->default('draft');
            // TRƯỜNG SÁNG TẠO: warranty_period (tháng bảo hành)
            $table->integer('warranty_period')->nullable()->default(12);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sv123_products');
    }
};