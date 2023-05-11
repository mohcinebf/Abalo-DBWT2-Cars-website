<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbShoppingCartItem extends Model
{
    use HasFactory;
    protected $table = 'ab_shoppingcart_item';

    protected $fillable =[
        'ab_shoppingcart_id',
        'ab_article_id',
    ];

    const CREATED_AT = "ab_createdate";
    const UPDATED_AT = null;
}
