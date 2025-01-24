import Swal from 'sweetalert2';
import axios from 'axios';

var cart = {
  products: [],
  subtotal: 0,
  details: []
};

document.addEventListener('DOMContentLoaded', () => {


    const elementModalCheckout = document.getElementById('modalCheckout');
    const elementSubTotal = document.getElementById('subtotal');
    const elmntBtnCheckout = document.getElementById('btn-checkout');
    const elementsSubProduct = document.querySelectorAll('.sub-product');
    const elmntPayment = document.getElementById('payment-method');
    const elmntBtnSendOrder = document.getElementById('btn-send-order');
    const elmntBtnClosaModal = document.getElementById('btn-close-modal');
    const elmntZipCode = document.getElementById('client_zipcode');

    //fica escutando os eventos de click do eslementos que possuem a classe sub-product
    for(let i = 0; i < elementsSubProduct.length; i++) {
      elementsSubProduct[i].addEventListener('click', ()=>{subProduct(elementsSubProduct[i], elementSubTotal)}, false);
    }
  
    const elementsAddProduct = document.querySelectorAll('.add-product');
    //fica escutando os eventos de click do eslementos que possuem a classe add-product
    for(let i = 0; i < elementsAddProduct.length; i++) {
      elementsAddProduct[i].addEventListener('click', ()=>{addProduct(elementsAddProduct[i], elementSubTotal)}, false);
    }

    elmntBtnCheckout.addEventListener('click', ()=>{
      openCheckoutModal();
    })

    elmntPayment.addEventListener('change', (element)=>{
      showPaymentModalDiv(element);
    });

    elmntBtnSendOrder.addEventListener('click', ()=>{
      makeOrderWhatsapp();
    });

    elmntBtnClosaModal.addEventListener('click', ()=>{
      closeCheckoutModal();
    });

    elmntZipCode.addEventListener('blur', ()=>{
      autoCompleteAddress();
    });
    
  })

  const makeOrder = (productId, action)=>{
    const elmntProductName = document.getElementById(`product_name_${productId}`);
    const elmntProductPrice = document.getElementById(`product_price_${productId}`);
    const elmntProductQuantity = document.getElementById(`quantity_${productId}`);
    const elmntProductSubtotal = document.getElementById('subtotal');

    let cartObj = {
      productId: productId,
      name: elmntProductName.innerText,
      price: elmntProductPrice.innerText,
      quantity: elmntProductQuantity.value
    }
    
    if (cart.products.length == 0) {      
      cart.products.push(cartObj);
      cart.subtotal = elmntProductSubtotal.innerText;
    }
    
    for(let i=0; i < cart.products.length; i++) {
      if (cart.products[i].productId == productId) {
        cart.products[i].quantity = elmntProductQuantity.value;
        cart.subtotal = elmntProductSubtotal.innerText;

        if (cart.products[i].quantity == 0) {
          cart.products.splice(i, 1);
          i--;
        }
        
      }
    }
    
    if (action == 'add') {
      findAndAddNewItem(productId, cartObj);
    }
  }

  const findAndAddNewItem = (productId, cartObj) => {
    const elmntProductSubtotal = document.getElementById('subtotal');
    const objetoExistente = cart.products.find(
      (product)=>{
        return product.productId == productId
      }
    );
    if (!objetoExistente) {
      cart.products.push(cartObj);
      cart.subtotal = elmntProductSubtotal.innerText;
    }
}
  
  const subProduct = (element, elementSubTotal) => {
      const elementInputId = element.getAttribute('input-id');
      const elementDataId = element.getAttribute('data-id');
      const elementInput = document.getElementById(elementInputId);
      
      if (elementInput.value > 0) {
        document.getElementById(elementInputId).value = parseInt(elementInput.value)-1;
  
          const elementPriceId = element.getAttribute('price-id');    
          const elementPrice = document.getElementById(elementPriceId); 
          let addeddPrice = parseFloat(elementPrice.innerText.replace(',', '.'));
          if (addeddPrice == 0) {
            elementSubTotal.innerText = 0.00;
          } else {
            let subTotal = parseFloat(elementSubTotal.innerText.replace(',', '.')) - addeddPrice;
            elementSubTotal.innerText = subTotal.toFixed(2);
          }
      }

      makeOrder(elementDataId, 'sub');
  }
  
  const addProduct = (element, elementSubTotal) => {
      const elementInputId = element.getAttribute('input-id');
      const elementDataId = element.getAttribute('data-id');
      const elementInput = document.getElementById(elementInputId);   
      document.getElementById(elementInputId).value = parseInt(elementInput.value)+1;  
      const elementPriceId = element.getAttribute('price-id');    
      const elementPrice = document.getElementById(elementPriceId); 
      let productPrice = parseFloat(elementPrice.innerText.replace(',', '.'));
      let subTotal = parseFloat(elementSubTotal.innerText.replace(',', '.'));
      let total = productPrice + subTotal;
      elementSubTotal.innerText = total.toFixed(2);
      makeOrder(elementDataId, 'add');
  }

  const openCheckoutModal = () => {
    if (cart.products.length == 0) {
      Swal.fire({
          title: 'Erro',
          text: `Selecione pelo menos um item para realizar o pedido!`,
          icon: 'error',
          confirmButtonText: 'Fechar'
      })
      return;
    }

    document.getElementById('cardItems').innerText = getCartItems();
    modalCheckout.classList.remove('hidden');    
    modalCheckout.classList.add('flex');
  }

  const makeOrderWhatsapp = async ()=>{

    await storeOrder();

    // let msgWpp = `Olá, gostaria de pedir os seguintes itens:\n\n`;
    // let cartItems = getCartItems();
    // let orderDetails = getOrderDetails();

    // if (!orderDetails) {
    //   return;
    // }

    // msgWpp += cartItems + orderDetails;

    // window.open(`https://api.whatsapp.com/send?phone=${encodeURIComponent('19992440916')}&text=${encodeURIComponent(msgWpp)}`);
  }

  const getCartItems = () => {
    let msgWpp = '';
    const elmntOrderObs = document.getElementById('order_obs');

    for (const key in cart.products) {
      msgWpp += `- ${cart.products[key].name} - R$: ${cart.products[key].price} - Qtd: ${cart.products[key].quantity}\n`;
    }
    msgWpp += `\nObservações: ${elmntOrderObs.value}\n`;
    msgWpp += `\nValor total: R$ ${cart.subtotal}`;

    return msgWpp;
  }

  const storeOrder = () => {

    const elmntRegister = document.getElementById('client_register');
    const elmntName = document.getElementById('client_name');
    const elmntZipCode = document.getElementById('client_zipcode');
    const elmntStreet = document.getElementById('client_street');
    const elmntNumber = document.getElementById('client_number');
    const elmntComplement = document.getElementById('client_complement');
    const elmntDistrict = document.getElementById('client_district');
    const elmntCity = document.getElementById('client_city');
    const elmntState = document.getElementById('client_state');
    const elmntChange = document.getElementById('client_change');  
    const elmntPayment = document.getElementById('payment-method');  
    const elmntReference = document.getElementById('client_reference');
    const elmntWhatsapp = document.getElementById('client_whatsapp');
    const elmntPhone = document.getElementById('client_phone');
    const elmntObs = document.getElementById('order_obs');

    axios.post(
        '/order', 
        {
          'order': {
            'order_client_register': elmntRegister.value,
            'order_client_name': elmntName.value,
            'order_value_total': '',
            'order_value_subtotal': '',
            'order_value_taxes': '',
            'order_payment_method': elmntPayment.value,
            'order_zipcode': elmntZipCode.value,
            'order_street': elmntStreet.value,
            'order_number': elmntNumber.value,
            'order_district': elmntDistrict.value,
            'order_complement': elmntComplement.value,
            'order_address_reference': elmntReference.value,
            'order_city': elmntCity.value,
            'order_state': elmntState.value,
            'order_phone': elmntPhone.value,
            'order_whatsapp': elmntWhatsapp.value,
            'order_obs': elmntObs.value,
            'order_change_value': elmntChange.value
          },
          'products': cart.products
        }, 
        {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }
    )
    .then(response => {      
      closeCheckoutModal();

      Swal.fire({
          title: 'Sucesso',
          text: `${response.data.msg}`,
          icon: 'success',
          confirmButtonText: 'Fechar',
          confirmButtonColor: "#1f2937",
      }).then((result) => {
        if (result.isConfirmed) {
          window.open(`${response.data.data.link}`, '_blank');
        } 
      }); 
    })
    .catch(error => {
        Swal.fire({
            title: 'Erro',
            text: error.response?.data.message,
            icon: 'error',
            confirmButtonText: 'Fechar'
        })
    });
  }

  const getOrderDetails = () => {
    const elmntZipCode = document.getElementById('client_zipcode');
    const elmntAddress = document.getElementById('client_street');
    const elmntNumber = document.getElementById('client_number');
    const elmntComplement = document.getElementById('client_complement');
    const elmntDistrict = document.getElementById('client_district');
    const elmntCity = document.getElementById('client_city');
    const elmntState = document.getElementById('client_state');
    const elmntChange = document.getElementById('client_change');  
    const elmntPayment = document.getElementById('payment-method');  
    const elmntReference = document.getElementById('client_reference');

    if (
      !elmntZipCode.value 
      || !elmntAddress.value 
      || !elmntNumber.value 
      || !elmntDistrict.value 
      || !elmntCity.value 
      || !elmntState.value
    ) {
      Swal.fire({
        title: 'Erro',
        text: `Preencha os dados de endereço para realizar o pedido!`,
        icon: 'error',
        confirmButtonText: 'Fechar'
      })
      return false;
    }

    let paymentMethod = elmntPayment.value;
    let paymentChange = elmntChange.value;

    if (paymentMethod == 0) {
      Swal.fire({
        title: 'Erro',
        text: `Preencha a forma de pagamento!`,
        icon: 'error',
        confirmButtonText: 'Fechar'
      })
      return false;
    }

    if (paymentMethod == 'D' && !paymentChange) {
      Swal.fire({
        title: 'Erro',
        text: `Preencha quanto de troco irá precisar, caso não precise coloque o valor zero!`,
        icon: 'error',
        confirmButtonText: 'Fechar'
      })
      return false;
    }

    if (parseInt(paymentChange) == 0) {
      paymentChange = 'Nenhum';
    }

    switch (paymentMethod) {
      case 'D':
        paymentMethod = 'Dinheiro';
      break;
      case 'C':
        paymentMethod = 'Cartão (Crédito/Débito)';
      break;
      case 'P':
        paymentMethod = 'Pix';
      break;    
      default:
        paymentMethod = '';
      break;
    }

    let msgWpp = '';
    msgWpp += `\n\n------ENDEREÇO------\nCEP: ${elmntZipCode.value}\n`;
    msgWpp += `Endereço: ${elmntAddress.value}, ${elmntNumber.value} - ${elmntComplement.value}\n`;
    msgWpp += `${elmntDistrict.value} - ${elmntCity.value} - ${elmntState.value}\n`;
    msgWpp += `Ponto de referência: ${elmntReference.value}\n\n`;
    msgWpp += `--------PAGAMENTO-------\nForma de pagamento: ${paymentMethod}\n`;
    msgWpp += `Troco para: ${paymentChange}\n\n`;
    return msgWpp;
  }

  function showPaymentModalDiv(element) {
    const divs = document.getElementsByClassName('div-method-payment');
    for (var i = 0; i < divs.length; i++) {
      divs[i].classList.add('hidden');
    }
    let divName = element.target.value;
    document.getElementById(`div-${divName}`).classList.remove('hidden');
    document.getElementById(`div-${divName}`).classList.add('flex');
  }

  const closeCheckoutModal = () => {

    const elmntZipCode = document.getElementById('client_zipcode');
    const elmntAddress = document.getElementById('client_street');
    const elmntNumber = document.getElementById('client_number');
    const elmntComplement = document.getElementById('client_complement');
    const elmntDistrict = document.getElementById('client_district');
    const elmntCity = document.getElementById('client_city');
    const elmntState = document.getElementById('client_state');
    const elmntChange = document.getElementById('client_change');  
    const elmntPayment = document.getElementById('payment-method');  
    const elmntReference = document.getElementById('client_reference');
    const elmntQuantityInputs = document.querySelectorAll('.products-quantity');
    const elmntObservation = document.getElementById('order_obs');
    const elmntSubtotal = document.getElementById('subtotal');
    
    elmntZipCode.value = '';
    elmntAddress.value = '';
    elmntNumber.value = '';
    elmntComplement.value = '';
    elmntDistrict.value = '';
    elmntCity.value = '';
    elmntState.value = '';
    elmntChange.value = '';
    elmntPayment.value = '0';
    elmntReference.value = '';
    elmntObservation.value = '';
    elmntSubtotal.innerHTML = '0,00';
    cart = {
      products: [],
      subtotal: 0,
      details: []
    }

    const divs = document.getElementsByClassName('div-method-payment');
    for (var i = 0; i < divs.length; i++) {
      divs[i].classList.add('hidden');
    }

    elmntQuantityInputs.forEach(input => {
      input.value = 0;
    });

    document.getElementById('cardItems').innerText = '';

    modalCheckout.classList.add('hidden');
    modalCheckout.classList.remove('flex');
  }

  const autoCompleteAddress = async () => {
    const elmntZipCode = document.getElementById('client_zipcode');
    const elmntAddress = document.getElementById('client_street');
    const elmntNumber = document.getElementById('client_number');
    const elmntComplement = document.getElementById('client_complement');
    const elmntDistrict = document.getElementById('client_district');
    const elmntCity = document.getElementById('client_city');
    const elmntState = document.getElementById('client_state');

    try {
      const response = await axios.get(`https://viacep.com.br/ws/${elmntZipCode.value}/json/`);
      const address = response.data;
      elmntAddress.value = address.logradouro ?? '';
      elmntNumber.value = address.complemento ?? '';
      elmntComplement.value = address.complemento ?? '';
      elmntDistrict.value = address.bairro ?? '';
      elmntCity.value = address.localidade ?? '';
      elmntState.value = address.uf ?? '';
    } catch (error) {
      return false;
    }
  }