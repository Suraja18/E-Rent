<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
            CREATE PROCEDURE InsertQuestion(IN q VARCHAR(255), IN a TEXT, IN t VARCHAR(50))
            BEGIN
                INSERT INTO questions (question, answer, type, created_at, updated_at)
                VALUES (q, a, t, NOW(), NOW());        
            END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS InsertQuestion');
    }
};
