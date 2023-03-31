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
        Schema::create('score_points', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('fourth_question_score_id')->unsigned();
            $table->foreign('fourth_question_score_id')->references('id')->on('fourth_question_scores')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('point');
            $table->morphs('variableable');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('score_points');
    }
};