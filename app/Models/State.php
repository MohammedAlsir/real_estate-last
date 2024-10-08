<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Spatie\Translatable\HasTranslations;


class State extends Model
{
    use HasFactory;
    // use HasTranslations;

    protected $fillable = [
        'name',
    ];
      // public $translatable = ['name'];
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
