@extends('index')

@section('main_content')

    <div class="row layout-top-spacing" id="cancel-row">
        <div id="flHorizontalForm" class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>User form</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <form action="{{url('/usermanager_submit')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group row mb-4">
                            <label for="hUserId" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">User Id</label>
                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                <input type="text" class="form-control" id="UserId" name="UserId" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="hName" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Name</label>
                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                <input type="text" class="form-control" id="UserName" name="Name" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="hPassword" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Password</label>
                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                <input type="password" class="form-control" id="hPassword" name="Password" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="hDesignation" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Designation</label>
                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                <input type="text" class="form-control" id="Designation" name="Designation" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="hEmail" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Email</label>
                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                <input type="email" class="form-control" id="hEmail" name ="Email" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="inputStatus" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Status</label>
                            <select class="form-control col-xl-10 col-lg-9 col-sm-10" name="Status">
                                <option value="Y">Active</option>
                                <option value="N">In-Active</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
