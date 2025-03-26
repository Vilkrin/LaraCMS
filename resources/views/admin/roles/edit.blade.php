<x-adminlayout>

  <div class="max-w-3xl mx-auto mt-16">
    <form action="{{ route('admin.roles.store') }}" method="POST" class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
        @csrf

        <h1 class="text-3xl font-semibold text-gray-900 dark:text-white mb-6">Update Role</h1>

        <div class="mb-6">
            <label for="name" class="block text-sm font-medium text-gray-900 dark:text-white">Role Name</label>
            <input type="text" value="{{ old('name', $role->name ?? '') }}" name="name" id="name" 
                class="mt-2 block w-full p-2.5 border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500"
                placeholder="Enter role name">
            
            @foreach ($errors->get('name') as $error)
                <p class="text-red-600 text-sm mt-1">{{ $error }}</p>
            @endforeach
        </div>

        <table class="w-full border rounded-lg bg-white dark:bg-gray-800 overflow-hidden shadow-md">
            <thead class="bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-white">
                <tr>
                    <th class="px-4 py-3 text-left">{{ __('Section') }}</th>
                    <th class="px-4 py-3 text-left">
                        <label class="flex items-center space-x-2">
                            <input class="grand_selectall" type="checkbox">
                            <span>{{ __('Select All') }}</span>
                        </label>
                    </th>
                    <th class="px-4 py-3 text-left">{{ __("Available Permissions") }}</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($permissions as $key => $group)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                        <td class="p-4 font-semibold text-gray-900 dark:text-white">
                            {{ ucfirst($key) }}
                        </td>
                        <td class="p-4">
                            <label class="flex items-center space-x-2">
                                <input class="selectall" type="checkbox">
                                <span>{{ __('Select All') }}</span>
                            </label>
                        </td>
                        <td class="p-4">
                            @forelse($group as $permission)
                                <label class="flex items-center space-x-2">
                                    <input name="permissions[]" class="permissioncheckbox rounded-md border-gray-300 dark:border-gray-700" 
                                           type="checkbox" value="{{ $permission->id }}" 
                                           {{ $role->permissions->contains('id', $permission->id) ? "checked" : "" }}>
                                    <span class="text-gray-900 dark:text-white">{{ $permission->name }}</span>
                                </label>
                            @empty
                                <span class="text-gray-500 dark:text-gray-400">{{ __("No permissions in this group!") }}</span>
                            @endforelse
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-6 flex justify-end">
            <button type="submit" 
                class="px-6 py-2.5 text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg shadow-md">
                Update Role
            </button>
        </div>
    </form>
</div>


</x-adminlayout>