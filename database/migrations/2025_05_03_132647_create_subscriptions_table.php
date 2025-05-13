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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            // علاقة بالمستخدم (عميل)
            $table->foreignId('client_id')
                  ->constrained()
                  ->cascadeOnDelete();
            // علاقة بالخطة
            $table->foreignId('plan_id')
                  ->constrained()
                  ->cascadeOnDelete();
            // حالة الاشتراك (active, canceled, pending, etc)
            $table->string('status');
            // تواريخ البداية والانتهاء
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
