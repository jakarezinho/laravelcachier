<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         pagamento
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex flex-wrap mx-auto mt-12 max-w-7xl "> 
    
            <form id="payment-form" action="{{ route('payments.store') }}" method="POST">
                @csrf
                <input type="hidden" name="plan" id="plan" value="{{ request('plan') }}">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" id="card-holder-name" class="form-control" value="" placeholder="Name on the card">
                </div>
                <div class="form-group">
                    <label for="">Card details</label>
                    <div id="card-element"></div>
                    <div id="card-errors" role="alert"></div>
                    <div id="name-errors" role="alert"></div>
                </div>

               
                <button type="submit" class="btn btn-primary w-100" id="card-button" data-secret="{{ $intent->client_secret }}">Pay</button>
            </form>
            
            </div>
           
                <!--<x-jet-welcome />-->
            </div>
        </div>
    </div>
    @push('scripts')
    <script src="https://js.stripe.com/v3/"></script>

    <script>
var style = {
    base: {
      color: "#32325d",
      fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
      fontSmoothing: "antialiased",
      fontSize: "16px",
      "::placeholder": {
        color: "#aab7c4"
      }
    },
    invalid: {
      color: "#fa755a",
      iconColor: "#fa755a"
    }
  };
        const stripe = Stripe('{{ config('cashier.key') }}')
        const elements = stripe.elements()
        const cardElement = elements.create('card',{ style: style })


        cardElement.mount('#card-element')

            const form = document.getElementById('payment-form')
            const cardBtn = document.getElementById('card-button')
            const cardHolderName = document.getElementById('card-holder-name')
         
 let displayError = document.getElementById('card-errors');
 let nameError = document.getElementById('name-errors');
            cardElement.on('change', ({error}) => {
            if(cardHolderName.value ==''){
                 nameError.textContent ='nome do cartão em falta'
                 cardElement.disabled = true
            }else{
                nameError.textContent =''
            }
            if (error) {
                displayError.textContent = error.message;
            } else {
                displayError.textContent = '';
            }
            });
           

form.addEventListener('submit', async (e) => {
        e.preventDefault()
        cardBtn.disabled = true
        const { setupIntent, error } = await stripe.confirmCardSetup(
            cardBtn.dataset.secret, {
                payment_method: {
                    card: cardElement,
                    billing_details: {
                        name: cardHolderName.value
                    }
                }
            }
        )

        if(error) {
            cardBtn.disable = false
            console.log(error)
           
        } else {
            let token = document.createElement('input')
            nameError.textContent =''
            token.setAttribute('type', 'hidden')
            token.setAttribute('name', 'token')
            token.setAttribute('value', setupIntent.payment_method)

            form.appendChild(token)

            form.submit();
        }
    })


    </script>
    @endpush
</x-app-layout>
