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
        Schema::create('drug_formulas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('drug_id')->unsigned();
            $table->foreign('drug_id')->references('id')->on('drugs')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('formula_id')->unsigned();
            $table->foreign('formula_id')->references('id')->on('formulas')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drug_formulas');
    }
};