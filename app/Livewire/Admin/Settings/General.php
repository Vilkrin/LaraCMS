<?php

namespace App\Livewire\Admin\Settings;

use Livewire\Component;
use App\Models\GeneralSetting;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;
use Flux\Flux;

class General extends Component
{
    use WithFileUploads;

    #[Validate('nullable|image|max:10240')]
    public $logoUpload = null;

    public GeneralSetting $settings;

    public ?string $logoUrl = null;

    public ?string $site_name = null;
    public ?string $site_tagline = null;
    public ?string $footer_text = null;
    public ?string $description = null;

    public function mount(): void
    {
        $this->settings = view()->shared('generalSettings')
            ?? GeneralSetting::firstOrCreate([]);

        $this->site_name = $this->settings->site_name;
        $this->site_tagline = $this->settings->site_tagline;
        $this->footer_text = $this->settings->footer_text;
        $this->description = $this->settings->description;

        $this->logoUrl = $this->settings->logo_path
            ? Storage::disk('public')->url($this->settings->logo_path)
            : null;
    }

    public function removeLogo(): void
    {
        if ($this->settings->logo_path) {
            Storage::disk('public')->delete($this->settings->logo_path);

            $this->settings->update([
                'logo_path' => null,
            ]);
        }

        $this->logoUrl = null;

        Flux::toast(
            variant: 'success',
            text: 'Logo removed.'
        );
    }

    public function removeUploadPreview(): void
    {
        $this->logoUpload = null;
    }

    public function saveGeneralSettings(): void
    {
        $this->settings->update([
            'site_name' => $this->site_name,
            'site_tagline' => $this->site_tagline,
            'footer_text' => $this->footer_text,
            'description' => $this->description,
        ]);

        Flux::toast(
            variant: 'success',
            text: 'General settings saved.'
        );
    }

    public function saveLogo(): void
    {
        $this->validateOnly('logoUpload');

        if (! $this->logoUpload) {
            return;
        }

        // Delete the existing logo.
        if ($this->settings->logo_path) {
            Storage::disk('public')->delete($this->settings->logo_path);
        }

        // Store the new logo.
        $path = $this->logoUpload->storeAs(
            'settings/logo',
            'site-logo.' . $this->logoUpload->getClientOriginalExtension(),
            'public'
        );

        // Save the path to the database.
        $this->settings->update([
            'logo_path' => $path,
        ]);

        // Update the preview URL.
        $this->logoUrl = Storage::disk('public')->url($path);

        // Clear the temporary upload.
        $this->logoUpload = null;

        Flux::toast(
            variant: 'success',
            text: 'Logo saved.'
        );
    }

    public function render()
    {
        return view('livewire.admin.settings.general');
    }
}
