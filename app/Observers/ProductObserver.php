<?php

namespace App\Observers;

use App\Broadcaster;
use App\Mail\ProductCreateMail;
use App\Product;
use Illuminate\Support\Facades\Mail;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function created(Product $product)
    {
        dd('test');
        $broadcasters = Broadcaster::select('email')->get();
        foreach($broadcasters as $broadcaster){
            Mail::to($broadcaster->email)
                ->send(new ProductCreateMail($product->only(['name','price'])));
        }
    }

    /**
     * Handle the Product "updated" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        //
    }

    /**
     * Handle the Product "deleted" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        //
    }

    /**
     * Handle the Product "restored" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function restored(Product $product)
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        //
    }
}
