<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hosting Packages</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            margin: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background: #0f172a;
            color: #e5e7eb;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 4rem 1.5rem;
        }

        h1 {
            text-align: center;
            margin-bottom: 3rem;
            font-size: 2.5rem;
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }

        .pricing-card {
            background: #020617;
            border: 1px solid #1e293b;
            border-radius: 12px;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .pricing-card h2 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .price {
            font-size: 2rem;
            font-weight: bold;
            margin: 1rem 0;
            color: #facc15;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 1.5rem 0;
        }

        ul li {
            margin-bottom: 0.5rem;
        }

        .btn {
            display: inline-block;
            text-align: center;
            padding: 0.75rem 1rem;
            background: #2563eb;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
        }

        .btn:hover {
            background: #1d4ed8;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Hosting Packages</h1>

    <div class="pricing-grid">

        <!-- Package 1 -->
        <div class="pricing-card">
            <div>
                <h2>Starter Hosting</h2>
                <p class="price">£19.99 / month</p>

                <ul>
                    <li>✔ 1 Website</li>
                    <li>✔ 10GB SSD Storage</li>
                    <li>✔ Free SSL</li>
                    <li>✔ Email Support</li>
                </ul>
            </div>

            <!-- PayPal Button -->
            <div id="paypal-button-container-P-736004252M116701SNGFSO3Q"></div>
        </div>

        <!-- Package 2 -->
        <div class="pricing-card">
            <div>
                <h2>Business Hosting</h2>
                <p class="price">£49.99 / month</p>

                <ul>
                    <li>✔ 5 Websites</li>
                    <li>✔ 50GB SSD Storage</li>
                    <li>✔ Free SSL</li>
                    <li>✔ Priority Support</li>
                </ul>
            </div>

            <a href="#" class="btn">Coming Soon</a>
        </div>

        <!-- Package 3 -->
        <div class="pricing-card">
            <div>
                <h2>Pro Hosting</h2>
                <p class="price">£99.99 / month</p>

                <ul>
                    <li>✔ Unlimited Websites</li>
                    <li>✔ 200GB SSD Storage</li>
                    <li>✔ Free SSL</li>
                    <li>✔ 24/7 Support</li>
                </ul>
            </div>

            <a href="#" class="btn">Coming Soon</a>
        </div>

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
