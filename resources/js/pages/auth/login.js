import { validatorInit } from '../../utils/validator'

const validator = validatorInit('#login-form', {
    rules: {
        employee_no: 'required',
        password: 'required'
    },
    messages: {
        employee_no: { required: "Please enter the Employee No." },
        password: { required: "Please enter the password." }
    },
    submitHandler: (form, event) => {
        submitForm(form, event)
    }
});

function submitForm(form, event) {
    event.preventDefault();
    let formData = new FormData(form);
    let btn = $(form).find('button[type="submit"]');
    btn.attr('disabled', true).html('Logging in...' + SPINNER);
    axios.post('/login', formData)
        .then((response) => {
            btn.html('Logged In');
            location.href = '/dashboard';
        }).catch((error) => {
            btn.attr('disabled', false).html('Login');
            if (error.response && error.response.status === 422) {
                const validationErrors = error.response.data.errors;
                validator.showErrors(validationErrors);
            } else {
                console.error(error);
            }
        });
}

