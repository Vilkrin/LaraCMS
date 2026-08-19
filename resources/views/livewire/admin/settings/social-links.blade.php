<div class="space-y-6">
    <div class="bg-slate-900/50 border border-slate-700 rounded-lg backdrop-blur-sm shadow-sm">
        <div class="p-6 space-y-6">
            <div class="flex items-start justify-between gap-4">
                <div>
                    <h3 class="text-2xl font-semibold text-slate-100 flex items-center gap-2">
                        <svg class="h-5 w-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                        </svg>

                        Social Media Links
                    </h3>

                    <p class="text-sm text-slate-400 mt-2">
                        Configure the social media links shown across the site.
                    </p>
                </div>

                <flux:button
                    wire:click="openCreateModal"
                    variant="primary"
                    color="amber"
                    class="cursor-pointer"
                >
                    Add Social Link
                </flux:button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                @forelse ($socialLinks as $socialLink)
                    <div class="rounded-lg border border-slate-700 bg-slate-800/50 p-4">
                        <div class="flex items-start gap-4">
                            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-slate-900 border border-slate-700 text-amber-400">
                                @if ($socialLink->icon)
                                    <i class="{{ $socialLink->icon }} text-lg"></i>
                                @else
                                    <i class="fa-solid fa-link text-lg"></i>
                                @endif
                            </div>

                            <div class="min-w-0 flex-1">
                                <div class="flex items-center gap-2">
                                    <p class="text-sm font-medium text-slate-100">
                                        {{ $socialLink->name }}
                                    </p>

                                    @if (! $socialLink->is_active)
                                        <span class="rounded bg-slate-700 px-2 py-0.5 text-xs text-slate-300">
                                            Hidden
                                        </span>
                                    @endif
                                </div>

                                <a
                                    href="{{ $socialLink->url }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="text-sm text-slate-400 hover:text-amber-400 break-all"
                                >
                                    {{ $socialLink->url }}
                                </a>
                            </div>

                            <div class="flex items-center gap-1">
                                <flux:switch
                                    wire:click="toggleActive({{ $socialLink->id }})"
                                    :checked="$socialLink->is_active"
                                />

                                <flux:button
                                    wire:click="edit({{ $socialLink->id }})"
                                    variant="ghost"
                                    size="xs"
                                    class="cursor-pointer"
                                    icon="pencil-square"
                                />

                                <flux:button
                                    wire:click="delete({{ $socialLink->id }})"
                                    wire:confirm="Delete this social link?"
                                    variant="ghost"
                                    size="xs"
                                    class="cursor-pointer"
                                    icon="x-mark"
                                />
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="md:col-span-2 xl:col-span-3 rounded-lg border border-dashed border-slate-700 bg-slate-800/30 p-6 text-center">
                        <p class="text-sm text-slate-400">
                            No social links have been added yet.
                        </p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <flux:modal name="social-link-form" class="md:w-96">
        <form wire:submit="save" class="space-y-6">
            <div>
                <flux:heading size="lg">
                    {{ $editingSocialLink ? 'Edit Social Link' : 'Add Social Link' }}
                </flux:heading>

                <flux:text class="mt-2">
                    Enter the platform and URL for this social link.
                </flux:text>
            </div>

            <div class="space-y-4">
                <flux:field>
                    <flux:label>Name</flux:label>
                    <flux:input wire:model="name" placeholder="Discord" />
                    <flux:error name="name" />
                </flux:field>

                <flux:field>
                    <flux:label>Icon class</flux:label>
                        <flux:text class="mt-1 mb-2">
                            Find an icon at
                            <a
                                href="https://fontawesome.com/"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="text-amber-400 hover:text-amber-300 underline"
                            >
                                Font Awesome
                            </a>.
                        </flux:text>
                    <flux:input wire:model="icon" placeholder="fa-brands fa-discord" />
                    <flux:error name="icon" />
                </flux:field>

                <flux:field>
                    <flux:label>URL</flux:label>

                    <flux:input.group>
                        <flux:input.group.prefix>https://</flux:input.group.prefix>
                        <flux:input wire:model="url" placeholder="discord.gg/example" />
                    </flux:input.group>

                    <flux:error name="url" />
                </flux:field>

                <flux:field>
                    <flux:label>Sort Order</flux:label>
                    <flux:input wire:model="sort_order" type="number" min="0" />
                    <flux:error name="sort_order" />
                </flux:field>

                <flux:field>
                    <div class="flex items-center justify-between rounded-lg border border-slate-700 bg-slate-800/50 p-3">
                        <div>
                            <flux:label>Active</flux:label>
                            <p class="text-xs text-slate-400">
                                Show this link in the footer.
                            </p>
                        </div>

                        <flux:switch wire:model="is_active" />
                    </div>

                    <flux:error name="is_active" />
                </flux:field>
            </div>

            <div class="flex">
                <flux:spacer />

                <flux:button
                    type="button"
                    variant="ghost"
                    class="cursor-pointer"
                    wire:click="resetForm"
                    x-on:click="$flux.modal('social-link-form').close()"
                >
                    Cancel
                </flux:button>

                <flux:button
                    type="submit"
                    variant="primary"
                    color="amber"
                    class="cursor-pointer"
                >
                    Save Link
                </flux:button>
            </div>
        </form>
    </flux:modal>
</div>