import DataTable from "datatables.net-dt";
import { validatorInit } from "../../utils/validator";
import Swal from "sweetalert2";

const form = $('#subject-mapping-form');
const formCard = form.closest('.card');
const formBtn = form.find('button[type="submit"]');

const validator = validatorInit('#subject-mapping-form', {
    rules: {
        class_room_id: { required: true },
        academic_year_id: { required: true },
        day: { required: true },
        class_period_id: { required: true },
        subject_id: { required: true },
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
            required: 'Please select the period',
        },
        subject_id: {
            required: 'Please select the subject',
        },
    },
    submitHandler: (form, event) => {
        submitForm(form, event)
    }
});

const dataTable = new DataTable('#list', {
    ajax: 'subject-mappings',
    columns: [
        {
            data: 'id',
            render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        { data: 'academic_year.name' },
        { data: 'class_room.name' },
        {
            data: 'day',
            render: function (data) {
                if (data == 1) { return 'Monday' }
                if (data == 2) { return 'Tuesday' }
                if (data == 3) { return 'Wednesday' }
                if (data == 4) { return 'Thursday' }
                if (data == 5) { return 'Friday' }
            }
        },
        { data: 'class_period.name' },
        { data: 'subject.name' },
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
    let url = isUpdate ? `/subject-mappings/${id}` : '/subject-mappings';
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
    formCard.find('.card-header').html('Add new Subject Mapping');
    formBtn.html('Submit');
}

form.find('button[type="reset"]').on('click', () => resetForm());

const showUpdateForm = async function (element) {
    let id = $(element).data('id');
    const { data } = await axios.get(`/subject-mappings/${id}`);
    let fields = ['id', 'class_room_id', 'academic_year_id', 'day', 'class_period_id', 'subject_id'];
    fields.forEach(field => {
        form.find(`[name="${field}"]`).val(data[field]);
    });
    formCard.find('.card-header').html('Update Subject Mapping');
    formBtn.html('Update');
};


window.showUpdateForm = showUpdateForm;

