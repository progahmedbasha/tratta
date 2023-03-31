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
        Schema::create('fourth_question_scores', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('fourth_question_id')->unsigned();
            $table->foreign('fourth_question_id')->references('id')->on('predose_fourth_questions')->onUpdate('cascade')->onDelete('cascade');
            $table->string('score_label',100);
            $table->boolean('is_sub');
            $table->unsignedInteger('parent_id')->unsigned()->nullable();
            $table->foreign('parent_id')->references('id')->on('fourth_question_scores')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fourth_question_scores');
    }
};