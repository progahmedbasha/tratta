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
        Schema::create('weight_genders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('weight_id')->unsigned();
            $table->foreign('weight_id')->references('id')->on('weights')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedTinyInteger('gender_id')->unsigned();
            $table->foreign('gender_id')->references('id')->on('genders')->onUpdate('cascade')->onDelete('cascade');
            $table->float('range_from');
            $table->float('range_to');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weight_genders');
    }
};