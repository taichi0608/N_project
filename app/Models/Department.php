<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Summary;

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
        return $this->hasMany(Summary::class);
    }
}
