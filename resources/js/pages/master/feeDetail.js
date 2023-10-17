import DataTable from "datatables.net-bs5";
import { validatorInit } from "../../utils/validator";
import Swal from "sweetalert2";

const form = $('#fee-detail-form');
const formCard = form.closest('.card');
const formBtn = form.find('button[type="submit"]');

const validator = validatorInit('#fee-detail-form', {
    rules: {
        academic_standard_id: { required: true },
        academic_year_id: { required: true },
        fee_id: { required: true },
        fee_amount: { required: true },
        is_active: { required: true },
    },
    messages: {
         academic_year_id: {
            required: 'Please select the Academic Year',
        },
        academic_standard_id: {
            required: 'Please select the Academic Standard',
        },
        fee_id: {
            required: 'Please enter the fee id',
        },
        fee_amount: {
            required: 'Please enter the fee amount',
        },
    },
    submitHandler: (form, event) => {
        submitForm(form, event)
    }
});

const dataTable = new DataTable('#list', {
    ajax: 'fee-details',
    columns: [
        {
            data: 'id',
            render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        { data: 'academic_year.name' },
        { data: 'academic_standard.name' },
        { data: 'fee_id' },
        { data: 'fee_amount' },
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
    let url = isUpdate ? `/fee-details/${id}` : '/fee-details';
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
    form.find('[name="is_active"]').val(1);
    formCard.find('.card-header').html('Add new Fee Detail');
    formBtn.html('Submit');
}

form.find('button[type="reset"]').on('click', () => resetForm());

const showUpdateForm = async function (element) {
    let id = $(element).data('id');
    const { data } = await axios.get(`/fee-details/${id}`);
    let fields = ['id','academic_year_id','academic_standard_id','fee_id','fee_amount','is_active'];
    fields.forEach(field => {
        form.find(`[name="${field}"]`).val(data[field]);
    });
    formCard.find('.card-header').html('Update Fee Detail');
    formBtn.html('Update');
};


window.showUpdateForm = showUpdateForm;

