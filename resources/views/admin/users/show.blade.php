<x-adminlayout>
  <section class="max-w-4xl mx-auto p-6 shadow-lg rounded-lg">
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl max-w-4xl w-full p-8">
        <div class="flex flex-col md:flex-row">
            <div class="md:w-1/3 text-center mb-8 md:mb-0">
                @if ($user->hasMedia('avatar'))
                    <img src="{{ $user->getFirstMediaUrl('avatar', 'thumb') }}" alt="Profile Picture" class="rounded-full w-48 h-48 mx-auto mb-4 border-4 border-indigo-800 dark:border-blue-900 transition-transform duration-300 hover:scale-105">
                @else
                    <span class="inline-flex w-48 h-48 rounded-full ring-2 ring-gray-300 dark:ring-gray-500 bg-gray-100 dark:bg-gray-700 items-center justify-center align-middle mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-32 h-32 text-gray-400 dark:text-gray-500"
                            style="display: block;"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </span>
                @endif
                <h1 class="text-2xl font-bold text-indigo-800 dark:text-white mb-2">{{ $user->name }}</h1>
                <p class="text-gray-600 dark:text-gray-300 px-4 py-2">Software Developer</p>
                <flux:button :href="route('admin.users.edit', $user->id)">Edit</flux:button>
            </div>
            <div class="md:w-2/3 md:pl-8">
                <h2 class="text-xl font-semibold text-indigo-800 dark:text-white mb-4">About Me</h2>
                <p class="text-gray-700 dark:text-gray-300 mb-6">
                    Passionate software developer with 5 years of experience in web technologies. 
                    I love creating user-friendly applications and solving complex problems.
                </p>

                <div class="mb-4">
                    <strong>Account Created:</strong> {{ $user->created_at->format('d M Y, H:i') }}
                </div>

                <h2 class="text-xl font-semibold text-indigo-800 dark:text-white mb-4">Roles</h2>
                <div class="flex flex-wrap gap-2 mb-6">
                    <span class="bg-indigo-100 text-indigo-800 px-3 py-1 rounded-full text-sm">JavaScript</span>
                    <span class="bg-indigo-100 text-indigo-800 px-3 py-1 rounded-full text-sm">React</span>
                    <span class="bg-indigo-100 text-indigo-800 px-3 py-1 rounded-full text-sm">Node.js</span>
                    <span class="bg-indigo-100 text-indigo-800 px-3 py-1 rounded-full text-sm">Python</span>
                    <span class="bg-indigo-100 text-indigo-800 px-3 py-1 rounded-full text-sm">SQL</span>
                </div>
                <h2 class="text-xl font-semibold text-indigo-800 dark:text-white mb-4">Contact Information</h2>
                <ul class="space-y-2 text-gray-700 dark:text-gray-300">
                    <li class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-800 dark:text-blue-900" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                        {{ $user->email }}
                    </li>
                    <li class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-800 dark:text-blue-900" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                        </svg>
                        +1 (555) 123-4567
                    </li>
                    <li class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-800 dark:text-blue-900" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                        </svg>
                        San Francisco, CA
                    </li>
                </ul>
            </div>
        </div>
    </div>
  </section>

      <div class="bg-white dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-800 shadow-sm p-6">
        <!-- Header -->
        <div class="flex items-start justify-between mb-6">
          <div class="flex items-center gap-4">
            <div class="relative">
              <img class="w-16 h-16 rounded-full object-cover bg-gray-200 dark:bg-gray-700" src="https://via.placeholder.com/64x64" alt="User avatar">
              <div class="absolute -bottom-0.5 -right-0.5 w-5 h-5 bg-green-400 border-2 border-white dark:border-gray-900 rounded-full"></div>
            </div>
            
            <div>
              <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Sarah Johnson</h3>
              <p class="text-sm text-gray-500 dark:text-gray-400">sarah.johnson@example.com</p>
              
              <div class="flex items-center gap-2 mt-2">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400">
                  Administrator
                </span>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">
                  Active
                </span>
              </div>
            </div>
          </div>
          
          <!-- Dropdown Menu -->
          <div class="relative">
            <button class="p-2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition-colors" aria-label="More options">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01"></path>
              </svg>
            </button>
          </div>
        </div>
      
        <!-- User Info Grid -->
        <div class="grid grid-cols-2 gap-4 mb-6">
          <div>
            <span class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Department</span>
            <p class="mt-1 text-sm font-medium text-gray-900 dark:text-white">Engineering</p>
          </div>
          
          <div>
            <span class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Location</span>
            <p class="mt-1 text-sm font-medium text-gray-900 dark:text-white">San Francisco</p>
          </div>
          
          <div>
            <span class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Joined</span>
            <p class="mt-1 text-sm font-medium text-gray-900 dark:text-white">Jan 15, 2023</p>
          </div>
          
          <div>
            <span class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Last Active</span>
            <p class="mt-1 text-sm font-medium text-gray-900 dark:text-white">2 hours ago</p>
          </div>
        </div>
      
        <!-- Stats -->
        <div class="grid grid-cols-3 gap-4 mb-6 p-4 bg-gray-50 dark:bg-gray-800 rounded-lg">
          <div class="text-center">
            <p class="text-lg font-semibold text-gray-900 dark:text-white">24</p>
            <p class="text-xs text-gray-500 dark:text-gray-400">Posts Created</p>
          </div>
          
          <div class="text-center">
            <p class="text-lg font-semibold text-gray-900 dark:text-white">156</p>
            <p class="text-xs text-gray-500 dark:text-gray-400">Comments</p>
          </div>
          
          <div class="text-center">
            <p class="text-lg font-semibold text-gray-900 dark:text-white">4.8</p>
            <p class="text-xs text-gray-500 dark:text-gray-400">Rating</p>
          </div>
        </div>
      
        <!-- Permissions -->
        <div class="mb-6">
          <h4 class="text-sm font-medium text-gray-900 dark:text-white mb-3">Permissions</h4>
          <div class="flex flex-wrap gap-2">
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
              <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
              </svg>
              Manage Users
            </span>
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
              <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
              </svg>
              Edit Content
            </span>
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
              <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
              </svg>
              System Settings
            </span>
          </div>
        </div>
      
        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-3">
          <button class="flex-1 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
            </svg>
            Edit Profile
          </button>
          
          <button class="flex-1 px-4 py-2 bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg font-medium transition-colors focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
            </svg>
            Send Message
          </button>
          
          <button class="px-4 py-2 border border-red-300 hover:bg-red-50 dark:border-red-700 dark:hover:bg-red-900/20 text-red-600 dark:text-red-400 rounded-lg font-medium transition-colors focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728L5.636 5.636m12.728 12.728L18.364 5.636M5.636 18.364l12.728-12.728"></path>
            </svg>
            Suspend
          </button>
        </div>
      </div>
   
 </x-adminlayout>