<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function down(): void
    {
        Schema::dropIfExists('topology_nodes');
    }

    public function up(): void
    {
        Schema::create('topology_nodes', function (Blueprint $table): void {
            $table->string('id')->primary();
            $table->string('type');
            $table->string('nodeType');
            $table->string('label');
            $table->string('parentId')->nullable();
        });
    }
};
