<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="">
        <section class="py-5 relative">
            <div class="w-full max-w-7xl px-4 md:px-5 lg-6 mx-auto">

                <div class="flex flex-col justify-center items-center rounded-3xl mb-8">
                    <div class="img box mb-5 w-mx h-96 px-5 overflow-hidden flex">
                        <img src="https://logo.criativoon.com/wp-content/uploads/2016/07/logotipo-lanchonete.png" alt="speaker image" class="md:w-max lg:w-max rounded-3xl">
                    </div>
                    <h2 class="title font-manrope font-bold text-4xl leading-10 mb-8 text-center text-black">
                        Kilanche
                    </h2>
                    <div>
                        <p>
                            Descubra a deliciosa experiência da Lanchonete Kilanche, o lugar ideal para toda a família saborear um incrível hambúrguer! Com um ambiente acolhedor e descontraído, oferecemos uma variedade de opções suculentas que vão satisfazer todos os gostos. Nossos hambúrgueres são preparados com ingredientes frescos e de alta qualidade, garantindo sabor e qualidade em cada mordida. Venha nos visitar e desfrute de momentos deliciosos com quem você mais ama. Kilanche, onde cada hambúrguer é uma experiência única!
                        </p>
                    </div>
                </div>

                <div>
                        @foreach($products as $product)                    
                            <div class="rounded-3xl border-2 border-gray-200 p-4 lg:p-8 grid grid-cols-12 mb-8 max-lg:max-w-lg max-lg:mx-auto gap-y-4 ">                        
                                <div class="col-span-12 lg:col-span-2 img box flex items-start justify-center">
                                    <img src="{{$product['productImgUrl']}}"
                                        alt=""
                                        class="max-lg:w-full lg:w-[180px] rounded-2xl">
                                </div>
                                <div class="col-span-12 lg:col-span-10 detail w-full lg:pl-3">
                                    <div class="flex items-center justify-between w-full mb-6">
                                        <h5 id="product_name_{{$product['id']}}" class="font-manrope font-bold text-2xl leading-9 text-gray-900">{{$product['product_name']}}</h5>
                                    </div>
                                    <p class="font-normal text-base leading-7 text-gray-500 mb-6">{{$product['product_description']}}</p>
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center gap-4 mt-4">
                                            <button price-id="product_price_{{$product['id']}}" input-id="quantity_{{$product['id']}}" data-id="{{$product['id']}}" class="sub-product group rounded-[50px] border border-gray-200 shadow-sm shadow-transparent p-2.5 flex items-center justify-center bg-white transition-all duration-500 hover:shadow-gray-200 hover:bg-gray-50 hover:border-gray-300 focus-within:outline-gray-300">
                                                <svg class="stroke-gray-900 transition-all duration-500 group-hover:stroke-black" width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M4.5 9.5H13.5" stroke="" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                            <input type="text" id="quantity_{{$product['id']}}" class="border border-gray-200 rounded-full w-10 aspect-square outline-none text-gray-900 font-semibold text-sm py-1.5 px-3 bg-gray-100  text-center" value="0">
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

                        <div class="max-lg:max-w-lg max-lg:mx-auto">
                            <h6 class="text-indigo-600 font-manrope font-bold text-2xl leading-9 text-right">
                                SubTotal: R$ <span id="subtotal">0,00</span>
                            </h6>
                        </div>

                        <div class="max-lg:max-w-lg max-lg:mx-auto mt-5">
                            <button id="btn-make-order-wpp"
                                class="rounded-full py-4 px-6 bg-indigo-600 text-white font-semibold text-lg w-full text-center transition-all duration-500 hover:bg-indigo-700 ">Fazer Pedido</button>
                        </div>
                </div>
        </section>
        <script src="{{ asset('/js/menu/menu.js') }}"></script>
    </body>
</html>
