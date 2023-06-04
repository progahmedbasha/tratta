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
        Schema::table('drug_trades', function (Blueprint $table) {
            $table->dropColumn('name_key');
            $table->foreignId('trade_key_id')->after('country_id');
        }); 
        DB::table('drug_trades')->update(['trade_key_id' => 1]);
        Schema::table('drug_trades', function (Blueprint $table) {
            $table->foreign('trade_key_id')->references('id')->on('trade_keys')->onUpdate('cascade')->onDelete('cascade');  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};