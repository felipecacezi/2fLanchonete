<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg grid grid-cols-1 md:grid-cols-7">
        
                    <!-- Primeira coluna: Pedidos -->
                    <div class="bg-white p-2 text-gray-900 dark:text-gray-100 max-h-screen h-full overflow-y-auto scrollbar-hide flex flex-col col-span-2">
                        @foreach($orders as $order)
                            <div class="bg-gray-100 rounded-lg shadow-md p-2 m-2 flex flex-col justify-start items-start">
                                <h2 class="text-lg font-bold">{{ $order['order_client_name'] }} - #{{ $order['id'] }}</h2>
                                <h2 class="text-lg">{{ $order['order_street'] }}, {{ $order['order_number'] }}</h2>
                                <h2 class="text-lg">{{ $order['order_district'] }}</h2>
                                <h2 class="text-lg">{{ $order['order_city'] }} | {{ $order['order_zipcode'] }}</h2>
                                <h2 class="text-lg">Horario do pedido: {{ $order['created_at'] }}</h2>
        
                                <div class="md:grid md:grid-cols-3 gap-1">
                                    @if ($order['btnStatus']['btnAccept']['visibility'])
                                        <x-primary-button type="button" 
                                            id="btnAccept{{ $order['id'] }}" 
                                            data-order="{{ $order['id'] }}" 
                                            class="w-full h-12 text-center btnAccept flex items-center justify-center col-span-1"
                                            @click="$dispatch('confirmAccept', {{ $order['id'] }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                                </svg>                                              
                                        </x-primary-button>
                                    @endif
                                    @if ($order['btnStatus']['btnDetails']['visibility'])
                                        <x-primary-button type="button" 
                                            id="btnDetails{{ $order['id'] }}" 
                                            data-order="{{ $order['id'] }}" 
                                            class="w-full h-12 text-center flex items-center justify-center col-span-1"
                                            wire:click="getDetailsOrder({{ $order['id'] }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                                                </svg>                                              
                                        </x-primary-button>
                                    @endif
                                    @if ($order['btnStatus']['btnDecline']['visibility'])
                                        <x-danger-button type="button" 
                                            id="btnDecline{{ $order['id'] }}" 
                                            data-order="{{ $order['id'] }}" 
                                            class="w-full h-12 text-center flex items-center justify-center col-span-1"
                                            @click="$dispatch('confirmDecline', {{ $order['id'] }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                                </svg>                                              
                                        </x-danger-button>
                                    @endif
                                    @if ($order['btnStatus']['btnCancel']['visibility'])                         
                                        <x-danger-button type="button" 
                                            id="btnCancel{{ $order['id'] }}" 
                                            data-order="{{ $order['id'] }}" 
                                            class="w-full h-12 text-center col-span-1"
                                            @click="$dispatch('confirmCancel', {{ $order['id'] }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>                                              
                                        </x-danger-button>
                                    @endif 
                                </div>
                            </div>
                        @endforeach
                    </div>
        
                    <!-- Segunda coluna: Detalhes do Pedido -->
                    <div class="bg-white p-2 text-gray-900 dark:text-gray-100 col-span-3">
                        {{-- @if($orderDetails) --}}
                            <livewire:order-details />          
                        {{-- @endif --}}
                    </div>
        
                    <!-- Terceira coluna: Informações adicionais ou estatísticas -->
                    <div class="bg-white p-4 text-gray-900 dark:text-gray-100 col-span-2">
                        <!-- Aqui você pode adicionar qualquer conteúdo adicional que desejar -->
                        <!-- Exemplo: Faturamentos, Top Vendas, Cancelados -->
                        <!-- Exemplo de Faturamento -->
                        <div class="bg-green-100 p-4 rounded shadow">
                            <h2 class="font-bold text-lg">Faturamentos</h2>
                            <p>De hoje: R$ {{ number_format($faturamentoHoje, 2, ',', '.') }}</p>
                            <p>Do mês: R$ {{ number_format($faturamentoMes, 2, ',', '.') }}</p>
                        </div>
        
                        <!-- Exemplo de Top Vendas -->
                        <div class="bg-yellow-100 p-4 rounded shadow">
                            <h2 class="font-bold text-lg">Top 3 vendas</h2>
                            @foreach ($topVendas as $item => $quantidade)
                                <p>{{ $item }}: <b>{{ $quantidade }}</b></p>
                            @endforeach
                        </div>
        
                        <!-- Exemplo de Cancelados -->
                        <div class="bg-red-100 p-4 rounded shadow">
                            <h2 class="font-bold text-lg">Cancelados</h2>
                            <p>Itens: {{ $cancelados['itens'] }}</p>
                            <p>Total: R$ {{ number_format($cancelados['valor'], 2, ',', '.') }}</p>
                        </div>
                    </div>
        
                </div>
            </div>
        </div>

    </div>
