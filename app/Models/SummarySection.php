<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Department;

class SummarySection extends Model
{
    use HasFactory;
     //テーブル名
     protected $table = 'summaries';

     //可変項目
     protected $fillable = 
     [
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

     public function Department()
     {
         return $this->belongsTo(Department::class);
     }

}
