<?php

namespace App\Observers;

use App\Models\Order;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
        $order->logCreated();
    }

    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {
        $order->logUpdated();
    }

    /**
     * Handle the Order "deleted" event.
     */
    public function deleted(Order $order): void
    {
        $order->logDeleted(); 
    }

    /**
     * Handle the Order "restored" event.
     */
    public function restored(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     */
    public function forceDeleted(Order $order): void
    {
        //
    }
}