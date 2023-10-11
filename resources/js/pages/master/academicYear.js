import DataTable from "datatables.net-bs5";
import { validatorInit } from "../../utils/validator";
import Swal from "sweetalert2";

const form = $('#academic-year-form');
const formCard = form.closest('.card');
const startDate = form.find('[name="start_date"]');
const endDate = form.find('[name="end_date"]');
const academicYear = form.find('[name="academic_year"]');
const formBtn = form.find('button[type="submit"]');

const validator = validatorInit('#academic-year-form', {
    rules: {
        start_date: { required: true },
        end_date: { required: true },
        is_active: { required: true },
    },
    messages: {
        start_date: {
            required: 'Please select the starting date',
        },
        end_date: {
            required: 'Please select the ending date',
        },
    },
    submitHandler: (form, event) => {
        submitForm(form, event)
    }
});

const dataTable = new DataTable('#lists', {
    ajax: 'academic-years',
    columns: [
        {
            data: 'id',
            render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        { data: 'academic_year' },
        { data: 'start_date' },
        { data: 'end_date' },
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

function generateAcademicYear() {
    let from = (new Date(startDate.val())).getFullYear();
    let to = (new Date(endDate.val())).getFullYear();
    let combinedYear = `${isNaN(from)?'':from}-${isNaN(to)?'':to}`;
    academicYear.val(combinedYear);
}

endDate.on('change', function () {
    generateAcademicYear();
});

startDate.on('change', function () {
    generateAcademicYear();
});

function submitForm(form, event) {
    event.preventDefault();
    let data = new FormData(form);
    let id = data.get('id');
    let isUpdate = !!id;
    let url = isUpdate ? `/academic-years/${id}` : '/academic-years';
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
    formCard.find('.card-header').html('Add new Exam Category');
    formBtn.html('Submit');
}

form.find('button[type="reset"]').on('click', () => resetForm());

const showUpdateForm = async function (element) {
    let id = $(element).data('id');
    const { data } = await axios.get(`/academic-years/${id}`);
    let fields = ['id', 'academic_year', 'start_date', 'end_date', 'is_active'];
    fields.forEach(field => {
        form.find(`[name="${field}"]`).val(data[field]);
    });
    formCard.find('.card-header').html('Update Academic Year');
    formBtn.html('Update');
};


window.showUpdateForm = showUpdateForm;

