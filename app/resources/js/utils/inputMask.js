const phoneInputs = document.querySelectorAll('.phone_mask');
const timeInputs = document.querySelectorAll('.time_mask');
const cpfInputs = document.querySelectorAll('.cpf_mask');

timeInputs.forEach((input) => {
  input.addEventListener('input', () => {
    const time = input.value;
    const timeRegex = /^\d{0,4}$/;
    const timeMask = '00:00';

    if (timeRegex.test(time) && time.length <= timeMask.length) {
      const formattedTime = time.replace(/(\d{2})(\d{2})/, '$1:$2');
      input.value = formattedTime;
    } else if (input.value.length > timeMask.length) {
      input.value = input.value.slice(0, timeMask.length);
    }
  });
});

phoneInputs.forEach((input) => {
  input.addEventListener('input', () => {
    const phoneNumber = input.value;
    const phoneRegex = /^\d{0,11}$/;
    const phoneMask = '(00)000000000';

    if (phoneRegex.test(phoneNumber) && phoneNumber.length <= phoneMask.length) {
      const formattedPhoneNumber = phoneNumber.replace(/(\d{2})(\d{4})(\d{4})/, '($1)$2$3');
      input.value = formattedPhoneNumber;
    } else if (input.value.length > phoneMask.length) {
      input.value = input.value.slice(0, phoneMask.length);
    }
  });
});

cpfInputs.forEach((input) => {
  input.addEventListener('input', () => {
    const cpf = input.value;
    const cpfRegex = /^\d{0,14}$/;
    const cpfMask = '000.000.000-00';

    if (cpfRegex.test(cpf) && cpf.length <= cpfMask.length) {
      const formattedCpf = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
      input.value = formattedCpf;
    } else if (input.value.length > cpfMask.length) {
      input.value = input.value.slice(0, cpfMask.length);
    }
  });
});