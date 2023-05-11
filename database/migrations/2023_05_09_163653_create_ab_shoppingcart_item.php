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
        Schema::create('ab_shoppingcart_item', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ab_shoppingcart_id');
            $table->foreign('ab_shoppingcart_id')
                ->on('ab_shoppingcart')
                ->references('id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->bigInteger('ab_article_id');
            $table->foreign('ab_article_id')
                ->on('ab_article')
                ->references('id');
            $table->timestamp('ab_createdate')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ab_shoppingcart_item');
    }
};
