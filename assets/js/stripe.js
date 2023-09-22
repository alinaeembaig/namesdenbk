 $(function() {

    if($('.stripePubKey').val()){
        var form = document.getElementById('payWrapper');
        var stripe = Stripe($('.stripePubKey').val());
        var elements = stripe.elements();
        var card = elements.create('card');
        card.mount('#card-element');
    }
    
    $(".creditly-card-form .button_pay").click(function(e) {
        e.preventDefault();

        if(!$('input[name="cardType"]:checked').val()){
            bootstrap_alert.error('Please select a payment method to proceed','#paymentValidations');
            popnotificaton('Please select a payment method to proceed',"danger");
            return false;
        }

        if($('input[name="cardType"]:checked').val() === 'Stripe')
        {
            if($('.stripePubKey').val())
            {
                createToken();
            }
            else
            {
                bootstrap_alert.error('Sorry this payment method is not available right now. ! Please contact support','#paymentValidations');
                popnotificaton('Sorry this payment method is not available right now. ! Please contact support',"danger");
                return false;
            }
            
        }
        else
        {
            $('.submit').click();
        }
    });

    function stripeTokenHandler(token) {
        var form = document.getElementById('payWrapper');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);
        form.submit();
    }

    function createToken() {
        stripe.createToken(card).then(function(result) {
            if (result.error) {
                var errorElement = document.getElementById('card-errors');
                bootstrap_alert.error(result.error.message,'#paymentValidations');
                popnotificaton(result.error.message,"danger");
                errorElement.textContent = result.error.message;
                return false;
            } else {
                stripeTokenHandler(result.token);
            }
        });
    };

});