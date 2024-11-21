<?php
  use Carbon\Carbon;
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <form action="">
      @csrf
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex flex-col md:flex-row justify-center items-start h-1/2">
                  <div class="bg-white p-2 text-gray-900 dark:text-gray-100 w-full md:w-2/5 lg:w-2/5 xl:w-2/5 max-h-screen h-full overflow-y-auto scrollbar-hide flex flex-col">
                      @foreach($arDailyOrders as $dailyOrder)
                        <x-dashboard-ordercard 
                          clientName="{{ $dailyOrder['order_client_name'] }}" 
                          orderId="{{ $dailyOrder['id'] }}" 
                          street="{{ $dailyOrder['order_street'] }}" 
                          number="{{ $dailyOrder['order_number'] }}" 
                          district="{{ $dailyOrder['order_district'] }}" 
                          city="{{ $dailyOrder['order_city'] }}" 
                          zipCode="{{ $dailyOrder['order_zipcode'] }}" 
                          orderTime="{{ Carbon::parse($dailyOrder['created_at'])->format('H:i') }}"
                          orderStatus="{{ $dailyOrder['order_status'] }}"/>                          
                      @endforeach
                  </div>

                  <div class="bg-white p-2 text-gray-900 dark:text-gray-100 w-full md:w-2/5 lg:w-2/5 xl:w-2/5">

                      <div class="bg-gray-100 rounded-lg shadow-md p-2 m-2 flex flex-col justify-start items-start">
                          <h2 class="text-lg font-bold">Pedido #001</h2>   
                          <h2 class="text-lg mb-3"><b>Cliente:</b> José Bonifacio dos Santos</h2>
                          <h2 class="text-lg"><b>Itens:</b></h2>
                          <h2 class="text-lg ml-3"><b>3x - </b>X-Bacon - R$ 70,00</h2>
                          <h2 class="text-lg ml-3"><b>1x - </b>X-Salada - R$ 15,50</h2>
                          <h2 class="text-lg ml-3"><b>3x - </b>Coca lata - R$ 10,00</h2>
                          <h2 class="text-lg ml-3 font-bold mb-3">Total: R$ 95,50</h2>

                          <h2 class="text-lg font-bold">Endereço:</h2>
                          <h2 class="text-lg ml-3">Rua José Manoel do Nascimento, 35</h2>
                          <h2 class="text-lg ml-3">Bairro Antônio Zanaga</h2>
                          <h2 class="text-lg ml-3">Americana-SP | 12345-678</h2>
                          <h2 class="text-lg ml-3 mb-3">Horario do pedido: 22:30</h2>

                          <h2 class="text-lg font-bold">Pagamento:</h2>
                          <h2 class="text-lg ml-3 mb-3">Dinheiro, troco para <b>R$ 100,00</b></h2>

                          <x-primary-button type="button" id="btnNewProduct" class="w-full h-12 text-center">
                              {{ __('Despachar') }}
                          </x-primary-button>
                      </div>

                  </div>

                  <div class="bg-white p-2 text-gray-900 dark:text-gray-100 w-full md:w-1/5 lg:w-1/5 xl:w-1/5">
                      
                      <div class="bg-green-100 rounded-lg shadow-md p-2 m-2 flex flex-col justify-start items-start">
                          <h2 class="text-lg font-bold">Faturamentos</h2>   
                          <h2 class="text-lg">De hoje:</h2>
                          <p class="text-gray-900 font-bold"><b>R$</b> 123,00</p>
                          <h2 class="text-lg">Do mês:</h2>                        
                          <p class="text-gray-900 font-bold"><b>R$</b> 123,00</p>
                      </div>

                      <div class="bg-yellow-100 rounded-lg shadow-md p-2 m-2 flex flex-col justify-start items-start">
                          <h2 class="text-lg font-bold">Top 3 vendas</h2>
                          <h2 class="text-lg">X-Bacon: <b>40</b></h2>
                          <h2 class="text-lg">X-Frango: <b>10</b></h2>
                          <h2 class="text-lg">X-Salada: <b>5</b></h2>
                      </div>

                      <div class="bg-red-100 rounded-lg shadow-md p-2 m-2 flex flex-col justify-start items-start">
                          <h2 class="text-lg">Cancelados:</h2>
                          <p class="text-gray-900 font-bold">Itens: 15</p>                        
                          <p class="text-gray-900 font-bold"><b>R$</b> 250,00</p>
                      </div>

                  </div>
                </div>
              </div>
            </div>
    </form>
    @vite(['resources/js/dashboard/cards.js'])
