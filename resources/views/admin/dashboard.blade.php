<x-adminlayout>

      <!-- Dashboard Content -->
      <main class="flex-1 p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <!-- Card 1 -->
          <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-lg font-semibold mb-4">Total Users</h2>
            <p class="text-3xl font-bold">1,230</p>
          </div>
          <!-- Card 2 -->
          <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-lg font-semibold mb-4">Active Sessions</h2>
            <p class="text-3xl font-bold">254</p>
          </div>
          <!-- Card 3 -->
          <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-lg font-semibold mb-4">Total Sales</h2>
            <p class="text-3xl font-bold">$24,500</p>
          </div>
        </div>
        
        <!-- Charts or Table -->
        <div class="mt-6 bg-white shadow-lg rounded-lg p-6">
          <h2 class="text-lg font-semibold mb-4">Recent Activity</h2>
          <table class="min-w-full table-auto">
            <thead>
              <tr>
                <th class="px-4 py-2 border">User</th>
                <th class="px-4 py-2 border">Action</th>
                <th class="px-4 py-2 border">Date</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="px-4 py-2 border">John Doe</td>
                <td class="px-4 py-2 border">Created a new post</td>
                <td class="px-4 py-2 border">Oct 16, 2024</td>
              </tr>
              <tr>
                <td class="px-4 py-2 border">Jane Smith</td>
                <td class="px-4 py-2 border">Updated profile</td>
                <td class="px-4 py-2 border">Oct 15, 2024</td>
              </tr>
              <tr>
                <td class="px-4 py-2 border">Alan Brown</td>
                <td class="px-4 py-2 border">Deleted a comment</td>
                <td class="px-4 py-2 border">Oct 14, 2024</td>
              </tr>
            </tbody>
          </table>
        </div>
      </main>

    
</x-adminlayout>