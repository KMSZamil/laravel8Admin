<?php

namespace App\Http\Controllers;

use App\Exports\ExcelFileExport;
use App\Models\ExcelExportImportModel;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ExcelFileImport;

class ExcelImportExport extends Controller
{
    function index()
    {
        $data = ExcelExportImportModel::orderby('id','DESC')->get();
        return view('excel_export_import.index', compact('data'));
    }

    function excel_import()
    {
        return view('excel_export_import.import');
    }

    function excel_store(Request $request)
    {
        Excel::import(new ExcelFileImport, $request->file('excel_file'));
        Toastr::success('Excel file successfully.', 'Good job!', ["positionClass" => "toast-top-right"]);
        return redirect()->route('excel')
            ->with('success','Excel file successfully.');
    }

    function excel_export()
    {
        return Excel::download(new ExcelFileExport, 'dump_data.xlsx');
    }
}
