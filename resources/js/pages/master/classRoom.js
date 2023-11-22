import DataTable from "datatables.net-dt";
import { validatorInit } from "../../utils/validator";
import Swal from "sweetalert2";

const form = $('#class-room-form');
const academicStandard = form.find('[name="academic_standard_id"]');
const department = form.find('[name="department_id"]');
const sectionName = form.find('[name="section"]');
const className = form.find('[name="name"]');
const formCard = form.closest('.card');
const formBtn = form.find('button[type="submit"]');

const validator = validatorInit('#class-room-form', {
    rules: {
        academic_standard_id: { required: true },
        department_id: { required: true },
        section: { required: true },
        is_active: { required: true },
    },
    messages: {
        academic_standard_id: {
            required: 'Please select the academic standard',
        },
        department_id: {
            required: 'Please select the department',
        },
        section: {
            required: 'Please enter the section',
        },
    },
    submitHandler: (form, event) => {
        submitForm(form, event)
    }
});

const dataTable = new DataTable('#list', {
    ajax: 'class-rooms',
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
            data: 'academic_standard.name'
        },
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: 'department.name'
        },
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: 'section'
        },
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: 'name'
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

function generateClassName() {
    let val1 = academicStandard.children('option:selected').text().trim();
    let val2 = department.children('option:selected').text().trim();
    let val3 = sectionName.val();
    let combine = `${val1}-${val2}-${val3}`;
    className.val(combine);
}

academicStandard.on('change', function () {
    generateClassName();
});
department.on('change', function () {
    generateClassName();
});
sectionName.on('input', function () {
    generateClassName();
});

function submitForm(form, event) {
    event.preventDefault();
    let data = new FormData(form);
    let id = data.get('id');
    let isUpdate = !!id;
    let url = isUpdate ? `/class-rooms/${id}` : '/class-rooms';
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
    formCard.find('.card-header').html('Add new Class');
    formBtn.html('Submit');
}

form.find('button[type="reset"]').on('click', () => resetForm());

const showUpdateForm = async function (element) {
    let id = $(element).data('id');
    const { data } = await axios.get(`/class-rooms/${id}`);
    let fields = ['id', 'name', 'academic_standard_id', 'department_id', 'section', 'is_active'];
    fields.forEach(field => {
        form.find(`[name="${field}"]`).val(data[field]);
    });
    formCard.find('.card-header').html('Update Class');
    formBtn.html('Update');
    window.scrollTo(0, 0);
};


window.showUpdateForm = showUpdateForm;

