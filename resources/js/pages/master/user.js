import DataTable from "datatables.net-bs5";
import { validatorInit } from "../../utils/validator";
import Swal from "sweetalert2";

const form = $('#user-form');
const formCard = form.closest('.card');
const formBtn = form.find('button[type="submit"]');

const validator = validatorInit('#user-form', {
    rules: {
        employee_no: { required: true },
        name: { required: true, maxlength: 50 },
        mobile_no: { required: true },
        city_id: { required: true },
        state_id: { required: true },
        is_active: { required: true },
    },
    messages: {
        name: {
            required: 'Please enter the name',
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

const dataTable = new DataTable('#list', {
    ajax: 'users',
    columns: [
        {
            data: 'id',
            render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        { data: 'name' },
        { data: 'employee_no' },
        { data: 'email' },
        { data: 'mobile_no' },
        { data: 'city.name' },
        { data: 'state.name' },
        {
            data: 'is_active',
            render: function (data) {
                return data == 1 ? 'Active' : 'Inactive';
            }
        },
        {
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
    form.find('.reset').val('').removeClass('is-invalid');
    formCard.find('.card-header').html('Add new User');
    formBtn.html('Submit');
}

form.find('button[type="reset"]').on('click', () => resetForm());

const showUpdateForm = async function (element) {
    let id = $(element).data('id');
    const { data } = await axios.get(`/users/${id}`);
    let fields = ['id','name', 'employee_no', 'email', 'country_id', 'mobile_no', 'city_id', 'state_id', 'address', 'date_of_birth', 'date_of_join', 'role_id', 'qualification', 'is_active'];
    fields.forEach(field => {
        form.find(`[name="${field}"]`).val(data[field]);
    });
    formCard.find('.card-header').html('Update User');
    formBtn.html('Update');
};


window.showUpdateForm = showUpdateForm;

