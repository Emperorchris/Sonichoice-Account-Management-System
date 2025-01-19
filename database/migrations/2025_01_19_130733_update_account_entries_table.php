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
        Schema::table('account_entries', function (Blueprint $table) {
            $table->string('amount_received')->nullable()->after('product');
            $table->string('tips')->nullable()->after('amount');
            $table->renameColumn('merchant_name', 'group_name');
            $table->string('remark')->nullable()->after('group_name');
            $table->dropColumn('merchant_phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('account_entries', function (Blueprint $table) {
            $table->string('merchant_phone')->after('group_name');
            $table->dropColumn(['amount_received', 'tips', 'remark']);
            $table->renameColumn('group_name', 'merchant_name');
        });
    }
};
