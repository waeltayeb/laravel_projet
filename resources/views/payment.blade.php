
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link href="assets/css/stylePayment.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
      
        <div class="min-h-screen  bg-neutral-500">
            @include('layouts.navigation')
            <h2 class="font-semibold text-xl text-gray-800 leading-tight max-w-7xl mx-auto py-6  sm:px-6 lg:px-8">
            {{ __('new payment') }}
        </h2>
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
            <div class="container">

<form action="payment" method="post">
 @csrf
    <div class="row">

        <div class="col">

            <h3 class="title">billing address</h3>

            <div class="inputBox">
                <span>full name :</span>
                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                
                <input type="number" name="id" id="id" value="{{ Auth::user()->id }}" style=display:none; disabled/>
                <input type="text" value="{{ Auth::user()->name }}" disabled>
            </div>
            <div class="inputBox">
                <span>email :</span>
                <input type="email" value="{{ Auth::user()->email }}" disabled >
            </div>
            <div class="inputBox">
                <span>matricul :</span>
                <input type="text" value="{{ Auth::user()->matricul }}" disabled >
            </div>
            <div class="inputBox">
                <span>duration cotisation :</span>
                <select class="inputBox" name="duration" id="duration">
    <option value="three">3 mounths</option>
    <option value="six">6 mounths</option>
    <option value="years">1 year</option>
    
  </select>
               
            </div>
            <div class="inputBox">
                <span>montant :</span>
                <input type="number" name="montant" id="montant"  disabled >
            </div>

           

        </div>
        

        <div class="col">

            <h3 class="title">payment</h3>

            <div class="inputBox">
                <span>cards accepted :</span>
                <img src="assets/img/card_img.png" alt="">
            </div>
            <div class="inputBox">
                <span>name on card :</span>
                <input type="text" name="name_card" id="name_card" placeholder="mr. john deo">
            </div>
            <div class="inputBox">
                <span>credit card number :</span>
                <input type="number" name="number_card" id="number_card" placeholder="1111-2222-3333-4444">
            </div>
            <div class="inputBox">
                <span>exp month :</span>
                <input type="text" name="exp_month" id="exp_month" placeholder="january">
            </div>

            <div class="flex">
                <div class="inputBox">
                    <span>exp year :</span>
                    <input type="number" name="exp_year" id="exp_year" placeholder="2022">
                </div>
                <div class="inputBox">
                    <span>CVV :</span>
                    <input type="text" name="CVV" id="CVV" placeholder="1234">
                </div>
            </div>

        </div>

    </div>

    <input type="submit" value="proceed to checkout" class="submit-btn">

</form>

</div> 
                
            </main>
        </div>
    </body>
    <script>
    // Get the necessary elements
    const durationSelect = document.getElementById('duration');
    const montantInput = document.getElementById('montant');
    
    // Define the montant values for each duration
    const montantValues = {
        three: '100', // Example values, replace with actual amounts
        six: '150',
        years: '250'
    };
    
    // Function to update montant input value
    function updateMontant() {
        const selectedDuration = durationSelect.value;
        montantInput.value = montantValues[selectedDuration];
    }
    
    // Add event listener to duration select
    durationSelect.addEventListener('change', updateMontant);
    
    // Initial update on page load
    updateMontant();
</script>
</html>








 
