<x-app-layout>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cardápio') }}
        </h2>
    </x-slot>

        <div class="w-full">
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
                </div>

                <div class="w-full 
                    bg-gray-200
                    p-2
                    rounded-lg">

                    <div class="">
                        <x-input-label for="menuconf_title" 
                            :value="__('Titulo')"/>
                        <x-text-input id="menuconf_title" 
                            name="menuconf_title" 
                            type="text" 
                            class="mt-1 block w-full" 
                            autocomplete="current-password"
                            placeholder="Titulo" 
                            value="{{ $configs->menuconf_title }}"/>
                    </div>

                    <div class="">
                        <x-input-label for="menuconf_description" 
                            :value="__('Descrição')"/>
                        <x-text-area id="menuconf_description" 
                            name="menuconf_description" 
                            type="text" 
                            class="mt-1 block w-full" 
                            autocomplete="current-password"
                            placeholder="Descrição">
                            <x-slot:teste>{{ $configs->menuconf_description }}</x-slot>
                        </x-text-area>
                    </div>

                    <div class="flex grid grid-cols-5 gap-4">

                        <div class="">
                            <x-input-label for="menuconf_open" 
                                :value="__('Horário abertura')"/>
                            <x-text-input id="menuconf_open" 
                                name="menuconf_open" 
                                type="text" 
                                class="mt-1 block w-full" 
                                autocomplete="current-password"
                                placeholder="Horário abertura" 
                                value="{{ $configs->menuconf_open }}"/>
                        </div>

                        <div class="">
                            <x-input-label for="menuconf_lunch" 
                                :value="__('Horário almoço')"/>
                            <x-text-input id="menuconf_lunch" 
                                name="menuconf_lunch" 
                                type="text" 
                                class="mt-1 block w-full" 
                                autocomplete="current-password"
                                placeholder="Fechamento almoço" 
                                value="{{ $configs->menuconf_lunch }}"/>
                        </div>

                        <div class="">
                            <x-input-label for="menuconf_reopen" 
                                :value="__('Horário reabertura')"/>
                            <x-text-input id="menuconf_reopen" 
                                name="menuconf_reopen" 
                                type="text" 
                                class="mt-1 block w-full" 
                                autocomplete="current-password"
                                placeholder="Horário reabertura" 
                                value="{{ $configs->menuconf_reopen }}"/>
                        </div>

                        <div class="">
                            <x-input-label for="menuconf_close" 
                                :value="__('Horário fechamento')"/>
                            <x-text-input id="menuconf_close" 
                                name="menuconf_close" 
                                type="text" 
                                class="mt-1 block w-full" 
                                autocomplete="current-password"
                                placeholder="Horário fechamento" 
                                value="{{ $configs->menuconf_close }}"/>
                        </div>

                        <div class="">
                            <x-input-label for="menuconf_wait_time" 
                                :value="__('Tempo de espera')"/>
                            <x-text-input id="menuconf_wait_time" 
                                name="menuconf_wait_time" 
                                type="text" 
                                class="mt-1 block w-full" 
                                autocomplete="current-password"
                                placeholder="Tempo de espera"
                                value="{{ $configs->menuconf_wait_time }}"/>
                        </div>

                    </div>

                </div>

            </div>
        </form>
        </div>
        

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    @vite([
        'resources/js/menu/menuConfig.js'
    ])
</x-app-layout>
