<x-layout>

    <!-- Hero Section -->
    <div class="relative min-h-screen flex items-center justify-center">
        <div class="absolute inset-0 bg-gradient-to-b from-purple-900/50 to-gray-900"></div>
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1511512578047-dfb367046420?ixlib=rb-4.0.3')] bg-cover bg-center opacity-20"></div>
        <div class="relative z-10 text-center px-4">
            <h1 class="text-5xl md:text-7xl font-bold mb-6">Welcome to My Stream</h1>
            <p class="text-xl md:text-2xl text-gray-300 mb-8">Gaming | Community | Entertainment</p>
            <p class="text-xl md:text-2xl text-gray-300 mb-8">This website is currently Under Development, so there wont't be other areas of the site for awhile and i'll be trickling out as i add them.</p>
            <div class="flex justify-center space-x-4">
                <a href="#" class="bg-purple-600 hover:bg-purple-700 text-white px-8 py-3 rounded-lg text-lg font-semibold transition duration-300">
                    <i class="fab fa-twitch mr-2"></i>Follow on Twitch
                </a>
                <a href="#" class="bg-gray-700 hover:bg-gray-600 text-white px-8 py-3 rounded-lg text-lg font-semibold transition duration-300">
                    <i class="fab fa-discord mr-2"></i>Join Discord
                </a>
            </div>
        </div>
    </div>

    <!-- Viewer Benefits -->
    <section class="py-20 relative overflow-hidden">
        <!-- Background elements -->
        <div class="absolute inset-0 z-0">
            <div class="absolute top-0 left-0 w-full h-full bg-gray-900 opacity-90"></div>
            <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1542751371-adc38448a05e?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80')] bg-cover bg-center opacity-10"></div>
        </div>
        
        <!-- Purple glow effects -->
        <div class="absolute -top-20 -left-20 w-60 h-60 bg-purple-700 opacity-20 rounded-full blur-3xl z-0"></div>
        <div class="absolute -bottom-20 -right-20 w-60 h-60 bg-indigo-400 opacity-10 rounded-full blur-3xl z-0"></div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Card 1: Store -->
                <div class="bg-gray-800 p-6 flex flex-col items-center text-center rounded-lg shadow-lg">
                    <div class="bg-purple-700/20 p-4 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-8 w-8 text-indigo-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Merch Store</h3>
                    <p class="text-gray-400 text-sm mb-6">
                        Check out our latest merchandise. From t-shirts to gaming accessories, find something that matches your style.
                    </p>
                    <a href="/store" class="mt-auto">
                        <button class="px-6 py-3 bg-purple-700 hover:bg-purple-800 text-white rounded-lg transition-all duration-300 flex items-center justify-center gap-2 shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg>
                            Visit Store
                        </button>
                    </a>
                </div>
                
                <!-- Card 2: Subscriber Area -->
                <div class="bg-gray-800 p-6 flex flex-col items-center text-center rounded-lg shadow-lg">
                    <div class="bg-purple-700/20 p-4 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-8 w-8 text-purple-700">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Subscriber Area</h3>
                    <p class="text-gray-400 text-sm mb-6">
                        Exclusive content for subscribers. Get access to behind-the-scenes footage, early video releases, and more.
                    </p>
                    <a href="/subscribers" class="mt-auto">
                        <button class="px-6 py-3 bg-purple-700 hover:bg-purple-800 text-white rounded-lg transition-all duration-300 flex items-center justify-center gap-2 shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Explore Benefits
                        </button>
                    </a>
                </div>
                
                <!-- Card 3: Community Forum -->
                <div class="bg-gray-800 p-6 flex flex-col items-center text-center rounded-lg shadow-lg">
                    <div class="bg-purple-700/20 p-4 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-8 w-8 text-pink-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Community Forum</h3>
                    <p class="text-gray-400 text-sm mb-6">
                        Join discussions with fellow fans. Share your gaming moments, strategies, and connect with the community.
                    </p>
                    <a href="/forum" class="mt-auto">
                        <button class="px-6 py-3 bg-purple-700 hover:bg-purple-800 text-white rounded-lg transition-all duration-300 flex items-center justify-center gap-2 shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                            </svg>
                            Join Forum
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Stream Highlights Section -->
    <section class="py-20 bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-10">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold mb-2">
                        Stream <span class="text-purple-500">Highlights</span>
                    </h2>
                    <p class="text-gray-400">Check out some of our best moments</p>
                </div>
                <div class="flex flex-wrap gap-2 mt-4 md:mt-0">
                    <button class="text-sm px-4 py-2 border border-purple-500 bg-transparent hover:bg-purple-500 hover:text-white transition-colors rounded">All</button>
                    <button class="text-sm px-4 py-2 border border-purple-500 bg-transparent hover:bg-purple-500 hover:text-white transition-colors rounded">Fortnite</button>
                    <button class="text-sm px-4 py-2 border border-purple-500 bg-transparent hover:bg-purple-500 hover:text-white transition-colors rounded">Call of Duty</button>
                    <button class="text-sm px-4 py-2 border border-purple-500 bg-transparent hover:bg-purple-500 hover:text-white transition-colors rounded">Minecraft</button>
                    <button class="text-sm px-4 py-2 border border-purple-500 bg-transparent hover:bg-purple-500 hover:text-white transition-colors rounded">League of Legends</button>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Highlight Card 1 -->
                <div class="bg-gray-700 rounded-xl overflow-hidden transition-all hover:-translate-y-1">
                    <div class="relative overflow-hidden aspect-video">
                        <img 
                            src="https://placehold.co/600x400/9146FF/FFFFFF/png?text=Highlight+1" 
                            alt="Highlight thumbnail" 
                            class="w-full h-full object-cover transition-transform hover:scale-105"
                            loading="lazy"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex items-end p-3">
                            <div class="flex justify-between items-center w-full">
                                <div class="bg-black/60 text-white text-xs px-2 py-1 rounded flex items-center">
                                    <i class="fas fa-clock mr-1"></i>
                                    10m
                                </div>
                                <div class="bg-black/60 text-white text-xs px-2 py-1 rounded flex items-center">
                                    <i class="fas fa-eye mr-1"></i>
                                    5K
                                </div>
                            </div>
                        </div>
                        <button class="absolute inset-0 m-auto bg-white/10 hover:bg-white/20 w-12 h-12 rounded-full opacity-80 hover:opacity-100 transition-all flex items-center justify-center">
                            <i class="fas fa-play text-white"></i>
                        </button>
                        <div class="absolute top-3 left-3 bg-purple-500 text-white text-xs px-2 py-1 rounded-full flex items-center">
                            <i class="fas fa-star mr-1"></i>
                            Featured
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-lg line-clamp-1">Epic Victory Royale!</h3>
                        <div class="flex justify-between mt-1">
                            <span class="text-sm text-gray-400">Fortnite</span>
                            <span class="text-xs text-gray-400">2 days ago</span>
                        </div>
                    </div>
                </div>

                <!-- Highlight Card 2 -->
                <div class="bg-gray-700 rounded-xl overflow-hidden transition-all hover:-translate-y-1">
                    <div class="relative overflow-hidden aspect-video">
                        <img 
                            src="https://placehold.co/600x400/9146FF/FFFFFF/png?text=Highlight+2" 
                            alt="Highlight thumbnail" 
                            class="w-full h-full object-cover transition-transform hover:scale-105"
                            loading="lazy"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex items-end p-3">
                            <div class="flex justify-between items-center w-full">
                                <div class="bg-black/60 text-white text-xs px-2 py-1 rounded flex items-center">
                                    <i class="fas fa-clock mr-1"></i>
                                    15m
                                </div>
                                <div class="bg-black/60 text-white text-xs px-2 py-1 rounded flex items-center">
                                    <i class="fas fa-eye mr-1"></i>
                                    3.2K
                                </div>
                            </div>
                        </div>
                        <button class="absolute inset-0 m-auto bg-white/10 hover:bg-white/20 w-12 h-12 rounded-full opacity-80 hover:opacity-100 transition-all flex items-center justify-center">
                            <i class="fas fa-play text-white"></i>
                        </button>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-lg line-clamp-1">1v5 Clutch in Ranked</h3>
                        <div class="flex justify-between mt-1">
                            <span class="text-sm text-gray-400">Call of Duty</span>
                            <span class="text-xs text-gray-400">1 week ago</span>
                        </div>
                    </div>
                </div>

                <!-- Highlight Card 3 -->
                <div class="bg-gray-700 rounded-xl overflow-hidden transition-all hover:-translate-y-1">
                    <div class="relative overflow-hidden aspect-video">
                        <img 
                            src="https://placehold.co/600x400/9146FF/FFFFFF/png?text=Highlight+3" 
                            alt="Highlight thumbnail" 
                            class="w-full h-full object-cover transition-transform hover:scale-105"
                            loading="lazy"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex items-end p-3">
                            <div class="flex justify-between items-center w-full">
                                <div class="bg-black/60 text-white text-xs px-2 py-1 rounded flex items-center">
                                    <i class="fas fa-clock mr-1"></i>
                                    8m
                                </div>
                                <div class="bg-black/60 text-white text-xs px-2 py-1 rounded flex items-center">
                                    <i class="fas fa-eye mr-1"></i>
                                    4.5K
                                </div>
                            </div>
                        </div>
                        <button class="absolute inset-0 m-auto bg-white/10 hover:bg-white/20 w-12 h-12 rounded-full opacity-80 hover:opacity-100 transition-all flex items-center justify-center">
                            <i class="fas fa-play text-white"></i>
                        </button>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-lg line-clamp-1">Minecraft Build Showcase</h3>
                        <div class="flex justify-between mt-1">
                            <span class="text-sm text-gray-400">Minecraft</span>
                            <span class="text-xs text-gray-400">3 days ago</span>
                        </div>
                    </div>
                </div>

                <!-- Highlight Card 4 -->
                <div class="bg-gray-700 rounded-xl overflow-hidden transition-all hover:-translate-y-1">
                    <div class="relative overflow-hidden aspect-video">
                        <img 
                            src="https://placehold.co/600x400/9146FF/FFFFFF/png?text=Highlight+4" 
                            alt="Highlight thumbnail" 
                            class="w-full h-full object-cover transition-transform hover:scale-105"
                            loading="lazy"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex items-end p-3">
                            <div class="flex justify-between items-center w-full">
                                <div class="bg-black/60 text-white text-xs px-2 py-1 rounded flex items-center">
                                    <i class="fas fa-clock mr-1"></i>
                                    12m
                                </div>
                                <div class="bg-black/60 text-white text-xs px-2 py-1 rounded flex items-center">
                                    <i class="fas fa-eye mr-1"></i>
                                    6.8K
                                </div>
                            </div>
                        </div>
                        <button class="absolute inset-0 m-auto bg-white/10 hover:bg-white/20 w-12 h-12 rounded-full opacity-80 hover:opacity-100 transition-all flex items-center justify-center">
                            <i class="fas fa-play text-white"></i>
                        </button>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-lg line-clamp-1">Pentakill in Ranked</h3>
                        <div class="flex justify-between mt-1">
                            <span class="text-sm text-gray-400">League of Legends</span>
                            <span class="text-xs text-gray-400">5 days ago</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="flex justify-center mt-10">
                <button class="border border-purple-500 text-purple-500 hover:bg-purple-500 hover:text-white px-6 py-3 rounded-lg transition-colors">
                    View More Highlights
                </button>
            </div>
        </div>
    </section>

</x-layout>