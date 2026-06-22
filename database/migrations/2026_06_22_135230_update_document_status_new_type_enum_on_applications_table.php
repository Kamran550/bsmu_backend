<?php

use App\Enums\DocumentStatusEnum;
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
        $enumValues = implode(',', array_map(
            fn($value) => "'" . addslashes($value) . "'",
            DocumentStatusEnum::values()
        ));

        DB::statement("
        ALTER TABLE applications
        MODIFY document_status ENUM($enumValues) NULL
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
