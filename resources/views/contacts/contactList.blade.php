@extends('layouts.base')
@section('page-title', 'Contacts')
@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables/buttons.dataTables.css') }}">
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h6 class="mb-4 text-15">Filter Records</h6>
            <form action="{{ route('contacts.filter') }}" method="post">
                @csrf
                <div class="grid grid-cols-1 gap-3 mb-5 lg:grid-cols-3 items-end">
                    <div>
                        <label for="min" class="inline-block mb-2 text-base font-medium">Start Date:</label>
                        <input type="date" id="from-date"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            placeholder="Select Date" name="from_date" value="{{ $fromDate }}" required>
                    </div>
                    <div>
                        <label for="min" class="inline-block mb-2 text-base font-medium">End Date:</label>
                        <input type="date" id="to-date"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            placeholder="Select Date" name="to_date" value="{{ $toDate }}" required>
                    </div>
                    <div>
                        <button type="submit"
                            class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20 add-btn"><i
                                class="align-bottom ri-filter-2-fill me-1"></i>Filter</button>
                    </div>
                </div>
            </form>

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
    <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <!-- Sweet Alerts js -->
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        var table = $('#contacts_table').DataTable({
            ordering: false,
            dom: 'Brtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
                'print'
            ]
        });
        const fromDate = flatpickr("#from-date", {
            enableTime: true,
            maxDate: "today",
            dateFormat: "Y-m-d H:i",
            onChange: function(selectedDates) {
                // When a date is selected or changed in #from-date picker...
                if (selectedDates.length) {
                    // Set the minDate of #to-date picker to the selected date of #from-date
                    toDate.set('minDate', selectedDates[0]);
                }
            },
            // defaultDate: 'today',
        });
        // Initialize the #to-date Flatpickr without setting the minDate initially
        const toDate = flatpickr("#to-date", {
            enableTime: true,
            // maxDate: @json($toDate),
            dateFormat: "Y-m-d H:i",
            // defaultDate: 'today',
        });
    </script>


@endsection
