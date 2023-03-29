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
        Schema::create('forbidden_case_values', function (Blueprint $table) {
            $table->increments('id');
              $table->unsignedInteger('forbidden_case_id')->unsigned();
            $table->foreign('forbidden_case_id')->references('id')->on('forbidden_cases')->onUpdate('cascade')->onDelete('cascade');
            $table->morphs('variableable');
            $table->string('value',50);
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forbidden_case_values');
    }
};