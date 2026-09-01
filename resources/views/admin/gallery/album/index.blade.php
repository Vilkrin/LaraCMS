<x-layouts::admin :title="__('Album Management')">

    <div class="space-y-6">

    <!-- Page Header -->
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <flux:heading size="xl">Album Management</flux:heading>
            <flux:text class="mt-1">
                Create and manage your image albums.
            </flux:text>
        </div>

        <flux:button variant="primary" icon="plus">
            Create Album
        </flux:button>
    </div>

    <!-- Toolbar -->
    <div class="flex flex-col gap-4 rounded-xl border border-zinc-200 bg-white p-4 shadow-sm dark:border-zinc-700 dark:bg-zinc-900 sm:flex-row sm:items-center sm:justify-between">

        <div class="flex flex-1 flex-col gap-3 sm:flex-row">
            <div class="w-full sm:max-w-sm">
                <flux:input
                    placeholder="Search albums..."
                    icon="magnifying-glass"
                />
            </div>

            <flux:select class="w-full sm:w-44">
                <option>All Albums</option>
                <option>Published</option>
                <option>Draft</option>
            </flux:select>
        </div>

        <div class="flex items-center gap-2">
            <flux:button variant="ghost" icon="arrow-path">
                Refresh
            </flux:button>
        </div>
    </div>

    <!-- Album Table -->
    <div class="overflow-hidden rounded-xl border border-zinc-200 bg-white shadow-sm dark:border-zinc-700 dark:bg-zinc-900">

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">

                <thead class="border-b border-zinc-200 bg-zinc-50 text-xs font-medium uppercase tracking-wide text-zinc-500 dark:border-zinc-700 dark:bg-zinc-800/50 dark:text-zinc-400">
                    <tr>
                        <th class="px-6 py-4">Album</th>
                        <th class="px-6 py-4">Images</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Created</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700">

                    <!-- Album -->
                    <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-800/50">

                        <td class="px-6 py-4">
                            <div class="flex items-center gap-4">

                                <div class="h-14 w-20 shrink-0 overflow-hidden rounded-lg bg-zinc-100 dark:bg-zinc-800">
                                    <img
                                        src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?w=300"
                                        alt="Summer Holiday"
                                        class="h-full w-full object-cover"
                                    >
                                </div>

                                <div>
                                    <div class="font-medium text-zinc-900 dark:text-white">
                                        Summer Holiday
                                    </div>

                                    <div class="mt-1 text-xs text-zinc-500">
                                        summer-holiday
                                    </div>
                                </div>

                            </div>
                        </td>

                        <td class="px-6 py-4 text-zinc-600 dark:text-zinc-300">
                            42 images
                        </td>

                        <td class="px-6 py-4">
                            <flux:badge color="green">
                                Published
                            </flux:badge>
                        </td>

                        <td class="px-6 py-4 text-zinc-500">
                            24 Aug 2026
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex justify-end gap-1">
                                <flux:button
                                    variant="ghost"
                                    size="sm"
                                    icon="pencil"
                                >
                                    Edit
                                </flux:button>

                                <flux:button
                                    variant="ghost"
                                    size="sm"
                                    icon="photo"
                                >
                                    Images
                                </flux:button>

                                <flux:button
                                    variant="ghost"
                                    size="sm"
                                    icon="ellipsis-horizontal"
                                />
                            </div>
                        </td>

                    </tr>

                    <!-- Album -->
                    <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-800/50">

                        <td class="px-6 py-4">
                            <div class="flex items-center gap-4">

                                <div class="h-14 w-20 shrink-0 overflow-hidden rounded-lg bg-zinc-100 dark:bg-zinc-800">
                                    <img
                                        src="https://images.unsplash.com/photo-1500534623283-312aade485b7?w=300"
                                        alt="Events"
                                        class="h-full w-full object-cover"
                                    >
                                </div>

                                <div>
                                    <div class="font-medium text-zinc-900 dark:text-white">
                                        Events
                                    </div>

                                    <div class="mt-1 text-xs text-zinc-500">
                                        events
                                    </div>
                                </div>

                            </div>
                        </td>

                        <td class="px-6 py-4 text-zinc-600 dark:text-zinc-300">
                            18 images
                        </td>

                        <td class="px-6 py-4">
                            <flux:badge color="green">
                                Published
                            </flux:badge>
                        </td>

                        <td class="px-6 py-4 text-zinc-500">
                            18 Aug 2026
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex justify-end gap-1">
                                <flux:button variant="ghost" size="sm" icon="pencil">
                                    Edit
                                </flux:button>

                                <flux:button variant="ghost" size="sm" icon="photo">
                                    Images
                                </flux:button>

                                <flux:button variant="ghost" size="sm" icon="ellipsis-horizontal" />
                            </div>
                        </td>

                    </tr>

                    <!-- Album -->
                    <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-800/50">

                        <td class="px-6 py-4">
                            <div class="flex items-center gap-4">

                                <div class="h-14 w-20 shrink-0 overflow-hidden rounded-lg bg-zinc-100 dark:bg-zinc-800">
                                    <img
                                        src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?w=300"
                                        alt="Unsorted"
                                        class="h-full w-full object-cover"
                                    >
                                </div>

                                <div>
                                    <div class="font-medium text-zinc-900 dark:text-white">
                                        Unsorted
                                    </div>

                                    <div class="mt-1 text-xs text-zinc-500">
                                        unsorted
                                    </div>
                                </div>

                            </div>
                        </td>

                        <td class="px-6 py-4 text-zinc-600 dark:text-zinc-300">
                            7 images
                        </td>

                        <td class="px-6 py-4">
                            <flux:badge color="zinc">
                                Draft
                            </flux:badge>
                        </td>

                        <td class="px-6 py-4 text-zinc-500">
                            12 Aug 2026
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex justify-end gap-1">
                                <flux:button variant="ghost" size="sm" icon="pencil">
                                    Edit
                                </flux:button>

                                <flux:button variant="ghost" size="sm" icon="photo">
                                    Images
                                </flux:button>

                                <flux:button variant="ghost" size="sm" icon="ellipsis-horizontal" />
                            </div>
                        </td>

                    </tr>

                </tbody>

            </table>
        </div>

        <!-- Pagination -->
        <div class="flex items-center justify-between border-t border-zinc-200 px-6 py-4 dark:border-zinc-700">
            <div class="text-sm text-zinc-500">
                Showing 1–3 of 3 albums
            </div>

            <div class="flex gap-2">
                <flux:button variant="ghost" size="sm" disabled>
                    Previous
                </flux:button>

                <flux:button variant="ghost" size="sm" disabled>
                    Next
                </flux:button>
            </div>
        </div>

    </div>

</div>

</x-layouts::admin>