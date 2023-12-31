import 'jquery-validation';

// Define default validator settings
const validatorConfig = {
    errorElement: 'span',
    errorClass: 'is-invalid',
    errorPlacement: function(error, element) {
        error.addClass('text-danger-500 text-sm');
        element.closest('.form-group').append(error);
    },
};

// Create a function to initialize the validator with default settings
function validatorInit(selector, customConfig = {}) {
    const mergedConfig = { ...validatorConfig, ...customConfig };

    return $(selector).validate(mergedConfig);
}

export { validatorInit };
