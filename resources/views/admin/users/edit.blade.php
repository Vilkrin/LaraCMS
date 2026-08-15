<x-layouts.admin :title="__('Edit User')">

    <div class="p-6 flex items-center justify-between">

                    <div class="flex items-center gap-4">

                        <a href="{{ route('admin.users.index') }}"
                        class="inline-flex items-center gap-2 px-3 py-2 text-sm text-slate-300 hover:bg-slate-800/50 rounded transition-colors">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                            Back to Users
                        </a>

                        <div class="h-6 w-px bg-slate-700"></div>

                        <div class="flex flex-col">
                            <h1 class="font-semibold text-lg text-slate-100">Edit User</h1>
                            <p class="text-sm text-slate-400">Modify user information and permissions</p>
                        </div>

                    </div>

                </div>

                <div class="space-y-6">

                <livewire:admin.users.user-details-form :user="$user" />
                


                    <!-- User Roles and Dossier -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                        <!-- User Roles -->
                        @can('manage.users.roles')
                            <livewire:admin.users.user-roles-form :user="$user" />
                        @endcan

                        <!-- Dossier Information -->
                        @can('manage.user.dossier')
                            <livewire:admin.users.user-dossier-form :user="$user" />
                        @endcan

                    </div> 
                </div>

    @persist('toast')
        <flux:toast />
    @endpersist

</x-layouts.admin>