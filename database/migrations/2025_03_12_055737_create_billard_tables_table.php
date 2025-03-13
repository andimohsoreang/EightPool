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
        Schema::create('billard_tables', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('brand');
            $table->string('table_number')->unique();
            $table->enum('status', ['available', 'in_use', 'maintenance']);
            $table->decimal('total_play_hours', 10, 2)->default(0);
            $table->foreignUlid('room_id')->constrained('rooms')->onDelete('cascade');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billard_tables');
    }
};
