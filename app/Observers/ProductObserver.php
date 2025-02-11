<?php

namespace App\Observers;

use App\Models\Products;
use App\Models\ProductsAudit;

class ProductObserver
{
    /**
     * Handle the Products "created" event.
     */
    public function created(Products $products): void
    {
        ProductsAudit::create([
            'action' => 'create',
            'product_id' => $products->id,
            'changes' => json_encode($products->getAttributes())
        ]);
    }

    /**
     * Handle the Products "updated" event.
     */
    public function updated(Products $products): void
    {
        ProductsAudit::create([
            'action' => 'edit',
            'product_id' => $products->id,
            'changes' => json_encode($products->getAttributes())
        ]);
    }

    /**
     * Handle the Products "deleted" event.
     */
    public function deleted(Products $products): void
    {
        ProductsAudit::create([
            'action' => 'delete',
            'product_id' => $products->id,
            'changes' => json_encode($products->getAttributes())
        ]);
    }

    /**
     * Handle the Products "restored" event.
     */
    public function restored(Products $products): void
    {
        ProductsAudit::create([
            'action' => 'restore',
            'product_id' => $products->id,
            'changes' => json_encode($products->getAttributes())
        ]);
    }

    /**
     * Handle the Products "force deleted" event.
     */
    public function forceDeleted(Products $products): void
    {
        ProductsAudit::create([
            'action' => 'forceDelete',
            'product_id' => $products->id,
            'changes' => json_encode($products->getAttributes())
        ]);
    }
}
