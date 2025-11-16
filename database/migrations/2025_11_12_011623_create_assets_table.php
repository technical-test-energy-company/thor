<?php

use App\Asset\Enums\AssetDeviceType;
use App\Asset\Enums\AssetStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Infrastructure\Constants\Constants;
use Infrastructure\Enums\RiskSeverity;

return new class extends Migration
{
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }

    public function up(): void
    {
        Schema::create('assets', function (Blueprint $table): void {
            $table->id();
            $table->text(Constants::PUBLIC_ID)->unique();
            $table->string('name', length: 100);
            $table->string('description');
            $table->enum('device_type', AssetDeviceType::cases());
            $table->ipAddress();
            $table->string('location', length: 2);
            $table->enum('status', AssetStatus::cases());
            $table->string('supplier', length: 100);
            $table->enum('risk', RiskSeverity::cases());
            $table->decimal('risk_score');
            $table->timestamps();
            $table->softDeletes();
        });
    }
};
