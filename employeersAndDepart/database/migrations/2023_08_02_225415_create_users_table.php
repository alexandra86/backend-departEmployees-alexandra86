<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("firstName");
            $table->string("lastName");
            $table->string("email")->unique();
            $table->string("password");
            $table->string("phone")->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->timestamps();

            $table->foreign('department_id')
                ->references('id')
                ->on('departments')
                ->onDelete('SET NULL');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
