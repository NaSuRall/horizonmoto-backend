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
        Schema::create('produits', function (Blueprint $table) {
            $table->engine('InnoDB');

            $table->id();

            $table->string('name');
            $table->text('description')->nullable();
            $table->string('reference')->unique();
            $table->float('price');
            $table->string('image')->nullable();
            $table->integer('stock_quantity')->default(0);
            $table->unsignedBigInteger('marque_id');
            $table->unsignedBigInteger('category_id');

            $table->foreign('marque_id')->references('id')->on('marques')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
