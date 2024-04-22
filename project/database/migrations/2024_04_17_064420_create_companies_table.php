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

            $table->string('company_name');
            $table->string("address");
            $table->text("description");
            $table->bigInteger('number');
            $table->bigInteger("inn");/*12 чисел*/
            $table->bigInteger("kpp");/*9 чисел*/
            $table->string("company_type");
            $table->timestamp('verified_at')->nullable();
            $table->foreignIdFor(\App\Models\User::class);

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
