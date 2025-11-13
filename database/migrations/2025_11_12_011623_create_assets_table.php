<?php

use App\Enums\Asset\AssetDeviceType;
use App\Enums\Asset\AssetRisk;
use App\Enums\Asset\AssetStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }

    public function up(): void
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->text('uid')->unique();
            $table->string('name', length: 100);
            $table->string('description');
            $table->enum('device_type', AssetDeviceType::cases());
            $table->ipAddress();
            $table->string('location', length: 2);
            $table->enum('status', AssetStatus::cases());
            $table->string('supplier', length: 100);
            $table->enum('risk', AssetRisk::cases());
            $table->decimal('risk_score');
            $table->timestamps();
            $table->softDeletes();
        });
    }
};
