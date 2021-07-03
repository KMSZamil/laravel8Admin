<?php

namespace App\Http\Controllers;

use App\Models\FileUpload;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{

    public function index()
    {
        $file_upload = FileUpload::orderby('id','desc')->get();
        return view('file_upload.index',compact('file_upload'));
    }


    public function create()
    {
        return view('file_upload.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'file_to_upload' => 'required|mimes:csv,txt,xlx,xls,pdf,jpg,jpeg,png|max:2048',
            'status' => 'required'
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

    public function show(FileUpload $fileUpload)
    {
        //
    }

    public function edit($id)
    {
        $row = FileUpload::where('id',$id)->first();
        return view('file_upload.edit',compact('row'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $file_data = FileUpload::find($id);
        if(File::exists(public_path('storage/'.$file_data->file_path))){
            File::delete(public_path('storage/'.$file_data->file_path));
        }
        if($request->file()){
            $file_name = time().'-'.$request->file_to_upload->getClientOriginalName();
            $file_path = $request->file('file_to_upload')->storeAs('uploads', $file_name, 'public');

            $file_data->title = $request->title;
            $file_data->file_name = $file_name;
            $file_data->file_path = $file_path;
            $file_data->status = $request->status;
            if($file_data->save()){
                Toastr::success('Update Successful', 'Good job!', ["positionClass" => "toast-top-right"]);
            }else{
                Toastr::error('Update Unsuccessful', 'Good job!', ["positionClass" => "toast-top-right"]);
            }

        }else{
            $file_data->title = $request->title;
            $file_data->status = $request->status;
            if($file_data->save()){
                Toastr::success('Update Successful', 'Good job!', ["positionClass" => "toast-top-right"]);
            }else{
                Toastr::error('Update Unsuccessful', 'Good job!', ["positionClass" => "toast-top-right"]);
            }
        }
        return redirect(route('file'));
    }

    public function destroy($id)
    {
        $data = FileUpload::where('id',$id)->first();
        if(File::exists(public_path('storage/'.$data->file_path))){
            File::delete(public_path('storage/'.$data->file_path));
        }
        if (FileUpload::find($id)->delete()) {
            $data = [
                'success' => true,
                'message' => 'User deleted successfully.'
            ];
        } else {
            $data = [
                'success' => false,
                'message' => 'User delete unsuccessful.'
            ];
        }
        return $data;
    }
}
