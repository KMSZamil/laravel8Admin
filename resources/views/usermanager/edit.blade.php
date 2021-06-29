@extends('app')

@section('page_title', 'User Manager Edit')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
@endpush

@section('main_content')

    <div class="row layout-top-spacing" id="cancel-row">
        <div id="flHorizontalForm" class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    @if ($errors->any())
                        <div class="alert alert-danger text-center">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>User Edit Form</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <form action="{{ route('user.store') }}" method="POST" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="form-group row mb-4">
                            <label for="user_id" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">User Id</label>
                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                <input type="text" class="form-control" id="user_id" name="user_id" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="name" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Name</label>
                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="designation" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Designation</label>
                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                <input type="text" class="form-control" id="designation" name="designation" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="email" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Email</label>
                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                <input type="email" class="form-control" id="email" name ="email" placeholder="Enter Email">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="hMenu" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Menu</label>
                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                @if(isset($menus))
                                    @foreach($menus as $menu)
                                        <div class="n-chk">
                                            <label class="new-control new-checkbox checkbox-primary">
                                                <input type="checkbox" class="new-control-input" name="menu[]" value="{{$menu->id}}">
                                                <span class="new-control-indicator"></span>{{ $menu->menu_name }}
                                            </label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="inputStatus" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Status</label>
                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                <select class="form-control" name="status">
                                    <option value="Y">Active</option>
                                    <option value="N">In-Active</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary mt-3">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
