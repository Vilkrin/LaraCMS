<!-- resources/views/livewire/admin/sidebar.blade.php -->
<aside class="w-64 bg-gray-800 text-white flex flex-col h-screen" x-data="{ open: true, sections: {} }">
    <div class="p-4 flex justify-between">
        <h1 class="text-xl font-bold">Admin Panel</h1>
        <button @click="open = !open" class="lg:hidden text-gray-400 focus:outline-hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M4 5h12M4 10h12m-7 5h7" clip-rule="evenodd" />
            </svg>
        </button>
    </div>
    <nav class="px-4" x-show="open" x-data="{ openSection: null }">
        <ul>
            <!-- User Management Section -->
            <li class="mb-2">
                <button @click="openSection = openSection === 'userManagement' ? null : 'userManagement'" 
                        class="flex justify-between items-center w-full py-2 px-4 rounded-md hover:bg-gray-700">
                    <span>User Management</span>
                    <svg :class="{ 'rotate-180': openSection === 'userManagement' }" class="w-5 h-5 transform transition-transform" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414L9 4.586a1 1 0 011.414 0l3.707 3.707a1 1 0 01-1.414 1.414L10 7.414l-2.293 2.293a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </button>
                <ul x-show="openSection === 'userManagement'" class="pl-4">
                    <li><a href="{{ route('admin.users.index') }}" class="block py-2 px-4 rounded-md hover:bg-gray-600">All Users</a></li>
                    <li><a href="{{ route('admin.roles.index') }}" class="block py-2 px-4 rounded-md hover:bg-gray-600">Roles & Permissions</a></li>
                </ul>
            </li>

            <!-- Pages Section -->
            <li class="mb-2">
                <button @click="openSection = openSection === 'pages' ? null : 'pages'" 
                        class="flex justify-between items-center w-full py-2 px-4 rounded-md hover:bg-gray-700">
                    <span>Pages</span>
                    <svg :class="{ 'rotate-180': openSection === 'pages' }" class="w-5 h-5 transform transition-transform" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414L9 4.586a1 1 0 011.414 0l3.707 3.707a1 1 0 01-1.414 1.414L10 7.414l-2.293 2.293a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </button>
                <ul x-show="openSection === 'pages'" class="pl-4">
                    <li><a href="{{ route('admin.pages.index') }}" class="block py-2 px-4 rounded-md hover:bg-gray-600">All Pages</a></li>
                    <li><a href="{{ route('admin.pages.create') }}" class="block py-2 px-4 rounded-md hover:bg-gray-600">Add New Page</a></li>
                </ul>
            </li>

            <!-- Blog Section -->
            <li class="mb-2">
                <button @click="openSection = openSection === 'blog' ? null : 'blog'" 
                        class="flex justify-between items-center w-full py-2 px-4 rounded-md hover:bg-gray-700">
                    <span>Blog</span>
                    <svg :class="{ 'rotate-180': openSection === 'blog' }" class="w-5 h-5 transform transition-transform" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414L9 4.586a1 1 0 011.414 0l3.707 3.707a1 1 0 01-1.414 1.414L10 7.414l-2.293 2.293a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </button>
                <ul x-show="openSection === 'blog'" class="pl-4">
                    <li><a href="{{ route('admin.blog.posts') }}" class="block py-2 px-4 rounded-md hover:bg-gray-600">All Posts</a></li>
                    <li><a href="{{ route('admin.blog.create') }}" class="block py-2 px-4 rounded-md hover:bg-gray-600">Add New Post</a></li>
                    <li><a href="{{ route('admin.blog.categories') }}" class="block py-2 px-4 rounded-md hover:bg-gray-600">Categories</a></li>
                </ul>
            </li>

            <!-- Gallery Section -->
            <li class="mb-2">
                <button @click="openSection = openSection === 'gallery' ? null : 'gallery'" 
                        class="flex justify-between items-center w-full py-2 px-4 rounded-md hover:bg-gray-700">
                    <span>Gallery</span>
                    <svg :class="{ 'rotate-180': openSection === 'gallery' }" class="w-5 h-5 transform transition-transform" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414L9 4.586a1 1 0 011.414 0l3.707 3.707a1 1 0 01-1.414 1.414L10 7.414l-2.293 2.293a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </button>
                <ul x-show="openSection === 'gallery'" class="pl-4">
                    <li><a href="{{ route('admin.gallery.index') }}" class="block py-2 px-4 rounded-md hover:bg-gray-600">View Gallery</a></li>
                    <li><a href="{{ route('admin.gallery.upload') }}" class="block py-2 px-4 rounded-md hover:bg-gray-600">Upload Image</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <footer class="p-4 mt-auto">
        <p class="text-sm text-gray-400">© 2024 Admin Dashboard</p>
    </footer>
</aside>
