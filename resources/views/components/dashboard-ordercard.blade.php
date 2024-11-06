<div class="bg-gray-100 rounded-lg shadow-md p-2 m-2 flex flex-col justify-start items-start">
    <h2 class="text-lg font-bold">{{ $clientName }} - #{{ $orderId }}</h2>   
    <h2 class="text-lg">{{ $street }}, {{ $number }}</h2>
    <h2 class="text-lg">{{ $district }}</h2>
    <h2 class="text-lg">{{ $city }} | {{ $zipCode }}</h2>
    <h2 class="text-lg">Horario do pedido: {{ $orderTime }}</h2>
    <div class="flex flex-col gap-2 mt-2 w-full md:flex-row">
        <div class="flex-1">
            <x-primary-button type="button" id="btnNewProduct" class="w-full h-12 text-center">
                {{ __('Aceitar') }}
            </x-primary-button>
        </div>
        <div class="flex-1">
            <x-primary-button type="button" id="btnNewProduct" class="w-full h-12 text-center">
                {{ __('Detalhes') }}
            </x-primary-button>
        </div>
        <div class="flex-1">
            <x-danger-button type="button" id="btnNewProduct" class="w-full h-12 text-center">
                {{ __('Rejeitar') }}
            </x-danger-button>
        </div>
    </div>
</div>