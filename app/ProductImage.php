<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class ProductImage extends Model
{
    public $table = 'product_images';
    public $timestamps = false;
    
    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }

    
    public function destroy_full()
    {
        if(ProductImage::where('id', '=', $this->id)->delete())
        {
            Storage::delete([$this->path]);
            return true;
        }
        else
            return false;
    }
    
}
