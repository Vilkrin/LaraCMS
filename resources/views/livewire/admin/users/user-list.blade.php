                <div class="space-y-6">
                   <div>
                      <h1 class="font-semibold text-lg text-slate-100">User Management</h1>
                      <p class="text-sm text-slate-400">Manage users, roles, and permissions</p>
                   </div>
                    <!-- Stats Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div class="bg-slate-900/50 border border-amber-400/20 backdrop-blur-sm rounded-lg shadow-sm">
                            <div class="p-6 pb-2">
                                <h3 class="text-sm font-medium text-slate-400">Total Users</h3>
                            </div>
                            <div class="p-6 pt-0">
                                <div class="text-2xl font-bold text-slate-100">{{ $totalUsers }}</div>
                                <p class="text-xs text-green-600">+{{ $usersThisMonth }} this month</p>
                            </div>
                        </div>
                        
                        <div class="bg-slate-900/50 border border-amber-400/20 backdrop-blur-sm rounded-lg shadow-sm">
                            <div class="p-6 pb-2">
                                <h3 class="text-sm font-medium text-slate-400">Active Users</h3>
                            </div>
                            <div class="p-6 pt-0">
                                <div class="text-2xl font-bold text-slate-100">{{ $activeUsers }}</div>
                                <p class="text-xs text-green-600">{{ $totalUsers > 0 ? round(($activeUsers / $totalUsers) * 100, 1) : 0 }}% active rate</p>
                            </div>
                        </div>
                        
                        <div class="bg-slate-900/50 border border-amber-400/20 backdrop-blur-sm rounded-lg shadow-sm">
                            <div class="p-6 pb-2">
                                <h3 class="text-sm font-medium text-slate-400">Administrators</h3>
                            </div>
                            <div class="p-6 pt-0">
                                <div class="text-2xl font-bold text-slate-100">{{ $admins }}</div>
                                <p class="text-xs text-slate-400">{{ $adminPercent }}% of users</p>
                            </div>
                        </div>
                        
                        <div class="bg-slate-900/50 border border-amber-400/20 backdrop-blur-sm rounded-lg shadow-sm">
                            <div class="p-6 pb-2">
                                <h3 class="text-sm font-medium text-slate-400">Placeholder Statistic</h3>
                            </div>
                            <div class="p-6 pt-0">
                                <div class="text-2xl font-bold text-slate-100">7</div>
                                <p class="text-xs text-orange-600">Awaiting response</p>
                            </div>
                        </div>
                    </div>

                    <!-- Users Table -->
                    <div class="bg-slate-900/50 border border-amber-400/20 backdrop-blur-sm rounded-lg shadow-sm">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-2xl font-semibold leading-none tracking-tight text-slate-100">Users</h3>
                                <div class="flex items-center gap-2">                                    
                                    <flux:modal.trigger name="add-user">
                                        <flux:button icon="user-plus" variant="primary" color="amber" class="cursor-pointer">Add User</flux:button>
                                    </flux:modal.trigger>
                                    <div class="relative">
                                        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                        </svg>
                                        <input 
                                            type="text"
                                            wire:model.live.debounce.300ms="search"
                                            placeholder="Search users..."
                                            class="flex h-10 w-64 rounded-md border border-slate-700 bg-slate-900/50 px-3 py-2 text-sm pl-10 placeholder:text-slate-400 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-amber-400"
                                        />
                                    </div>
                                    <flux:select
                                        wire:model.live="roleFilter"
                                        variant="listbox"
                                        class="w-32"
                                    >
                                        <flux:select.option value="all">All Roles</flux:select.option>

                                        @foreach ($this->roles as $role)
                                            <flux:select.option value="{{ $role }}">
                                                {{ Str::title($role) }}
                                            </flux:select.option>
                                        @endforeach
                                    </flux:select>

                                    <flux:select
                                        wire:model.live="statusFilter"
                                        variant="listbox"
                                        class="w-32"
                                    >
                                        <flux:select.option value="all">All Status</flux:select.option>
                                        <flux:select.option value="active">Active</flux:select.option>
                                        <flux:select.option value="inactive">Inactive</flux:select.option>
                                        <flux:select.option value="banned">Banned</flux:select.option>
                                    </flux:select>
                                </div>
                            </div>
                            
                            <div class="relative w-full overflow-auto">
                                <table class="w-full caption-bottom text-sm">
                                    <thead class="[&_tr]:border-b">
                                        <tr class="border-b border-slate-700 transition-colors hover:bg-slate-800/50">
                                            <th class="h-12 px-4 text-left align-middle font-medium text-slate-400">User</th>
                                            <th class="h-12 px-4 text-left align-middle font-medium text-slate-400">Role</th>
                                            <th class="h-12 px-4 text-left align-middle font-medium text-slate-400">Status</th>
                                            <th class="h-12 px-4 text-left align-middle font-medium text-slate-400">2FA</th>
                                            <th class="h-12 px-4 text-left align-middle font-medium text-slate-400">Account Created</th>
                                            <th class="h-12 px-4 text-left align-middle font-medium text-slate-400">Email Verified Status</th>
                                            <th class="h-12 px-4 text-left align-middle font-medium text-slate-400">Last Logged In</th>
                                            <th class="h-12 px-4 text-left align-middle font-medium text-slate-400">Last Activity</th>
                                            <th class="h-12 px-4 text-left align-middle font-medium text-slate-400 w-12"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="[&_tr:last-child]:border-0">
                                        @forelse ($this->users as $user)
                                        <tr class="border-b border-slate-700 transition-colors hover:bg-slate-800/50">
                                            <td class="p-4 align-middle">
                                                <div>
                                                    <div class="font-medium text-slate-100">{{ $user->name }}</div>
                                                    <div class="text-sm text-slate-400">{{ $user->email }}</div>
                                                </div>
                                            </td>
                                            <td class="p-4 align-middle">
                                                <div class="flex flex-wrap gap-1">
                                                    @forelse ($user->getRoleNames() as $role)
                                                        <span class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold border-slate-700 bg-slate-800 text-slate-300">
                                                            {{ $role }}
                                                        </span>
                                                    @empty
                                                        <span class="text-sm text-slate-500">No role</span>
                                                    @endforelse
                                                </div>
                                            </td>
                                            <td class="p-4 align-middle">
                                                <div class="flex items-center gap-2">
                                                    @if(in_array(strtolower($user->status), ['inactive', 'banned']))
                                                        <svg class="h-4 w-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                        </svg>
                                                        <span class="text-red-600">
                                                            {{ ucfirst(strtolower($user->status)) }}
                                                        </span>
                                                    @else
                                                        <svg class="h-4 w-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                        </svg>
                                                        <span class="text-green-600">
                                                            {{ ucfirst(strtolower($user->status)) }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="p-4 align-middle">
                                                <div class="flex items-center gap-2">
                                                    @if($user->two_factor_secret)
                                                        <span class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold border-green-700 bg-green-800 text-green-300">
                                                            2FA Enabled
                                                        </span>
                                                    @else
                                                        <span class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold border-red-700 bg-red-800 text-red-300">
                                                            2FA Disabled
                                                        </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="p-4 align-middle text-sm text-slate-400">
                                                {{ $user->created_at->format('M d, Y') }}
                                            </td>
                                            <td class="p-4 align-middle">
                                                @if($user->hasVerifiedEmail())
                                                    <span class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold border-green-700 bg-green-800 text-green-300">
                                                        Verified
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold border-red-700 bg-red-800 text-red-300">
                                                        Unverified
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="p-4 align-middle text-sm text-slate-400">
                                                {{ $user->last_login_at ? $user->last_login_at->diffForHumans() : 'Never' }}
                                            </td>
                                            <td class="p-4 align-middle text-sm text-slate-400">
                                                @if($user->last_seen && $user->last_seen->gt(now()->subMinutes(5)))
                                                    <span class="text-green-400 font-semibold">Online</span>
                                                @elseif($user->last_seen)
                                                    {{ $user->last_seen->diffForHumans() }}
                                                @else
                                                    Offline
                                                @endif
                                            </td>
                                            <td class="p-4 align-middle">
                                                <div class="flex items-center gap-1">
                                                    <flux:button class="cursor-pointer" href="{{ route('admin.users.show', $user->id) }}" icon="eye">View</flux:button>
                                                    <flux:button class="cursor-pointer" href="{{ route('admin.users.edit', $user->id) }}" icon="pencil-square">Edit</flux:button>
                                                    <flux:modal.trigger name="delete-user">
                                                        <flux:button
                                                            wire:click="confirmDelete({{ $user->id }})"
                                                            variant="danger"
                                                            size="sm"
                                                            icon="trash"
                                                            class="cursor-pointer"
                                                        >
                                                            Delete
                                                        </flux:button>
                                                    </flux:modal.trigger>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr class="border-b border-slate-700 transition-colors hover:bg-slate-800/50">
                                            <td class="p-4 align-middle">
                                                <div>
                                                    <div class="font-medium text-slate-100">No users found.</div>                                                
                                                </div>
                                            </td>
                                        </tr>

                                        @endforelse
                                        
                                    </tbody>
                                </table>

                                {{ $this->users->links() }}

                            </div>
                        </div>
                    </div>
                    <flux:modal name="delete-user" class="md:w-96">
                        <div class="space-y-6">
                            <div>
                                <flux:heading size="lg">Delete User</flux:heading>

                                <flux:text class="mt-2">
                                    Are you sure you want to delete this user? This action cannot be undone.
                                </flux:text>
                            </div>

                            <div class="flex justify-end gap-2">
                                <flux:modal.close>
                                    <flux:button type="button" variant="ghost" class="cursor-pointer">
                                        Cancel
                                    </flux:button>
                                </flux:modal.close>

                                <flux:button
                                    wire:click="deleteUser"
                                    variant="danger"
                                    class="cursor-pointer"
                                >
                                    Delete User
                                </flux:button>
                            </div>
                        </div>
                    </flux:modal>
                    <flux:modal name="add-user" class="md:w-96">
                        <form wire:submit="createUser" class="space-y-6">
                            <div>
                                <flux:heading size="lg">Add User</flux:heading>
                                <flux:text class="mt-2">
                                    Enter the details for the new user.
                                </flux:text>
                            </div>

                            <flux:field>
                                <flux:label>Username</flux:label>
                                <flux:description>
                                    This will be publicly displayed.
                                </flux:description>

                                <flux:input wire:model="name" />

                                <flux:error name="name" />
                            </flux:field>

                            <flux:field>
                                <flux:label>Email</flux:label>
                                <flux:description>
                                    Must be a valid email address.
                                </flux:description>

                                <flux:input
                                    wire:model="email"
                                    type="email"
                                />

                                <flux:error name="email" />
                            </flux:field>

                            <flux:field>
                                <flux:label>Password</flux:label>
                                <flux:description>
                                    Must be at least 8 characters.
                                </flux:description>

                                <flux:input
                                    wire:model="password"
                                    type="password"
                                />

                                <flux:error name="password" />
                            </flux:field>

                            <flux:fieldset>
                                <flux:legend>Roles</flux:legend>

                                <div class="max-h-64 overflow-y-auto space-y-3 pr-2">
                                    @foreach ($availableRoles as $role)
                                        <flux:switch
                                            wire:model="selectedRoles"
                                            value="{{ $role['name'] }}"
                                            label="{{ $role['label'] }}"
                                            align="left"
                                        />
                                    @endforeach
                                </div>

                                <flux:error name="selectedRoles" />
                            </flux:fieldset>

                            <div class="flex justify-end gap-2">
                                <flux:modal.close>
                                    <flux:button
                                        type="button"
                                        variant="ghost"
                                        class="cursor-pointer"
                                    >
                                        Cancel
                                    </flux:button>
                                </flux:modal.close>

                                <flux:button
                                    type="submit"
                                    variant="primary"
                                    color="amber"
                                    class="cursor-pointer"
                                >
                                    Add User
                                </flux:button>
                            </div>
                        </form>
                    </flux:modal>
                </div>