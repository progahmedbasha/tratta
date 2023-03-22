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
        Schema::create('drug_pregnancies', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('drug_id')->unsigned();
            $table->foreign('drug_id')->references('id')->on('drugs')->onUpdate('cascade');
            $table->unsignedInteger('effect_id')->unsigned();
            $table->foreign('effect_id')->references('id')->on('effects')->onUpdate('cascade');
            $table->unsignedInteger('pregnancy_safety_id')->unsigned();
            $table->foreign('pregnancy_safety_id')->references('id')->on('pregnancy_safeties')->onUpdate('cascade');
            $table->text('note');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drug_pregnancies');
    }
};