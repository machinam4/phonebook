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
        Schema::create('paybills', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('radio');
            $table->string("shortcode");
            $table->string('initiator');
            $table->string('SecurityCredential');
            $table->string('key');
            $table->string('secret');
            $table->string('passkey')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paybills');
    }
};
