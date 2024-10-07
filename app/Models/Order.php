<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function parcel()
{
    return $this->belongsTo(related: Parcel::class, foreignKey: 'order_id');
}

public function house()
{
    return $this->belongsTo(House::class, 'order_id');
}

public function apartment()
{
    return $this->belongsTo(Apartment::class, 'order_id');
}

public function hotel()
{
    return $this->belongsTo(Hotel::class, 'order_id');
}

}
