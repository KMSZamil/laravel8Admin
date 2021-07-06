<?php

namespace App\Exports;

use App\Models\ExcelExportImportModel;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExcelFileExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ExcelExportImportModel::all();
    }

    public function headings(): array
    {
        return [
            'Id', 'Name', 'Age', 'Date of Birth', 'Created At', 'Updated At'
        ];
    }
}
