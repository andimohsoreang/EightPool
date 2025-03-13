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
        Schema::create('table_prices', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('billard_table_id')->constrained('billard_tables')->onDelete('cascade');
            $table->time('start_time');
            $table->time('end_time');
            $table->decimal('price_per_hour', 10, 2);
            $table->enum('day_type', ['weekday', 'weekend', 'holiday', 'all']);
            $table->date('valid_from')->nullable();
            $table->date('valid_to')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_prices');
    }
};
