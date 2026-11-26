<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * These columns are used by the application but were added to the live
 * database by hand and never had a migration. Each one is guarded so this
 * migration is a no-op on databases that already have them.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('q_r_generates', function (Blueprint $table) {
            if (! Schema::hasColumn('q_r_generates', 'c_by')) {
                $table->unsignedBigInteger('c_by')->nullable();
            }
            if (! Schema::hasColumn('q_r_generates', 'category_id')) {
                $table->unsignedBigInteger('category_id')->nullable();
            }
        });

        Schema::table('pc_sales', function (Blueprint $table) {
            if (! Schema::hasColumn('pc_sales', 'branch')) {
                $table->string('branch')->nullable();
            }
        });

        Schema::table(config('permission.table_names.permissions', 'permissions'), function (Blueprint $table) {
            if (! Schema::hasColumn(config('permission.table_names.permissions', 'permissions'), 'model')) {
                $table->string('model')->nullable();
            }
        });
    }

    public function down(): void
    {
        // Intentionally left empty: these columns may pre-date this migration.
    }
};
