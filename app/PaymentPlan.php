<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentPlan extends Model
{
    public function toArray()
    {
        return [
            'id' => $this->id,
            'description' => $this->description,
            'installments' => $this->installments,
            'interest' => $this->interest,
            'active' => $this->active,
            'created_at' => $this->created_at->format('d-m-y'),
            'updated_at' => $this->updated_at->format('d-m-y'),
        ];
    }
}
