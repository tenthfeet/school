import DataTable from "datatables.net-dt";
import { validatorInit } from "../../utils/validator";
import Swal from "sweetalert2";

const form = $('#exam-form');
const formCard = form.closest('.card');
const formBtn = form.find('button[type="submit"]');

const validator = validatorInit('#exam-form', {
    rules: {
        exam_category_id: { required: true },
        medium_of_study_id: { required: true, maxlength: 50 },
        class_room_id: { required: true },
        date: { required: true },
        session: { required: true },
        subject: { required: true },
        is_active: { required: true },
    },
    messages: {
        class_room_id: {
            required: 'Please select the class name',
        },
        medium_of_study_id: {
            required: 'Please select the medium',
        },
        exam_category_id: {
            required: 'Please select the exam category',
        },
        subject: {
            required: 'Please enter the subject name',
        },
        session: {
            required: 'Please select the session',
        },
        date: {
            required: 'Please select the date',
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
    ajax: 'exams',
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
            data: 'exam_category.name'
        },
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: 'mediumof_study.name'
        },
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: 'class_room.name'
        },
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: 'subject'
        },
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: 'date'
        },
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: 'session',
            render: function (data) {
                return data == 1 ? 'FN' : 'AN';
            }
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
    let url = isUpdate ? `/exams/${id}` : '/exams';
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
    formCard.find('.card-header').html('Add new Exam');
    formBtn.html('Submit');
}

form.find('button[type="reset"]').on('click', () => resetForm());

const showUpdateForm = async function (element) {
    let id = $(element).data('id');
    const { data } = await axios.get(`/exams/${id}`);
    let fields = ['id', 'exam_category_id', 'medium_of_study_id', 'date', 'session', 'subject', 'class_room_id', 'is_active'];
    fields.forEach(field => {
        form.find(`[name="${field}"]`).val(data[field]);
    });
    formCard.find('.card-header').html('Update Exam');
    formBtn.html('Update');
};


window.showUpdateForm = showUpdateForm;

