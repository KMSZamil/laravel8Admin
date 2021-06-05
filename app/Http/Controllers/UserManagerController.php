<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserManagerModel;

class UserManagerController extends Controller
{

    public function index()
    {
        $rows = json_decode(UserManagerModel::all());
        return view('usermanager.view',['rows'=>$rows]);
    }

    public function create()
    {
        return view('usermanager.add');
    }

    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'UserId' => 'required',
            'Name' => 'required',
            'Password' => 'required'
        ]);

        UserManagerModel::create($request->all());

        return redirect()->route('usermanager.index')
            ->with('success', 'User created successfully.');

    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
