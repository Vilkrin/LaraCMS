<div>
    <flux:tab.group>
        <flux:tabs wire:model="tab">
            <flux:tab name="general" class="cursor-pointer">General</flux:tab>
            <flux:tab name="seo" class="cursor-pointer">SEO</flux:tab>
            <flux:tab name="social" class="cursor-pointer">Social Links</flux:tab>
        </flux:tabs>

        <flux:tab.panel name="general">
            <livewire:admin.settings.general />
        </flux:tab.panel>
        <flux:tab.panel name="seo">
            <livewire:admin.settings.seo />
        </flux:tab.panel>
        <flux:tab.panel name="social">
            <livewire:admin.settings.social-links />
        </flux:tab.panel>

    </flux:tab.group>
</div>