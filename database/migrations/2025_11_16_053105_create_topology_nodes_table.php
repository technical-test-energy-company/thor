<?php

use App\Topology\Model\TopologyNode;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Infrastructure\Constants\Constants;

return new class extends Migration
{
    public function down(): void
    {
        Schema::dropIfExists(TopologyNode::TABLE_NAME);
    }

    public function up(): void
    {
        Schema::create(TopologyNode::TABLE_NAME, function (Blueprint $table): void {
            $table->string(Constants::ID)->primary();
            $table->string('type');
            $table->string('nodeType');
            $table->string('label');
            $table->string('parentId')->nullable();
        });
    }
};
