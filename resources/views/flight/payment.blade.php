<html>
    <head>
        <script src="https://credimax.gateway.mastercard.com/static/checkout/checkout.min.js" data-error="errorCallback" data-cancel="cancelCallback"></script>
        <script type="text/javascript">
            function errorCallback(error) {
                  console.log(JSON.stringify(error));
            }
            function cancelCallback() {
                  console.log('Payment cancelled');
            }
            Checkout.configure({
              session: {
            	id: "{{ $sessionDataId }}"
       			}
            });
        </script>
    </head>
    <body>
      <input type="button" value="Pay Now" onclick="Checkout.showPaymentPage();" />
    </body>
</html>
