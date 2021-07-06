@extends('app')

@section('page_title', 'Excel Export Import View')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt-global_style.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
@endpush

@section('main_content')

    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="mb-4 mt-4">
                    <a href="{{ route('excel.import') }}"> <button class="btn btn-primary mb-2">Excel Import</button></a>
                    <a href="{{ route('excel.export') }}"> <button class="btn btn-success mb-2">Excel Export</button></a>
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
                    <div class="table-responsive mb-4 mt-4">
                        <table id="zero-config" class="table table-hover" style="width:100%">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Dob</th>
                                <th>Create Date</th>
                                <th>Update Date</th>
                                <th class="no-content"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->age }}</td>
                                    <td>{{ $row->dob }}</td>
                                    <td>{{ $row->created_at }}</td>
                                    <td>{{ $row->updated_at }}</td>
                                    <td>
{{--                                        <a href=""> <button class="btn btn-info mb-2">Edit</button></a>--}}
{{--                                        <button class="btn btn-danger" onclick="deleteConfirmation('{{url('/usermanager/delete')}}',{{$row->id}}, '{{url('/usermanager')}}')">Delete</button>--}}
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
    <script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
    {!! Toastr::message() !!}

    <script>
        $('#zero-config').DataTable({
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7
        });
    </script>
@endpush
