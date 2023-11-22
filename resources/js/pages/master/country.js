import DataTable from "datatables.net-dt";
import { validatorInit } from "../../utils/validator";
import Swal from "sweetalert2";

const form = $('#country-form');
const formCard = form.closest('.card');
const formBtn = form.find('button[type="submit"]');

const validator = validatorInit('#country-form', {
    rules: {
        name: { required: true, maxlength: 100 },
        iso_code: { required: true, maxlength: 3 },
        mobile_code: { required: true, maxlength: 5 },
        is_active: { required: true },
    },
    messages: {
        name: {
            required: 'Please enter the country name',
        },
        iso_code: {
            required: 'Please enter the iso code',
        },
        mobile_code: {
            required: 'Please enter the mobile code',
        },
    },
    submitHandler: (form, event) => {
        submitForm(form, event)
    }
});

const dataTable = new DataTable('#lists', {
    ajax: 'countries',
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
            data: 'name'
        },
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: 'iso_code'
        },
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: 'mobile_code'
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
                <button class="action-btn" data-id="${data}" onclick="showUpdateForm(this)">
                <iconify-icon icon="heroicons:pencil-square"></iconify-icon> 
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
    let url = isUpdate ? `/countries/${id}` : '/countries';
    let method = 'POST';
    if (isUpdate) {
        data.append('_method', 'PATCH')
    }

    let loadingText = isUpdate ? `Updating` : 'Submitting';
    formBtn.attr('disabled', true).html(loadingText + '...' + SPINNER);

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
    form.find('[name="is_active"]').val(1);
    formCard.find('.card-header').html('Add new Country');
    formBtn.html('Submit');
}

form.find('button[type="reset"]').on('click', () => resetForm());

const showUpdateForm = async function (element) {
    let id = $(element).data('id');
    const { data } = await axios.get(`/countries/${id}`);
    let fields = ['id', 'name', 'iso_code', 'mobile_code', 'is_active'];
    fields.forEach(field => {
        form.find(`[name="${field}"]`).val(data[field]);
    });
    formCard.find('.card-header').html('Update Country');
    formBtn.html('Update');
    window.scrollTo(0, 0);
};


window.showUpdateForm = showUpdateForm;

