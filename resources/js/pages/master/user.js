import DataTable from "datatables.net-dt";
import { validatorInit } from "../../utils/validator";
import Swal from "sweetalert2";

const form = $('#user-form');
const state = form.find('[name="state_id"]');
const city = form.find('[name="city_id"]');
const formCard = form.closest('.card');
const formBtn = form.find('button[type="submit"]');

const validator = validatorInit('#user-form', {
    rules: {
        employee_no: { required: true },
        name: { required: true, maxlength: 50 },
        email: { required: true },
        mobile_no: { required: true,  maxlength: 10 },
        city_id: { required: true },
        state_id: { required: true },
        is_active: { required: true },
    },
    messages: {
        name: {
            required: 'Please enter the name',
        },
        email: {
            required: 'Please enter the email',
        },
        employee_no: {
            required: 'Please enter the employee name',
        },
        mobile_no: {
            required: 'Please enter the mobile number',
        },
        city_id: {
            required: 'Please select the city',
        },
        state_id: {
            required: 'Please select the state',
        },
    },
    submitHandler: (form, event) => {
        submitForm(form, event)
    }
});

state.on('change', function () {
    let state_id = this.value;
    let element = city;
    element.html(`<option> -- Select City -- </option>`);

    if (state_id == '') {
        return;
    }

    axios.get('/cities-by-state-id', {
        params: { state_id }
    }).then(function (response) {
        response.data.forEach(item => {
            element.append(`<option value="${item.id}">${item.name}</option>`)
        });
    }).catch((error) => {
        Swal.fire({ text: 'something went wrong', icon: 'error' });
    })
});

const dataTable = new DataTable('#list', {
    ajax: 'users',
    columns: [
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: 'id',
            render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: 'employee_no'
        },
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: 'name'
        },
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: 'email'
        },
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: 'mobile_no'
        },
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: 'state.name'
        },
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: 'city.name'
        },
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: 'is_active',
            render: function (data) {
                return data == 1 ? 'Active' : 'Inactive';
            }
        },
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: 'id',
            render: function (data) {
                return `
                <button class="btn btn-sm py-0 btn-outline-primary" data-id="${data}" onclick="showUpdateForm(this)">
                    <i class="fa-solid fa-pen-to-square me-2"></i> Edit
                </button>`;
            }
        }
    ],
    processing: true
});

function submitForm(form, event) {
    event.preventDefault();
    let data = new FormData(form);
    let id = data.get('id');
    let isUpdate = !!id;
    let url = isUpdate ? `/users/${id}` : '/users';
    let method = 'POST';
    if (isUpdate) {
        data.append('_method', 'PATCH')
    }

    formBtn.attr('disabled', true).html('Submitting...' + SPINNER);

    axios({ method, url, data })
        .then((response) => {
            formBtn.attr('disabled', false).html('Submit');
            let tableData = dataTable.data().toArray();
            unshiftOrUpdate(tableData, response.data.item);
            dataTable.clear();
            dataTable.rows.add(tableData).draw();
            Swal.fire(response.data.message);
            resetForm();
        }).catch((error) => {
            formBtn.attr('disabled', false).html('Submit');
            if (error.response && error.response.status === 422) {
                const validationErrors = error.response.data.errors;
                validator.showErrors(validationErrors);
            } else {
                Swal.fire(error.response.data.message);
                console.error(error);
            }
        });
}

function resetForm() {
    form.find('[name="is_active"]').val(1);
    form.find('.reset').val('').removeClass('is-invalid');
    formCard.find('.card-header').html('Add new User');
    formBtn.html('Submit');
}

form.find('button[type="reset"]').on('click', () => resetForm());

const showUpdateForm = async function (element) {
    let id = $(element).data('id');
    const { data } = await axios.get(`/users/${id}`);
    let fields = ['id', 'name', 'employee_no', 'email', 'country_id', 'mobile_no', 'city_id', 'state_id', 'address', 'date_of_birth', 'date_of_join', 'role_id', 'qualification', 'is_active'];
    fields.forEach(field => {
        form.find(`[name="${field}"]`).val(data[field]);
    });
    formCard.find('.card-header').html('Update User');
    formBtn.html('Update');
};


window.showUpdateForm = showUpdateForm;

