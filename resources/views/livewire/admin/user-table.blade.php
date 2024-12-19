   <div>
   <!-- Users Table -->
    <x-table>
        <x-slot name="advancedheader">
            <livewire:admin.user-table-header :search="$search"/>
        </x-slot>
        <x-slot name="head">
            <x-table.heading>Username</x-table.heading>
            <x-table.heading>Email</x-table.heading>
            <x-table.heading>Email Verified</x-table.heading>
            <x-table.heading>Account Created</x-table.heading>
            <x-table.heading>Super Admin</x-table.heading>
            <x-table.heading>Role</x-table.heading>
            <x-table.heading>Group</x-table.heading>
            <x-table.heading>2fa Status</x-table.heading>
            <x-table.heading>Actions</x-table.heading>
        </x-slot>

        <x-slot name="body">
            @foreach ( $users as $user )
            <x-table.row>
                <x-table.cell>{{ $user->name }}</x-table.cell>
                <x-table.cell>{{ $user->email }}</x-table.cell>
                <x-table.cell>{{ $user->email_verified_at }}</x-table.cell>
                <x-table.cell>{{ $user->created_at }}</x-table.cell>
                <x-table.cell>Soon</x-table.cell>
                <x-table.cell>Soon</x-table.cell>
                <x-table.cell>Soon</x-table.cell>
                <x-table.cell>{{ $user->two_factor_confirmed_at }}</x-table.cell>
                <x-table.cell>
                    <button><span class="fa-regular fa-eye px-2"></span></button>
                    <button><span class="fa-solid fa-pen-to-square px-2"></span></button>
                    <button><span class="fa-solid fa-trash px-2"></span></button>
                    <form method="post" class="pt-4s" action="{{ route('admin.users.destroy', $user->id) }}">
                    @csrf
                    @method('DELETE')
                    <button
                    type="submit"
                    wire:click="delete({{ $user->id }})"
                    wire:confirm="Are you sure you want to delete this user?"
                    ><span class="fa-solid fa-trash px-2"></span></button>
                    </form>
                </x-table.cell>
            </x-table.row>
            @endforeach

        </x-slot>

        
    </x-table>
    <div class="py-2 px-2">
        {{ $users->links() }}
    </div>
</div>
