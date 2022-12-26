<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\SummarySection;

class Department extends Model
{
    use HasFactory;

    
    //テーブル名
    protected $table = 'departments';

    //可変項目
    protected $fillable = 
    [
        'TenantCode',
        'TenantBranch',
        'SectionCode',
        'SectionName',
        'SectionAbName',
        'PayFor',
        'Hidden',
        'DisplayOrder',
        'UpdatePerson'
    ];




    //Summaryモデルと結合
    public function summaries()
    {
        return $this->hasMany(SummarySection::class);
    }
    // リレーション先のデータも削除
    public static function boot()
    {
        parent::boot();
        static::deleting(function ($department) {
            // dd($department);
            $department->summaries()->delete();
        });
    }
}
