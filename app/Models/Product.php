<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";

    public function furnisher(){

        return $this->belongsTo(Furnisher::class, 'furnisher_id');
    }

    public function invoices()
    {
        return $this->belongsToMany(Invoice::class)->withPivot('quantity');
    }

}
