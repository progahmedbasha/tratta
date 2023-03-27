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
        Schema::create('drug_pregnancy_stages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('drug_pregnancy_id')->unsigned();
            $table->foreign('drug_pregnancy_id')->references('id')->on('drug_pregnancies')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('pregnancy_stage_id')->unsigned();
            $table->foreign('pregnancy_stage_id')->references('id')->on('pregnancy_stages')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drug_pregnancy_stages');
    }
};