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
        Schema::create('dettes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produit_id')->constrained();
            $table->integer('qte_dette');
            $table->integer('prix_vente');
            $table->dateTime('date_dette');
            $table->string('name_dette');
            $table->foreignId('user_id')->constrained();
            $table->unsignedBigInteger('user_tit');
            $table->foreign('user_tit')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dettes');
    }
};
