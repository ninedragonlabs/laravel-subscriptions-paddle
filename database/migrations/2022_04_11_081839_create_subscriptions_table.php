<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();

            // Paddle identifiers.
            $table->string('paddle_user_id');
            $table->string('paddle_subscription_id');
            $table->string('paddle_plan_id');
            $table->string('paddle_checkout_id')->nullable();

            // Subscription state.
            $table->enum('status', ['active', 'trialing', 'past_due', 'paused', 'deleted']);
            $table->timestamp('cancelled_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
};
