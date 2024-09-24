<?php

namespace App\Models;

use App\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Settings;

class Order extends Model
{
    use HasFactory;
    use HasFilter;

    protected $guarded = [];
    protected $casts = [
        'shipping_info' => 'array',
    ];
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id')->withDefault();
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity', 'price', 'profit', 'restaurant_id', 'options');
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }


    public function total(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? $value / 100 : null,
            set: fn($value) => $value * 100,
        );
    }
    public function subTotal(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? $value / 100 : null,
            set: fn($value) => $value * 100,
        );
    }
    public function discount(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? $value / 100 : null,
            set: fn($value) => $value * 100,
        );
    }
    public function paid(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? $value / 100 : null,
            set: fn($value) => $value * 100,
        );
    }
    public function due(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? $value / 100 : null,
            set: fn($value) => $value * 100,
        );
    }
    public function profit(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? $value / 100 : null,
            set: fn($value) => $value * 100,
        );
    }
    public function restaurent()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id');
    }

    public function getShipping($key = null)
    {
        $shipping = json_decode($this->shipping_info, true);
        if ($key) {
            return @$shipping[$key] ?: '';
        }
        return $shipping;
    }
    public function delivery()
    {
        if ($this->take_away) {
            return 'Take Away';
        } elseif ($this->home_delivery) {
            return 'Home Helivery';
        } else {
            return 'Null';
        }
    }

    public function getProducts()
    {



        $products = $this->products->map(fn($product) => (object) [
            'name' => $product->name,
            'quantity' => $product->pivot->quantity,
            'price' => (float) $product->pivot->price,
            'options' => $product->pivot->options ? explode(', ', $product->pivot->options) : null,
            'category' => $product->category,
            'tax_percent'=>(string) $product->tax,
            'total'=> $product->pivot->price *  $product->pivot->quantity,
            'tax'=>Settings::itemTax($product->pivot->price, $product->tax, $product->pivot->quantity),
            
        ]);
        
        $extras = collect(value: json_decode($this->extra, true))
            ->map(fn($extra) => (object) [
                'name' => $extra['name'],
                'quantity' => $extra['quantity'],
                'price' => $extra['price'],
                'options' => null,
                'tax_percent'=>(string) $extra['tax_percentage'],
                'total'=> $extra['price'] *  $extra['quantity'],
                'tax'=>Settings::itemTax($extra['price'], $extra['tax_percentage'], $extra['quantity']),
            ]);
        return $products->merge($extras);
    }
}
