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
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Heading -->
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900">Database Hosting Options</h2>
            <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                We leverage Laravel Cloud to provide scalable, cost-effective database solutions tailored to your project.
            </p>
        </div>

        <!-- Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <!-- Serverless Postgres -->
            <div class="bg-white rounded-2xl shadow-md p-8 border border-gray-200">
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Serverless Postgres</h3>
                <p class="text-gray-600 mb-6">Ideal for startups, development environments, and apps with variable traffic.</p>

                <div class="mb-6">
                    <p class="text-4xl font-bold text-gray-900">$0.04<span class="text-lg font-medium">/hour</span></p>
                    <p class="text-sm text-gray-500">Only billed when active</p>
                </div>

                <ul class="space-y-3 text-gray-700">
                    <li>✔ Auto-hibernation when idle</li>
                    <li>✔ Pay-per-use pricing</li>
                    <li>✔ Automatic scaling</li>
                    <li>✔ $1.50 per GB storage/month</li>
                </ul>

                <div class="mt-8">
                    <p class="text-sm text-gray-500">Estimated monthly (always active):</p>
                    <p class="text-lg font-semibold text-gray-900">~$29/month</p>
                </div>
            </div>

            <!-- Managed MySQL -->
            <div class="bg-white rounded-2xl shadow-md p-8 border border-gray-200">
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Managed MySQL</h3>
                <p class="text-gray-600 mb-6">Best for production applications needing stable performance and dedicated resources.</p>

                <div class="mb-6">
                    <p class="text-4xl font-bold text-gray-900">From ~$15<span class="text-lg font-medium">/month</span></p>
                    <p class="text-sm text-gray-500">Based on CPU, RAM, and region</p>
                </div>

                <ul class="space-y-3 text-gray-700">
                    <li>✔ Dedicated CPU & RAM</li>
                    <li>✔ Predictable monthly cost</li>
                    <li>✔ No hibernation delays</li>
                    <li>✔ Backup storage billed separately</li>
                </ul>

                <div class="mt-8">
                    <p class="text-sm text-gray-500">Typical example:</p>
                    <p class="text-lg font-semibold text-gray-900">1 vCPU / 1GB RAM + 10GB storage ≈ $15–$25/month</p>
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
        <div class="mt-16">
            <h3 class="text-xl font-semibold text-gray-900 mb-6 text-center">Detailed Pricing Breakdown</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <!-- Postgres Table -->
                <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-200">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4">Serverless Postgres</h4>
                    <table class="w-full text-left text-sm text-gray-600">
                        <thead>
                            <tr class="border-b">
                                <th class="py-2">Resource</th>
                                <th class="py-2">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b">
                                <td class="py-2">Compute (active)</td>
                                <td class="py-2">$0.04/hour</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2">Storage</td>
                                <td class="py-2">$1.50/GB/month</td>
                            </tr>
                            <tr>
                                <td class="py-2">Idle time</td>
                                <td class="py-2">Free (hibernates)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- MySQL Table -->
                <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-200">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4">Managed MySQL</h4>
                    <table class="w-full text-left text-sm text-gray-600">
                        <thead>
                            <tr class="border-b">
                                <th class="py-2">Resource</th>
                                <th class="py-2">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b">
                                <td class="py-2">Compute (CPU/RAM)</td>
                                <td class="py-2">From ~$15/month</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2">Scaling tiers</td>
                                <td class="py-2">Based on vCPU & RAM selection</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2">Storage</td>
                                <td class="py-2">$0.10–$0.12/GB/month</td>
                            </tr>
                            <tr>
                                <td class="py-2">Backups</td>
                                <td class="py-2">Same as storage</td>
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

        <div class="mt-16">
            <div class="bg-white rounded-2xl shadow-md p-8 border border-gray-200 text-center">
                <h4 class="text-2xl font-semibold text-gray-900 mb-4">Starter Plan</h4>
                <p class="text-gray-600 mb-6">Includes Laravel Cloud hosting for 1 app server, serverless Postgres, and 10GB storage.</p>

                <div class="mb-6">
                    <p class="text-4xl font-bold text-gray-900">£49.99<span class="text-lg font-medium">/month</span></p>
                    <p class="text-sm text-gray-500">Billed monthly, cancel anytime</p>
                </div>

                <ul class="space-y-3 text-gray-700 mb-8">
                    <li>✔ Fully managed hosting</li>
                    <li>✔ Serverless Postgres included</li>
                    <li>✔ 10GB storage</li>
                    <li>✔ Laravel support & updates</li>
                </ul>

                <!-- PayPal Button -->
                <div id="paypal-button-container-P-736004252M116701SNGFSO3Q" class="center"></div>
            </div>
        </div>

        <!-- CTA -->
        <div class="mt-12 text-center">
            <h4 class="text-xl font-semibold text-gray-900 mb-2">Not sure which option is right?</h4>
            <p class="text-gray-600 mb-6">We’ll recommend the best setup based on your traffic, budget, and growth plans.</p>
            <a href="#contact" class="inline-block bg-gray-900 text-white px-6 py-3 rounded-xl shadow hover:bg-gray-800 transition">
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