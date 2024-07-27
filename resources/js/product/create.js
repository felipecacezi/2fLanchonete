import axios from "axios";
import Swal from 'sweetalert2';
import autoComplete from "@tarekraafat/autocomplete.js";

const elmntTenant = document.getElementById('tenant_id');
const elmntName = document.getElementById('product_name');
const elmntActive = document.getElementById('product_active');
const elmntPrice = document.getElementById('product_price');
const elmntDescription = document.getElementById('product_description');
const elmntCategoryId = document.getElementById('category_id');

const elmntFile = document.getElementById('dropzone-file');
const elmntDropzone = document.getElementById('dropzone-img');
const elmntPreview = document.getElementById('preview');

const elmntRemoveImg = document.getElementById('btnRemoveImg');

const elmntStore = document.getElementById('btnStore');
const elmntCancel = document.getElementById('btnCancel');

const autoCompleteJS = new autoComplete({
    selector: "#category_id",
    placeHolder: "Pesquise por uma categoria...",
    data: {
        src: async (query) => {
            try {
                const source = await fetch(`/category/autocomplete/${query}`);
                const data = await source.json();
                return data.map((category) => {
                    return {
                        category_name: category.category_name,
                        category_id: category.id
                    };
                });
            } catch (error) {
              return error;
            }
          },
        keys: ["category_name"],
        cache: false,
    },
    resultsList: {
        element: (list, data) => {
            if (!data.results.length) {
                const message = document.createElement("div");
                message.setAttribute("class", "no_result");
                message.innerHTML = `<span>Found No Results for "${data.query}"</span>`;
                list.prepend(message);
            }
        },
        noResults: true,
    },
    resultItem: {
        highlight: true
    },
    events: {
        input: {
            selection: (event) => {
                const selection = event.detail.selection.value;
                autoCompleteJS.input.value = selection.category_name;
                autoCompleteJS.input.setAttribute('data-id', selection.category_id);
            }
        }
    }
});
const handleRemoveImg = ()=>{
    axios.delete(
        `/file/${elmntFile.getAttribute('data-id')}`, 
        {
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        }
    ).then((response) => {
        const data = response.data;
        if (data) {
            elmntFile.setAttribute('data-id', '');
            elmntFile.setAttribute('data-path', '');
            elmntDropzone.classList.remove('hidden');
            elmntPreview.classList.add('hidden');          
            elmntRemoveImg.classList.add('hidden');   
            elmntPreview.setAttribute('src', '');
        }
    }).catch((error) => {
        Swal.fire({
            title: 'Erro',
            text: error.response.data.message,
            icon: 'error',
            confirmButtonText: 'Fechar'
        })
    });
}

elmntFile.addEventListener('change', ()=>{
    const file = elmntFile.files[0];
    
    if (file) {

        const formData = new FormData();
        const reader = new FileReader();
        formData.append('file', file);
        formData.append('tenantId', elmntTenant.value);

        axios.post(
            '/file', 
            formData, 
            {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }
        )
        .then(response => {
            const data = response.data.data;
            elmntFile.setAttribute('data-id', data.fileId);
            elmntFile.setAttribute('data-path', data.filePath);
        })
        .catch(error => {
            Swal.fire({
                title: 'Erro',
                text: error.response.data.message,
                icon: 'error',
                confirmButtonText: 'Fechar'
            })
        });

        reader.onload = function (e) {
            elmntDropzone.classList.add('hidden');
            elmntPreview.setAttribute('src', e.target.result);  
            elmntPreview.classList.remove('hidden');          
            elmntRemoveImg.classList.remove('hidden');   
        };
        reader.readAsDataURL(file);
    }
});

elmntStore.addEventListener('click', ()=>{
    axios.post(
        "/product", 
        {
            'product_name': elmntName.value,
            'product_active': elmntActive.checked ? 'a' : 'i',
            'product_description': elmntDescription.value,
            'product_price': elmntPrice.value,
            'category_id': elmntCategoryId.getAttribute('data-id'),
            'file_id': elmntFile.getAttribute('data-id')
        }, 
        {
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        }
    ).then((response) => {
        Swal.fire({
            title: 'Sucesso',
            text: response.data.msg,
            icon: 'success',
            confirmButtonText: 'Fechar',
            confirmButtonColor: "#1f2937",
        }).then((ret)=>{
            if (ret.isConfirmed) {
                window.location.href = `${response.data.data.product_id}/edit`;
            }
        })   
        
    }).catch((error) => {
        Swal.fire({
            title: 'Erro',
            text: error.response.data.message,
            icon: 'error',
            confirmButtonText: 'Fechar'
        })
    });

});

elmntCancel.addEventListener('click', ()=>{
    window.location.href = '/product';
});

document.addEventListener("DOMContentLoaded", () => {
    elmntRemoveImg.addEventListener('click', ()=>{
        handleRemoveImg();
    })
});