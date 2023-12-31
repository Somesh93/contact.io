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
        if(!Schema::hasTable('company_job_title_mapping')) {
            Schema::create('company_job_title_mapping', function (Blueprint $table) {
                $table->id();
                $table->integer('contact_id');
                $table->integer('title_id')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_job_title_mapping');

    }
};
