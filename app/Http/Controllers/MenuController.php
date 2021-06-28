<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MenuModel;

class MenuController extends Controller
{

    public function index()
    {
        $rows = MenuModel::all();
        return view('menu.view',['rows'=>$rows]);
    }

    public function create()
    {
        return view('menu.add');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
               'MenuId' => 'required',
                'MenuName' => 'required'
            ]);

        $data = array('menu_id' => $request->input('MenuId'),
            'menu_name' => $request->input('MenuName'),
            'status' => $request->input('Status')
        );
        //dd($data);
        MenuModel::create($data);

        return redirect('/menu')
            ->with('success','Menu Creation Successful.');

        }catch (Throwable $e) {
            return redirect('/menu')
                ->with('error', 'Menu creation unsuccessful.');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $row = MenuModel::find($id);
        //dd($row);
        return view('menu.add',['row'=>$row]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'MenuId' => 'required',
            'MenuName' => 'required',
            'Status' => 'required',
        ]);

        $data = array(
            'menu_id' => $request->input('MenuId'),
            'menu_name' => $request->input('MenuName'),
            'status' => $request->input('Status'),
        );

        $update = MenuModel::where('id',$id)->update($data);

        if($update)
        {
            return redirect('/menu')
                ->with('success', 'Menu updated successfully.');
        }else{
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
