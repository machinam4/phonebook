@extends('layouts.base')
@section('page-title', 'Contacts')

@section('content')
    <div class="card">
        <div class="card-body">
            {{ $dataTable->table() }}
        </div>
    </div><!--end card-->

    {{-- @include('contacts.addcontact')
    @include('contacts.updatecontact') --}}
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    <script src="{{ asset('assets/js/datatables/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('assets/js/datatables/data-tables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables/data-tables.tailwindcss.min.js') }}"></script>
    <!--buttons dataTables-->
    <script src="{{ asset('assets/js/datatables/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables/vfs_fonts.js') }}"></script>
@endpush

@section('page-scripts')
    <!-- list js-->
    <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <!-- Sweet Alerts js -->
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

@endsection
