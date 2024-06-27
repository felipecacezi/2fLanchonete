import axios from "axios";
import Swal from 'sweetalert2';

const elmntName = document.getElementById('category_name');
const elmntActive = document.getElementById('catedory_active');
const elmntId = document.getElementById('category_id');
const elmntStore = document.getElementById('btnStore');
const elmntCancel = document.getElementById('btnCancel');



elmntStore.addEventListener('click', ()=>{
    axios.put(
        "/category", 
        {
            'id': elmntId.value,
            'category_name': elmntName.value,
            'category_active': elmntActive.checked ? 'a' : 'i',
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
    window.location.href = '/category';
});
