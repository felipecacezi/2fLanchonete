document.addEventListener('DOMContentLoaded', () => {

    this.cart = {
      products: [],
      subtotal: 0,
    };

    const elementSubTotal = document.getElementById('subtotal');
    const elmntBtnMakeOrderWhatsapp = document.getElementById('btn-make-order-wpp');
    const elementsSubProduct = document.querySelectorAll('.sub-product');
    //fica escutando os eventos de click do eslementos que possuem a classe sub-product
    for(let i = 0; i < elementsSubProduct.length; i++) {
      elementsSubProduct[i].addEventListener('click', ()=>{subProduct(elementsSubProduct[i], elementSubTotal)}, false);
    }
  
    const elementsAddProduct = document.querySelectorAll('.add-product');
    //fica escutando os eventos de click do eslementos que possuem a classe add-product
    for(let i = 0; i < elementsAddProduct.length; i++) {
      elementsAddProduct[i].addEventListener('click', ()=>{addProduct(elementsAddProduct[i], elementSubTotal)}, false);
    }

    elmntBtnMakeOrderWhatsapp.addEventListener('click', ()=>{
      makeOrderWhatsapp();
    })
    
  })

  const makeOrder = (productId)=>{
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

    if (this.cart.products.length == 0) {      
      this.cart.products.push(cartObj);
      this.cart.subtotal = elmntProductSubtotal.innerText;
    }
    
    for(let i=0; i < this.cart.products.length; i++) {
      if (this.cart.products[i].productId == productId) {
        this.cart.products[i].quantity = elmntProductQuantity.value;
        this.cart.subtotal = elmntProductSubtotal.innerText;
      }
    }

    findAndAddNewItem(productId, cartObj);
  }

  const findAndAddNewItem = (productId, cartObj) => {
    const objetoExistente = this.cart.products.find(
      (product)=>{
        return product.productId == productId
      }
    );
    if (!objetoExistente) {
      this.cart.products.push(cartObj);
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

      makeOrder(elementDataId);
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

      makeOrder(elementDataId);
  }

  const makeOrderWhatsapp = ()=>{
    let msgWpp = `Olá, gostaria de pedir os seguintes itens:\n`;

    for (const key in this.cart.products) {
      msgWpp += `- ${this.cart.products[key].name} - R$: ${this.cart.products[key].price} - Qtd: ${this.cart.products[key].quantity}\n`;
    }

    msgWpp += `\nValor total: R$ ${this.cart.subtotal}`;

    window.open(`https://api.whatsapp.com/send?phone=${encodeURIComponent('19992440916')}&text=${encodeURIComponent(msgWpp)}`);
  }