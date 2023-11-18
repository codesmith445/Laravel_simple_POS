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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->default('POS Laravel');
            $table->string('company_address')->default('Labangon Cebu City PH, 6000');
            $table->string('company_phone')->default('0945 550 6429');
            $table->string('company_email')->default('cristian.q@laravelpos.com');
            $table->string('company_fax')->default('+63 (923) 445-1121');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
