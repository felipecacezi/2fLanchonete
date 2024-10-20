<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Kilanche - Cardapio</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body>
        @if($menuConfigs && $productsFinal)

        <section class="flex flex-col w-full md:px-96">
            <div class=" mb-5 overflow-hidden flex md:rounded-lg">                    
                <img src="{{ $menuConfigs['menu_cover_url'] ?? '' }}" 
                    alt="speaker image"
                    class="object-fit-cover w-full h-full"/>
            </div>
        </section>

        <div class="w-full px-2 md:px-96">

        <section class="flex flex-col w-full">            
            <div class="text-justify">
                <p>
                    {{ $menuConfigs['menuconf_description'] ?? '' }}
                </p>
            </div>   
        </section>

        <section class="flex flex-col w-full">
            <div class="flex items-start w-full">
                <h2 class="font-manrope font-bold text-1xl leading-10 text-black">
                    Horário de funcionamento
                </h2>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-5 mt-5">

                <div class="bg-gray-100 rounded flex p-4 h-full items-center">                   
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-gray-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span class="title-font font-medium">Abertura - {{ $menuConfigs['menuconf_open'] ?? '' }}</span>
                </div>

                <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-gray-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span class="title-font font-medium">Almoço - {{ $menuConfigs['menuconf_lunch'] ?? '' }}</span>
                </div>

                <div class="bg-gray-100 rounded flex p-4 h-full items-center">    
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-gray-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span class="title-font font-medium">Reabertura - {{ $menuConfigs['menuconf_reopen'] ?? '' }}</span>
                </div>

                <div class="bg-gray-100 rounded flex p-4 h-full items-center">                                    
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-gray-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span class="title-font font-medium">Fechamento - {{ $menuConfigs['menuconf_close'] ?? '' }}</span>
                </div>

            </div>
        </section>

        <section class="flex flex-col w-full">
            <div class="flex items-start w-full">
                <h2 class="font-manrope font-bold text-1xl leading-10 text-black">
                    Tempo médio de espera
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-1 gap-5 mt-5">

                <div class="">
                    <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                    

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-gray-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>

                    <span class="title-font font-medium">{{ $menuConfigs['menuconf_wait_time'] ?? '' }}</span>
                    </div>
                </div>

            </div>
        </section>

        <section class="flex flex-col w-full">
            @if($productsFinal)
                @foreach($productsFinal as $key => $products) 
                <h1 class="font-manrope font-bold text-3xl leading-10 mb-8 text-start text-black">{{ $key }} </h1>
                    @foreach($products as $product) 
                        <div class="rounded-3xl border-2 border-gray-200 p-4 lg:p-8 grid grid-cols-12 mb-8 max-lg:max-w-lg max-lg:mx-auto gap-y-4 ">                        
                        
                            <div class="col-span-3 lg:col-span-3 img box flex items-start justify-center h-full">
                                <img src="{{$product['productImgUrl']}}"
                                    alt=""
                                    class="object-cover w-full h-full aspect-square rounded-2xl">
                            </div>

                            <div class="col-span-12 lg:col-span-9 detail w-full lg:pl-3">
                                <div class="flex items-center justify-between w-full mb-6">
                                    <h5 id="product_name_{{$product['id']}}" data-id="{{$product['id']}}" class="font-manrope font-bold text-2xl leading-9 text-gray-900">{{$product['product_name']}}</h5>
                                </div>
                                <p class="font-normal text-base leading-7 text-gray-500 mb-6">{{$product['product_description']}}</p>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-4 mt-4">
                                        <button price-id="product_price_{{$product['id']}}" input-id="quantity_{{$product['id']}}" data-id="{{$product['id']}}" class="sub-product group rounded-[50px] border border-gray-200 shadow-sm shadow-transparent p-2.5 flex items-center justify-center bg-white transition-all duration-500 hover:shadow-gray-200 hover:bg-gray-50 hover:border-gray-300 focus-within:outline-gray-300">
                                            <svg class="stroke-gray-900 transition-all duration-500 group-hover:stroke-black" width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4.5 9.5H13.5" stroke="" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                        <input type="text" id="quantity_{{$product['id']}}" class="products-quantity border border-gray-200 rounded-full w-10 aspect-square outline-none text-gray-900 font-semibold text-sm py-1.5 px-3 bg-gray-100  text-center" value="0">
                                        <button price-id="product_price_{{$product['id']}}" input-id="quantity_{{$product['id']}}" data-id="{{$product['id']}}" class="add-product group rounded-[50px] border border-gray-200 shadow-sm shadow-transparent p-2.5 flex items-center justify-center bg-white transition-all duration-500 hover:shadow-gray-200 hover:bg-gray-50 hover:border-gray-300 focus-within:outline-gray-300">
                                            <svg class="stroke-gray-900 transition-all duration-500 group-hover:stroke-black" width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.75 9.5H14.25M9 14.75V4.25" stroke="" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                    </div>
                                    <h6 class="text-indigo-600 font-manrope font-bold text-2xl leading-9 text-right">R$ <span id="product_price_{{$product['id']}}">{{$product['product_price']}}</span></h6>
                                </div>
                            </div>

                        </div>
                    @endforeach
                @endforeach
            @endif
        </section>

        <section class="flex flex-col w-full">

            <div class="flex flex-col items-start w-full">
                <h2 class="font-manrope font-bold text-1xl leading-10 text-black">
                    Observação
                </h2>
                <x-text-area id="order_obs" 
                    name="order_obs" 
                    type="text" 
                    class="mt-1 block w-full" 
                    autocomplete="current-password"
                    placeholder="Ex.: Sem maionese, sem queijo etc..."
                    rows="10">
                    <x-slot:teste>{{ $configs->menuconf_description ?? '' }}</x-slot>
                </x-text-area>
            </div>

            <div class="flex items-start w-full">
                <h6 class="text-indigo-600 font-manrope font-bold text-2xl leading-9 text-right">
                    SubTotal: R$ <span id="subtotal">0,00</span>
                </h6>
            </div>


            <div class="mt-5 mb-5 ">
                <button id="btn-checkout"
                        class="rounded-full py-4 px-6 bg-indigo-600 text-white 
                            font-semibold text-lg w-full text-center transition-all 
                            duration-500 hover:bg-indigo-700 ">
                    Fazer Pedido
                </button>
            </div>
        </section>

        <!-- modal checkout -->
        <div id="modalCheckout" 
            tabindex="-1" 
            aria-hidden="true" 
            class="hidden fixed top-0 right-0 left-0 z-50 justify-center
                    items-center w-full md:inset-0 h-modal md:h-full 
                    bg-black bg-opacity-60 overflow-hidden md:overflow-y-hidden">
            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto overflow-y-auto md:overflow-y-auto no-scrollbar max-h-screen">
                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    
                    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Detalhes do pedido
                        </h3>
                        <button id="btn-close-modal" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="updateProductModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Fechar</span>
                        </button>
                    </div>
                    
                    <form action="#">
                        <div id="cardItems"
                            class="bg-gray-300/50 rounded-lg p-4"></div>

                            <br>

                        <div class="grid gap-4 mb-4 sm:grid-cols-2">
                            <div class="flex-1">
                                <x-input-label for="client_register" 
                                    :value="__('CPF')"/>
                                <x-text-input id="client_register" 
                                    name="client_register" 
                                    type="text" 
                                    class="mt-1 block w-full cpf_mask"
                                    placeholder="999.999.999-99" />
                            </div>

                            <div class="flex-1">
                                <x-input-label for="client_name" 
                                    :value="__('Nome')"/>
                                <x-text-input id="client_name" 
                                    name="client_name" 
                                    type="text" 
                                    class="mt-1 block w-full"
                                    placeholder="Nome" />
                            </div>

                            <div class="flex-1">
                                <x-input-label for="client_phone" 
                                    :value="__('Fone contato')"/>
                                <x-text-input id="client_phone" 
                                    name="client_phone" 
                                    type="text" 
                                    class="mt-1 block w-full phone_mask"
                                    placeholder="(99)99999999" />
                            </div>

                            <div class="flex-1">
                                <x-input-label for="client_whatsapp" 
                                    :value="__('Whatsapp')"/>
                                <x-text-input id="client_whatsapp" 
                                    name="client_whatsapp" 
                                    type="text" 
                                    class="mt-1 block w-full phone_mask"
                                    placeholder="(99)99999999" />
                            </div>

                        </div>
                        
                        <div class="grid gap-4 mb-4 sm:grid-cols-2">
                            <div class="flex-1">
                                <x-input-label for="client_zipcode" 
                                    :value="__('CEP')"/>
                                <x-text-input id="client_zipcode" 
                                    name="client_zipcode" 
                                    type="text" 
                                    class="mt-1 block w-full"
                                    placeholder="CEP" />
                            </div>

                            <div class="flex-1">
                                <x-input-label for="client_street" 
                                    :value="__('Rua')"/>
                                <x-text-input id="client_street" 
                                    name="client_street" 
                                    type="text" 
                                    class="mt-1 block w-full"
                                    placeholder="Rua" />
                            </div>

                            <div class="flex-1">
                                <x-input-label for="client_number" 
                                    :value="__('Número')"/>
                                <x-text-input id="client_number" 
                                    name="client_number" 
                                    type="text" 
                                    class="mt-1 block w-full"
                                    placeholder="Número" />
                            </div>

                            <div class="flex-1">
                                <x-input-label for="client_district" 
                                    :value="__('Bairro')"/>
                                <x-text-input id="client_district" 
                                    name="client_district" 
                                    type="text" 
                                    class="mt-1 block w-full"
                                    placeholder="Bairro" />
                            </div>

                            <div class="flex-1">
                                <x-input-label for="client_complement" 
                                    :value="__('Complemento')"/>
                                <x-text-input id="client_complement" 
                                    name="client_complement" 
                                    type="text" 
                                    class="mt-1 block w-full"
                                    placeholder="Complemento" />
                            </div>

                            <div class="flex-1">
                                <x-input-label for="client_city" 
                                    :value="__('Cidade')"/>
                                <x-text-input id="client_city" 
                                    name="client_city" 
                                    type="text" 
                                    class="mt-1 block w-full"
                                    placeholder="Cidade" />
                            </div>

                            <div class="flex-1">
                                <x-input-label for="client_state" 
                                    :value="__('Estado')"/>
                                <x-text-input id="client_state" 
                                    name="client_state" 
                                    type="text" 
                                    class="mt-1 block w-full"
                                    placeholder="Estado" />
                            </div>

                            <div class="flex-1">
                                <x-input-label for="client_reference" 
                                    :value="__('Ponto de Referência')"/>
                                <x-text-input id="client_reference" 
                                    name="client_reference" 
                                    type="text" 
                                    class="mt-1 block w-full"
                                    placeholder="Ponto de Referência" />
                            </div>
                            
                        </div>

                        <div class="grid gap-4 mb-4 sm:grid-cols-1">
                            <x-input-label for="client_reference" 
                                :value="__('Forma de pagamento')"/>
                            <select name="payment-method" 
                                id="payment-method" 
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 
                                    dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 
                                    focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                <option value="0">Selecione</option>
                                <option value="D">Dinheiro</option>
                                <option value="C">Cartão (Débito/Credito)</option>
                                <option value="P">Pix</option>
                            </select>
                        </div>

                        <br>

                        <div id="div-D" class="div-method-payment grid gap-4 mb-4 sm:grid-cols-1 hidden">
                            <div class="flex-1">
                                <x-input-label for="client_change" 
                                    :value="__('Precisa de troco para quanto?')"/>
                                <x-text-input id="client_change" 
                                    name="client_change" 
                                    type="text" 
                                    class="mt-1 block w-full"
                                    placeholder="0" />
                            </div>
                        </div>

                        <div id="div-C" class="div-method-payment grid gap-4 mb-4 sm:grid-cols-3 hidden"></div>

                        <div id="div-P" class="div-method-payment grid gap-4 mb-4 sm:grid-cols-3 hidden"></div>

                        <br>

                        <div class="flex items-center space-x-4">
                            <x-primary-button type="button"
                                id="btn-send-order">
                                {{ __('Fazer Pedido') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @else
            <div class="flex flex-col justify-center items-center h-screen">
                <img src="{{ asset('img/emConstrucao.svg') }}" alt="" class="w-2/2 md:w-1/2">                
                <p class="mt-8 text-2xl font-bold text-gray-600 mt-3">Desculpe, este estabelecimento ainda não possui cardápio.</p>
            </div>
        @endif
        </div>
        @vite([
            'resources/js/menu/menu.js',
            'resources/js/utils/inputMask.js'
        ])
    </body>
    
</html>
