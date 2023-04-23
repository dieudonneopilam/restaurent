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
        Schema::create('caisses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rapport_id')->constrained();
            $table->integer('argent_entree');
            $table->integer('argent_banque')->default(0);
            $table->integer('argent_chef')->default(0);
            $table->integer('argent_caisse')->default(0);
            $table->integer('depenser')->default(0);
            $table->mediumText('motif_depense')->nullable();
            $table->dateTime('date_rapport');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caisses');
    }
};
