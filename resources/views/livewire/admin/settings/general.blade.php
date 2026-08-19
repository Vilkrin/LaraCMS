<div>
    <div class="space-y-6">
        <div class="bg-slate-900/50 border border-slate-700 rounded-lg backdrop-blur-sm shadow-sm">
            <div class="p-6">

                <h3 class="text-2xl font-semibold text-slate-100 flex items-center gap-2 mb-2">
                    <svg class="h-5 w-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                    </svg>

                    General Settings
                </h3>

                <p class="text-sm text-slate-400 mb-6">
                    Basic site configuration.
                </p>

                {{-- General Settings Form --}}
                <form wire:submit="saveGeneralSettings">

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                        {{-- Site Information --}}
                        <div class="space-y-4">

                            <h4 class="text-sm font-semibold text-amber-400 uppercase tracking-wider mb-4">
                                Site Information
                            </h4>

                            {{-- Site Title --}}
                            <flux:field>
                                <flux:label>Site Title</flux:label>

                                <flux:description>
                                    The main name of the website.
                                </flux:description>

                                <flux:input
                                    wire:model="site_name"
                                    placeholder="LaraCMS"
                                />

                                <flux:error name="site_name" />
                            </flux:field>

                            {{-- Site Tagline --}}
                            <flux:field>
                                <flux:label>Site Tagline</flux:label>

                                <flux:description>
                                    A short tagline or subtitle for the website.
                                </flux:description>

                                <flux:input
                                    wire:model="site_tagline"
                                    placeholder="All your souls belong to us."
                                />

                                <flux:error name="site_tagline" />
                            </flux:field>

                            {{-- Description --}}
                            <flux:field>
                                <flux:label>Description</flux:label>

                                <flux:description>
                                    A brief description of the website.
                                </flux:description>

                                <flux:textarea
                                    wire:model="description"
                                    placeholder="A brief description of your website."
                                />

                                <flux:error name="description" />
                            </flux:field>

                            {{-- Footer Text --}}
                            <flux:editor
                                wire:model="footer_text"
                                label="Footer Text"
                            />

                        </div>

                    </div>

                    <div class="flex justify-end mt-6">
                        <flux:button
                            type="submit"
                            variant="primary"
                            color="amber"
                            class="cursor-pointer"
                        >
                            Save
                        </flux:button>
                    </div>

                </form>

                {{-- Logo Upload Section --}}
                <div class="mt-8 border-t border-slate-700 pt-6">

                    <h4 class="text-sm font-semibold text-amber-400 uppercase tracking-wider mb-4">
                        Site Logo
                    </h4>

                    <div class="flex flex-col lg:flex-row gap-6">

                        {{-- Logo Preview --}}
                        <div class="flex flex-col items-center gap-3 shrink-0">

                            <div
                                class="relative flex items-center justify-center h-24 w-24 overflow-hidden
                                border border-amber-400/40 hover:border-amber-400/60
                                bg-amber-400/20 hover:bg-amber-400/30 transition-colors
                                dark:border-amber-400/20 dark:hover:border-amber-400/40
                                dark:bg-amber-400/10 dark:hover:bg-amber-400/20"
                            >

                                {{-- Temporary Upload Preview --}}
                                @if ($logoUpload)

                                    <img
                                        src="{{ $logoUpload->temporaryUrl() }}"
                                        alt="Logo Preview"
                                        class="h-full w-full object-cover"
                                    />

                                {{-- Saved Logo --}}
                                @elseif ($logoUrl)

                                    <img
                                        src="{{ $logoUrl }}"
                                        alt="Site Logo"
                                        class="h-full w-full object-cover"
                                    />

                                {{-- Empty State --}}
                                @else

                                    <div class="flex h-full w-full items-center justify-center">
                                        <flux:icon
                                            name="photo"
                                            variant="solid"
                                            class="h-10 w-10 text-zinc-500 dark:text-zinc-400"
                                        />
                                    </div>

                                @endif

                            </div>

                            {{-- Remove Saved Logo --}}
                            @if ($logoUrl)

                                <flux:button
                                    type="button"
                                    wire:click="removeLogo"
                                    variant="danger"
                                    size="sm"
                                    class="cursor-pointer"
                                >
                                    Remove Logo
                                </flux:button>

                            @endif

                        </div>

                        {{-- Upload Form --}}
                        <form
                            wire:submit="saveLogo"
                            class="w-full max-w-lg space-y-5 cursor-pointer"
                        >

                            <flux:file-upload
                                wire:model="logoUpload"
                                label="Upload Logo"
                            >
                                <flux:file-upload.dropzone
                                    heading="Drop logo here or click to browse"
                                    text="PNG, JPG, WEBP up to 10MB"
                                    with-progress
                                />
                            </flux:file-upload>

                            <flux:error name="logoUpload" />

                            {{-- Upload Preview --}}
                            @if ($logoUpload)

                                <div class="mt-3">

                                    <flux:file-item
                                        :heading="$logoUpload->getClientOriginalName()"
                                        :image="$logoUpload->temporaryUrl()"
                                        :size="$logoUpload->getSize()"
                                    >
                                        <x-slot name="actions">
                                            <flux:file-item.remove
                                                wire:click="removeUploadPreview"
                                                aria-label="Remove logo upload"
                                            />
                                        </x-slot>
                                    </flux:file-item>

                                </div>

                            @endif

                            {{-- Save Button --}}
                            @if ($logoUpload)

                                <div class="flex justify-end pt-4">

                                    <flux:button
                                        type="submit"
                                        variant="primary"
                                        color="amber"
                                        class="cursor-pointer px-6 py-2.5"
                                    >
                                        Save Logo
                                    </flux:button>

                                </div>

                            @endif

                        </form>

                    </div>

                </div>

                @persist('toast')
                    <flux:toast />
                @endpersist

            </div>
        </div>
    </div>
</div>