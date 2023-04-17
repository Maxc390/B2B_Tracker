const verification = () => {
    let res = document.forms.signup_form;
    let first_name = res.first_name.value;
    let last_name = res.last_name.value;
    let email = res.email.value;
    let phone_number = res.phone_number.value;
    let password = res.password.value;
    let confirm_password = res.confirm_password.value;
    if (
      first_name != null &&
      last_name != null &&
      password.length >= 6 &&
      password === confirm_password
    ) {
      console.log("Passsword is correct");
    } else {
      console.log("Passsword is incorrect");
    }
  };
  const password_verification = () => {};