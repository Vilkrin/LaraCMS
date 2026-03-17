<div class="p-6 max-w-4xl mx-auto bg-white dark:bg-gray-800 shadow rounded-lg">
  <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-100">Upload Images</h1>

    <form wire:submit="save">
        <flux:file-upload wire:model="photos" label="Upload files" multiple>
            <flux:file-upload.dropzone heading="Drop files here or click to browse" text="JPG, PNG, GIF up to 10MB" />
        </flux:file-upload>

        <div class="mt-3 flex flex-col gap-2">
            @foreach ($photos as $index => $photo)
                <flux:file-item
                    :heading="$photo->getClientOriginalName()"
                    :image="$photo->temporaryUrl()"
                    :size="$photo->getSize()"
                >
                    <x-slot name="actions">
                        <flux:file-item.remove wire:click="removePhoto({{ $index }})" aria-label="{{ 'Remove file: ' . $photo->getClientOriginalName() }}" />
                    </x-slot>
                </flux:file-item>
            @endforeach
        </div>

        <flux:button type="submit">Save</flux:button>
    </form>

</div>