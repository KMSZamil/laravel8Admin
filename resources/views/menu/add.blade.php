@extends('index')

@section('page_title', 'Menu Configuration')

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
                            <h4>Menu form</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    @isset($row->id)
                        @if($row->id)
                            <form action="{{url('/menu/update/'.$row->id)}}" method="POST">
                                @csrf
                                <input type="hidden" class="form-control" id="Id" name="Id" placeholder="" value="{{ isset($row->id) ? $row->id : '' }}">
                                @endif
                                @endisset
                                <form action="{{url('/menu/submit')}}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group row mb-4">
                                        <label for="MenuId" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Menu Id</label>
                                        <div class="col-xl-10 col-lg-9 col-sm-10">
                                            <input type="text" class="form-control" id="MenuId" name="MenuId" placeholder="" value="{{ isset($row->menu_id) ? $row->menu_id : '' }}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="MenuName" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Menu Name</label>
                                        <div class="col-xl-10 col-lg-9 col-sm-10">
                                            <input type="text" class="form-control" id="MenuName" name="MenuName" placeholder="" value="{{ isset($row->menu_name) ? $row->menu_name : '' }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label for="inputStatus" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Status</label>
                                        <div class="col-xl-10 col-lg-9 col-sm-10">
                                            <select class="form-control" name="Status">
                                                <option value="Y" {{ isset($row->status) && ($row->status)=='Y' ? 'selected' : '' }}>Active</option>
                                                <option value="N" {{ isset($row->status) && ($row->status)=='N' ? 'selected' : '' }}>In-Active</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            @if(isset($row->id))
                                                <button type="submit" class="btn btn-info mt-3">Update</button>
                                            @else
                                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                </div>
            </div>
        </div>
    </div>

@endsection
