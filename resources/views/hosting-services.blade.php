<!DOCTYPE html>
<html lang="en" class="dark">
<head>
  <meta charset="UTF-8" />
  <title>Laravel Hosting & Web Dev</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
    }
  </script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200">
  <div class="max-w-7xl mx-auto p-6">
    <h1 class="text-4xl font-bold text-center mb-4">Laravel Hosting & Web Development Packages</h1>
    <p class="text-center text-lg mb-10 text-gray-700 dark:text-gray-300">
      Fully managed Laravel Cloud hosting and professional development support.
    </p>

    <div class="grid md:grid-cols-3 gap-6">
      <!-- Starter Plan -->
      <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-6 flex flex-col">
        <h2 class="text-2xl font-semibold mb-2">Starter Site</h2>
        <p class="text-3xl font-bold text-blue-600 dark:text-blue-400 mb-4">£49.99<span class="text-base font-normal">/mo</span></p>
        <ul class="space-y-2 text-sm flex-grow">
          <li>✅ 1–5 pages</li>
          <li>✅ Laravel Forge (Hobby Tier)</li>
          <li>✅ SSL & daily backups</li>
          <li>✅ Admin dashboard</li>
          <li>✅ 1 monthly update</li>
        </ul>
        <p class="text-xs mt-4 text-gray-500 dark:text-gray-400">One-time setup fee: £500–£1,500</p>
            <!-- PayPal Button -->
            <div id="paypal-button-container-P-736004252M116701SNGFSO3Q" class="center"></div>
      </div>

      <!-- Business Plan -->
      <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-6 border-2 border-blue-500 dark:border-blue-400 flex flex-col">
        <h2 class="text-2xl font-semibold mb-2">Business CMS</h2>
        <p class="text-3xl font-bold text-blue-600 dark:text-blue-400 mb-4">£180<span class="text-base font-normal">/mo</span></p>
        <ul class="space-y-2 text-sm flex-grow">
          <li>✅ Up to 15 pages</li>
          <li>✅ Blog & SEO setup</li>
          <li>✅ Laravel CMS (custom or Livewire)</li>
          <li>✅ Queue/email integration</li>
          <li>✅ 2 hrs monthly support</li>
        </ul>
        <p class="text-xs mt-4 text-gray-500 dark:text-gray-400">One-time setup fee: £1,500–£4,000</p>
      </div>

      <!-- App Plan -->
      <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-6 flex flex-col">
        <h2 class="text-2xl font-semibold mb-2">Custom App / SaaS</h2>
        <p class="text-3xl font-bold text-blue-600 dark:text-blue-400 mb-4">£400–£1,000+<span class="text-base font-normal">/mo</span></p>
        <ul class="space-y-2 text-sm flex-grow">
          <li>✅ Custom Laravel application</li>
          <li>✅ Laravel Cloud (Business Tier)</li>
          <li>✅ Queues, billing, CI/CD</li>
          <li>✅ Staging environments</li>
          <li>✅ 4–8 hrs monthly support</li>
        </ul>
        <p class="text-xs mt-4 text-gray-500 dark:text-gray-400">One-time setup fee: £4,000–£15,000+</p>
      </div>
    </div>

    <!-- Add-ons -->
    <div class="mt-12">
      <h3 class="text-2xl font-bold mb-4">Optional Add-ons</h3>
      <div class="grid md:grid-cols-2 gap-4 text-sm bg-white dark:bg-gray-800 p-6 rounded-xl shadow">
        <ul class="space-y-1">
          <li>➕ SEO Management – from £100/mo</li>
          <li>➕ Blog Writing – from £80/post</li>
          <li>➕ Priority Support – £50/mo</li>
        </ul>
        <ul class="space-y-1">
          <li>➕ Extra Dev Time – £50/hr</li>
          <li>➕ Domain Email Setup – £5/mo</li>
        </ul>
      </div>
    </div>

    <!-- Footer Note -->
    <div class="mt-10 text-center text-sm text-gray-500 dark:text-gray-400">
      All sites are hosted on <a href="https://laravel.com/cloud" class="text-blue-600 dark:text-blue-400 underline">Laravel Cloud</a> with full management by our team.
    </div>
  </div>

  <!-- PayPal SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=Ae8rPGDcPCIWmZh9AylFhwfCsH4jl7CPaGFoFrxwcovL7pEuE5JZkgC5maPbVtEGOuRl7HOQFJg_E3Y9&vault=true&intent=subscription" data-sdk-integration-source="button-factory"></script>

    <script>
    paypal.Buttons({
        style: {
            shape: 'rect',
            color: 'gold',
            layout: 'vertical',
            label: 'subscribe'
        },
        createSubscription: function (data, actions) {
            return actions.subscription.create({
                plan_id: 'P-736004252M116701SNGFSO3Q'
            });
        },
        onApprove: function (data, actions) {
            alert('Subscription successful! ID: ' + data.subscriptionID);
        }
    }).render('#paypal-button-container-P-736004252M116701SNGFSO3Q');
    </script>

</body>
</html>