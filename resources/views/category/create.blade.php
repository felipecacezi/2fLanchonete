﻿<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nova Categoria') }}
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

                <div class="">
                    <x-input-label for="category_name" 
                        :value="__('Nome')"/>
                    <x-text-input id="category_name" 
                        name="category_name" 
                        type="text" 
                        class="mt-1 block w-full" 
                        autocomplete="current-password"
                        placeholder="Nome da categoria" />
                </div>

                <div class="mt-3">
                    <label for="category_active" 
                        class="inline-flex items-center">
                        <input id="category_active" 
                        type="checkbox" 
                        class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" 
                        name="category_active"
                        checked>
                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Ativo') }}</span>
                    </label>
                </div>

            </div>

        </div>
    </form>
    @vite('resources/js/category/create.js')
</x-app-layout>
