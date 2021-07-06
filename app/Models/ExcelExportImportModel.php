<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcelExportImportModel extends Model
{
    use HasFactory;

    protected $table = 'excel_export_import';

    public $fillable = [
        'name', 'age', 'dob'
    ];
}
