@extends('index')

@section('page_title', 'User Manager View')

@section('main_content')

    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <a href="{{url('usermanager/create')}}"> <button class="btn btn-primary mb-2">Add</button></a>
                <div class="table-responsive mb-4 mt-4">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success text-center">
                            <p>{{ $message }}</p>
                            <p></p>
                        </div>
                    @elseif ($message = Session::get('error'))
                        <div class="alert alert-danger text-center">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <table id="zero-config" class="table table-hover" style="width:100%">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>User ID</th>
                            <th>User Name</th>
                            <th>Designation</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th class="no-content"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($rows as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->user_id }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->designation }}</td>
                                <td>{{ $row->email }}</td>
                                <td>
                                    @if($row->status=='Y')
                                        <span class="badge badge-success"> Active </span>
                                    @else
                                        <span class="badge badge-danger"> In-Active </span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('/usermanager/edit/'.$row->id)}}"> <button class="btn btn-info mb-2">Edit</button></a>
                                    <a href="{{url('/usermanager/delete/'.$row->id)}}"> <button class="btn btn-danger mb-2" onclick="ConfirmDelete()">Delete</button></a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
