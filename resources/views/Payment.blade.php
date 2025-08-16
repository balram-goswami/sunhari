<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stripe Payment</title>
    <script src="https://js.stripe.com/v3/"></script>
</head>

<body>
    <h1>Stripe Payment Integration</h1>
    <form id="payment-form">
        <div id="card-element"></div>
        <button id="submit">Pay</button>
    </form>

    <script>
        const stripe = Stripe('{{ env('STRIPE_PUBLIC') }}');
        const elements = stripe.elements();
        const cardElement = elements.create('card');
        cardElement.mount('#card-element');

        const form = document.getElementById('payment-form');
        form.addEventListener('submit', async (event) => {
            event.preventDefault();

            const {
                paymentIntent,
                error
            } = await stripe.confirmCardPayment(
                '{{ csrf_token() }}', {
                    payment_method: {
                        card: cardElement,
                    },
                }
            );

            if (error) {
                console.error(error);
                alert('Payment failed');
            } else {
                alert('Payment successful!');
            }
        });
    </script>
</body>

</html>
