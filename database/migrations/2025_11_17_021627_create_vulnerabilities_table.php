<?php

use App\Asset\Asset;
use App\Vulnerability\Vulnerability;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Infrastructure\Constants\Constants;
use Infrastructure\Enums\RiskSeverity;

return new class extends Migration
{
    public function down(): void
    {
        Schema::dropIfExists(Vulnerability::TABLE_NAME);
    }

    public function up(): void
    {
        Schema::create(Vulnerability::TABLE_NAME, function (Blueprint $table): void {
            $table->id();
            $table->text(Constants::PUBLIC_ID)->unique();
            $table->text(Constants::CVE_ID)->unique();
            $table->text(Asset::FOREIGN_ID);
            $table->enum('severity', RiskSeverity::cases())->nullable();
            $table->string('description', length: 1000)->nullable();
            $table->dateTime('date_published')->nullable();
            $table->string('scope', length: 100)->nullable();
            $table->text('refId')->nullable();
            $table->string('title', length: 100)->nullable();
            $table->decimal('cvss')->nullable();
            $table->boolean('acknowledged')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign(Asset::FOREIGN_ID)
                ->references(Constants::PUBLIC_ID)
                ->on(Asset::TABLE_NAME);
        });
    }
};
