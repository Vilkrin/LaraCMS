<x-layout>
    <div class="pt-24 flex justify-center">
        <img class="h-auto max-w-3xl rounded-lg shadow-xl dark:shadow-gray-800" 
             src="{{ $photo->getFirstMediaUrl('images') }}" 
             alt="Image">
    </div>
</x-layout>
