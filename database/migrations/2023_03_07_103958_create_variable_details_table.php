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
        Schema::create('variable_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('variable_id')->unsigned();
            $table->foreign('variable_id')->references('id')->on('variables')->onUpdate('cascade');
            $table->morphs('optionable');
            $table->unsignedInteger('effect_id')->unsigned();
            $table->foreign('effect_id')->references('id')->on('effects')->onUpdate('cascade');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variable_details');
    }
};