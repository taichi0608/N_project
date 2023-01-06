<?php

namespace App\Models;

//追加
use App\Traits\OptimisticLockObserverTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\SummarySection;

class Department extends Model
{
    use HasFactory;
    //追加
    use SoftDeletes;
    use OptimisticLockObserverTrait;

    
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
         'updated_at',
         
     ];

 
    //categoriesテーブルから::pluckでcategory_nameとidを抽出し、$categoriesに返す関数を作る
    public function getLists()
    {
        // カテゴリー名かカテゴリーIDで検索かける
        $categories = Department::pluck('category_name', 'id');
        
        return $categories;
    }
    //「カテゴリ(category)はたくさんの商品(products)をもつ」というリレーション関係を定義する
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public static function boot()
    {
        parent::boot();
        static::deleted(function ($inputs) {
            $inputs->products()->delete();
        });
    }
}
