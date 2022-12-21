<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Department;

class Summary extends Model
{
    use HasFactory;
    //テーブル名
    protected $table = 'summary_sections';

    //可変項目
    protected $fillable = 
    [
        'department_id',
        'TenantCode',
        'TenantBranch',
        'SectionCode',
        'SummarySectionCode',
        'SummarySectionName',
        'SummarySectionAbName',
        'Hidden',
        'DisplayOrder',
        'UpdatePerson'
    ];

    //Departmentモデルと結合
    public function Department()
    {
        return $this->belongsTo(Department::class);
    }
}
