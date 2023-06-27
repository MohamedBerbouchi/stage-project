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
        Schema::create('reclamation_client', function (Blueprint $table) {
            $table->id();
            $table->string('ref');
            $table->unsignedBigInteger('id_anomalie');
            $table->longText('commentaire');
            $table->longText('image')->nullable();
            $table->longText('reponse')->nullable();
            $table->longText('email')->nullable();
            $table->timestamps();

            $table->foreign('id_anomalie')->references('id')->on('type_anomalie'); 

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reclamation_client');
    }
};
