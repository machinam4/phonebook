@extends('layouts.base')
@section('page-title', 'PayBills')
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
                            class="align-bottom ri-add-line me-1"></i> Add Paybill</button>
                </div>
                {{-- export button start --}}
                {{-- <div class="ltr:md:text-end rtl:md:text-start">
                    <div class="relative dropdown">
                        <button type="button"
                            class="text-white dropdown-toggle btn bg-green-500 border-green-500 hover:text-white hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600 active:border-green-600 active:ring active:ring-green-100 dark:ring-green-400/20"
                            id="dropdownMenuButton" data-bs-toggle="dropdown">Export<i data-lucide="chevron-down"
                                class="inline-block size-4 ltr:ml-1 rtl:mr-1"></i></button>

                        <ul class="absolute z-50 hidden py-2 mt-1 list-none bg-white rounded-md shadow-md ltr:text-left rtl:text-right dropdown-menu min-w-max dark:bg-zink-600"
                            aria-labelledby="dropdownMenuButton">
                            <li>
                                <a class="block px-4 py-1.5 text-base font-medium transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                    href="#!" id="exportCopy">Copy</a>
                            </li>
                            <li>
                                <a class="block px-4 py-1.5 text-base font-medium transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                    href="#!" id="exportExcel">Excel</a>
                            </li>
                            <li>
                                <a class="block px-4 py-1.5 text-base font-medium transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                    href="#!" id="exportCSV">CSV</a>
                            </li>
                            <li>
                                <a class="block px-4 py-1.5 text-base font-medium transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                    href="#!" id="exportPDF">PDF</a>
                            </li>
                            <li>
                                <a class="block px-4 py-1.5 text-base font-medium transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                    href="#!" id="exportPrint">Print</a>
                            </li>
                        </ul>
                    </div>
                </div> --}}
                {{-- End Export Button --}}
            </div>

            <table id="paybills_table" class="display stripe group" style="width:100%">
                <thead>
                    <tr>
                        <th class="ltr:!text-left rtl:!text-right">Paybill Name</th>
                        <th>Shortcode</th>
                        <th>Assigned Radio</th>
                        <th>Date Added</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paybills as $paybill)
                        <tr>
                            <td
                                class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right">
                                {{ $paybill->name }}</td>
                            <td
                                class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right">
                                {{ $paybill->shortcode }}</td>
                            <td
                                class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right">
                                {{ $paybill->radio }}</td>

                            <td
                                class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right">
                                {{ $paybill->created_at }}</td>
                            <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 status"><span
                                    class="px-2.5 py-0.5 inline-block text-xs font-medium rounded border bg-green-100 border-transparent text-green-500 dark:bg-green-500/20 dark:border-transparent text-uppercase">Active</span>
                            </td>
                            <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                <div class="flex gap-2">
                                    <div class="edit">
                                        <button {{-- data-modal-target="showModal" --}}
                                            class="edit-item-btn py-1 text-xs text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20 edit-item-btn">Edit</button>
                                    </div>
                                    <div class="remove">
                                        <button data-modal-target="deleteRecordModal" id="delete-record"
                                            class="py-1 text-xs text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20 remove-item-btn">Remove</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div><!--end card-->
    <div id="showModal" modal-center
        class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show">
        <div class="w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600">
            <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-zink-500">
                <h5 class="text-16" id="exampleModalLabel">Add Customer</h5>
                <button data-modal-close="showModal"
                    class="transition-all duration-200 ease-linear text-slate-400 hover:text-slate-500"><i data-lucide="x"
                        class="size-5"></i></button>
            </div>
            <div class="max-h-[calc(theme('height.screen')_-_180px)] overflow-y-auto p-4">
                <form class="tablelist-form">
                    <div class="mb-3" id="modal-id" style="display: none;">
                        <label for="id-field" class="inline-block mb-2 text-base font-medium">ID</label>
                        <input type="text" id="id-field"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            placeholder="ID" readonly="">
                    </div>
                    <div class="mb-3">
                        <label for="customername-field" class="inline-block mb-2 text-base font-medium">Customer Name
                            <span class="text-red-500">*</span></label>
                        <input type="text" id="customername-field"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            placeholder="Enter your name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email-field" class="inline-block mb-2 text-base font-medium">Email <span
                                class="text-red-500">*</span></label>
                        <input type="email" id="email-field"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            placeholder="Enter email" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone-field" class="inline-block mb-2 text-base font-medium">Phone Number <span
                                class="text-red-500">*</span></label>
                        <input type="number" id="phone-field"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            placeholder="Enter Phone no." required>
                    </div>
                    <div class="mb-3">
                        <label for="date-field" class="inline-block mb-2 text-base font-medium">Joining Date <span
                                class="text-red-500">*</span></label>
                        <input type="date" id="date-field"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            placeholder="Select Date" required>
                    </div>
                    <div class="mb-3">
                        <label for="status-field" class="inline-block mb-2 text-base font-medium">Status <span
                                class="text-red-500">*</span></label>
                        <select
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            data-trigger name="status-field" id="status-field">
                            <option value="">Status</option>
                            <option value="Active">Active</option>
                            <option value="Block">Block</option>
                        </select>
                    </div>
                    <div class="flex justify-end gap-2">
                        <button type="button" data-modal-close="showModal"
                            class="text-white btn bg-slate-500 border-slate-500 hover:text-white hover:bg-slate-600 hover:border-slate-600 focus:text-white focus:bg-slate-600 focus:border-slate-600 focus:ring focus:ring-slate-100 active:text-white active:bg-slate-600 active:border-slate-600 active:ring active:ring-slate-100 dark:ring-slate-400/10"
                            data-modal-close="showModal">Close</button>
                        <button type="submit" data-modal-close="showModal"
                            class="text-white bg-green-500 border-green-500 btn hover:text-white hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600 active:border-green-600 active:ring active:ring-green-100 dark:ring-green-400/10"
                            id="add-btn">Add Customer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="deleteModal" modal-center
        class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show">
        <div class="w-screen md:w-[25rem] bg-white shadow rounded-md dark:bg-zink-600">
            <div class="max-h-[calc(theme('height.screen')_-_180px)] overflow-y-auto px-6 py-8">
                <div class="float-right">
                    <button data-modal-close="deleteModal" id="close-removeNotesModal"
                        class="transition-all duration-200 ease-linear text-slate-500 hover:text-red-500"><i
                            data-lucide="x" class="size-5"></i></button>
                </div>
                <img src="data:image/png;base64,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"
                    alt="" class="block h-12 mx-auto">
                <div class="mt-5 text-center">
                    <h5 class="mb-1">Are you sure?</h5>
                    <p class="text-slate-500 dark:text-zink-200">Are you certain you want to delete this record?</p>
                    <div class="flex justify-center gap-2 mt-6">
                        <button type="button" data-modal-close="deleteModal"
                            class="bg-white text-slate-500 btn hover:text-slate-500 hover:bg-slate-100 focus:text-slate-500 focus:bg-slate-100 active:text-slate-500 active:bg-slate-100 dark:bg-zink-600 dark:hover:bg-slate-500/10 dark:focus:bg-slate-500/10 dark:active:bg-slate-500/10">Cancel</button>
                        <button type="button" id="remove-notes"
                            class="text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20">Yes,
                            Delete It!</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-scripts')
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
        var table = $('#paybills_table').DataTable({
            // dom: 'lBfrtip',
            // dom: 'lBfrtip', // This needs to be defined to tell DataTables where to display the buttons
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

        // Event listener for opening the edit modal
        $('.edit-item-btn').on('click', function() {
            // Get data from the row (assuming data attributes)
            var id = $(this).data('id');
            var name = $(this).data('name');
            var email = $(this).data('email');
            // ...other fields...

            // Populate the modal fields
            $('#id-field').val(id);
            $('#customername-field').val(name);
            $('#email-field').val(email);
            // ...other fields...

            // Show the modal
            $('#showModal').modal('show');
        });
    </script>
    <!-- list js-->
    <script src="{{ asset('assets/libs/list.js/list.min.js') }}"></script>
    <script src="{{ asset('assets/libs/list.pagination.js/list.pagination.min.js') }}"></script>
    <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <!-- Sweet Alerts js -->
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- listjs init -->
    <script src="{{ asset('assets/js/pages/listjs.init.js') }}"></script>
@endsection
