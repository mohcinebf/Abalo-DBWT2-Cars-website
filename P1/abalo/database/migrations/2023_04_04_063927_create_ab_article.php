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
        Schema::create('ab_article', function (Blueprint $table) {
            $table->id()
                ->comment('Primärschlüssel');

            $table->string('ab_name',80)
                ->comment('Name');

            $table->integer('ab_price')
                ->comment('Preis in Cent');

            $table->string('ab_description',1000)
                ->comment('Beschreibung, die die Güte oder die Beschaffenheit näher
                                   darstellt. Wird durch den „Ersteller“ (ab_user) gepflegt');

            $table->unsignedInteger('ab_creator_id')
                ->comment('Referenz auf den/die Nutzer:in, der den Artikel erstellt hat und
                                   verkaufen möchte');
            $table->foreign('ab_creator_id')
                ->on('ab_user')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->timestamp('ab_createdate')
                ->comment('Zeitpunkt der Erstellung des Artikels');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ab_article');
    }
};
