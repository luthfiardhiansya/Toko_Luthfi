<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',

    ];
    protected $casts = [
        'quantity' => 'integer',
    ];
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getTotalPriceAttribute()
    {
        $price = $this->product->discount_price ?? $this->product->price;
        return $price * $this->quantity;
    }
    public function getTotalWeightAttribute()
    {
        return $this->product->weight * $this->quantity;
    }
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($cartItem) {
            if (! $cartItem->relationLoaded('product')) {
                $cartItem->load('product');
            }
            if (! $cartItem->product) {
                throw new \Exception('Produk tidak ditemukan.');
            }
            if ($cartItem->quantity > $cartItem->product->stock) {
                throw new \Exception('Stok produk tidak mencukupi.');
            }
        });
        static::updating(function ($cartItem) {
            if (! $cartItem->relationLoaded('product')) {
                $cartItem->load('product');
            }
            if (! $cartItem->product) {
                throw new \Exception('Produk tidak ditemukan.');
            }
            if ($cartItem->quantity > $cartItem->product->stock) {
                throw new \Exception('Stok produk tidak mencukupi.');
            }
        });
    }

    /**
     * Agar $item->subtotal di view tidak 0, fallback ke total_price
     */
    public function getSubtotalAttribute()
    {
        return $this->total_price;
    }

}