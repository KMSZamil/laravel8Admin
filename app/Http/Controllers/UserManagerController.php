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
            Toastr::success('User created successfully', 'Good job!', ["positionClass" => "toast-top-right"]);
        }else{
            Toastr::error('User creation failed', 'Sorry!', ["positionClass" => "toast-top-right"]);
        }

        return redirect()->route('usermanager')->with('success', 'User created successfully.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $menus = MenuModel::all();
        $user = UserManagerModel::with('menus')->where('id',$id)->first();

        $data_checked_menu = [];
        if($user->menus){
           foreach($user->menus as $m){
               $data_checked_menu[] = $m->id;
           }
        }
        return view('usermanager.edit',compact('user','menus','data_checked_menu'));
    }

    public function update(Request $request, $id)
    {
        $date = Carbon::now();
        $datetime =  $date->toDateTimeString();
            $request->validate([
                'user_id' => 'required',
                'name' => 'required',
                'password' => 'required'
            ]);

            $user_manager = UserManagerModel::find($id);
            $user_manager->user_id = $request->user_id;
            $user_manager->name = $request->name;
            $user_manager->password = Hash::make($request->password);
            $user_manager->designation = $request->designation;
            $user_manager->email = $request->email;
            $user_manager->status = $request->status;

            if($user_manager->save()){
                MenuUserModel::where('user_id',$id)->delete();
                $menu_ids = $request->menu;
                foreach($menu_ids as $m){
                    $menu_user = new MenuUserModel();
                    $menu_user->user_id = $id;
                    $menu_user->menu_id = $m;
                    $menu_user->save();
                }
                Toastr::success('User created successfully', 'Good job!', ["positionClass" => "toast-top-right"]);
            }else {
                Toastr::error('User creation unsuccessful', 'Sorry!', ["positionClass" => "toast-top-right"]);
            }
            return redirect('/usermanager')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        if (UserManagerModel::where('id', $id)->delete()) {
            MenuUserModel::where('user_id',$id)->delete();
            $data = array(
                'success' => true,
                'message' => 'User deleted successfully.'
            );
        } else {
            $data = array(

                'success' => false,
                'message' => 'User delete unsuccessful.'
            );
        }
        return $data;
    }


}
