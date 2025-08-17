<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('driver_number')->unique();
            $table->string('employment_type'); // Full Time / Part Time
            $table->string('status'); // Active / Inactive
            $table->boolean('is_suspended')->default(false);
            $table->boolean('is_ceased')->default(false);
            $table->string('id_iqarna');
            $table->date('id_iqarna_expiry');
            $table->date('dob');
            $table->string('nationality');
            $table->string('country');
            $table->string('city');
            $table->string('imei', 15);
            $table->string('gender');
            $table->text('note')->nullable();
            $table->string('photo_path')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
