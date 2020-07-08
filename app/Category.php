<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'created_at' => $this->created_at->format('d-m-y'),
            'updated_at' => $this->updated_at->format('d-m-y'),
        ];
    }
    
}
