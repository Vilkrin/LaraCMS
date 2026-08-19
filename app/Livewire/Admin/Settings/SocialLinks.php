<?php

namespace App\Livewire\Admin\Settings;

use Livewire\Component;
use App\Models\SocialLink;
use Flux\Flux;

class SocialLinks extends Component
{
    public ?SocialLink $editingSocialLink = null;

    public string $name = '';
    public string $icon = '';
    public string $url = '';
    public int $sort_order = 0;
    public bool $is_active = true;

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'icon' => ['nullable', 'string', 'max:255'],
            'url' => ['required', 'string', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['boolean'],
        ];
    }

    public function openCreateModal(): void
    {
        $this->resetForm();

        Flux::modal('social-link-form')->show();
    }

    public function edit(SocialLink $socialLink): void
    {
        $this->editingSocialLink = $socialLink;

        $this->name = $socialLink->name;
        $this->icon = $socialLink->icon ?? '';
        $this->url = str_replace('https://', '', $socialLink->url);
        $this->sort_order = $socialLink->sort_order;
        $this->is_active = $socialLink->is_active;

        Flux::modal('social-link-form')->show();
    }

    public function save(): void
    {
        $this->validate();

        $url = str_starts_with($this->url, 'http://') || str_starts_with($this->url, 'https://')
            ? $this->url
            : 'https://' . $this->url;

        SocialLink::updateOrCreate(
            ['id' => $this->editingSocialLink?->id],
            [
                'name' => $this->name,
                'icon' => $this->icon,
                'url' => $url,
                'sort_order' => $this->sort_order,
                'is_active' => $this->is_active,
            ]
        );

        $this->resetForm();

        Flux::modal('social-link-form')->close();

        Flux::toast(
            variant: 'success',
            text: 'Social link saved.'
        );
    }

    public function toggleActive(SocialLink $socialLink): void
    {
        $socialLink->update([
            'is_active' => ! $socialLink->is_active,
        ]);

        Flux::toast(
            variant: 'success',
            text: 'Social link status updated.'
        );
    }

    public function delete(SocialLink $socialLink): void
    {
        $socialLink->delete();

        Flux::toast(
            variant: 'success',
            text: 'Social link deleted.'
        );
    }

    public function resetForm(): void
    {
        $this->reset([
            'editingSocialLink',
            'name',
            'icon',
            'url',
            'sort_order',
            'is_active',
        ]);

        $this->is_active = true;

        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.admin.settings.social-links', [
            'socialLinks' => SocialLink::orderBy('sort_order')->get(),
        ]);
    }
}
