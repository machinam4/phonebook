@extends('layouts.base')
@section('page-title', 'Contacts')
@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables/buttons.dataTables.css') }}">
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h6 class="mb-4 text-15">Basic</h6>
            <div class="grid grid-cols-1 gap-5 mb-5 xl:grid-cols-2">
                <div>
                    <button type="button" data-modal-target="showModal"
                        class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20 add-btn"
                        data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i
                            class="align-bottom ri-add-line me-1"></i> Add Contact</button>
                </div>
            </div>

            <table id="contacts_table" class="display stripe group" style="width:100%">
                <thead>
                    <tr>
                        <th class="ltr:!text-left rtl:!text-right">Phone Number</th>
                        <th>Full Names</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>ShortCode</th>
                        <th>Date Added</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td
                                class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right">
                                {{ $contact->phone_number }}</td>
                            <td
                                class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right">
                                {{ $contact->names }}</td>
                            <td
                                class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right">
                                {{ $contact->first_name }}</td>
                            <td
                                class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right">
                                {{ $contact->middle_name }}</td>
                            <td
                                class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right">
                                {{ $contact->last_name }}</td>
                            <td
                                class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right">
                                {{ $contact->shortcode }}</td>

                            <td
                                class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right">
                                {{ $contact->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Phone Number</th>
                        <th>Full Names</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>ShortCode</th>
                        <th>Date Added</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div><!--end card-->

    {{-- @include('contacts.addcontact')
    @include('contacts.updatecontact') --}}
@endsection

@section('page-scripts')
    @parent
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

    <script>
        var table = $('#contacts_table').DataTable({
            dom: 'Brtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
                'print'
            ]
        });
        // Hide the default buttons
        // table.buttons().container().hide();

        // Custom dropdown button events
        // $('#exportExcel').on('click', function() {
        //     console.log(123)
        //     table.button('.buttons-excel').trigger();
        // });

        // $('#exportCSV').on('click', function() {
        //     table.button('.buttons-csv').trigger();
        // });

        // $('#exportPDF').on('click', function() {
        //     table.button('.buttons-pdf').trigger();
        // });

        // Event listener for opening the edit moda
    </script>
    <!-- list js-->
    <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <!-- Sweet Alerts js -->
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

@endsection
