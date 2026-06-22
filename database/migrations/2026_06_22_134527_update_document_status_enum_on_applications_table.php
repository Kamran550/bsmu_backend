<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $values = "'" . implode("','", \App\Enums\DocumentStatusEnum::values()) . "'";

        DB::statement("
        ALTER TABLE applications
        MODIFY document_status ENUM($values) NULL
    ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
