<x-layouts::admin :title="__('Menu Management')">

<style>
    .menu-tabs [data-flux-tabs] {
        border: 1px solid rgb(51 65 85);
        background-color: rgb(15 23 42 / 0.5);
        padding: 0.25rem;
        border-radius: 0.375rem;
        gap: 0.25rem;
        width: fit-content;
    }

    .menu-tabs [data-flux-tab] {
        color: rgb(203 213 225);
        border-radius: 0.25rem;
        font-size: 0.875rem;
        padding: 0.375rem 0.75rem;
    }

    .menu-tabs [data-flux-tab]:hover {
        color: rgb(251 191 36);
        background-color: rgb(30 41 59 / 0.5);
    }

    .menu-tabs [data-flux-tab][data-selected] {
        color: rgb(251 191 36) !important;
        background-color: rgb(251 191 36 / 0.1) !important;
    }

    .menu-tabs [data-flux-tab] span {
        color: rgb(203 213 225);
        font-size: 0.75rem;
        margin-left: 0.25rem;
    }
</style>

  <livewire:admin.menu-management />

</x-layouts::admin>