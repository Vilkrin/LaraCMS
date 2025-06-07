<x-adminlayout>

          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
            <!-- Blog Post Stats Card -->
            <div class="p-4 bg-white rounded-lg shadow dark:bg-gray-800">
              <div class="flex items-center">
                <div class="inline-flex flex-shrink-0 justify-center items-center w-12 h-12 text-white bg-gradient-to-br from-purple-600 to-blue-500 rounded-lg shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-500/30">
                  <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"></path>
                    <path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                  </svg>
                </div>
                <div class="flex-1 min-w-0 ms-4">
                  <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                    Total Posts
                  </p>
                  <p class="text-2xl font-semibold text-gray-900 dark:text-white">
                    24
                  </p>
                </div>
              </div>
            </div>

            <!-- Published Posts Card -->
            <div class="p-4 bg-white rounded-lg shadow dark:bg-gray-800">
              <div class="flex items-center">
                <div class="inline-flex flex-shrink-0 justify-center items-center w-12 h-12 text-white bg-gradient-to-br from-green-400 to-cyan-500 rounded-lg shadow-lg shadow-cyan-500/50 dark:shadow-lg dark:shadow-cyan-500/30">
                  <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                  </svg>
                </div>
                <div class="flex-1 min-w-0 ms-4">
                  <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                    Published
                  </p>
                  <p class="text-2xl font-semibold text-gray-900 dark:text-white">
                    18
                  </p>
                </div>
              </div>
            </div>

            <!-- Draft Posts Card -->
            <div class="p-4 bg-white rounded-lg shadow dark:bg-gray-800">
              <div class="flex items-center">
                <div class="inline-flex flex-shrink-0 justify-center items-center w-12 h-12 text-white bg-gradient-to-br from-yellow-400 to-orange-500 rounded-lg shadow-lg shadow-orange-500/50 dark:shadow-lg dark:shadow-orange-500/30">
                  <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                  </svg>
                </div>
                <div class="flex-1 min-w-0 ms-4">
                  <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                    Drafts
                  </p>
                  <p class="text-2xl font-semibold text-gray-900 dark:text-white">
                    6
                  </p>
                </div>
              </div>
            </div>

            <!-- Views Card -->
            <div class="p-4 bg-white rounded-lg shadow dark:bg-gray-800">
              <div class="flex items-center">
                <div class="inline-flex flex-shrink-0 justify-center items-center w-12 h-12 text-white bg-gradient-to-br from-pink-500 to-red-500 rounded-lg shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-500/30">
                  <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                  </svg>
                </div>
                <div class="flex-1 min-w-0 ms-4">
                  <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                    Total Views
                  </p>
                  <p class="text-2xl font-semibold text-gray-900 dark:text-white">
                    12.5K
                  </p>
                </div>
              </div>
            </div>
          </div>

          <!-- Recent Blog Posts Table -->
          <div class="p-4 bg-white rounded-lg shadow dark:bg-gray-800 mb-4">
            <div class="flex items-center justify-between mb-4">
              <h2 class="text-xl font-bold text-gray-900 dark:text-white">Recent Blog Posts</h2>
              <button class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800">
                New Post
              </button>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
              <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                    <th scope="col" class="px-6 py-3">Title</th>
                    <th scope="col" class="px-6 py-3">Author</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3">Date</th>
                    <th scope="col" class="px-6 py-3">Views</th>
                    <th scope="col" class="px-6 py-3">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      Getting Started with Web Development
                    </th>
                    <td class="px-6 py-4">John Doe</td>
                    <td class="px-6 py-4">
                      <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Published</span>
                    </td>
                    <td class="px-6 py-4">2024-03-15</td>
                    <td class="px-6 py-4">1.2K</td>
                    <td class="px-6 py-4">
                      <button class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-3">Edit</button>
                      <button class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                    </td>
                  </tr>
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      Advanced CSS Techniques
                    </th>
                    <td class="px-6 py-4">Jane Smith</td>
                    <td class="px-6 py-4">
                      <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">Draft</span>
                    </td>
                    <td class="px-6 py-4">2024-03-14</td>
                    <td class="px-6 py-4">0</td>
                    <td class="px-6 py-4">
                      <button class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-3">Edit</button>
                      <button class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                    </td>
                  </tr>
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      JavaScript Best Practices
                    </th>
                    <td class="px-6 py-4">Mike Johnson</td>
                    <td class="px-6 py-4">
                      <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Published</span>
                    </td>
                    <td class="px-6 py-4">2024-03-13</td>
                    <td class="px-6 py-4">856</td>
                    <td class="px-6 py-4">
                      <button class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-3">Edit</button>
                      <button class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <!-- Blog Post Analytics -->
          <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="p-4 bg-white rounded-lg shadow dark:bg-gray-800">
              <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Popular Posts</h3>
              <div class="space-y-4">
                <div class="flex items-center">
                  <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                      Getting Started with Web Development
                    </p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                      1.2K views
                    </p>
                  </div>
                  <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                    <svg class="w-4 h-4 text-yellow-300 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    4.8
                  </div>
                </div>
                <div class="flex items-center">
                  <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                      JavaScript Best Practices
                    </p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                      856 views
                    </p>
                  </div>
                  <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                    <svg class="w-4 h-4 text-yellow-300 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    4.5
                  </div>
                </div>
              </div>
            </div>

            <div class="p-4 bg-white rounded-lg shadow dark:bg-gray-800">
              <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Recent Comments</h3>
              <div class="space-y-4">
                <div class="flex items-start">
                  <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-1.jpg" alt="User avatar">
                  <div class="ml-3">
                    <p class="text-sm font-medium text-gray-900 dark:text-white">Sarah Wilson</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Great article! Very helpful for beginners.</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">2 hours ago</p>
                  </div>
                </div>
                <div class="flex items-start">
                  <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="User avatar">
                  <div class="ml-3">
                    <p class="text-sm font-medium text-gray-900 dark:text-white">Michael Brown</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Thanks for sharing these tips!</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">5 hours ago</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

</x-adminlayout>
