<?php

use App\Models\Device;
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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('name')->text(100);
            $table->string('serial')->unique()->text(100);
            $table->string('model')->text(100);
            $table->string('img')->nullable()->text(266);
            $table->boolean('is_active')->default(value:Device::isactive);
            $table->string('describe')->nullable()->text();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
