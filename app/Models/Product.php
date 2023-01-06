<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use HasFactory;

    //テーブル名
    protected $table = 'products';

    //可変項目
    protected $fillable = 
    [
        'SummarySectionName',
        'category_id',
        'SummarySectionCode',
        'product_ab_name',
        'PayFor',
        'Hidden',
        'DisplayOrder',
        'updated_at',
    ];


    //「商品(products)はカテゴリ(category)に属する」というリレーション関係を定義する
    public function category()
    {
        return $this->belongsTo(Category::class);
    }



}