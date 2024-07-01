<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Novo Produto') }}
        </h2>
    </x-slot>
    <form action="">
        <div class="flex
                    flex-col
                    gap-4
                    w-full
                    h-full
                    p-5">
            @csrf

            <div class="w-full 
                bg-gray-200
                p-2
                rounded-lg">
                <x-primary-button type="button"
                    id="btnStore">
                    {{ __('Gravar') }}
                </x-primary-button>

                <x-danger-button type="button"
                    id="btnCancel">
                    {{ __('Cancelar') }}
                </x-danger-button>
            </div>

            <div class="w-full 
                bg-gray-200
                p-2
                rounded-lg">

                <div class="flex gap-4">

                    <div class="flex-1">
                        <x-input-label for="product_name" 
                            :value="__('Nome')"/>
                        <x-text-input id="product_name" 
                            name="product_name" 
                            type="text" 
                            class="mt-1 block w-full" 
                            autocomplete="current-password"
                            placeholder="Nome do produto" />
                    </div>

                    <div class="w-80">
                        <x-input-label for="product_price" 
                            :value="__('Preço')"/>
                        <x-text-input id="product_price" 
                            name="product_price" 
                            type="text" 
                            class="mt-1 block w-full" 
                            autocomplete="current-password"
                            placeholder="Valor do produto"
                            onkeyup="formatCurrency(this)"/>
                    </div>

                </div>

                <div class="">
                    <x-input-label for="product_description" 
                        :value="__('Descrição')"/>
                    <x-text-area id="product_description" 
                        name="product_description" 
                        type="text" 
                        class="mt-1 block w-full"
                        placeholder="Descrição do produto" />
                </div>

                <div class="mt-3">
                    <label for="product_active" 
                        class="inline-flex items-center">
                        <input id="product_active" 
                        type="checkbox" 
                        class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" 
                        name="product_active"
                        checked>
                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Ativo') }}</span>
                    </label>
                </div>

            </div>

        </div>
    </form>
    @vite(['resources/js/product/create.js'])
    <script src="{{ asset('plugins/masks.js') }}"></script>
</x-app-layout>
