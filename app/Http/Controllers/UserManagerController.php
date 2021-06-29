<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserManagerModel;
use App\Models\MenuModel;
use App\Models\MenuUserModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

class UserManagerController extends Controller
{
    public function index()
    {
        $users = UserManagerModel::orderBy('id','desc')->get();
        return view('usermanager.index',compact('users'));

    }

    public function create()
    {
        $menus = MenuModel::all();
        return view('usermanager.create',compact('menus'));
    }

    public function store(Request $request)
    {

        $this->validate($request,[
            'user_id' => 'required',
            'name' => 'required',
            'password' => 'required'
        ]);

        $user_manager = new UserManagerModel();
        $user_manager->user_id = $request->user_id;
        $user_manager->name = $request->name;
        $user_manager->password = Hash::make($request->password);
        $user_manager->designation = $request->designation;
        $user_manager->email = $request->email;
        $user_manager->status = $request->status;

        if ($user_manager->save()){
            $MenuIds = $request->menu;
            foreach ($MenuIds as $m){
                $user_menu = new MenuUserModel();
                $user_menu->user_id = $user_manager->id;
                $user_menu->menu_id = $m;
                $user_menu->save();
            }
        }
        Toastr::success('User created successfully.', 'Goodjob!', ["positionClass" => "toast-top-right"]);

        return redirect()->route('usermanager')->with('success', 'User created successfully.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $menu = MenuModel::all();
        $user = UserManagerModel::with('menus')->where('id',$id)->first();
        return view('usermanager.edit',compact('user','menu'));
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
//            return redirect('/usermanager')
//                ->with('success', 'User deleted successfully.');
            $data = array(

                'success' =>true,
                'message' => 'User deleted successfully.'
            );
            return $data;
        }else{
//            return redirect('/usermanager')
//                ->with('error', 'User delete unsuccessful.');
            $data = array(

                'success' =>false,
                'message' => 'User delete unsuccessful.'
            );
            return $data;
        }
    }
}
