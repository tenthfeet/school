import DataTable from "datatables.net-dt";
import { validatorInit } from "../../utils/validator";
import Swal from "sweetalert2";

const form = $('#mark-form');
const formCard = form.closest('.card');
const formBtn = form.find('button[type="submit"]');

const validator = validatorInit('#mark-form', {
    rules: {
        student_admission_id: { required: true },
        exam_id: { required: true },
        subject_id: { required: true },
        class_room_id: { required: true },
        grade_id: { required: true },
        pass_marks: { required: true },
        marks: { required: true },
        maximum_marks: { required: true },
    },
    messages: {
        student_admission_id: {
            required: 'Please select the student',
        },
        exam_id: {
            required: 'Please select the exam',
        },
        subject_id: {
            required: 'Please select the subject',
        },
        class_room_id: {
            required: 'Please select the class room',
        },
        grade_id: {
            required: 'Please select the grade',
        },
        marks: {
            required: 'Please enter the marks',
        },
        pass_marks: {
            required: 'Please enter the pass marks',
        },
        maximum_marks: {
            required: 'Please enter the maximum marks',
        },
    },
    submitHandler: (form, event) => {
        submitForm(form, event)
    }
});

const dataTable = new DataTable('#lists', {
    ajax: 'marks',
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
            data: 'student_admission.name'
        },
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: 'class_room.name'
        },
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: 'exam.name'
        },
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: 'subject.name'
        },
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: 'marks'
        },
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: 'grade.name'
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
    let url = isUpdate ? `/marks/${id}` : '/marks';
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
    formCard.find('.card-header').html('Add new Mark');
    formBtn.html('Submit');
}

form.find('button[type="reset"]').on('click', () => resetForm());

const showUpdateForm = async function (element) {
    let id = $(element).data('id');
    const { data } = await axios.get(`/marks/${id}`);
    let fields = ['id',
        'student_admission_id',
        'academic_year_id',
        'exam_id',
        'subject_id',
        'class_room_id',
        'marks',
        'maximum_marks',
        'pass_marks',
        'grade_id'];
    fields.forEach(field => {
        form.find(`[name="${field}"]`).val(data[field]);
    });
    formCard.find('.card-header').html('Update Mark');
    formBtn.html('Update');
    window.scrollTo(0, 0);
};


window.showUpdateForm = showUpdateForm;

