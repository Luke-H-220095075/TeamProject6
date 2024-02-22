<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <link rel="stylesheet" href="checkout.css">
</head>
<body>
    <section class="header-container">
    <h1>Checkout</h1>
    </section>
    <div class="checkout-container">
        <div class="contact-shipping">
            <section class="contact-info">
                <h2>Your Details</h2>
                <div class="input-container">
                    <input type="name" placeholder="First name">
                    <input type="name" placeholder="Last name">
                </div>
                <input type="text" placeholder="Address Line">
                <div class="input-container">
                    <input type="name" placeholder="Post Code" maxlength="7">
                    <input type="name" placeholder="City">
                    <select id="country" name="country">
                        <option value="uk">United Kingdom</option>
                        <option value="uk">United States</option>
                        <option value="uk">France</option>
                        <option value="uk">Spain</option>
                        <option value="uk">Ireland</option>
                        <option value="uk">Russia</option>
                      </select>

                </div>

                <div class="input-container">
                    <input type="name" placeholder="Email address">
                    <input type="name" id="mobile" name="mobile" placeholder="Your mobile number">
                </div>
            </section>
        
            <section class="payment-info">
                <h2>Payment</h2>
            
                <input type="text" id="CardNumber" placeholder="Card Number" maxlength="19">
                <div class="input-container">
                    <input type="text" id="CVV" placeholder="CVV" name="CVV">
                    <input type="text" id="expDate" name="expDate" placeholder="MM/YY" maxlength="5" />

                </div>
                <button type="button">Confirm order</button>
              
                
            </section>
        </div>
        <div class="order-summary">
            <h2>Order summary</h2>
        
            <div class="totals">
                <p>Subtotal:</p>
                <p>Delivery:</p>
                <p>Total To Pay:</p>
            </div>
        
        </div>
    </div>

    <script>
        //expiration date
        document.getElementById('expDate').addEventListener('input', function(e) {
          var input = e.target.value;
          var cleaned = input.replace(/\D/g, '');
        
          if (cleaned.length > 2) {
            cleaned = cleaned.substring(0, 2) + '/' + cleaned.substring(2, 4);
          }
         
          e.target.value = cleaned;
        });

        //CVV
          document.getElementById('CVV').addEventListener('input', function (e) {
          var currentValue = e.target.value;
          var cleanedValue = currentValue.replace(/\D/g, '');
          
          if (cleanedValue.length > 3) {
            cleanedValue = cleanedValue.substring(0, 3);
          }
          e.target.value = cleanedValue;
        });

        //Card Number
        document.getElementById('CardNumber').addEventListener('input', function (e) {
    var target = e.target;
    var position = target.selectionStart;
    var length = target.value.length;
    var value = target.value.replace(/\D/g, '');
    value = value.substring(0, 16);
    var formattedValue = value.replace(/(\d{4})(?=\d)/g, '$1 ');
    target.value = formattedValue;

   
    var newPosition = position + (formattedValue.length - length);


    target.setSelectionRange(newPosition, newPosition);
  });

   


        </script>
</body>
</html>