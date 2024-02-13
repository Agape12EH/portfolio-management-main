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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['0', '1', '2'])->default('0'); //0: Natural, 1: Fiscalia, 2: Codeudor
            $table->enum('doc_type', ['CC', 'CE', 'NIT', 'PP'])->default('CC');
            $table->string('dni')->unique();
            $table->string('address');
            $table->string('phone');
            //codeudor
            $table->foreignId('customer_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
