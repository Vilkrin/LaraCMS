<x-adminlayout>
                <!-- Users Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white dark:bg-gray-800 rounded-lg shadow-md">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="py-3 px-6 text-left">Name</th>
                                <th class="py-3 px-6 text-left">Email</th>
                                <th class="py-3 px-6 text-left">Email Verified</th>
                                <th class="py-3 px-6 text-left">2fa Status</th>
                                <th class="py-3 px-6 text-left">Role</th>
                                <th class="py-3 px-6 text-left">Status</th>
                                <th class="py-3 px-6 text-left">Acount Created</th>
                                <th class="py-3 px-6 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b dark:border-gray-700">
                                <td class="py-3 px-6">John Doe</td>
                                <td class="py-3 px-6">john@example.com</td>
                                <td class="py-3 px-6">Yes</td>
                                <td class="py-3 px-6">Active</td>
                                <td class="py-3 px-6">Admin</td>
                                <td class="py-3 px-6">Active</td>
                                <td class="py-3 px-6">05-10-2024</td>
                                <td class="py-3 px-6 text-center">
                                    <button class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded">Edit</button>
                                    <button class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded ml-2">Delete</button>
                                </td>
                            </tr>
                            <tr class="border-b dark:border-gray-700">
                                <td class="py-3 px-6">Jane Smith</td>
                                <td class="py-3 px-6">jane@example.com</td>
                                <td class="py-3 px-6">Yes</td>
                                <td class="py-3 px-6">Active</td>
                                <td class="py-3 px-6">Editor</td>
                                <td class="py-3 px-6">Inactive</td>
                                <td class="py-3 px-6">05-10-2024</td>
                                <td class="py-3 px-6 text-center">
                                    <button class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded">Edit</button>
                                    <button class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded ml-2">Delete</button>
                                </td>
                            </tr>
                            <!-- More user rows as needed -->
                        </tbody>
                    </table>
                </div>

                <div class="w-full max-w-6xl py-2"> 
                    <div>New Table</div>
                    <livewire:users-table></livewire:users-table>
                </div>

</x-adminlayout>