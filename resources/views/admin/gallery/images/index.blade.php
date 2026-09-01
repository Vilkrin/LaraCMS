<x-layouts::admin :title="__('Image Management')">

<div class="space-y-6">

    <!-- Page Header -->
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <flux:heading size="xl">Image Management</flux:heading>
            <flux:text class="mt-1">
                Upload, organise and manage your images.
            </flux:text>
        </div>

        <flux:button variant="primary" icon="arrow-up-tray">
            Upload Images
        </flux:button>
    </div>

    <!-- Toolbar -->
    <div class="rounded-xl border border-zinc-200 bg-white p-4 shadow-sm dark:border-zinc-700 dark:bg-zinc-900">

        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

            <div class="flex flex-1 flex-col gap-3 sm:flex-row">

                <div class="w-full sm:max-w-sm">
                    <flux:input
                        placeholder="Search images..."
                        icon="magnifying-glass"
                    />
                </div>

                <flux:select class="w-full sm:w-48">
                    <option>All Albums</option>
                    <option>Summer Holiday</option>
                    <option>Events</option>
                    <option>Unsorted</option>
                </flux:select>

            </div>

            <div class="flex items-center gap-2">

                <flux:button
                    variant="ghost"
                    size="sm"
                    icon="squares-2x2"
                />

                <flux:button
                    variant="ghost"
                    size="sm"
                    icon="list-bullet"
                />

                <flux:button
                    variant="ghost"
                    size="sm"
                    icon="arrow-path"
                >
                    Refresh
                </flux:button>

            </div>

        </div>

    </div>

    <!-- Selection Toolbar -->
    <div class="flex flex-col gap-3 rounded-xl border border-zinc-200 bg-zinc-50 p-4 dark:border-zinc-700 dark:bg-zinc-800/50 sm:flex-row sm:items-center sm:justify-between">

        <div class="flex items-center gap-3">
            <flux:checkbox />

            <span class="text-sm text-zinc-600 dark:text-zinc-300">
                Select all
            </span>
        </div>

        <div class="flex gap-2">
            <flux:button
                variant="ghost"
                size="sm"
                icon="folder"
            >
                Move to Album
            </flux:button>

            <flux:button
                variant="ghost"
                size="sm"
                icon="trash"
            >
                Delete
            </flux:button>
        </div>

    </div>

    <!-- Image Grid -->
    <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">

        <!-- Image -->
        <div class="group overflow-hidden rounded-xl border border-zinc-200 bg-white shadow-sm dark:border-zinc-700 dark:bg-zinc-900">

            <div class="relative aspect-square overflow-hidden bg-zinc-100 dark:bg-zinc-800">

                <img
                    src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?w=600"
                    alt="Summer landscape"
                    class="h-full w-full object-cover transition duration-300 group-hover:scale-105"
                >

                <div class="absolute left-3 top-3">
                    <flux:checkbox />
                </div>

                <div class="absolute inset-x-0 bottom-0 flex translate-y-full items-center justify-center gap-1 bg-black/60 p-3 transition group-hover:translate-y-0">

                    <flux:button
                        variant="ghost"
                        size="sm"
                        icon="eye"
                        class="text-white hover:text-white"
                    />

                    <flux:button
                        variant="ghost"
                        size="sm"
                        icon="pencil"
                        class="text-white hover:text-white"
                    />

                    <flux:button
                        variant="ghost"
                        size="sm"
                        icon="trash"
                        class="text-white hover:text-white"
                    />

                </div>

            </div>

            <div class="p-3">

                <div class="truncate text-sm font-medium text-zinc-900 dark:text-white">
                    summer-landscape.jpg
                </div>

                <div class="mt-1 flex items-center justify-between gap-2">

                    <span class="truncate text-xs text-zinc-500">
                        Summer Holiday
                    </span>

                    <span class="shrink-0 text-xs text-zinc-400">
                        2.4 MB
                    </span>

                </div>

            </div>

        </div>

        <!-- Image -->
        <div class="group overflow-hidden rounded-xl border border-zinc-200 bg-white shadow-sm dark:border-zinc-700 dark:bg-zinc-900">

            <div class="relative aspect-square overflow-hidden bg-zinc-100 dark:bg-zinc-800">

                <img
                    src="https://images.unsplash.com/photo-1500534623283-312aade485b7?w=600"
                    alt="Mountain landscape"
                    class="h-full w-full object-cover transition duration-300 group-hover:scale-105"
                >

                <div class="absolute left-3 top-3">
                    <flux:checkbox />
                </div>

                <div class="absolute inset-x-0 bottom-0 flex translate-y-full items-center justify-center gap-1 bg-black/60 p-3 transition group-hover:translate-y-0">

                    <flux:button variant="ghost" size="sm" icon="eye" class="text-white hover:text-white" />
                    <flux:button variant="ghost" size="sm" icon="pencil" class="text-white hover:text-white" />
                    <flux:button variant="ghost" size="sm" icon="trash" class="text-white hover:text-white" />

                </div>

            </div>

            <div class="p-3">

                <div class="truncate text-sm font-medium text-zinc-900 dark:text-white">
                    mountain-view.jpg
                </div>

                <div class="mt-1 flex items-center justify-between gap-2">

                    <span class="truncate text-xs text-zinc-500">
                        Summer Holiday
                    </span>

                    <span class="shrink-0 text-xs text-zinc-400">
                        1.8 MB
                    </span>

                </div>

            </div>

        </div>

        <!-- Image -->
        <div class="group overflow-hidden rounded-xl border border-zinc-200 bg-white shadow-sm dark:border-zinc-700 dark:bg-zinc-900">

            <div class="relative aspect-square overflow-hidden bg-zinc-100 dark:bg-zinc-800">

                <img
                    src="https://images.unsplash.com/photo-1511578314322-379afb476865?w=600"
                    alt="Event"
                    class="h-full w-full object-cover transition duration-300 group-hover:scale-105"
                >

                <div class="absolute left-3 top-3">
                    <flux:checkbox />
                </div>

                <div class="absolute inset-x-0 bottom-0 flex translate-y-full items-center justify-center gap-1 bg-black/60 p-3 transition group-hover:translate-y-0">

                    <flux:button variant="ghost" size="sm" icon="eye" class="text-white hover:text-white" />
                    <flux:button variant="ghost" size="sm" icon="pencil" class="text-white hover:text-white" />
                    <flux:button variant="ghost" size="sm" icon="trash" class="text-white hover:text-white" />

                </div>

            </div>

            <div class="p-3">

                <div class="truncate text-sm font-medium text-zinc-900 dark:text-white">
                    event-2026.jpg
                </div>

                <div class="mt-1 flex items-center justify-between gap-2">

                    <span class="truncate text-xs text-zinc-500">
                        Events
                    </span>

                    <span class="shrink-0 text-xs text-zinc-400">
                        3.1 MB
                    </span>

                </div>

            </div>

        </div>

        <!-- Image -->
        <div class="group overflow-hidden rounded-xl border border-zinc-200 bg-white shadow-sm dark:border-zinc-700 dark:bg-zinc-900">

            <div class="relative aspect-square overflow-hidden bg-zinc-100 dark:bg-zinc-800">

                <img
                    src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?w=600"
                    alt="Forest"
                    class="h-full w-full object-cover transition duration-300 group-hover:scale-105"
                >

                <div class="absolute left-3 top-3">
                    <flux:checkbox />
                </div>

                <div class="absolute inset-x-0 bottom-0 flex translate-y-full items-center justify-center gap-1 bg-black/60 p-3 transition group-hover:translate-y-0">

                    <flux:button variant="ghost" size="sm" icon="eye" class="text-white hover:text-white" />
                    <flux:button variant="ghost" size="sm" icon="pencil" class="text-white hover:text-white" />
                    <flux:button variant="ghost" size="sm" icon="trash" class="text-white hover:text-white" />

                </div>

            </div>

            <div class="p-3">

                <div class="truncate text-sm font-medium text-zinc-900 dark:text-white">
                    forest.jpg
                </div>

                <div class="mt-1 flex items-center justify-between gap-2">

                    <span class="truncate text-xs text-zinc-500">
                        Unsorted
                    </span>

                    <span class="shrink-0 text-xs text-zinc-400">
                        4.2 MB
                    </span>

                </div>

            </div>

        </div>

        <!-- Image -->
        <div class="group overflow-hidden rounded-xl border border-zinc-200 bg-white shadow-sm dark:border-zinc-700 dark:bg-zinc-900">

            <div class="relative aspect-square overflow-hidden bg-zinc-100 dark:bg-zinc-800">

                <img
                    src="https://images.unsplash.com/photo-1501785888041-af3ef285b470?w=600"
                    alt="Lake"
                    class="h-full w-full object-cover transition duration-300 group-hover:scale-105"
                >

                <div class="absolute left-3 top-3">
                    <flux:checkbox />
                </div>

                <div class="absolute inset-x-0 bottom-0 flex translate-y-full items-center justify-center gap-1 bg-black/60 p-3 transition group-hover:translate-y-0">

                    <flux:button variant="ghost" size="sm" icon="eye" class="text-white hover:text-white" />
                    <flux:button variant="ghost" size="sm" icon="pencil" class="text-white hover:text-white" />
                    <flux:button variant="ghost" size="sm" icon="trash" class="text-white hover:text-white" />

                </div>

            </div>

            <div class="p-3">

                <div class="truncate text-sm font-medium text-zinc-900 dark:text-white">
                    lake.jpg
                </div>

                <div class="mt-1 flex items-center justify-between gap-2">

                    <span class="truncate text-xs text-zinc-500">
                        Summer Holiday
                    </span>

                    <span class="shrink-0 text-xs text-zinc-400">
                        2.7 MB
                    </span>

                </div>

            </div>

        </div>

    </div>

    <!-- Pagination -->
    <div class="flex items-center justify-between border-t border-zinc-200 pt-4 dark:border-zinc-700">

        <div class="text-sm text-zinc-500">
            Showing 1–5 of 67 images
        </div>

        <div class="flex gap-2">
            <flux:button variant="ghost" size="sm" disabled>
                Previous
            </flux:button>

            <flux:button variant="ghost" size="sm">
                Next
            </flux:button>
        </div>

    </div>

</div>

</x-layouts::admin>