</div>
{{-- <div class="container mx-auto py-12">
    <div class="grid grid-cols-12 gap-4">
        <!-- Pedidos -->
        <div class="col-span-8 bg-white p-4 rounded shadow">
            <div class="overflow-y-auto h-full scrollbar-hide">
                @foreach ($pedidos as $pedido)
                <div class="p-4 border-b">
                    <h2 class="font-bold">{{ $pedido['cliente'] }} - #{{ $pedido['id'] }}</h2>
                    <p>{{ $pedido['endereco'] }}</p>
                    <p>Horário do pedido: {{ $pedido['horario'] }}</p>
                    <div class="flex space-x-2 mt-2">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded"
                            wire:click="aceitarPedido({{ $pedido['id'] }})">Aceitar</button>
                        <button class="bg-gray-500 text-white px-4 py-2 rounded"
                            wire:click="rejeitarPedido({{ $pedido['id'] }})">Rejeitar</button>
                        <button class="bg-green-500 text-white px-4 py-2 rounded"
                            wire:click="despacharPedido({{ $pedido['id'] }})">Despachar</button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Resumo -->
        <div class="col-span-4 flex flex-col space-y-4">
            <!-- Faturamentos -->
            <div class="bg-green-100 p-4 rounded shadow">
                <h2 class="font-bold text-lg">Faturamentos</h2>
                <p>De hoje: R$ {{ number_format($faturamentoHoje, 2, ',', '.') }}</p>
                <p>Do mês: R$ {{ number_format($faturamentoMes, 2, ',', '.') }}</p>
            </div>

            <!-- Top 3 vendas -->
            <div class="bg-yellow-100 p-4 rounded shadow">
                <h2 class="font-bold text-lg">Top 3 vendas</h2>
                @foreach ($topVendas as $item => $quantidade)
                <p>{{ $item }}: <b>{{ $quantidade }}</b></p>
                @endforeach
            </div>

            <!-- Cancelados -->
            <div class="bg-red-100 p-4 rounded shadow">
                <h2 class="font-bold text-lg">Cancelados</h2>
                <p>Itens: <b>{{ $cancelados['itens'] }}</b></p>
                <p>R$ {{ number_format($cancelados['valor'], 2, ',', '.') }}</p>
            </div>
        </div>
    </div>
</div> --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@script
<script>
    $wire.on('confirmCancel', (orderId) => {
        Swal.fire({
            title: "Atenção!",
            text: `Deseja realmente cancelar o pedido #${orderId}?`,
            confirmButtonColor: "#1f2937",
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: "Sim",
            denyButtonText: `Não`
        }).then((result) => {
            if (result.isConfirmed) {
                @this.call("cancelOrder", orderId);
            }
        });
    });
    
    $wire.on('confirmDecline', (orderId) => {
        Swal.fire({
            title: "Atenção!",
            text: `Deseja realmente rejeitar o pedido #${orderId}?`,
            confirmButtonColor: "#1f2937",
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: "Sim",
            denyButtonText: `Não`
        }).then((result) => {
            if (result.isConfirmed) {
                @this.call("declineOrder", orderId);
            }
        });
    });

    $wire.on('confirmAccept', (orderId) => {
        Swal.fire({
            title: "Atenção!",
            text: `Deseja realmente aceitar o pedido #${orderId}?`,
            confirmButtonColor: "#1f2937",
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: "Sim",
            denyButtonText: `Não`
        }).then((result) => {
            if (result.isConfirmed) {
                @this.call("acceptOrder", orderId);
            }
        });
    });

    window.addEventListener('alert', (event) => {
        const eventDetail = event.__livewire;

        if (eventDetail.name === 'alert') {
            Swal.fire(event.detail[0]);
        }
    })
</script>
@endscript
{{-- <script>
    
    // document.addEventListener('DOMContentLoaded', function (event) {
    //     window.livewire.on('triggerDelete', itemId => {
    //     Swal.fire({
    //         title: 'Tem certeza?',
    //         text: "Você não poderá reverter isso!",
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#d33',
    //         cancelButtonColor: '#3085d6',
    //         confirmButtonText: 'Sim, delete isso!'
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             window.livewire.emit('deleteConfirmed', itemId);
    //         }
    //     });
    // });

    
    // });

    
</script> --}}