@extends('index')

@section('page_title', 'User Manager View')

@section('main_content')

    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="mb-4 mt-4">
                    <a href="{{url('mail/mailSent')}}"> <button class="btn btn-primary mb-2">Mail Sent</button></a>
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
                </div>
            </div>
        </div>
    </div>

@endsection
