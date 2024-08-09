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
    });j
});

document.addEventListener("DOMContentLoaded", function(event) {});