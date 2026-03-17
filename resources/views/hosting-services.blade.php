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
      theme: {
        extend: {
          colors: {
            primary: {
              50: '#eff6ff',
              500: '#3b82f6',
              600: '#2563eb',
              900: '#1e3a8a',
            },
            accent: {
              500: '#10b981',
              600: '#059669',
            }
          }
        }
      }
    }
  </script>
</head>
<body class="bg-gradient-to-br from-slate-50 to-blue-50 dark:from-slate-900 dark:to-slate-800 text-slate-900 dark:text-slate-100 min-h-screen">
  <!-- Hero Section -->
  <div class="relative overflow-hidden bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-700">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
      <div class="text-center">
        <h1 class="text-5xl md:text-6xl font-bold text-white mb-6">
          Laravel Hosting & <span class="text-yellow-300">Web Development</span>
        </h1>
        <p class="text-xl md:text-2xl text-blue-100 mb-8 max-w-3xl mx-auto">
          Fully managed Laravel Cloud hosting and professional development support for your next big project.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
          <a href="#pricing" class="bg-white text-blue-600 px-8 py-4 rounded-full font-semibold hover:bg-blue-50 transition-colors shadow-lg">
            View Pricing
          </a>
          <a href="#contact" class="border-2 border-white text-white px-8 py-4 rounded-full font-semibold hover:bg-white hover:text-blue-600 transition-colors">
            Get Started
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

      <!-- Full Hosting Cost Breakdown (Top Section) -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900">Typical Full Hosting Costs</h2>
            <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                Real-world monthly cost estimates based on Laravel Cloud infrastructure (app servers, databases, and storage combined).
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-200">
                <h4 class="text-lg font-semibold text-gray-900 mb-2">Starter Stack</h4>
                <ul class="text-sm text-gray-700 space-y-2">
                    <li>• Small app instance</li>
                    <li>• Serverless Postgres</li>
                    <li>• ~5GB storage</li>
                </ul>
                <div class="mt-4 text-sm text-gray-600">
                    <p>App: ~$5–$10</p>
                    <p>DB: ~$0–$15</p>
                    <p>Storage: ~$1–$5</p>
                </div>
                <p class="mt-4 font-semibold text-gray-900">~$10 – $30/month</p>
            </div>

            <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-200">
                <h4 class="text-lg font-semibold text-gray-900 mb-2">Business Stack</h4>
                <ul class="text-sm text-gray-700 space-y-2">
                    <li>• Dedicated app server</li>
                    <li>• MySQL (1 vCPU / 1–2GB RAM)</li>
                    <li>• 10–20GB storage</li>
                </ul>
                <div class="mt-4 text-sm text-gray-600">
                    <p>App: ~$20–$40</p>
                    <p>DB: ~$20–$40</p>
                    <p>Storage: ~$2–$10</p>
                </div>
                <p class="mt-4 font-semibold text-gray-900">~$40 – $90/month</p>
            </div>

            <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-200">
                <h4 class="text-lg font-semibold text-gray-900 mb-2">Scale Stack</h4>
                <ul class="text-sm text-gray-700 space-y-2">
                    <li>• Multiple app servers</li>
                    <li>• MySQL (2–4+ vCPU / 4GB+ RAM)</li>
                    <li>• 50GB+ storage</li>
                </ul>
                <div class="mt-4 text-sm text-gray-600">
                    <p>App: ~$60–$150</p>
                    <p>DB: ~$80–$200</p>
                    <p>Storage: ~$10–$30</p>
                </div>
                <p class="mt-4 font-semibold text-gray-900">~$150+/month</p>
            </div>

        </div>

    </div>
</section>

