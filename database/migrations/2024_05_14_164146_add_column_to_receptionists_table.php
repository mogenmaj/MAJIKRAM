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
        Schema::table('receptionists', function (Blueprint $table) {
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birth_date');
            $table->integer('phone');
            $table->string('email');
            $table->string('address');
            $table->date('hire_date');
            $table->enum('employement_status',['full_time','part_time'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('receptionists', function (Blueprint $table) {
            //
        });
    }
};
