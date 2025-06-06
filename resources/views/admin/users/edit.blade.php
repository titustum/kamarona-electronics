<x-layouts.app> {{-- Assuming your admin layout component is x-layouts.app --}}
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl p-4">

        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Edit User: {{ $user->name }}</h2>

        <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT') {{-- Use PUT method for updates in Laravel resource controllers --}}

                {{-- User Name --}}
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">User
                        Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 dark:bg-neutral-700 dark:border-neutral-600 dark:text-white @error('name') border-red-500 @enderror"
                        required autofocus>
                    @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- User Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email
                        Address</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 dark:bg-neutral-700 dark:border-neutral-600 dark:text-white @error('email') border-red-500 @enderror"
                        required>
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- User Password (Optional, for changing password) --}}
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">New
                        Password (optional)</label>
                    <input type="password" name="password" id="password"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 dark:bg-neutral-700 dark:border-neutral-600 dark:text-white @error('password') border-red-500 @enderror"
                        autocomplete="new-password">
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Leave blank to keep current password.</p>
                    @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- User role --}}
                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Select User Role
                    </label>
                    <select name="role" id="role"
                        class="w-full px-4 py-2 border border-gray-300 mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300  rounded-md dark:bg-neutral-700 dark:border-neutral-600 dark:text-white">
                        <option value="customer" {{ old('role', $user->role ?? 'customer') == 'customer' ? 'selected' :
                            '' }}>
                            Customer
                        </option>
                        <option value="admin" {{ old('role', $user->role ?? '') == 'admin' ? 'selected' : '' }}>
                            Admin
                        </option>
                    </select>

                    @error('role')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <div class="flex items-center justify-end gap-4">
                    <a href="{{ route('admin.users.index') }}"
                        class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200">Cancel</a>
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-orange-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-700 active:bg-orange-900 focus:outline-none focus:border-orange-900 focus:ring ring-orange-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Update User
                    </button>
                </div>
            </form>

            <div class="flex items-center justify-end mt-6 pt-6 border-t border-gray-200 dark:border-neutral-700 gap-4">
                {{-- View User Details --}}
                <a href="{{ route('admin.users.show', $user) }}"
                    class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                    View Details
                </a>

                {{-- Delete User Button --}}
                <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this user? This action cannot be undone.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Delete User
                    </button>
                </form>
            </div>
        </div>

    </div>
</x-layouts.app>