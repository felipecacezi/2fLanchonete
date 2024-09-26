const inputZipcode = document.querySelector('.zipcode_auto');
const elmntStreet = document.querySelector('.zipcode_street');
const elmntDistrict = document.querySelector('.zipcode_district');
const elmntCity = document.querySelector('.zipcode_city');
const elmntState = document.querySelector('.zipcode_state');

inputZipcode.addEventListener('blur', () => {
  const zipcode = inputZipcode.value.trim();
  const regexZipcode = /^[0-9]{8}$/;

  if (regexZipcode.test(zipcode)) {
    const url = `https://viacep.com.br/ws/${zipcode}/json/`;
    fetch(url)
        .then(response => response.json())
        .then((data) => {
            elmntStreet.value = data.logradouro ?? '';
            elmntDistrict.value = data.bairro ?? '';
            elmntCity.value = data.localidade ?? '';
            elmntState.value = data.uf ?? '';
        })
        .catch(error => console.error(error));
  } else {
    console.error('CEP inválido');
  }
});