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
        Schema::create('note_doses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('variable_id')->unsigned();
            $table->foreign('variable_id')->references('id')->on('variables')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('effect_id')->unsigned();
            $table->foreign('effect_id')->references('id')->on('effects')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('dose_type_id')->unsigned();
            $table->foreign('dose_type_id')->references('id')->on('dose_types')->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('priority')->default(0);
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('note_doses');
    }
};