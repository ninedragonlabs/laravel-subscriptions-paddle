<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="#" onclick="buyProduct(764089)">buy</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>

    function buyProduct(productId){

        Paddle.Setup({
			vendor: 144609          // Replace with your Vendor ID.
		});

		Paddle.Checkout.open({
			method: 'inline',
			product: 764089,       // Replace with your Product or Plan ID
			allowQuantity: false,
			disableLogout: true,
			frameTarget: 'checkout-container', // The className of your checkout <div>
			frameInitialHeight: 416,
			frameStyle: 'width:100%; min-width:312px; background-color: transparent; border: none;'    // Please ensure the minimum width is kept at or above 286px with checkout padding disabled, or 312px with checkout padding enabled. See "General" section under "Branded Inline Checkout" below for more information on checkout padding.
		});
        
    }
</script>

