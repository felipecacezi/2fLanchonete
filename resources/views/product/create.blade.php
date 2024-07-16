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

                    <input type="hidden" value="{{ tenancy()->tenant->id }}" name="tenant_id" id="tenant_id">

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
                        placeholder="Descrição do produto">
                        <x-slot:teste></x-slot>
                    </x-text-area>
                </div>

                <div>
                    <x-input-label for="product_description" 
                        :value="__('Foto')"/>
                    <div class="flex items-center justify-center w-full">
                        <div id="btnRemoveImg" class="absolute hover:bg-gray-200 hover:rounded-lg hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </div>
                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div id="dropzone-img" class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                            </div>
                            <img id="preview" src="" alt="" class="hidden">
                            <input id="dropzone-file" type="file" class="hidden" />
                        </label>
                    </div> 
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
