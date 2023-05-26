<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbArticle extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'ab_article';

    public function searchByName($searchTerm) {
        return $this->select('*')->where('ab_name', 'ILIKE', '%' . $searchTerm . '%')->get();
    }
    protected $fillable =[
        'ab_name',
        'ab_description',
        'ab_price',
    ];

    const CREATED_AT = "ab_createdate";
    const UPDATED_AT = null;
}
