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
        Schema::create('dose_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('note_dose_id')->unsigned();
            $table->foreign('note_dose_id')->references('id')->on('note_doses')->onUpdate('cascade');
            $table->text('recommended_dosage');
            $table->text('dosage_note');
            $table->text('titration_note');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dose_messages');
    }
};