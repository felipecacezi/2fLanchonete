import axios from "axios";
import Swal from 'sweetalert2';

const elmntStore = document.getElementById('btnStore');
const elmntTitle = document.getElementById('menuconf_title');
const elmntDescription = document.getElementById('menuconf_description');
const elmntOpen = document.getElementById('menuconf_open');
const elmntLunch = document.getElementById('menuconf_lunch');
const elmntReopen = document.getElementById('menuconf_reopen');
const elmntClose = document.getElementById('menuconf_close');
const elmntWaitTime = document.getElementById('menuconf_wait_time');

const elmntContactPhone = document.getElementById('menuconf_contactphone');
const elmntWhatsappNumber = document.getElementById('menuconf_whatsappnumber');

const elmntZipCode = document.getElementById('menuconf_zipcode');
const elmntStreet = document.getElementById('menuconf_street');
const elmntDistrict = document.getElementById('menuconf_district');
const elmntCity = document.getElementById('menuconf_city');
const elmntState = document.getElementById('menuconf_state');
const elmntNumber = document.getElementById('menuconf_number');

const elmntTenant = document.getElementById('tenant_id');
const elmntFileId = document.getElementById('file_id');

const elmntFile = document.getElementById('dropzone-file');
const elmntDropzone = document.getElementById('dropzone-img');
const elmntPreview = document.getElementById('preview');
const elmntRemoveImg = document.getElementById('btnRemoveImg');


elmntStore.addEventListener('click', ()=>{
    axios.put(
        "/menuConfig", 
        {
            'menuconf_title': elmntTitle.value,
            'menuconf_description': elmntDescription.value,
            'menuconf_open': elmntOpen.value,
            'menuconf_lunch': elmntLunch.value,
            'menuconf_reopen': elmntReopen.value,
            'menuconf_close': elmntClose.value,
            'menuconf_wait_time': elmntWaitTime.value,
            'menuconf_contactphone': elmntContactPhone.value,
            'menuconf_whatsappnumber': elmntWhatsappNumber.value,
            'menuconf_zipcode': elmntZipCode.value,
            'menuconf_street': elmntStreet.value,
            'menuconf_district': elmntDistrict.value,
            'menuconf_city': elmntCity.value,
            'menuconf_state': elmntState.value,
            'menuconf_number': elmntNumber.value,
            'file_id': elmntFileId.value
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
            // if (ret.isConfirmed) {
            //     window.location.href = `/category`;
            // }
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

const loadProductImage = ()=>{
    if (!elmntFileId.value) {
        elmntFile.setAttribute('data-id', '');
        elmntFile.setAttribute('data-path', '');
        elmntDropzone.classList.remove('hidden');
        elmntPreview.classList.add('hidden');          
        elmntRemoveImg.classList.add('hidden');   
        elmntPreview.setAttribute('src', '');
        return false;
    }
    axios.get(
        `/file/${elmntFileId.value}`, 
        {
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        }
    ).then((response) => {
        const data = response.data;
        if (data) {
            elmntPreview.setAttribute('src', data);
        } else {
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

const handleRemoveImg = ()=>{
    axios.delete(
        `/file/${elmntFileId.value}`, 
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
            elmntFileId.value = data.fileId;
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

document.addEventListener("DOMContentLoaded", () => {
    loadProductImage();

    elmntRemoveImg.addEventListener('click', ()=>{
        handleRemoveImg();
    })
});