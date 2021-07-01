<?php

namespace App\Http\Controllers;

use App\Models\FileUpload;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $file_upload = FileUpload::orderby('id','desc')->get();
        return view('file_upload.index',compact('file_upload'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('file_upload.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'file_to_upload' => 'required|mimes:csv,txt,xlx,xls,pdf,jpg,jpeg,png|max:2048'
        ]);

        $file_data = new FileUpload();
        if($request->file()){
            $file_name = time().'-'.$request->file_to_upload->getClientOriginalName();
            $file_path = $request->file('file_to_upload')->storeAs('uploads', $file_name, 'public');

            $file_data->title = $request->title;
            $file_data->file_name = $file_name;
            $file_data->file_path = $file_path;
            $file_data->status = $request->status;
            if($file_data->save()){
                Toastr::success('File upload successful', 'Good job!', ["positionClass" => "toast-top-right"]);
            }else{
                Toastr::error('File upload unsuccessful', 'Good job!', ["positionClass" => "toast-top-right"]);
            }
            return redirect(route('file'));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FileUpload  $fileUpload
     * @return \Illuminate\Http\Response
     */
    public function show(FileUpload $fileUpload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FileUpload  $fileUpload
     * @return \Illuminate\Http\Response
     */
    public function edit(FileUpload $fileUpload)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FileUpload  $fileUpload
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FileUpload $fileUpload)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FileUpload  $fileUpload
     * @return \Illuminate\Http\Response
     */
    public function destroy(FileUpload $fileUpload)
    {
        $file_path = FileUpload::where('id',$fileUpload);
        dd($file_path);
        if(FileUpload::where('id',$fileUpload)->delete()){
            if(FileUpload::exists($file_path)){
                FileUpload::delete($file_path);
            }
            $data = [
                'success' => true,
                'message' => 'File deleted successfully.'
            ];
        }else{
            $data = [
                'success' => false,
                'message' => 'Fielzz delete unsuccessful.'
            ];
        }
        return $data;
    }
}
