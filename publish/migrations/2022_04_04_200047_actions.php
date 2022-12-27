<?php
declare(strict_types=1);

use Hyperf\Database\Migrations\Migration;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Schema\Schema;

class Actions extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('actions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('action');
            $table->string('foreign_id')->nullable();
            $table->string('foreign_table')->nullable();
            $table->json('data');
            $table->timestamps();

            if (Schema::hasTable('users')) {
                $table->foreign('user_id')
                      ->references('id')->on('users')
                      ->onUpdate('cascade')
                      ->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actions');
    }
}
