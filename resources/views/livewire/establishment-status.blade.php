<div class="bg-white p-4 text-gray-900 dark:text-gray-100 col-span-2 gap-2">
    {{-- Card de Faturamentos --}}
    <div class="bg-white rounded-lg shadow-sm border">
        <div class="flex items-center justify-between p-4 border-b">
            <h3 class="text-sm font-medium text-gray-900">FATURAMENTOS</h3>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <div class="p-4 space-y-1">
            <p class="text-sm text-gray-600">
                De hoje: 
                <span class="text-green-600 font-medium">R$ {{ $billingsToday }}</span>
            </p>
            <p class="text-sm text-gray-600">
                Do mês: 
                <span class="text-green-600 font-medium">R$ {{ $billingsMontly }}</span>
            </p>
        </div>
    </div>

    {{-- Card de Top 3 Vendas --}}
    <div class="bg-white rounded-lg shadow-sm border">
        <div class="flex items-center justify-between p-4 border-b">
            <h3 class="text-sm font-medium text-gray-900">TOP 3 VENDAS</h3>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
            </svg>
        </div>
        <div class="p-4 space-y-1">
            @if($topOrders)
                @foreach ($topOrders as $item)
                    <p class="text-sm text-gray-600">
                        {{ $item['product_name'] }}: 
                        <span class="font-medium">{{ $item['quantity'] }}</span>
                    </p>
                @endforeach
            @else
                <p class="text-sm text-gray-600">Não há vendas registradas.</p>
            @endif
        </div>
    </div>

    {{-- Card de Cancelados --}}
    <div class="bg-white rounded-lg shadow-sm border">
        <div class="flex items-center justify-between p-4 border-b">
            <h3 class="text-sm font-medium text-gray-900">CANCELADOS</h3>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <div class="p-4 space-y-1">
            <p class="text-sm text-gray-600">
                Itens: 
                <span class="text-red-600 font-medium">{{ $cancelledOrdersQuantity }}</span>
            </p>
            <p class="text-sm text-gray-600">
                Total: 
                <span class="text-red-600 font-medium">R$ {{ $cancelledOrdersValue }}</span>
            </p>
        </div>
    </div>
</div>