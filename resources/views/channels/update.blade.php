@extends('layouts.base')
@section('page-title', "Update $channel->name")
@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables/buttons.dataTables.css') }}">
@endsection

@section('content')
    <div class="card md:h-screen">
        <div class="card-body">
            <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-zink-500">
                <h5 class="text-16" id="exampleModalLabel">Update {{ $channel->name }}</h5>
                <button data-modal-close="showModal"
                    class="transition-all duration-200 ease-linear text-slate-400 hover:text-slate-500"><i data-lucide="x"
                        class="size-5"></i></button>
            </div>
            <div class="max-h-[calc(theme('height.screen')_-_180px)] overflow-y-auto p-4">
                <form class="tablelst-form" action="{{ route('channels.update', $channel) }}" method="POST">
                    @csrf
                    <div class="mb-3" id="modal-id">
                        <label for="id-field" class="inline-block mb-2 text-base font-medium">Full Names</label>
                        <span class="text-red-500">*</span></label>
                        <input type="text" id="id-field" name="name" value="{{ $channel->name }}"
                            class="form-input border-slate-200 dark:border-zink-500 @error('name') border-slate-200 dark:border-zink-500 @enderror focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            placeholder="Full Names" required>
                        @error('name')
                            <div id="name-error" class="mt-1 text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="role-field" class="inline-block mb-2 text-base font-medium">Shortcode
                            <span class="text-red-500">*</span></label>
                        <select
                            class="form-input border-slate-200 dark:border-zink-500 @error('shortcode') border-slate-200 dark:border-zink-500 @enderror  focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            data-choices name="shortcode" id="shortcode" required>
                            @foreach ($shortcodes as $shortcode)
                                <option value="{{ $shortcode->id }}" @selected($channel->shortcode)>{{ $shortcode->name }} -
                                    {{ $shortcode->shortcode }}
                                </option>
                            @endforeach
                        </select>
                        @error('shortcode')
                            <div id="shortcode-error" class="mt-1 text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex justify-end gap-2">
                        <a type="button" href="{{ route('channels.index') }}"
                            class="text-white btn bg-slate-500 border-slate-500 hover:text-white hover:bg-slate-600 hover:border-slate-600 focus:text-white focus:bg-slate-600 focus:border-slate-600 focus:ring focus:ring-slate-100 active:text-white active:bg-slate-600 active:border-slate-600 active:ring active:ring-slate-100 dark:ring-slate-400/10">Close</a>
                        <button type="submit"
                            class="text-white bg-green-500 border-green-500 btn hover:text-white hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600 active:border-green-600 active:ring active:ring-green-100 dark:ring-green-400/10">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('page-scripts')
    <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <!-- Sweet Alerts js -->
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

@endsection
