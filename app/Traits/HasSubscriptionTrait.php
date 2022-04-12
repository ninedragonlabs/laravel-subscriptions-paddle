<?php

namespace App\Traits;

use App\Models\Subscription;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasSubscriptionTrait
{
    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }

    public function isSubscribed(): bool
    {
        return $this->subscriptions()->active()->exists();
    }

    public function activeSubscription(): ?Subscription
    {
        return $this->subscriptions()->latest()->active()->first();
    }

    public function onGracePeriod(): bool
    {
        return ($subscription = $this->activeSubscription())
            ? $subscription->onGracePeriod()
            : false;
    }
}