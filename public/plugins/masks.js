function formatCurrency(input) {  
  // Remove tudo que não for número
  let value = input.value.replace(/\D/g, '');  
  // Formata o valor em R$
  if (value.length > 2) {
    value = value.slice(0, -2) + "," + value.slice(-2);
  } else if (value.length === 2) {
    value = value;
  } else {
    value = value;
  }  
  input.value = value;
}