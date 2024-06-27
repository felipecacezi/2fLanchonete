<x-app-layout>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categorias') }}
        </h2>
    </x-slot>

    <div class="flex flex-col p-5 gap-5">

        <div class="w-full">
            <x-primary-button type="button"
                id="btnNewCategory">
                {{ __('Novo') }}
            </x-primary-button>
        </div>
        
        <div class="w-full">
            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <th class="w-1">#</th>
                        <th>Nome</th>
                        <th>Ativo</th>
                        <th class="w-1">Editar</th>
                        <th class="w-1">Excluir</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    @vite([
        'resources/js/category/list.js'
    ])
</x-app-layout>
