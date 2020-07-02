<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
class Product extends Model
{

    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'stock' => $this->stock,
            'active' => $this->active,
            'created_at' => $this->created_at->format('d-m-y'),
            'updated_at' => $this->updated_at->format('d-m-y'),
        ];
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
        //return $this->belongs(ProductImage::class, 'ProductIm');
    }

    public function imagesBelongsTo()
    {
        return $this->belongsTo(ProductImage::class);
    }
}
