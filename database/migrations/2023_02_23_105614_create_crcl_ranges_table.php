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
        Schema::create('crcl_ranges', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('illness_sub_id')->unsigned();
            $table->foreign('illness_sub_id')->references('id')->on('illness_subs')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('crcl_ranges');
    }
};