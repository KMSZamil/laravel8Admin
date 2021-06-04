@extends('index')

@section('main_content')

    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="table-responsive mb-4 mt-4">
                    <table id="zero-config" class="table table-hover" style="width:100%">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>IP Address</th>
                            <th>Visit Time</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($VisitorsData as $v)
                            <tr>
                                <td>{{ $v->id }}</td>
                                <td>{{ $v->ip_address }}</td>
                                <td>{{ $v->visit_time }}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
