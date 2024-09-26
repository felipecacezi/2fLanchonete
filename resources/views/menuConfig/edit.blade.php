<x-app-layout>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cardápio') }}
        </h2>
    </x-slot>

    <input type="hidden" value="{{ tenancy()->tenant->id }}" name="tenant_id" id="tenant_id">
    <input type="hidden" name="file_id" id="file_id" value="{{ $configs['file_id'] ?? '' }}">

        <div class="w-full">
            <!-- <form action=""> -->
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
                </div>

                <div class="w-full 
                    bg-gray-200
                    p-2
                    rounded-lg">
                    
                    <div class="mb-3">
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Informações básicas</h2>
                    </div>

                    <div class="flex flex-col lg:flex-row lg:grid lg:grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="product_description" 
                                :value="__('Foto')"/>
                            <div class="flex items-center justify-center w-full">                        
                                <div id="btnRemoveImg" class="absolute hover:bg-gray-200 hover:rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                </div>
                                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div id="dropzone-img" class="flex flex-col items-center justify-center pt-5 pb-6 hidden">
                                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                    </div>
                                    <img id="preview" src="" alt="" class="w-70 h-70 object-cover overflow-hidden">
                                    <input id="dropzone-file" type="file" class="hidden" />
                                </label>
                            </div> 
                        </div>
                        
                        <div class="flex flex-col gap-4">
                            <div class="">
                                <x-input-label for="menuconf_title" 
                                    :value="__('Nome do estabelecimento')"/>
                                <x-text-input id="menuconf_title" 
                                    name="menuconf_title" 
                                    type="text" 
                                    class="mt-1 block w-full" 
                                    autocomplete="current-password"
                                    placeholder="Nome do estabelecimento" 
                                    value="{{ $configs->menuconf_title ?? '' }}"/>
                            </div>       
                            
                            <div class="">
                                <x-input-label for="menuconf_description" 
                                    :value="__('Descrição')"/>
                                <x-text-area id="menuconf_description" 
                                    name="menuconf_description" 
                                    type="text" 
                                    class="mt-1 block w-full" 
                                    autocomplete="current-password"
                                    placeholder="Descrição"
                                    rows="10">
                                    <x-slot:teste>{{ $configs->menuconf_description ?? '' }}</x-slot>
                                </x-text-area>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="w-full 
                    bg-gray-200
                    p-2
                    rounded-lg">
                    
                    <div class="mb-3">
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Localização</h2>
                    </div>

                    <div class="flex flex-col md:grid md:grid-cols-4 md:gap-4">

                        <div class="md:mt-0 mt-4">
                            <x-input-label for="menuconf_zipcode" 
                                :value="__('CEP')"/>
                            <x-text-input id="menuconf_zipcode" 
                                name="menuconf_zipcode" 
                                type="text" 
                                class="mt-1 block w-full zipcode_auto" 
                                autocomplete="current-password"
                                placeholder="CEP"
                                value="{{ $configs->menuconf_zipcode ?? '' }}"/>
                        </div>

                        <div class="md:mt-0 mt-4 md:col-span-3">
                            <x-input-label for="menuconf_street" 
                                :value="__('Rua')"/>
                            <x-text-input id="menuconf_street" 
                                name="menuconf_street" 
                                type="text" 
                                class="mt-1 block w-full zipcode_street" 
                                autocomplete="current-password"
                                placeholder="Rua"
                                value="{{ $configs->menuconf_street ?? '' }}"/>
                        </div>

                        <div class="md:mt-0 mt-4">
                            <x-input-label for="menuconf_district" 
                                :value="__('Bairro')"/>
                            <x-text-input id="menuconf_district" 
                                name="menuconf_district" 
                                type="text" 
                                class="mt-1 block w-full zipcode_district" 
                                autocomplete="current-password"
                                placeholder="Bairro"
                                value="{{ $configs->menuconf_district ?? '' }}"/>
                        </div>

                        <div class="md:mt-0 mt-4">
                            <x-input-label for="menuconf_city" 
                                :value="__('Cidade')"/>
                            <x-text-input id="menuconf_city" 
                                name="menuconf_city" 
                                type="text" 
                                class="mt-1 block w-full zipcode_city" 
                                autocomplete="current-password"
                                placeholder="Cidade"
                                value="{{ $configs->menuconf_city ?? '' }}"/>
                        </div>

                        <div class="md:mt-0 mt-4">
                            <x-input-label for="menuconf_state" 
                                :value="__('Estado')"/>
                            <x-text-input id="menuconf_state" 
                                name="menuconf_state" 
                                type="text" 
                                class="mt-1 block w-full zipcode_state" 
                                autocomplete="current-password"
                                placeholder="Estado"
                                value="{{ $configs->menuconf_state ?? '' }}"/>
                        </div>

                        <div class="md:mt-0 mt-4">
                            <x-input-label for="menuconf_number" 
                                :value="__('Número')"/>
                            <x-text-input id="menuconf_number" 
                                name="menuconf_number" 
                                type="text" 
                                class="mt-1 block w-full" 
                                autocomplete="current-password"
                                placeholder="Número"
                                value="{{ $configs->menuconf_number ?? '' }}"/>
                        </div>

                    </div>

                </div>

                <div class="w-full 
                    bg-gray-200
                    p-2
                    rounded-lg">
                    
                    <div class="mb-3">
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Contato</h2>
                    </div>

                    <div class="flex flex-col md:grid md:grid-cols-4 md:gap-4">
                        <div class="md:mt-0 mt-4 md:col-span-2">
                            <x-input-label for="menuconf_contactphone" 
                                :value="__('Telefone de contato')"/>
                            <x-text-input id="menuconf_contactphone" 
                                name="menuconf_contactphone" 
                                type="text" 
                                class="mt-1 block w-full phone_mask" 
                                autocomplete="current-password"
                                placeholder="Telefone de Contato"
                                value="{{ $configs->menuconf_contactphone ?? '' }}"/>
                        </div>

                        <div class="md:mt-0 mt-4 md:col-span-2">
                            <x-input-label for="menuconf_whatsappnumber" 
                                :value="__('Número de whatsapp')"/>
                            <x-text-input id="menuconf_whatsappnumber" 
                                name="menuconf_whatsappnumber" 
                                type="text" 
                                class="mt-1 block w-full phone_mask" 
                                autocomplete="current-password"
                                placeholder="Número de whatsapp"
                                value="{{ $configs->menuconf_whatsappnumber ?? '' }}"/>
                        </div>
                    </div>

                </div>

                <div class="w-full 
                    bg-gray-200
                    p-2
                    rounded-lg">
                    
                    <div class="mb-3">
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Horário de funcionamento</h2>
                    </div>

                    <div class="flex flex-col md:grid md:grid-cols-4 md:gap-4">
                        <!-- Campo 1 -->
                        <div class="md:w-full">
                            <x-input-label for="menuconf_open" 
                                :value="__('Horário abertura')"/>
                            <x-text-input id="menuconf_open" 
                                name="menuconf_open" 
                                type="text" 
                                class="mt-1 block w-full time_mask" 
                                autocomplete="current-password"
                                placeholder="Horário abertura" 
                                value="{{ $configs->menuconf_open ?? '' }}"/>
                        </div>

                        <!-- Campo 2 -->
                        <div class="md:w-full">
                            <x-input-label for="menuconf_lunch" 
                                :value="__('Horário almoço')"/>
                            <x-text-input id="menuconf_lunch" 
                                name="menuconf_lunch" 
                                type="text" 
                                class="mt-1 block w-full time_mask" 
                                autocomplete="current-password"
                                placeholder="Fechamento almoço" 
                                value="{{ $configs->menuconf_lunch ?? '' }}"/>
                        </div>

                        <!-- Campo 3 -->
                        <div class="md:w-full">
                            <x-input-label for="menuconf_reopen" 
                                :value="__('Horário reabertura')"/>
                            <x-text-input id="menuconf_reopen" 
                                name="menuconf_reopen" 
                                type="text" 
                                class="mt-1 block w-full time_mask" 
                                autocomplete="current-password"
                                placeholder="Horário reabertura" 
                                value="{{ $configs->menuconf_reopen ?? '' }}"/>
                        </div>

                        <!-- Campo 4 -->
                        <div class="md:w-full">
                            <x-input-label for="menuconf_close" 
                                :value="__('Horário fechamento')"/>
                            <x-text-input id="menuconf_close" 
                                name="menuconf_close" 
                                type="text" 
                                class="mt-1 block w-full time_mask" 
                                autocomplete="current-password"
                                placeholder="Horário fechamento" 
                                value="{{ $configs->menuconf_close ?? '' }}"/>
                        </div>                        
                    </div>

                </div>

                <div class="w-full 
                    bg-gray-200
                    p-2
                    rounded-lg">
                    
                    <div class="mb-3">
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Tempo de espera</h2>
                    </div>

                    <!-- Campo 5 -->
                    <div class="flex flex-col md:grid md:grid-cols-4 md:gap-4">
                        <div class="md:mt-0 mt-4">
                            <x-input-label for="menuconf_wait_time" 
                                :value="__('Tempo de espera')"/>
                            <x-text-input id="menuconf_wait_time" 
                                name="menuconf_wait_time" 
                                type="text" 
                                class="mt-1 block w-full hour_mask" 
                                autocomplete="current-password"
                                placeholder="Tempo de espera"
                                value="{{ $configs->menuconf_wait_time ?? '' }}"/>
                        </div>
                    </div>
                    
                </div>

            </div>
        <!-- </form> -->
        </div>
        

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    @vite([
        'resources/js/menu/menuConfig.js',
        'resources/js/utils/autocompleteAddress.js',
        'resources/js/utils/inputMask.js'
    ])
</x-app-layout>
