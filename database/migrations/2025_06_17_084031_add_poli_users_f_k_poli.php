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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('poli'); // Drop the old 'poli' column if it exists
            $table->foreignId('id_poli')
                ->nullable()
                ->constrained('polis', 'id')
                ->onDelete('cascade')
                ->after('role'); // Add the new foreign key column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('id_poli'); // Drop the foreign key column
        });
    }
};
