<x-adminlayout>
    <!-- Users Table -->
    <x-table>
        <x-slot name="head">
            <x-table.heading sortable>Username</x-table.heading>
            <x-table.heading sortable>Email Verified</x-table.heading>
            <x-table.heading sortable>Account Created</x-table.heading>
            <x-table.heading sortable>2fa Status</x-table.heading>
        </x-slot>

        <x-slot name="body">
            @foreach ( $users as $user )
            <x-table.row>
                <x-table.cell>{{ $user->name }}</x-table.cell>
                <x-table.cell>{{ $user->email_verified_at }}</x-table.cell>
                <x-table.cell>{{ $user->created_at }}</x-table.cell>
                <x-table.cell>{{ $user->two_factor_confirmed_at }}</x-table.cell>
            </x-table.row>
            @endforeach

        </x-slot>

    </x-table>
</x-adminlayout>