@extends('index')

@section('page_title', 'Menu View')

@section('main_content')

    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <a href="{{url('menu/create')}}"> <button class="btn btn-primary mb-2">Add</button></a>
                <div class="table-responsive mb-4 mt-4">
                    <link href="{{asset('assets/css/components/custom-sweetalert.css')}}" rel="stylesheet" type="text/css" />
                    <script src="{{asset('plugins/sweetalerts/sweetalert2.min.js')}}"></script>
                    @if ($message = Session::get('success'))
                        <script type="text/javascript">
                            swal("Good job!", "{{ $message }}", "success")
                        </script>
                    @elseif ($message = Session::get('error'))
                        <script type="text/javascript">
                            swal("Opps!", "{{ $message }}", "danger")
                        </script>
                    @endif
                    <table id="zero-config" class="table table-hover" style="width:100%">
                        <thead>
                        <tr>
                            <th>Menu ID</th>
                            <th>Menu Name</th>
                            <th>Status</th>
                            <th class="no-content"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($rows as $row)
                            <tr>
                                <td>{{ $row->menu_id }}</td>
                                <td>{{ $row->menu_name }}</td>
                                <td>
                                    @if($row->status=='Y')
                                        <span class="badge badge-success"> Active </span>
                                    @else
                                        <span class="badge badge-danger"> In-Active </span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('/menu/edit/'.$row->id)}}"> <button class="btn btn-info mb-2">Edit</button></a>
                                    <button class="btn btn-danger" onclick="deleteConfirmation('{{url('/menu/delete')}}',{{$row->id}}, '{{url('/menu')}}')">Delete</button>
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
