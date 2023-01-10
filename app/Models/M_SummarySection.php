<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_SummarySection extends Model
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

    public function category()
    {
        return $this->belongsTo(M_Section::class);
    }



}