<!-- Database Pricing Section -->
<section class="mb-20" id="pricing">
  <div class="text-center mb-16">
    <h2 class="text-4xl font-bold text-slate-900 dark:text-white mb-4">Database Hosting Options</h2>
    <p class="text-xl text-slate-600 dark:text-slate-300 max-w-2xl mx-auto">
      We leverage Laravel Cloud to provide scalable, cost-effective database solutions tailored to your project.
    </p>
  </div>

  <!-- Cards -->
  <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">

    <!-- Serverless Postgres -->
    <div class="bg-white dark:bg-slate-800 rounded-3xl shadow-xl p-8 border border-slate-200 dark:border-slate-700 hover:shadow-2xl transition-shadow">
      <div class="flex items-center mb-6">
        <div class="w-12 h-12 bg-green-100 dark:bg-green-900 rounded-xl flex items-center justify-center mr-4">
          <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path>
          </svg>
        </div>
        <h3 class="text-2xl font-bold text-slate-900 dark:text-white">Serverless Postgres</h3>
      </div>
      <p class="text-slate-600 dark:text-slate-300 mb-6">Ideal for startups, development environments, and apps with variable traffic.</p>

      <div class="mb-6">
        <p class="text-4xl font-bold text-slate-900 dark:text-white">$0.04<span class="text-lg font-medium text-slate-500 dark:text-slate-400">/hour</span></p>
        <p class="text-sm text-slate-500 dark:text-slate-400">Only billed when active</p>
      </div>

      <ul class="space-y-3 text-slate-600 dark:text-slate-300 mb-6">
        <li class="flex items-center"><span class="w-2 h-2 bg-green-500 rounded-full mr-3"></span>Auto-hibernation when idle</li>
        <li class="flex items-center"><span class="w-2 h-2 bg-green-500 rounded-full mr-3"></span>Pay-per-use pricing</li>
        <li class="flex items-center"><span class="w-2 h-2 bg-green-500 rounded-full mr-3"></span>Automatic scaling</li>
        <li class="flex items-center"><span class="w-2 h-2 bg-green-500 rounded-full mr-3"></span>$1.50 per GB storage/month</li>
      </ul>

      <div class="bg-slate-50 dark:bg-slate-700 rounded-xl p-4">
        <p class="text-sm text-slate-500 dark:text-slate-400">Estimated monthly (always active):</p>
        <p class="text-2xl font-bold text-green-600 dark:text-green-400">~$29/month</p>
      </div>
    </div>

    <!-- Managed MySQL -->
    <div class="bg-white dark:bg-slate-800 rounded-3xl shadow-xl p-8 border border-slate-200 dark:border-slate-700 hover:shadow-2xl transition-shadow">
      <div class="flex items-center mb-6">
        <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-xl flex items-center justify-center mr-4">
          <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"></path>
          </svg>
        </div>
        <h3 class="text-2xl font-bold text-slate-900 dark:text-white">Managed MySQL</h3>
      </div>
      <p class="text-slate-600 dark:text-slate-300 mb-6">Best for production applications needing stable performance and dedicated resources.</p>

      <div class="mb-6">
        <p class="text-4xl font-bold text-slate-900 dark:text-white">From ~$15<span class="text-lg font-medium text-slate-500 dark:text-slate-400">/month</span></p>
        <p class="text-sm text-slate-500 dark:text-slate-400">Based on CPU, RAM, and region</p>
      </div>

      <ul class="space-y-3 text-slate-600 dark:text-slate-300 mb-6">
        <li class="flex items-center"><span class="w-2 h-2 bg-blue-500 rounded-full mr-3"></span>Dedicated CPU & RAM</li>
        <li class="flex items-center"><span class="w-2 h-2 bg-blue-500 rounded-full mr-3"></span>Predictable monthly cost</li>
        <li class="flex items-center"><span class="w-2 h-2 bg-blue-500 rounded-full mr-3"></span>No hibernation delays</li>
        <li class="flex items-center"><span class="w-2 h-2 bg-blue-500 rounded-full mr-3"></span>Backup storage billed separately</li>
      </ul>

      <div class="bg-slate-50 dark:bg-slate-700 rounded-xl p-4">
        <p class="text-sm text-slate-500 dark:text-slate-400">Typical example:</p>
        <p class="text-lg font-semibold text-blue-600 dark:text-blue-400">1 vCPU / 1GB RAM + 10GB storage ≈ $15–$25/month</p>
      </div>
    </div>

  </div>

        <!-- Comparison Strip -->
        <div class="mt-16 bg-white rounded-2xl shadow-md p-8 border border-gray-200">
            <h3 class="text-xl font-semibold text-gray-900 mb-6 text-center">Quick Comparison</h3>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 text-center">
                <div>
                    <p class="font-medium text-gray-500">Pricing Model</p>
                    <p class="font-semibold text-gray-900">Usage vs Fixed</p>
                </div>
                <div>
                    <p class="font-medium text-gray-500">Idle Cost</p>
                    <p class="font-semibold text-gray-900">Free vs Always On</p>
                </div>
                <div>
                    <p class="font-medium text-gray-500">Scaling</p>
                    <p class="font-semibold text-gray-900">Auto vs Manual</p>
                </div>
                <div>
                    <p class="font-medium text-gray-500">Best Use</p>
                    <p class="font-semibold text-gray-900">Startup vs Production</p>
                </div>
            </div>
        </div>

        <!-- Detailed Pricing Tables -->
        <div class="mb-16">
            <h3 class="text-3xl font-bold text-slate-900 dark:text-white mb-8 text-center">Detailed Pricing Breakdown</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <!-- Postgres Table -->
                <div class="bg-white dark:bg-slate-800 rounded-3xl shadow-xl p-6 border border-slate-200 dark:border-slate-700">
                    <h4 class="text-xl font-bold text-slate-900 dark:text-white mb-6 flex items-center">
                      <div class="w-8 h-8 bg-green-100 dark:bg-green-900 rounded-lg flex items-center justify-center mr-3">
                        <svg class="w-4 h-4 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2"></path>
                        </svg>
                      </div>
                      Serverless Postgres
                    </h4>
                    <table class="w-full text-sm text-slate-600 dark:text-slate-300">
                        <thead>
                            <tr class="border-b border-slate-200 dark:border-slate-600">
                                <th class="py-3 text-left font-semibold">Resource</th>
                                <th class="py-3 text-left font-semibold">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-slate-100 dark:border-slate-700">
                                <td class="py-3">Compute (active)</td>
                                <td class="py-3 font-medium">$0.04/hour</td>
                            </tr>
                            <tr class="border-b border-slate-100 dark:border-slate-700">
                                <td class="py-3">Storage</td>
                                <td class="py-3 font-medium">$1.50/GB/month</td>
                            </tr>
                            <tr>
                                <td class="py-3">Idle time</td>
                                <td class="py-3 font-medium text-green-600 dark:text-green-400">Free (hibernates)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- MySQL Table -->
                <div class="bg-white dark:bg-slate-800 rounded-3xl shadow-xl p-6 border border-slate-200 dark:border-slate-700">
                    <h4 class="text-xl font-bold text-slate-900 dark:text-white mb-6 flex items-center">
                      <div class="w-8 h-8 bg-blue-100 dark:bg-blue-900 rounded-lg flex items-center justify-center mr-3">
                        <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"></path>
                        </svg>
                      </div>
                      Managed MySQL
                    </h4>
                    <table class="w-full text-sm text-slate-600 dark:text-slate-300">
                        <thead>
                            <tr class="border-b border-slate-200 dark:border-slate-600">
                                <th class="py-3 text-left font-semibold">Resource</th>
                                <th class="py-3 text-left font-semibold">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-slate-100 dark:border-slate-700">
                                <td class="py-3">Compute (CPU/RAM)</td>
                                <td class="py-3 font-medium">From ~$15/month</td>
                            </tr>
                            <tr class="border-b border-slate-100 dark:border-slate-700">
                                <td class="py-3">Scaling tiers</td>
                                <td class="py-3 font-medium">Based on vCPU & RAM selection</td>
                            </tr>
                            <tr class="border-b border-slate-100 dark:border-slate-700">
                                <td class="py-3">Storage</td>
                                <td class="py-3 font-medium">$0.10–$0.12/GB/month</td>
                            </tr>
                            <tr>
                                <td class="py-3">Backups</td>
                                <td class="py-3 font-medium">Same as storage</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <!-- Detailed Service Pricing -->
        <div class="mt-16">
            <h3 class="text-xl font-semibold text-gray-900 mb-6 text-center">Service-Level Pricing Overview</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <!-- App Hosting -->
                <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-200">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4">Application Hosting</h4>
                    <table class="w-full text-sm text-gray-600">
                        <thead>
                            <tr class="border-b">
                                <th class="py-2">Resource</th>
                                <th class="py-2">Pricing</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b">
                                <td class="py-2">Compute</td>
                                <td class="py-2">Based on CPU & RAM tier</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2">Scaling</td>
                                <td class="py-2">Manual / auto scaling options</td>
                            </tr>
                            <tr>
                                <td class="py-2">Bandwidth</td>
                                <td class="py-2">Usage-based</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Storage & Extras -->
                <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-200">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4">Storage & Extras</h4>
                    <table class="w-full text-sm text-gray-600">
                        <thead>
                            <tr class="border-b">
                                <th class="py-2">Resource</th>
                                <th class="py-2">Pricing</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b">
                                <td class="py-2">Object Storage</td>
                                <td class="py-2">Per GB / month</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2">Backups</td>
                                <td class="py-2">Same as storage</td>
                            </tr>
                            <tr>
                                <td class="py-2">Data Transfer</td>
                                <td class="py-2">Usage-based</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <!-- Starter Plan -->
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-3xl shadow-2xl p-8 text-white text-center mb-16">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-white/20 rounded-full mb-6">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
              </svg>
            </div>
            <h4 class="text-3xl font-bold mb-4">Starter Plan</h4>
            <p class="text-blue-100 mb-8 text-lg">Includes Laravel Cloud hosting for 1 app server, serverless Postgres, and 10GB storage.</p>

            <div class="mb-8">
                <p class="text-5xl font-bold mb-2">£49.99<span class="text-xl font-medium">/month</span></p>
                <p class="text-blue-200">Billed monthly, cancel anytime</p>
            </div>

            <ul class="space-y-4 mb-8 text-left max-w-md mx-auto">
                <li class="flex items-center"><span class="w-2 h-2 bg-yellow-300 rounded-full mr-3"></span>Fully managed hosting</li>
                <li class="flex items-center"><span class="w-2 h-2 bg-yellow-300 rounded-full mr-3"></span>Serverless Postgres included</li>
                <li class="flex items-center"><span class="w-2 h-2 bg-yellow-300 rounded-full mr-3"></span>10GB storage</li>
                <li class="flex items-center"><span class="w-2 h-2 bg-yellow-300 rounded-full mr-3"></span>Laravel support & updates</li>
            </ul>

            <!-- PayPal Button -->
            <div id="paypal-button-container-P-736004252M116701SNGFSO3Q" class="max-w-sm mx-auto"></div>
        </div>

        <!-- CTA -->
        <div class="text-center">
            <h4 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">Not sure which option is right?</h4>
            <p class="text-slate-600 dark:text-slate-300 mb-8 text-lg">We'll recommend the best setup based on your traffic, budget, and growth plans.</p>
            <a href="#contact" class="inline-flex items-center bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-full font-semibold hover:from-blue-700 hover:to-purple-700 transition-all shadow-lg hover:shadow-xl">
              <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
              </svg>
              Get Advice
            </a>
        </div>

    </div>
</section>

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