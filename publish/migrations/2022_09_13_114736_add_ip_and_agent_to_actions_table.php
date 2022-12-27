<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

class AddIpAndAgentToActionsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('actions', function (Blueprint $table) {
            $table->string('user_agent')->nullable()->after('data');
            $table->ipAddress('ip')->nullable()->after('data');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('actions', function (Blueprint $table) {
            $table->dropColumn('user_agent');
            $table->dropColumn('ip');
        });
    }
}
