const phoneInputs = document.querySelectorAll('.phone_mask');
const timeInputs = document.querySelectorAll('.time_mask');
const hourInputs = document.querySelectorAll('.hour_mask');

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

hourInputs.forEach((input) => {
  input.addEventListener('input', () => {
    input.value = input.value.replace(/[^0-9]/g, '');
  });

  input.addEventListener('blur', () => {
    const hour = input.value;
    if (hour !== '') {
      const formattedHour = hour + ' Hrs';
      input.value = formattedHour;
    }
  });
});