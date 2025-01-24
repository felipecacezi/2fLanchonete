import axios from "axios";
import Swal from 'sweetalert2';

const elements = document.querySelectorAll('.btnAccept');

elements.forEach(element => {
    element.addEventListener('click', function() {
        const orderId = this.getAttribute('data-order');
        acceptOrder(orderId);
    });
});

const acceptOrder = async (orderId) => {
    await axios.put(`/order/accept`,
        {
            id: orderId,
            order_status: 'A'
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
}



(async function() {
  

    
})();