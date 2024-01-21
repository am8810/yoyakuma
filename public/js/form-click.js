const consent_chk = document.querySelector(`#consent-chk`);
const submit_btn = document.querySelector(`button[type=submit]`);

consent_chk.addEventListener('change', () => {
  
  if (consent_chk.checked === true) {
    submit_btn.disabled = false;
  } else {
    submit_btn.disabled = true;
  }

});