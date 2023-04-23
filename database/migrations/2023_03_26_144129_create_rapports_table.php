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
        Schema::create('rapports', function (Blueprint $table) {
            $table->id();
            $table->integer('vente_jour');
            $table->integer('vente_non_payer');
            $table->integer('vente_payed')->default(0);
            $table->integer('depense_jour');
            $table->integer('achat_jour');
            $table->integer('dette_jour');
            $table->integer('dette_non_payer');
            $table->integer('dette_payed')->default(0);
            $table->boolean('validate')->default(0);
            $table->foreignId('user_id')->constrained();
            $table->boolean('deleted')->default(0);
            $table->dateTime('date_deleted')->nullable();
            $table->dateTime('date_rapport');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapports');
    }
};
