<div>
    <div class="space-y-6">
        <div class="bg-slate-900/50 border border-slate-700 rounded-lg backdrop-blur-sm shadow-sm">
            <div class="p-6">

                <h3 class="text-2xl font-semibold text-slate-100 flex items-center gap-2 mb-2">
                    <svg class="h-5 w-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    SEO Settings
                </h3>

                <p class="text-sm text-slate-400 mb-6">
                    Configure search, social sharing, and crawler settings.
                </p>

                <form wire:submit="saveSeoSettings">

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                        {{-- Primary Meta Tags --}}
                        <div class="space-y-4">
                            <h4 class="text-sm font-semibold text-amber-400 uppercase tracking-wider">
                                Primary Meta Tags
                            </h4>

                            <flux:field>
                                <flux:label>Meta Title</flux:label>
                                <flux:description>Default title used when a page does not provide its own title.</flux:description>
                                <flux:input wire:model="meta_title" placeholder="LaraCMS" />
                                <flux:error name="meta_title" />
                            </flux:field>

                            <flux:field>
                                <flux:label>Meta Description</flux:label>
                                <flux:description>Default description used for search engines and previews.</flux:description>
                                <flux:textarea wire:model="meta_description" rows="6" />
                                <flux:error name="meta_description" />
                            </flux:field>

                            <flux:field>
                                <flux:label>Meta Author</flux:label>
                                <flux:input wire:model="meta_author" placeholder="LaraCMS" />
                                <flux:error name="meta_author" />
                            </flux:field>

                            <flux:field>
                                <flux:label>Canonical URL</flux:label>
                                <flux:input wire:model="canonical_url" placeholder="https://laracms.app/" />
                                <flux:error name="canonical_url" />
                            </flux:field>

                            <flux:field>
                                <flux:label>Theme Color</flux:label>
                                <flux:input wire:model="theme_color" placeholder="#0f172a" />
                                <flux:error name="theme_color" />
                            </flux:field>
                        </div>

                        {{-- Open Graph --}}
                        <div class="space-y-4">
                            <h4 class="text-sm font-semibold text-amber-400 uppercase tracking-wider">
                                Open Graph
                            </h4>

                            <flux:field>
                                <flux:label>OG Title</flux:label>
                                <flux:description>Default social sharing title.</flux:description>
                                <flux:input wire:model="og_title" placeholder="LaraCMS" />
                                <flux:error name="og_title" />
                            </flux:field>

                            <flux:field>
                                <flux:label>OG Description</flux:label>
                                <flux:description>Default social sharing description.</flux:description>
                                <flux:textarea wire:model="og_description" rows="6" />
                                <flux:error name="og_description" />
                            </flux:field>

                            <flux:field>
                                <flux:label>OG Type</flux:label>
                                <flux:input wire:model="og_type" placeholder="website" />
                                <flux:error name="og_type" />
                            </flux:field>

                            <flux:field>
                                <flux:label>OG Site Name</flux:label>
                                <flux:input wire:model="og_site_name" placeholder="LaraCMS" />
                                <flux:error name="og_site_name" />
                            </flux:field>

                            <flux:field>
                                <flux:label>OG Locale</flux:label>
                                <flux:input wire:model="og_locale" placeholder="en_GB" />
                                <flux:error name="og_locale" />
                            </flux:field>
                        </div>

                    </div>

                    {{-- Twitter / X --}}
                    <div class="mt-8 border-t border-slate-700 pt-6">
                        <h4 class="text-sm font-semibold text-amber-400 uppercase tracking-wider mb-4">
                            Twitter / X
                        </h4>

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <flux:select wire:model="twitter_card">

                                    <option value="summary_large_image">
                                        Large Image Card
                                    </option>

                                    <option value="summary">
                                        Summary Card
                                    </option>

                                </flux:select>

                                <flux:field>
                                    <flux:label>Twitter Title</flux:label>
                                    <flux:input wire:model="twitter_title" placeholder="Imperial Arms" />
                                    <flux:error name="twitter_title" />
                                </flux:field>

                                <flux:field>
                                    <flux:label>Twitter Site</flux:label>
                                    <flux:input wire:model="twitter_site" placeholder="@yourhandle" />
                                    <flux:error name="twitter_site" />
                                </flux:field>
                            </div>

                            <div class="space-y-4">
                                <flux:field>
                                    <flux:label>Twitter Description</flux:label>
                                    <flux:textarea wire:model="twitter_description" rows="6" />
                                    <flux:error name="twitter_description" />
                                </flux:field>

                                <flux:field>
                                    <flux:label>Twitter Creator</flux:label>
                                    <flux:input wire:model="twitter_creator" placeholder="@yourhandle" />
                                    <flux:error name="twitter_creator" />
                                </flux:field>
                            </div>
                        </div>
                    </div>

                    {{-- Crawlers --}}
                    <div class="mt-8 border-t border-slate-700 pt-6">
                        <h4 class="text-sm font-semibold text-amber-400 uppercase tracking-wider mb-4">
                            Search & AI Crawlers
                        </h4>

                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                            <flux:field>
                                <flux:label>Allow Search Indexing</flux:label>
                                <flux:description>Allows normal search engines to index the site.</flux:description>
                                <flux:switch wire:model.live="allow_search_indexing" />
                            </flux:field>

                            <flux:field>
                                <flux:label>Allow AI Search</flux:label>
                                <flux:description>Allows AI search tools to read and reference the site.</flux:description>
                                <flux:switch wire:model.live="allow_ai_search" />
                            </flux:field>

                            <flux:field>
                                <flux:label>Allow AI Training</flux:label>
                                <flux:description>Allows AI crawlers to use the site for training datasets.</flux:description>
                                <flux:switch wire:model.live="allow_ai_training" />
                            </flux:field>
                        </div>
                    </div>

                    <div class="mt-8 border-t border-slate-700 pt-6">
                        <h4 class="text-sm font-semibold text-amber-400 uppercase tracking-wider mb-4">
                            SEO Images
                        </h4>

                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                            {{-- Social Preview Image --}}
                            <div class="space-y-4">
                                <div>
                                    <h5 class="text-sm font-medium text-slate-200">
                                        Social Preview Image
                                    </h5>

                                    <p class="text-xs text-slate-400 mt-1">
                                        Recommended size: 1200 × 630 PNG or JPG.
                                        Used by Facebook, Discord, Twitter/X and Open Graph previews.
                                    </p>
                                </div>
                                <div class="flex items-center justify-center h-40 overflow-hidden rounded-lg border border-amber-400/20 bg-amber-400/10">
                                    @if ($socialPreviewUpload)
                                        <img
                                            src="{{ $socialPreviewUpload->temporaryUrl() }}"
                                            alt="Social Preview"
                                            class="h-full w-full object-cover"
                                        />
                                    @elseif ($settings->getFirstMediaUrl('social_preview'))
                                        <img
                                            src="{{ $settings->getFirstMediaUrl('social_preview') }}"
                                            alt="Social Preview"
                                            class="h-full w-full object-cover"
                                        />
                                    @else
                                        <flux:icon name="photo" variant="solid" class="h-10 w-10 text-zinc-500 dark:text-zinc-400" />
                                    @endif
                                </div>

                                @if ($settings->getFirstMediaUrl('social_preview'))
                                    <button
                                        type="button"
                                        wire:click="removeSocialPreview"
                                        class="cursor-pointer inline-flex items-center justify-center rounded-md border border-red-500/40 px-3 py-1.5 text-sm text-red-300 hover:bg-red-500/10 hover:border-red-500/60 transition-colors"
                                    >
                                        Remove Image
                                    </button>
                                @endif

                                <flux:file-upload wire:model="socialPreviewUpload" label="Social Preview Image">
                                    <flux:file-upload.dropzone
                                        heading="Upload social preview"
                                        text="Recommended 1200 × 630"
                                        with-progress
                                    />
                                </flux:file-upload>

                                @if ($socialPreviewUpload)
                                    <flux:file-item
                                        :heading="$socialPreviewUpload->getClientOriginalName()"
                                        :image="$socialPreviewUpload->temporaryUrl()"
                                        :size="$socialPreviewUpload->getSize()"
                                    >
                                        <x-slot name="actions">
                                            <flux:file-item.remove
                                                wire:click="removeSocialPreviewUpload"
                                                aria-label="Remove social preview upload"
                                            />
                                        </x-slot>
                                    </flux:file-item>
                                @endif
                            </div>

                            {{-- Favicon --}}
                            <div class="space-y-4">
                                <div>
                                    <h5 class="text-sm font-medium text-slate-200">
                                        Favicon
                                    </h5>

                                    <p class="text-xs text-slate-400 mt-1">
                                        Recommended size: 512 × 512 PNG.
                                        Used for browser tabs, bookmarks and shortcuts.
                                    </p>
                                </div>
                                <div class="flex items-center justify-center h-40 overflow-hidden rounded-lg border border-amber-400/20 bg-amber-400/10">
                                    @if ($faviconUpload)
                                        <img
                                            src="{{ $faviconUpload->temporaryUrl() }}"
                                            alt="Favicon Preview"
                                            class="h-20 w-20 object-contain"
                                        />
                                    @elseif ($settings->getFirstMediaUrl('favicon'))
                                        <img
                                            src="{{ $settings->getFirstMediaUrl('favicon') }}"
                                            alt="Favicon"
                                            class="h-20 w-20 object-contain"
                                        />
                                    @else
                                        <flux:icon name="photo" variant="solid" class="h-10 w-10 text-zinc-500 dark:text-zinc-400" />
                                    @endif
                                </div>

                                @if ($settings->getFirstMediaUrl('favicon'))
                                    <button
                                        type="button"
                                        wire:click="removeFavicon"
                                        class="cursor-pointer inline-flex items-center justify-center rounded-md border border-red-500/40 px-3 py-1.5 text-sm text-red-300 hover:bg-red-500/10 hover:border-red-500/60 transition-colors"
                                    >
                                        Remove Favicon
                                    </button>
                                @endif

                                <flux:file-upload wire:model="faviconUpload" label="Favicon">
                                    <flux:file-upload.dropzone
                                        heading="Upload favicon"
                                        text="ICO, PNG, JPG, WEBP"
                                        with-progress
                                    />
                                </flux:file-upload>

                                @if ($faviconUpload)
                                    <flux:file-item
                                        :heading="$faviconUpload->getClientOriginalName()"
                                        :image="$faviconUpload->temporaryUrl()"
                                        :size="$faviconUpload->getSize()"
                                    >
                                        <x-slot name="actions">
                                            <flux:file-item.remove
                                                wire:click="removeFaviconUpload"
                                                aria-label="Remove favicon upload"
                                            />
                                        </x-slot>
                                    </flux:file-item>
                                @endif
                            </div>

                            {{-- Apple Touch Icon --}}
                            <div class="space-y-4">
                                <div>
                                    <h5 class="text-sm font-medium text-slate-200">
                                        Apple Touch Icon
                                    </h5>

                                    <p class="text-xs text-slate-400 mt-1">
                                        Recommended size: 180 × 180 PNG.
                                        Used when users save the site to an iPhone or iPad home screen.
                                    </p>
                                </div>
                                <div class="flex items-center justify-center h-40 overflow-hidden rounded-lg border border-amber-400/20 bg-amber-400/10">
                                    @if ($appleTouchIconUpload)
                                        <img
                                            src="{{ $appleTouchIconUpload->temporaryUrl() }}"
                                            alt="Apple Touch Icon Preview"
                                            class="h-24 w-24 object-contain"
                                        />
                                    @elseif ($settings->getFirstMediaUrl('apple_touch_icon'))
                                        <img
                                            src="{{ $settings->getFirstMediaUrl('apple_touch_icon') }}"
                                            alt="Apple Touch Icon"
                                            class="h-24 w-24 object-contain"
                                        />
                                    @else
                                        <flux:icon name="photo" variant="solid" class="h-10 w-10 text-zinc-500 dark:text-zinc-400" />
                                    @endif
                                </div>

                                @if ($settings->getFirstMediaUrl('apple_touch_icon'))
                                    <button
                                        type="button"
                                        wire:click="removeAppleTouchIcon"
                                        class="cursor-pointer inline-flex items-center justify-center rounded-md border border-red-500/40 px-3 py-1.5 text-sm text-red-300 hover:bg-red-500/10 hover:border-red-500/60 transition-colors"
                                    >
                                        Remove Apple Icon
                                    </button>
                                @endif

                                <flux:file-upload wire:model="appleTouchIconUpload" label="Apple Touch Icon">
                                    <flux:file-upload.dropzone
                                        heading="Upload Apple icon"
                                        text="Recommended 180 × 180"
                                        with-progress
                                    />
                                </flux:file-upload>

                                @if ($appleTouchIconUpload)
                                    <flux:file-item
                                        :heading="$appleTouchIconUpload->getClientOriginalName()"
                                        :image="$appleTouchIconUpload->temporaryUrl()"
                                        :size="$appleTouchIconUpload->getSize()"
                                    >
                                        <x-slot name="actions">
                                            <flux:file-item.remove
                                                wire:click="removeAppleTouchIconUpload"
                                                aria-label="Remove Apple touch icon upload"
                                            />
                                        </x-slot>
                                    </flux:file-item>
                                @endif
                            </div>

                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        <flux:button
                            type="submit"
                            variant="primary"
                            color="amber"
                            class="cursor-pointer"
                        >
                            Save SEO Settings
                        </flux:button>
                    </div>

                </form>

            </div>
        </div>
    </div>
    @persist('toast')
      <flux:toast />
    @endpersist
</div>