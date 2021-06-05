@extends('index')

@section('main_content')

    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <a href="{{url('usermanager/create')}}"> <button class="btn btn-primary mb-2">Add</button></a>
                <div class="table-responsive mb-4 mt-4">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p></p>
                        </div>
                    @endif
                    <table id="zero-config" class="table table-hover" style="width:100%">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>User ID</th>
                            <th>User Name</th>
                            <th>Password</th>
                            <th>Designation</th>
                            <th>Email</th>
                            <th class="no-content"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($rows as $row)
                            <tr>
                                <td>{{ $r->id }}</td>
                                <td>{{ $r->ip_address }}</td>
                                <td>{{ $r->visit_time }}</td>
                                <td>{{ $r->visit_time }}</td>
                                <td>{{ $r->visit_time }}</td>
                                <td>{{ $r->visit_time }}</td>
                                <td></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
