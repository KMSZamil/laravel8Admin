<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserManagerModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserManagerController extends Controller
{
    public function index()
    {
        $rows = UserManagerModel::all();
        return view('usermanager.view',['rows'=>$rows]);
    }

    public function create()
    {
        return view('usermanager.add');
    }

    public function store(Request $request)
    {
        //dd(Auth::user());
        try {
            $request->validate([
                'UserId' => 'required',
                'Name' => 'required',
                'Password' => 'required'
            ]);

            UserManagerModel::create([
                'user_id' => $request->input('UserId'),
                'name' => $request->input('Name'),
                'password' => Hash::make($request->input('Password')),
                'designation' => $request->input('Designation'),
                'email' => $request->input('Email'),
                'status' => $request->input('Status')
            ]);

            return redirect('/usermanager')
                ->with('success', 'User created successfully.');
            } catch (Throwable $e) {
                return redirect('/usermanager')
                    ->with('error', 'User creation unsuccessful.');
            }


    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $row = UserManagerModel::find($id);
        //dd($row);
        return view('usermanager.add',['row'=>$row]);
    }

    public function update(Request $request, $id)
    {
        $date = Carbon::now();
        $datetime =  $date->toDateTimeString();
            $request->validate([
                'UserId' => 'required',
                'Name' => 'required'
            ]);

            $data = array(
                'user_id' => $request->input('UserId'),
                'name' => $request->input('Name'),
                'password' => Hash::make($request->input('Password')),
                'designation' => $request->input('Designation'),
                'email' => $request->input('Email'),
                'status' => $request->input('Status'),
                'edit_date' => $datetime
                );
            //dd($data);
            $update = UserManagerModel::where('id', $id)->update($data);

            if($update)
            {
                return redirect('/usermanager')
                    ->with('success', 'User updated successfully.');
            }else{
                return redirect('/usermanager')
                    ->with('error', 'User update unsuccessful.');
            }

    }

    public function destroy($id)
    {
        $delete = UserManagerModel::where('id',$id)->delete();

        if($delete)
        {
            return redirect('/usermanager')
                ->with('success', 'User deleted successfully.');
        }else{
            return redirect('/usermanager')
                ->with('error', 'User delete unsuccessful.');
        }
    }
}