</x-app-layout>


<!-- <section class="text-gray-600 body-font">

  <div class="container px-5 py-24 mx-auto">

    <div class="flex flex-wrap -m-4">

      <div class="p-4 lg:w-1/3">
        <div class="h-full bg-gray-100 bg-opacity-75 px-8 pt-16 pb-24 rounded-lg overflow-hidden text-center relative">
          <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">CATEGORY</h2>
          <h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3">Raclette Blueberry Nextious Level</h1>
          <p class="leading-relaxed mb-3">Photo booth fam kinfolk cold-pressed sriracha leggings jianbing microdosing tousled waistcoat.</p>
          <a class="text-indigo-500 inline-flex items-center">Learn More
            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path d="M5 12h14"></path>
              <path d="M12 5l7 7-7 7"></path>
            </svg>
          </a>
          <div class="text-center mt-2 leading-none flex justify-center absolute bottom-0 left-0 w-full py-4">
            <span class="text-gray-400 mr-3 inline-flex items-center leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
              <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                <circle cx="12" cy="12" r="3"></circle>
              </svg>1.2K
            </span>
            <span class="text-gray-400 inline-flex items-center leading-none text-sm">
              <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
              </svg>6
            </span>
          </div>
        </div>
      </div>

      <div class="p-4 lg:w-1/3">
        <div class="h-full bg-gray-100 bg-opacity-75 px-8 pt-16 pb-24 rounded-lg overflow-hidden text-center relative">
          <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">CATEGORY</h2>
          <h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3">Ennui Snackwave Thundercats</h1>
          <p class="leading-relaxed mb-3">Photo booth fam kinfolk cold-pressed sriracha leggings jianbing microdosing tousled waistcoat.</p>
          <a class="text-indigo-500 inline-flex items-center">Learn More
            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path d="M5 12h14"></path>
              <path d="M12 5l7 7-7 7"></path>
            </svg>
          </a>
          <div class="text-center mt-2 leading-none flex justify-center absolute bottom-0 left-0 w-full py-4">
            <span class="text-gray-400 mr-3 inline-flex items-center leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
              <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                <circle cx="12" cy="12" r="3"></circle>
              </svg>1.2K
            </span>
            <span class="text-gray-400 inline-flex items-center leading-none text-sm">
              <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
              </svg>6
            </span>
          </div>
        </div>
      </div>

      <div class="p-4 lg:w-1/3">
        <div class="h-full bg-gray-100 bg-opacity-75 px-8 pt-16 pb-24 rounded-lg overflow-hidden text-center relative">
          <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">CATEGORY</h2>
          <h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3">Selvage Poke Waistcoat Godard</h1>
          <p class="leading-relaxed mb-3">Photo booth fam kinfolk cold-pressed sriracha leggings jianbing microdosing tousled waistcoat.</p>
          <a class="text-indigo-500 inline-flex items-center">Learn More
            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path d="M5 12h14"></path>
              <path d="M12 5l7 7-7 7"></path>
            </svg>
          </a>
          <div class="text-center mt-2 leading-none flex justify-center absolute bottom-0 left-0 w-full py-4">
            <span class="text-gray-400 mr-3 inline-flex items-center leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
              <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                <circle cx="12" cy="12" r="3"></circle>
              </svg>1.2K
            </span>
            <span class="text-gray-400 inline-flex items-center leading-none text-sm">
              <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
              </svg>6
            </span>
          </div>
        </div>
      </div>

    </div>

  </div>

</section> -->