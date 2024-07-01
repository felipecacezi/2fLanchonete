import axios from "axios";
import Swal from 'sweetalert2';

const elmntName = document.getElementById('product_name');
const elmntActive = document.getElementById('product_active');
const elmntPrice = document.getElementById('product_price');
const elmntDescription = document.getElementById('product_description');
const elmntId = document.getElementById('product_id');
const elmntStore = document.getElementById('btnStore');
const elmntCancel = document.getElementById('btnCancel');

elmntStore.addEventListener('click', ()=>{
    axios.put(
        "/product", 
        {
            'id': elmntId.value,
            'product_name': elmntName.value,
            'product_price': elmntPrice.value,
            'product_description': elmntDescription.value,
            'product_active': elmntActive.checked ? 'a' : 'i',
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
                window.location.href = `/product`;
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
