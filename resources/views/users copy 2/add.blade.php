<div id="showModal" modal-center
    class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show">
    <div class="w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600">
        <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-zink-500">
            <h5 class="text-16" id="exampleModalLabel">Add User</h5>
            <button data-modal-close="showModal"
                class="transition-all duration-200 ease-linear text-slate-400 hover:text-slate-500"><i data-lucide="x"
                    class="size-5"></i></button>
        </div>
        <div class="max-h-[calc(theme('height.screen')_-_180px)] overflow-y-auto p-4">
            <form class="tablelst-form" action="{{ route('users.add') }}" method="POST">
                @csrf
                <div class="mb-3" id="modal-id">
                    <label for="id-field" class="inline-block mb-2 text-base font-medium">Full Names</label>
                    <span class="text-red-500">*</span></label>
                    <input type="text" id="id-field" name="name"
                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                        placeholder="Full Names" required>
                </div>
                <div class="mb-3">
                    <label for="username-field" class="inline-block mb-2 text-base font-medium">Username
                        <span class="text-red-500">*</span></label>
                    <input type="text" id="username-field" name="username"
                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                        placeholder="Username" required>
                </div>
                <div class="mb-3">
                    <label for="phone_number-field" class="inline-block mb-2 text-base font-medium">Phone Number <span
                            class="text-red-500">*</span></label>
                    <input type="text" id="phone_number-field" name="phone_number"
                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                        placeholder="Phone Number" required>
                </div>
                <div class="mb-3">
                    <label for="email-field" class="inline-block mb-2 text-base font-medium">E-mail
                        <span class="text-red-500">*</span></label>
                    <input type="email" id="email-field" name="email"
                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                        placeholder="E-mail" required>
                </div>
                <div class="mb-3">
                    <label for="role-field" class="inline-block mb-2 text-base font-medium">Radio Role
                        <span class="text-red-500">*</span></label>
                    <select
                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                        data-choices name="choices-single-default" id="choices-single-default" required>
                        <option value="Admin">Admin</option>
                        @foreach ($channels as $channel)
                            <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="password-field" class="inline-block mb-2 text-base font-medium">Password <span
                            class="text-red-500">*</span></label>
                    <input type="password" id="password-field" name="password"
                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                        placeholder="Password" required>
                </div>
                <div class="mb-3">
                    <label for="secret-field" class="inline-block mb-2 text-base font-medium">Confirm Password <span
                            class="text-red-500">*</span></label>
                    <input type="password" id="secret-field" name="password_confirmation"
                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                        placeholder="Confirm Password" required>
                </div>
                <div class="mb-3">
                    <label for="status-field" class="inline-block mb-2 text-base font-medium">Status <span
                            class="text-red-500">*</span></label>
                    <select
                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                        data-trigger name="status" id="status-field">
                        <option value="">Status</option>
                        <option value="Active">Active</option>
                        <option value="Block">Block</option>
                    </select>
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" data-modal-close="showModal"
                        class="text-white btn bg-slate-500 border-slate-500 hover:text-white hover:bg-slate-600 hover:border-slate-600 focus:text-white focus:bg-slate-600 focus:border-slate-600 focus:ring focus:ring-slate-100 active:text-white active:bg-slate-600 active:border-slate-600 active:ring active:ring-slate-100 dark:ring-slate-400/10"
                        data-modal-close="showModal">Close</button>
                    <button type="submit"
                        class="text-white bg-green-500 border-green-500 btn hover:text-white hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600 active:border-green-600 active:ring active:ring-green-100 dark:ring-green-400/10">Add
                        User</button>
                </div>
            </form>
        </div>
    </div>
</div>
