const form = document.getElementById('form');
const email = document.getElementById('email');
const password = document.getElementById('password');
const confirmPassword = document.getElementById('confirmPassword');
const lastName = document.getElementById('lastName');
const firstName = document.getElementById('firstName');
const phone = document.getElementById('phone');
const allergy = document.getElementById('allergy');

form.addEventListener('submit', e => {
    e.preventDefault();

    validateInputs();
});

const setError = (element, message) => {
    const formInput = element.parentElement;
    const errorDisplay = formInput.querySelector('.error');

    errorDisplay.innerText = message;
    formInput.classList.add('error');
    formInput.classList.remove('success');
}

const setSuccess = element => {
    const formInput = element.parentElement;
    const errorDisplay = formInput.querySelector('.error');

    errorDisplay.innerText = '';
    formInput.classList.add('success');
    formInput.classList.remove('error');
}

const validateInputs = () => {
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();
    const confirmPasswordValue = confirmPassword.value.trim();
    const lastNameValue = lastName.value.trim();
    const firstNameValue = firstName.value.trim();
    const phoneValue = phone.value.trim();
    const allergyValue = allergy.value.trim();

    if(emailValue !== "") {
        setError(email, "Veuillez renseigner votre Email");
    } else {
        setSuccess(email);
    }

    if(passwordValue === '') {
        setError(password, "Veuillez saisir votre mot de passe");
    } else if (passwordValue.lenght < 8) {
        setError(password,  'Le mot de passe doit contenir au moins 8 caractères');
    } else {
        setSuccess(password);
    }

    if(passwordValue !== confirmPasswordValue) {
        setError(confirmPassword, "Les deux mots de passes ne correspondent pas");
    } else {
        setSuccess(password);
        setSuccess(confirmPassword);
    }

    if(lastNameValue === "") {
        setError(lastName, 'Merci de remplir votre Nom');
    } else {
        setSuccess(lastName);
    }

    if(firstNameValue === "") {
        setError(lastName, 'Merci de remplir votre Nom');
    } else {
        setSuccess(lastName);
    }

    if(phoneValue === "") {
        setError(phone, 'Merci de remplir votre numéro de téléphone');
    }else {
        setSuccess(phone);
    }

    if(allergyValue === ""){
        setSuccess(allergy);
    } else {
        setSuccess(allergy);
    }
};