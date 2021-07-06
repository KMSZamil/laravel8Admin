@extends('app')

@section('page_title', 'Excel Import Page')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/dropify/dropify.min.css')}}">
@endpush

@section('main_content')

    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="mb-4 mt-4">
                    <form action="{{ route('excel.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-4">
                            <label for="file_to_upload" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Upload</label>
                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                <input type="file" class="form-control dropify" id="excel_file" name="excel_file" accept=".xlsx, .xls, .csv" required>
                                <small class="form-text text-muted"> * This field is mandatory</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary mt-3">Upload</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script src="{{asset('plugins/dropify/dropify.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        });
    </script>
@endpush
