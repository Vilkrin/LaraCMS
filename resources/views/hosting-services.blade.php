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
  <main class="flex min-h-screen items-center justify-center p-6">
    <div class="w-full max-w-2xl">
      <section class="mx-auto rounded-3xl border border-slate-200 bg-white/90 p-8 shadow-lg backdrop-blur transition duration-300 hover:-translate-y-1 hover:shadow-xl dark:border-slate-700 dark:bg-slate-900/75">
        <h1 class="text-center text-3xl font-bold text-slate-900 dark:text-slate-100 sm:text-4xl">Laravel Hosting & Web Dev</h1>
        <p class="mt-2 text-center text-sm text-slate-500 dark:text-slate-400">Flexible plan with managed infrastructure, daily backups, and Laravel support.</p>

        <div class="mt-8 rounded-2xl border border-slate-200 bg-white p-6 text-center shadow-sm dark:border-slate-700 dark:bg-slate-800">
          <h2 class="text-2xl font-semibold text-slate-900 dark:text-slate-100">Starter Plan</h2>
          <div class="mt-4">
            <p class="text-5xl font-extrabold text-slate-900 dark:text-slate-100">£49.99 <span class="text-xl font-medium text-slate-500">/ month</span></p>
            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Billed monthly. Cancel anytime.</p>
          </div>

          <ul class="mt-6 space-y-3 text-left text-slate-700 dark:text-slate-200">
            <li class="flex items-start gap-2"><span class="text-emerald-500">✔</span> Fully managed hosting</li>
            <li class="flex items-start gap-2"><span class="text-emerald-500">✔</span> MySQL 8.4 – £7.00/mo + £0.12/GB-mo of backups</li>
            <li class="flex items-start gap-2"><span class="text-emerald-500">✔</span> Object storage £0.02/GB/mo + request fees</li>
            <li class="flex items-start gap-2"><span class="text-emerald-500">✔</span> Laravel support and updates</li>
          </ul>

          <div id="paypal-button-container-P-736004252M116701SNGFSO3Q" class="mt-6 flex justify-center"></div>
        </div>
      </section>
    </div>
  </main>

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
