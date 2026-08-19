<?php

namespace App\Livewire\Admin\Settings;

use Livewire\Component;
use App\Models\SeoSetting;
use Livewire\WithFileUploads;
use App\Services\SeoFileGenerator;
use Illuminate\Support\Facades\Cache;
use Flux\Flux;

class Seo extends Component
{
    use WithFileUploads;

    public $socialPreviewUpload = null;
    public $faviconUpload = null;
    public $appleTouchIconUpload = null;

    public SeoSetting $settings;

    public ?string $meta_title = null;
    public ?string $meta_description = null;
    public ?string $meta_author = null;
    public ?string $canonical_url = null;

    public bool $allow_search_indexing = true;
    public bool $allow_ai_search = true;
    public bool $allow_ai_training = false;

    public ?string $og_title = null;
    public ?string $og_description = null;
    public string $og_type = 'website';
    public ?string $og_url = null;
    public ?string $og_site_name = null;
    public string $og_locale = 'en_GB';

    public string $twitter_card = 'summary_large_image';
    public ?string $twitter_title = null;
    public ?string $twitter_description = null;
    public ?string $twitter_site = null;
    public ?string $twitter_creator = null;

    public string $theme_color = '#0f172a';

    public function mount(): void
    {
        $this->settings = SeoSetting::firstOrCreate([]);

        $this->meta_title = $this->settings->meta_title;
        $this->meta_description = $this->settings->meta_description;
        $this->meta_author = $this->settings->meta_author;
        $this->canonical_url = $this->settings->canonical_url;

        $this->allow_search_indexing = (bool) $this->settings->allow_search_indexing;
        $this->allow_ai_search = (bool) $this->settings->allow_ai_search;
        $this->allow_ai_training = (bool) $this->settings->allow_ai_training;

        $this->og_title = $this->settings->og_title ?? '';
        $this->og_description = $this->settings->og_description ?? '';
        $this->og_type = $this->settings->og_type ?? 'website';
        $this->og_site_name = $this->settings->og_site_name ?? '';
        $this->og_locale = $this->settings->og_locale ?? 'en_GB';

        $this->twitter_card = $this->settings->twitter_card ?? 'summary_large_image';
        $this->twitter_title = $this->settings->twitter_title ?? '';
        $this->twitter_description = $this->settings->twitter_description ?? '';
        $this->twitter_site = $this->settings->twitter_site ?? '';
        $this->twitter_creator = $this->settings->twitter_creator ?? '';

        $this->theme_color = $this->settings->theme_color ?? '#0f172a';
    }

    public function removeSocialPreview(): void
    {
        $this->settings->clearMediaCollection('social_preview');

        Flux::toast(variant: 'success', text: 'Social preview image removed.');
    }

    public function removeFavicon(): void
    {
        $this->settings->clearMediaCollection('favicon');

        Flux::toast(variant: 'success', text: 'Favicon removed.');
    }

    public function removeAppleTouchIcon(): void
    {
        $this->settings->clearMediaCollection('apple_touch_icon');

        Flux::toast(variant: 'success', text: 'Apple touch icon removed.');
    }

    public function removeSocialPreviewUpload(): void
    {
        $this->socialPreviewUpload = null;
    }

    public function removeFaviconUpload(): void
    {
        $this->faviconUpload = null;
    }

    public function removeAppleTouchIconUpload(): void
    {
        $this->appleTouchIconUpload = null;
    }

    public function saveSeoSettings(SeoFileGenerator $seoFileGenerator): void
    {
        $data = $this->validate([
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_author' => 'nullable|string|max:255',
            'canonical_url' => 'nullable|string|max:255',

            'allow_search_indexing' => 'boolean',
            'allow_ai_search' => 'boolean',
            'allow_ai_training' => 'boolean',

            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string',
            'og_type' => 'required|string|max:50',
            'og_site_name' => 'nullable|string|max:255',
            'og_locale' => 'required|string|max:20',

            'twitter_card' => 'required|string|max:100',
            'twitter_title' => 'nullable|string|max:255',
            'twitter_description' => 'nullable|string',
            'twitter_site' => 'nullable|string|max:255',
            'twitter_creator' => 'nullable|string|max:255',

            'socialPreviewUpload' => 'nullable|image|max:10240',
            'faviconUpload' => 'nullable|file|mimes:ico|extensions:ico|max:256',
            'appleTouchIconUpload' => 'nullable|image|max:2048',

            'theme_color' => 'nullable|string|max:20',
        ]);

        $this->settings->update($data);

        if ($this->socialPreviewUpload) {
            $this->settings
                ->addMedia($this->socialPreviewUpload->getRealPath())
                ->usingFileName($this->socialPreviewUpload->getClientOriginalName())
                ->toMediaCollection('social_preview');
        }

        if ($this->faviconUpload) {
            $this->settings
                ->addMedia($this->faviconUpload->getRealPath())
                ->usingFileName($this->faviconUpload->getClientOriginalName())
                ->toMediaCollection('favicon');
        }

        if ($this->appleTouchIconUpload) {
            $this->settings
                ->addMedia($this->appleTouchIconUpload->getRealPath())
                ->usingFileName($this->appleTouchIconUpload->getClientOriginalName())
                ->toMediaCollection('apple_touch_icon');
        }

        $this->reset([
            'socialPreviewUpload',
            'faviconUpload',
            'appleTouchIconUpload',
        ]);

        Cache::forget('seo_settings');

        $seoFileGenerator->generate($this->settings);

        Flux::toast(variant: 'success', text: 'SEO settings saved.');
    }

    public function render()
    {
        return view('livewire.admin.settings.seo');
    }
}
