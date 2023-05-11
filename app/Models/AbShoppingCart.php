<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbShoppingCart extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'ab_shoppingcart';

    protected $fillable = [
      'ab_creator_id',
    ];
    const CREATED_AT = "ab_createdate";
    const UPDATED_AT = null;
}
