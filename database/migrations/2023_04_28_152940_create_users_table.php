<?php

use App\Models\whatsapp\Utils;
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
        Schema::create('users', function (Blueprint $table) {

            $table->id();

            $table->string('phone')->unique();
            $table->string('first_name')->nullable();
            $table->string('role')->default(Utils::USER_ROLE_USER);
            $table->string('last_name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('temp_email')->unique()->nullable();
            $table->string('referral_code')->unique()->nullable();
            $table->string('referred_by')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
