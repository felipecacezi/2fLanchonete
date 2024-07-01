import DataTable from 'datatables.net-dt';
import axios from 'axios';
import Swal from 'sweetalert2';

const  handleNewProduct = ()=>{
    window.location.href = '/product/create';
}

document.addEventListener("DOMContentLoaded", function(event) {

    let table = new DataTable('#myTable', {
        ajax: {
            url: '/datatable/product',
            dataSrc: '',
        },
        columns: [
            { data: 'id' },
            { data: 'product_name' },
            { data: 'product_active' },
            {
                data: null,
                className: 'dt-center editor-edit',
                render: ( data, type, row ) => {
                    return `<button type='button'
                                data-id='${data.id}'
                                class='table-edit-button inline-flex items-center
                                    px-4 py-2 bg-gray-800 dark:bg-gray-200 border 
                                    border-transparent rounded-md font-semibold text-xs 
                                    text-white dark:text-gray-800 uppercase tracking-widest 
                                    hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 
                                    dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 
                                    focus:outline-none focus:ring-2 focus:ring-indigo-500 
                                    focus:ring-offset-2 dark:focus:ring-offset-gray-800 
                                    transition ease-in-out duration-150'> 
                                Editar 
                            </button>`;
                },
                orderable: false
            },
            {
                data: null,
                className: 'dt-center editor-delete',
                render: ( data, type, row ) => {
                    return `<button type='button'
                                data-id='${data.id}'
                                class='table-edit-button inline-flex items-center px-4 py-2 bg-red-600
                                    border border-transparent rounded-md font-semibold text-xs text-white 
                                    uppercase tracking-widest hover:bg-red-500 active:bg-red-700 
                                    focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 
                                    dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'> 
                                Inativar 
                            </button>`;
                },
                orderable: false
            }
        ],
    });

    // Edit record
    table.on('click', 'td.editor-edit button', function (e) {
        const categoryId = e.currentTarget.getAttribute('data-id');
        window.location.href = `/product/${categoryId}/edit`;        
    });
    
    // Delete a record
    table.on('click', 'td.editor-delete button', function (e) {
        const categoryId = e.currentTarget.getAttribute('data-id');
        axios.delete('/product/' + categoryId +'/destroy')
            .then(response => {
                table.ajax.reload(null, false);
                Swal.fire({
                    title: 'Sucesso',
                    text: response.data.msg,
                    icon: 'success',
                    confirmButtonText: 'Fechar',
                    confirmButtonColor: "#1f2937",
                })        
            })
            .catch(error => {
                Swal.fire({
                    title: 'Erro',
                    text: error.response.data.message,
                    icon: 'error',
                    confirmButtonText: 'Fechar'
                })
            });
    });

    document.getElementById('btnNewProduct').addEventListener('click', handleNewProduct);

});