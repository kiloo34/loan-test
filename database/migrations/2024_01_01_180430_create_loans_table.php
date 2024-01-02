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
        Schema::create('loan_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        
        Schema::create('loan_installments', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->float('rate')->nullable()->default(0.0);
            $table->timestamps();
        });
        
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->integer('amount');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->foreignId('status_id')->constrained('loan_statuses');
            $table->foreignId('loan_installments_id')->constrained('loan_installments');
            $table->timestamps();
        });

        Schema::create('loan_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loan_id')->constrained();
            $table->integer('amount');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->foreignId('status_id')->constrained('loan_statuses');
            $table->timestamps();
        });

        Schema::create('loan_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loan_detail_id')->constrained();
            $table->foreignId('status_id')->constrained('loan_statuses');
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_histories');
        Schema::dropIfExists('loan_details');
        Schema::dropIfExists('loans');
        Schema::dropIfExists('loan_statuses');
        Schema::dropIfExists('loan_installments');
    }
};
