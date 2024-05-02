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
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();

            $table->string("first_name");
            $table->string("name");
            $table->string("last_name");
            $table->string("tags");
            $table->boolean("gender");
            $table->string("resident_address");
            $table->date('birthdate');
            $table->string('citizenship');
            $table->string("work_permission");
            $table->foreignIdFor(\App\Models\User::class);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resumes');
    }
};
