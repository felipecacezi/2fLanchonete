<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Kilanche - Status Pedido</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <?php
            use App\Helpers\Currency;
        ?>
    </head>
    <body>

    <section class="text-gray-600 body-font">
      
      <div class="container px-5 py-24 mx-auto flex flex-wrap">

        <div class="flex flex-wrap w-full">
            
          <div class="lg:w-2/5 md:w-1/2 md:pr-10 md:py-6">

              <div class="flex relative pb-12">

                <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                  <div class="h-full w-1 <?= $orderColor['step1']['lineColor'] ?> pointer-events-none"></div>
                </div>

                <div class="flex-shrink-0 w-10 h-10 rounded-full <?= $orderColor['step1']['iconColor'] ?> inline-flex items-center justify-center text-white relative z-10">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                  </svg>
                </div>

                <div class="flex-grow pl-4">
                  <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">Passo 1</h2>
                  <p class="leading-relaxed">Aguardando o restaurante aceitar o seu pedido.</p>
                </div>

              </div>

              <div class="flex relative pb-12">
                <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                  <div class="h-full w-1 <?= $orderColor['step2']['lineColor'] ?> pointer-events-none"></div>
                </div>
                <div class="flex-shrink-0 w-10 h-10 rounded-full <?= $orderColor['step2']['iconColor'] ?> inline-flex items-center justify-center text-white relative z-10">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z" />
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 0 0 .495-7.468 5.99 5.99 0 0 0-1.925 3.547 5.975 5.975 0 0 1-2.133-1.001A3.75 3.75 0 0 0 12 18Z" />
                  </svg>
                </div>
                <div class="flex-grow pl-4">
                  <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">Passo 2</h2>
                  <p class="leading-relaxed">Aguardando a preparação do seu pedido.</p>
                </div>
              </div>

              <div class="flex relative pb-12">
                <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                  <div class="h-full w-1 <?= $orderColor['step3']['lineColor'] ?> pointer-events-none"></div>
                </div>
                <div class="flex-shrink-0 w-10 h-10 rounded-full <?= $orderColor['step3']['iconColor'] ?> inline-flex items-center justify-center text-white relative z-10">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0-3-3m3 3 3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                  </svg>
                </div>
                <div class="flex-grow pl-4">
                  <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">Passo 3</h2>
                  <p class="leading-relaxed">Aguardando o motoboy coletar o seu pedido.</p>
                </div>
              </div>

              <div class="flex relative pb-12">
                <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                  <div class="h-full w-1 <?= $orderColor['step4']['lineColor'] ?> pointer-events-none"></div>
                </div>
                <div class="flex-shrink-0 w-10 h-10 rounded-full <?= $orderColor['step4']['iconColor'] ?> inline-flex items-center justify-center text-white relative z-10">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                  </svg>
                </div>
                <div class="flex-grow pl-4">
                  <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">Passo 4</h2>
                  <p class="leading-relaxed">Pedido em trânsito.</p>
                </div>
              </div>

              <div class="flex relative">
                <div class="flex-shrink-0 w-10 h-10 rounded-full <?= $orderColor['step5']['iconColor'] ?> inline-flex items-center justify-center text-white relative z-10">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                  </svg>
                </div>
                <div class="flex-grow pl-4">
                  <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">Concluído</h2>
                  <p class="leading-relaxed">Seu pedido chegou até você com sucesso.</p>
                </div>
              </div>
              
            </div>
            <!-- <img class="lg:w-3/5 md:w-1/2 object-cover object-center rounded-lg md:mt-0 mt-12" src="https://dummyimage.com/1200x500" alt="step"> -->
            <div class="flex flex-col bg-yellow-100 p-5 mt-10 lg:justify-start md:justify-center gap-3">
              <div>
                  <h1 class="font-bold text-2xl">Detalhes do Pedido</h1>
              </div>
              <div>
                  <h1 class="text-1xl">Cliente: <?= $arOrder[0]->order_client_name ?></h1>
              </div>
              <div>
                  <h2 class="text-1xl">Forma de pagamento: <?= $arOrder[0]->order_payment_method->description() ?></h1>
              </div>
              <div class="mb-5">
                  <h2 class="text-1xl">Total: R$ <?= Currency::convertCentsToReal($arOrder[0]->order_value_total) ?></h1>
              </div>

              <div>
                  <h1 class="font-bold text-1xl">Pedido:</h1>
              </div>
              
              @foreach($arOrder[0]['orderProducts'] as $item)
                <div>
                    <h2 class="text-1xl">
                      <span><?= $item->order_product_quantity ?></span> -
                      <span><?= $item->products->product_name ?></span> -
                      R$ <span>
                        <?= Currency::convertCentsToReal(
                          ($item->order_product_value*$item->order_product_quantity)
                        ) ?>
                      </span>
                    </h1>
                </div> 
              @endforeach
             </div>
          </div>
      </div>
    
    </section>
       
        @vite([
            'resources/js/utils/inputMask.js'
        ])
    </body>
    
</html>
