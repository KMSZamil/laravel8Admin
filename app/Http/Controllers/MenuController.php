<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Models\MenuModel;

class MenuController extends Controller
{

    public function index()
    {
        $rows = MenuModel::all();
        return view('menu.index',compact('rows'));
    }

    public function create()
    {
        return view('menu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'MenuName' => 'required'
        ]);

        $data = array(
            'menu_name' => $request->input('MenuName'),
            'status' => $request->input('Status')
        );

        MenuModel::create($data);

        Toastr::success('Menu created successfully.', 'Good job!', ["positionClass" => "toast-top-right"]);

        return redirect(route('menu'))
            ->with('success','Menu Creation Successful.');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $row = MenuModel::find($id);
        //dd($row);
        return view('menu.edit',['row'=>$row]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'MenuName' => 'required',
            'Status' => 'required',
        ]);

        $data = array(
            'menu_name' => $request->input('MenuName'),
            'status' => $request->input('Status'),
        );

        $update = MenuModel::where('id',$id)->update($data);

        if($update)
        {
            Toastr::success('Menu updated successfully', 'Good job!', ["positionClass" => "toast-top-right"]);
            return redirect('/menu')
                ->with('success', 'Menu updated successfully.');
        }else{
            Toastr::error('Menu update unsuccessful', 'Good job!', ["positionClass" => "toast-top-right"]);
            return redirect('/menu')
                ->with('error', 'Menu update unsuccessful.');
        }

    }

    public function destroy($id)
    {
        $delete = MenuModel::where('id',$id)->delete();

        if($delete)
        {
            $data = array(

                'success' =>true,
                'message' => 'User deleted successfully.'
            );
            return $data;
        }else{
            $data = array(

                'success' =>false,
                'message' => 'User delete unsuccessful.'
            );
            return $data;
        }
    }
}
