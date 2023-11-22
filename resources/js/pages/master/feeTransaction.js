import DataTable from "datatables.net-dt";
import { validatorInit } from "../../utils/validator";
import Swal from "sweetalert2";
import moment from "moment/moment";

const form = $('#fee-transaction-form');
const formCard = form.closest('.card');
const formBtn = form.find('button[type="submit"]');

const validator = validatorInit('#fee-transaction-form', {
    rules: {
        payment_mode: { required: true },
        amount: { required: true },
    },
    messages: {
        payment_mode: {
            required: 'Please select the Payment Mode',
        },

        amount: {
            required: 'Please enter the amount'
        },
    },
    submitHandler: (form, event) => {
        submitForm(form, event)
    }
});

const dataTable = new DataTable('#list', {
    ajax: 'fee-transactions',
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
            data: 'payment_id'
        },
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: 'Paid_date',
            render: (data) => {
                return moment(data).format('DD-MMM-YYYY');
            }
        },
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: 'payment_mode'
        },
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: 'amount'
        },
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: 'total_amount'
        },
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: 'ref_no'
        },
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: 'bank_name'
        },
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: 'document_date',
            render: (data) => {
                return moment(data).format('DD-MMM-YYYY');
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
    let url = isUpdate ? `/fee-transactions/${id}` : '/fee-transactions';
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
    formCard.find('.card-header').html('Add new Fee transaction');
    formBtn.html('Submit');
}

form.find('button[type="reset"]').on('click', () => resetForm());

const showUpdateForm = async function (element) {
    let id = $(element).data('id');
    const { data } = await axios.get(`/fee-transactions/${id}`);
    let fields = ['id', 'payment_id','Paid_date', 'payment_mode','amount', 'ref_no', 'bank_name',
    'document_date', 'note',];
    fields.forEach(field => {
        form.find(`[name="${field}"]`).val(data[field]);
    });
    formCard.find('.card-header').html('Update Fee Transaction');
    formBtn.html('Update');
    window.scrollTo(0, 0);
};


window.showUpdateForm = showUpdateForm;

