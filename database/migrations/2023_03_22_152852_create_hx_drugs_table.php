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
        Schema::create('hx_drugs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('interaction_severity_id')->unsigned();
            $table->foreign('interaction_severity_id')->references('id')->on('interaction_severities')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('hx_drugs');
    }
};