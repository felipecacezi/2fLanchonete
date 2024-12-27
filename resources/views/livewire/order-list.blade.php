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
                        wire:click="orderDetailsTrigger({{ $order['id'] }})">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                            </svg>                                              
                    </x-primary-button>
                @endif
                @if ($order['btnStatus']['btnPrint']['visibility'])                         
                    <x-primary-button type="button" 
                        id="btnPrint{{ $order['id'] }}" 
                        data-order="{{ $order['id'] }}" 
                        class="w-full h-12 text-center col-span-1"
                        @click="$dispatch('confirmPrint', {{ $order['id'] }})">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z" />
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
                @if ($order['btnStatus']['btnFinish']['visibility'])                         
                    <x-primary-button type="button" 
                        id="btnFinish{{ $order['id'] }}" 
                        data-order="{{ $order['id'] }}" 
                        class="w-full h-12 text-center col-span-1"
                        @click="$dispatch('confirmFinish', {{ $order['id'] }})">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
                            </svg>                                                                        
                    </x-primary-button>
                @endif 
                @if ($order['btnStatus']['btnDelivery']['visibility'])                         
                    <x-primary-button type="button" 
                        id="btnDelivery{{ $order['id'] }}" 
                        data-order="{{ $order['id'] }}" 
                        class="w-full h-12 text-center col-span-1"
                        @click="$dispatch('confirmDelivery', {{ $order['id'] }})">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                            </svg>                                                                                            
                    </x-primary-button>
                @endif
                @if ($order['btnStatus']['btnDelivered']['visibility'])                         
                    <x-primary-button type="button" 
                        id="btnDelivered{{ $order['id'] }}" 
                        data-order="{{ $order['id'] }}" 
                        class="w-full h-12 text-center col-span-1"
                        @click="$dispatch('confirmDelivered', {{ $order['id'] }})">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                            </svg>                                                                                                                    
                    </x-primary-button>
                @endif 
            </div>
        </div>
    @endforeach
</div>

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

    $wire.on('confirmPrint', (orderId) => {
        Swal.fire({
            title: "Atenção!",
            text: `Deseja realmente imprimir o pedido #${orderId}?`,
            confirmButtonColor: "#1f2937",
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: "Sim",
            denyButtonText: `Não`
        }).then((result) => {
            if (result.isConfirmed) {
                @this.call("printOrder", orderId);
            }
        });
    });

    $wire.on('confirmFinish', (orderId) => {
        Swal.fire({
            title: "Atenção!",
            text: `O pedido #${orderId} realmente foi finalizado pela cozinha?`,
            confirmButtonColor: "#1f2937",
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: "Sim",
            denyButtonText: `Não`
        }).then((result) => {
            if (result.isConfirmed) {
                @this.call("finishOrder", orderId);
            }
        });
    });

    $wire.on('confirmDelivery', (orderId) => {
        Swal.fire({
            title: "Atenção!",
            text: `Deseja realmente liberar para o motoboy o pedido #${orderId}`,
            confirmButtonColor: "#1f2937",
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: "Sim",
            denyButtonText: `Não`
        }).then((result) => {
            if (result.isConfirmed) {
                @this.call("deliveryOrder", orderId);
            }
        });
    });

    $wire.on('confirmDelivered', (orderId) => {
        Swal.fire({
            title: "Atenção!",
            text: `O pedido #${orderId} realmente foi entregue?`,
            confirmButtonColor: "#1f2937",
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: "Sim",
            denyButtonText: `Não`
        }).then((result) => {
            if (result.isConfirmed) {
                @this.call("deliveredOrder", orderId);
            }
        });
    });
    
    window.addEventListener('print', event => {
        const eventDetail = event.__livewire;

        if (eventDetail.name === 'print') {

            const printWindow = window.open('', '_blank');
            const data = eventDetail.params[0].data;
            var tableRows = '';

            data.order_products.forEach(product => {
                tableRows += `
                    <tr>
                        <td colspan="2">
                            <strong>${product.order_product_quantity}</strong> - ${product.products.product_name} - <strong>R$ </strong> ${product.order_product_value_real}
                        </td>
                    </tr>
                `;
            });
    
            printWindow.document.write(`
                <table>
                    <thead>
                        <tr>
                            <th>===========================================</th>
                        </tr>
                        <tr>                        
                            <th colspan="2">Pedido #${data.id}</th>
                        </tr>
                        <tr>
                            <th>===========================================</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr colspan="2">
                            <td><strong>Cliente:</strong>&nbsp;${data.order_client_name}</td>
                        </tr>
                        <tr>
                            <th>===========================================</th>
                        </tr>
                        <tr>
                            <br/>
                        </tr>
                        <tr>
                            <td colspan="2"><center><strong>Itens</strong></center></td>
                        </tr>
                        <tr>
                            <th>===========================================</th>
                        </tr>
                        ${tableRows}
                        <tr>
                            <th>===========================================</th>
                        </tr>               
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>
                                <strong>Total:</strong> ${data.order_value_total_real}
                            </td>
                        </tr>  
                    </tfoot>
                </table>
            `);
        }
    });

    window.addEventListener('alert', (event) => {
        const eventDetail = event.__livewire;
        const { title, text, icon, confirmButtonText, trigger, orderId } = eventDetail.params[0];
      
        if (eventDetail.name === 'alert') {
            Swal.fire({
                title, 
                text, 
                icon, 
                confirmButtonText
            });
        }

        if (trigger === 'refreshStatus') {
            window.dispatchEvent(new CustomEvent('refreshOrderDetails', {
                detail: {
                    componentId: eventDetail.id,
                    orderId: orderId
                }
            }));
        }
    })
</script>
@endscript