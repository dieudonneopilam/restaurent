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
        Schema::create('depenses', function (Blueprint $table) {
            $table->id();
            $table->text('motif');
            $table->integer('montant');
            $table->dateTime('date_depense');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('produit_id')->nullable()->constrained();
            $table->integer('qte_achat')->nullable();
            $table->boolean('deleted')->default(0);
            $table->dateTime('date_deleted')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('depenses');
    }
};
