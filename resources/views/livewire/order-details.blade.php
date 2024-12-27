<div class="bg-white p-2 text-gray-900 dark:text-gray-100 col-span-3">
    @if(!empty($orderDetails))
        @if($orderDetails['order_status'] !== 'E')
        <div class="bg-gray-100 rounded-lg shadow-md p-2 m-2 flex flex-col justify-start items-start">
            <h2 class="text-lg font-bold">Pedido #{{ $orderDetails['id'] }}</h2>
            <h2 class="text-lg mb-3"><b>Cliente:</b>{{ $orderDetails['order_client_name'] }}</h2>
            <h2 class="text-lg"><b>Itens:</b></h2>

            @foreach ($orderDetails['order_products'] as $orderItem)
                <h2 class="text-lg ml-3"><b>{{ $orderItem['order_product_quantity'] }}x - </b>{{ $orderItem['products']['product_name'] }} - R$ {{ $orderItem['order_product_value_real'] }}</h2>
            @endforeach

            <h2 class="text-lg ml-3 font-bold mb-3">Total: R$ {{ $orderDetails['order_value_total_real'] }}</h2>            

            <h2 class="text-lg font-bold">Endereço:</h2>
            <h2 class="text-lg ml-3">{{ $orderDetails['order_street'] }}, 35</h2>
            <h2 class="text-lg ml-3">{{ $orderDetails['order_district'] }}</h2>
            <h2 class="text-lg ml-3">{{ $orderDetails['order_city'] }} | {{ $orderDetails['order_zipcode'] }}</h2>
            <h2 class="text-lg ml-3 mb-3">Horario do pedido: {{ explode(' ', $orderDetails['created_at'])[1] }}</h2>

            <h2 class="text-lg font-bold">Pagamento:</h2>
            <h2 class="text-lg ml-3 mb-3">
                {{ $orderDetails['payment_method_description'] }}
                @if($orderDetails['order_change_value'])
                , troco para <b>R$ {{ $orderDetails['order_change_value_real'] }}</b>
                @endif
            </h2>
        </div>
        @endif
    @endif
</div>
@script
<script>
    window.addEventListener('refreshOrderDetails', event => {
        @this.call("handleGetDetailsOrder", event.detail.orderId); 
    });
</script>
@endscript