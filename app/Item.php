<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
      'shelf',
      'code',
      'colour',
      'description',
      'quantity',
      'make',
      'group',
    ];
}
