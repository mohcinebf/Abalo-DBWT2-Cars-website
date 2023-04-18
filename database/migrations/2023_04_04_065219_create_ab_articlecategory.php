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
        Schema::create('ab_articlecategory', function (Blueprint $table) {
            $table->id()
                ->comment('Primärschlüssel');

            $table->string('ab_name',100)
                ->unique()
                ->comment('Name');

            $table->string('ab_description',1000)
                ->nullable(true)
                ->default(0)
                ->comment('Beschreibung');

            $table->unsignedInteger('ab_parent')
                ->nullable(true)
                ->default(0)
                ->comment('Referenz auf die mögliche Elternkategorie.');

            $table->foreign('ab_parent')
                ->on('ab_articlecategory')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ab_articlecategory');
    }
};
