<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{


     //テーブル名
     protected $table = 'categories';

     //可変項目
     protected $fillable = 
     [
         'category_name',
         'category_ab_name',
         'category_code',
         'DisplayOrder',
         'PayFor',
         'Hidden',
         'DisplayOrder',
         
     ];
 
    //categoriesテーブルから::pluckでcategory_nameとidを抽出し、$categoriesに返す関数を作る
    public function getLists()
    {
        // カテゴリー名かカテゴリーIDで検索かける
        $categories = Category::pluck('category_name', 'id');
        
        return $categories;
    }
    //「カテゴリ(category)はたくさんの商品(products)をもつ」というリレーション関係を定義する
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // 親要素を削除すると関連する子要素も削除
    public static function boot()
    {
        parent::boot();
        static::deleting(function ($deleted_child) {
            $deleted_child->products()->delete();
        });
    }

}
