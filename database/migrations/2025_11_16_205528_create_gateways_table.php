<?php

use App\Asset\Asset;
use App\Gateway\Gateway;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Infrastructure\Constants\Constants;

return new class extends Migration
{
    public function down(): void
    {
        Schema::dropIfExists(Gateway::TABLE_NAME);
    }

    public function up(): void
    {
        Schema::create(Gateway::TABLE_NAME, function (Blueprint $table): void {
            $table->string(Constants::ID)->primary();
            $table->string('name', length: 100);
            $table->string(Asset::FOREIGN_ID);

            $table->foreign(Asset::FOREIGN_ID)
                ->references(Constants::PUBLIC_ID)
                ->on(Asset::TABLE_NAME);
        });
    }
};
