<x-layout>    
    <!-- Header -->
    <header class="bg-gray-800 pt-24 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4 bg-gradient-to-r from-[#9146FF] to-[#FF4500] bg-clip-text text-transparent">Photo Gallery</h1>
                <p class="text-xl text-gray-300">Latest Albums and Collections</p>
            </div>
        </div>
    </header>

    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Album 1 -->
            <a href="#" class="bg-[rgba(17,17,17,0.7)] backdrop-blur-md border border-white/10 rounded-2xl overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl group">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4" alt="Album Cover" class="w-full h-64 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                <div class="p-6">
                    <h2 class="text-xl font-bold mb-2 text-[#60A5FA] group-hover:text-[#9146FF] transition-colors">Stream Highlights 2024</h2>
                    <p class="text-gray-400 mb-4">Best moments from our latest gaming sessions</p>
                    <div class="flex items-center justify-between text-sm text-gray-500">
                        <span>24 Photos</span>
                        <span>March 15, 2024</span>
                    </div>
                </div>
            </a>

            <!-- Album 2 -->
            <a href="#" class="bg-[rgba(17,17,17,0.7)] backdrop-blur-md border border-white/10 rounded-2xl overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl group">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1511512578047-dfb367046420" alt="Album Cover" class="w-full h-64 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                <div class="p-6">
                    <h2 class="text-xl font-bold mb-2 text-[#60A5FA] group-hover:text-[#9146FF] transition-colors">Community Events</h2>
                    <p class="text-gray-400 mb-4">Photos from our recent meetups and events</p>
                    <div class="flex items-center justify-between text-sm text-gray-500">
                        <span>36 Photos</span>
                        <span>March 10, 2024</span>
                    </div>
                </div>
            </a>

            <!-- Album 3 -->
            <a href="#" class="bg-[rgba(17,17,17,0.7)] backdrop-blur-md border border-white/10 rounded-2xl overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl group">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e" alt="Album Cover" class="w-full h-64 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                <div class="p-6">
                    <h2 class="text-xl font-bold mb-2 text-[#60A5FA] group-hover:text-[#9146FF] transition-colors">Behind the Scenes</h2>
                    <p class="text-gray-400 mb-4">A look at our streaming setup and equipment</p>
                    <div class="flex items-center justify-between text-sm text-gray-500">
                        <span>18 Photos</span>
                        <span>March 5, 2024</span>
                    </div>
                </div>
            </a>

            <!-- Album 4 -->
            <a href="#" class="bg-[rgba(17,17,17,0.7)] backdrop-blur-md border border-white/10 rounded-2xl overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl group">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1511882150382-421056c89033" alt="Album Cover" class="w-full h-64 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                <div class="p-6">
                    <h2 class="text-xl font-bold mb-2 text-[#60A5FA] group-hover:text-[#9146FF] transition-colors">Fan Art Collection</h2>
                    <p class="text-gray-400 mb-4">Amazing artwork from our talented community</p>
                    <div class="flex items-center justify-between text-sm text-gray-500">
                        <span>42 Photos</span>
                        <span>March 1, 2024</span>
                    </div>
                </div>
            </a>
        </div>
    </div>
</x-layout>