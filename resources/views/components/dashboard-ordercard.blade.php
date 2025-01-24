<div class="bg-gray-100 rounded-lg shadow-md p-2 m-2 flex flex-col justify-start items-start">
    <h2 class="text-lg font-bold">{{ $clientName }} - #{{ $orderId }}</h2>   
    <h2 class="text-lg">{{ $street }}, {{ $number }}</h2>
    <h2 class="text-lg">{{ $district }}</h2>
    <h2 class="text-lg">{{ $city }} | {{ $zipCode }}</h2>
    <h2 class="text-lg">Horario do pedido: {{ $orderTime }}</h2>
    <div class="flex flex-col gap-2 mt-2 w-full md:flex-row">
        @if($orderStatus == 'P')
            <div class="flex-1">
                <x-primary-button type="button" 
                    id="btnAccept{{ $orderId }}" 
                    data-order="{{ $orderId }}" 
                    class="w-full h-12 text-center btnAccept">
                    {{ __('Aceitar') }}
                </x-primary-button>
            </div>
        @endif
        <div class="flex-1">
            <x-primary-button type="button" 
                id="btnDetails{{ $orderId }}" 
                data-order="{{ $orderId }}" 
                class="w-full h-12 text-center">
                {{ __('Detalhes') }}
            </x-primary-button>
        </div>
        @if($orderStatus == 'P')
            <div class="flex-1">
                <x-danger-button type="button" 
                    id="btnDecline{{ $orderId }}" 
                    data-order="{{ $orderId }}" 
                    class="w-full h-12 text-center">
                    {{ __('Rejeitar') }}
                </x-danger-button>
            </div>
        @endif
        @switch($orderStatus)
            @case('A')
            @case('I')
            @case('D')
            @case('E')
            <div class="flex-1">
                <x-danger-button type="button" 
                    id="btnDecline{{ $orderId }}" 
                    data-order="{{ $orderId }}" 
                    class="w-full h-12 text-center">
                    {{ __('Cancelar') }}
                </x-danger-button>
            </div>
        @endswitch
    </div>
</div>