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
        Schema::create('predose_third_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('predose_id')->unsigned();
            $table->foreign('predose_id')->references('id')->on('predoses')->onUpdate('cascade')->onDelete('cascade');
            $table->string('text',100);
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
        Schema::dropIfExists('predose_third_questions');
    }
};