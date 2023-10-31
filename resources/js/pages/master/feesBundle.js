import DataTable from "datatables.net-dt";
import { validatorInit } from "../../utils/validator";
import Swal from "sweetalert2";
import { setSelect2Data } from "../../utils/select2";
import axios from "axios";
import moment from "moment/moment";

const form = $('#fees-bundle-form');
const formCard = form.closest('.card');
const formBtn = form.find('button[type="submit"]');
const feeDetails = form.find('[name="fee_details_id[]"]');
const academicYear = form.find('[name="academic_year_id"]');
const academicStandard = form.find('[name="academic_standard_id"]');
const totalAmount = form.find('[name="total_amount"]');

setSelect2Data(feeDetails, []);

const validator = validatorInit('#fees-bundle-form', {
    rules: {
        name: 'required',
        academic_year_id: 'required',
        academic_standard_id: 'required',
        due_date: 'required',
        penalty_amount: 'required',
        fee_detail_id: 'required',
        is_active: 'required',
    },
    messages: {
        name: { required: 'Please enter the Bundle name' },
        academic_year_id: { required: 'Please select the Academic year' },
        academic_standard_id: { required: 'Please select the Academic standard' },
        due_date: { required: 'Please select the Due date' },
        penalty_amount: { required: 'Please enter the Penalty amount' },
        fee_detail_id: { required: 'Please select the Fee Details' },
    },
    submitHandler: (form, event) => {
        submitForm(form, event)
    }
});

const dataTable = new DataTable('#list', {
    ajax: 'fee-bundles',
    columns: [
        {
            data: 'id',
            render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        { data: "name" },
        { data: "academic_year.name" },
        { data: "academic_standard.name" },
        { data: "total_amount" },
        {
            data: "due_date",
            render: (data) => {
                return moment(data).format('DD-MMM-YYYY');
            }
        },
        { data: 'penalty_amount' },
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
                <button class="btn btn-sm py-0 btn-outline-primary" data-id="${data}"
                onclick="showUpdateForm(this)"><i class="fa-solid fa-pen-to-square me-2"></i> Edit
                </button>`;
            }
        }
    ],
    processing: true
});

function fetchFeeDetails() {
    let academic_year_id = academicYear.val();
    let academic_standard_id = academicStandard.val();
    totalAmount.val('');

    if (academic_year_id == '' || academic_standard_id == '') {
        feeDetails.empty();
        return;
    }

    axios
        .get('/fee-details-by-year-and-standard', { params: { academic_year_id, academic_standard_id } })
        .then((response) => {
            setSelect2Data(feeDetails, response.data);
        })
}

academicYear.on('change', () => fetchFeeDetails());
academicStandard.on('change', () => fetchFeeDetails());

function getFeeBundleTotalAmount() {
    let fee_details_id = feeDetails.val();
    axios
        .get('/fee-bundle-total-amount', { params: { fee_details_id } })
        .then((response) => {
            totalAmount.val(response.data.totalAmount);
        })
}

feeDetails.on('change', () => getFeeBundleTotalAmount());

function submitForm(form, event) {
    event.preventDefault();
    let data = new FormData(form);
    let id = data.get('id');
    let isUpdate = !!id;
    let url = isUpdate ? `/fee-bundles/${id}` : '/fee-bundles';
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
    formCard.find('.card-header').html('Add new fee');
    formBtn.html('Submit');
    feeDetails.empty();
}

form.find('button[type="reset"]').on('click', () => resetForm());

const showUpdateForm = async function (element) {
    let id = $(element).data('id');
    const { data } = await axios.get(`/fee-bundles/${id}`);
    let fields = ['id', 'academic_year_id', 'academic_standard_id', 'name',
        'total_amount', 'due_date', 'penalty_amount', 'is_active'];
    let feeBundle = data.feeBundle;
    fields.forEach(field => {
        form.find(`[name="${field}"]`).val(feeBundle[field]);
    });
    setSelect2Data(feeDetails, data.feeDetailsData);
    formCard.find('.card-header').html('Update Fees bundle');
    formBtn.html('Update');
    window.scrollTo(0, 0);
};


window.showUpdateForm = showUpdateForm;

