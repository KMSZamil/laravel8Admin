<?php

namespace App\Imports;

use App\Models\ExcelExportImportModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;

class ExcelFileImport implements ToCollection, ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
    }

    public function model(array $row)
    {
         return new ExcelExportImportModel([
           'name' => $row['name'],
           'age' => $row['age'],
           'dob' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['dob'])->format('Y-m-d')

        ]);

    }
}
