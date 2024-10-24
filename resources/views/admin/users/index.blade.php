<x-adminlayout>
    <!-- Users Table -->
    <x-table>
        <x-slot name="advancedheader">
            <x-table.advanced-user></x-table.advanced-user>
        </x-slot>
        <x-slot name="head">
            <x-table.heading>Username</x-table.heading>
            <x-table.heading>Email Verified</x-table.heading>
            <x-table.heading>Account Created</x-table.heading>
            <x-table.heading>2fa Status</x-table.heading>
            <x-table.heading>Actions</x-table.heading>
        </x-slot>

        <x-slot name="body">
            @foreach ( $users as $user )
            <x-table.row>
                <x-table.cell>{{ $user->name }}</x-table.cell>
                <x-table.cell>{{ $user->email_verified_at }}</x-table.cell>
                <x-table.cell>{{ $user->created_at }}</x-table.cell>
                <x-table.cell>{{ $user->two_factor_confirmed_at }}</x-table.cell>
                <x-table.cell>
                    <button><span class="fa-regular fa-eye px-2"></span></button>
                    <button><span class="fa-solid fa-pen-to-square px-2"></span></button>
                    <button><span class="fa-solid fa-trash px-2"></span></button>
                </x-table.cell>
            </x-table.row>
            @endforeach

        </x-slot>

    </x-table>
</x-adminlayout>