import DataTable from "datatables.net-dt";
import { validatorInit } from "../../utils/validator";
import Swal from "sweetalert2";

const form = $('#teacher-mapping-form');
const formCard = form.closest('.card');
const formBtn = form.find('button[type="submit"]');

const validator = validatorInit('#teacher-mapping-form', {
    rules: {
        class_room_id: { required: true },
        academic_year_id: { required: true },
        day: { required: true },
        class_period_id: { required: true },
        user_id: { required: true },
    },
    messages: {
        class_room_id: {
            required: 'Please select the class',
        },
        academic_year_id: {
            required: 'Please select the academic year',
        },
        day: {
            required: 'Please select the day',
        },
        class_period_id: {
            required: 'Please select the time',
        },
        user_id: {
            required: 'Please select the user',
        },
    },
    submitHandler: (form, event) => {
        submitForm(form, event)
    }
});

const dataTable = new DataTable('#list', {
    ajax: 'teacher-mappings',
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
            data: 'user.name'
        },
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: 'academic_year.name'
        },
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: 'class_room.name'
        },
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: 'day',
            render: function (data) {
                if (data == 1) { return 'Monday' }
                if (data == 2) { return 'Tuesday' }
                if (data == 3) { return 'Wednesday' }
                if (data == 4) { return 'Thursday' }
                if (data == 5) { return 'Friday' }
            }
        },
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: 'class_period.name'
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
    let url = isUpdate ? `/teacher-mappings/${id}` : '/teacher-mappings';
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
    formCard.find('.card-header').html('Add new Teacher Mapping');
    formBtn.html('Submit');
}

form.find('button[type="reset"]').on('click', () => resetForm());

const showUpdateForm = async function (element) {
    let id = $(element).data('id');
    const { data } = await axios.get(`/teacher-mappings/${id}`);
    let fields = ['id', 'class_room_id', 'academic_year_id', 'day', 'class_period_id', 'user_id'];
    fields.forEach(field => {
        form.find(`[name="${field}"]`).val(data[field]);
    });
    formCard.find('.card-header').html('Update Teacher Mapping');
    formBtn.html('Update');
    window.scrollTo(0,0);
};


window.showUpdateForm = showUpdateForm;

