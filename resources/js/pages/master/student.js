import DataTable from "datatables.net-dt";
import { validatorInit } from "../../utils/validator";
import Swal from "sweetalert2";
import { select2Init, setSelect2Data } from "../../utils/select2";
import axios from "axios";
import moment from "moment/moment";

const form = $("#student-form");
const formCard = form.closest('.card');
const formBtn = form.find('button[type="submit"]');
const siblingId = form.find('[name="sibling_id"]');
const state = form.find('[name="state_id"]');
const city = form.find('[name="city_id"]');
const hasSibling = form.find(`[name="has_sibling"]`);

const validator = validatorInit("#student-form", {
    rules: {
        name: { required: true, maxlength: 150 },
        id_no: 'required',
        date_of_birth: 'required',
        gender: 'required',
        date_of_joining: 'required',
        aadhar_no: { required: true, rangelength: [12, 12] },
        blood_group: 'required',
        mother_tounge_id: 'required',
        student_status_id: 'required',
        sibling_id: { required: "#has_sibling:checked" },
        father_name: { required: true, maxlength: 150 },
        mother_name: { required: true, maxlength: 150 },
        father_occupation: { required: true, maxlength: 200 },
        mother_occupation: { required: true, maxlength: 200 },
        email: { required: true, email: true, maxlength: 150 },
        mobile_no: { required: true, rangelength: [10, 10] },
        country_id: 'required',
        city_id: { required: true },
        state_id: 'required',
        address: { required: true, maxlength: 1000 },
        pincode: { required: true, digits: 6 },
    },
    messages: {
        name: { required: "Please enter the Student name" },
        id_no: { required: "Please enter the Student id" },
        date_of_birth: { required: "Please enter the Date of birth" },
        gender: { required: "Please select the gender" },
        date_of_joining: { required: "Please enter the date of joining" },
        aadhar_no: { required: "Please enter the aadhar number", rangelength: 'Aadhar number must be 12 digits' },
        blood_group: { required: "Please select the blood group" },
        mother_tounge_id: { required: "Please select the mother tounge" },
        student_status_id: { required: "Please select the status" },
        sibling_id: { required: "Please enter the Sibling Id" },
        father_name: { required: "Please enter the Father name" },
        mother_name: { required: "Please enter the Mother name" },
        father_occupation: { required: "Please enter the Father occupation" },
        mother_occupation: { required: "Please enter the Mother occupation" },
        email: { required: "Please enter the Email" },
        mobile_no: { required: "Please enter the Mobile Number", rangelength: "Mobile number must be 10 digits" },
        country_id: { required: "Please select the Country" },
        city_id: { required: "Please select the City" },
        state_id: { required: "Please select the State" },
        address: { required: "Please enter the Address" },
        pincode: { required: "Please enter the Pincode" }
    },
    submitHandler: (form, event) => {
        submitForm(form, event);
    },
});

state.on('change', function () {
    let state_id = this.value;
    let element = city;
    element.html(`<option>--Select City--</option>`);

    if (state_id == '') {
        return;
    }

    axios.get('/cities-by-state-id', {
        params: { state_id }
    }).then(function (response) {
        response.data.forEach(item => {
            element.append(`<option value="${item.id}">${item.name}</option>`)
        });
    }).catch((error) => {
        Swal.fire({ text: 'something went wrong', icon: 'error' });
    })
});

const dataTable = new DataTable("#list", {
    ajax: "students",
    columns: [
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: "id",
            render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            },
        },
        { 
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: "id_no" },
        { 
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: "name" },
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: "date_of_birth",
            render: (data) => {
                return moment(data).format('DD-MMM-YYYY');
            }
        },
        { 
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: "gender" },
        { 
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: "student_status_id" },
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: "id",
            render: function (data) {
                return `
                <button class="action-btn" data-id="${data}" onclick="showUpdateForm(this)">
                <iconify-icon icon="heroicons:pencil-square"></iconify-icon> 
                </button>`;
            },
        },
    ],
    processing: true,
});

function submitForm(form, event) {
    event.preventDefault();
    let data = new FormData(form);
    let id = data.get("id");
    let isUpdate = !!id;
    let url = isUpdate ? `/students/${id}` : '/students';
    let method = "POST";
    if (isUpdate) {
        data.append("_method", "PATCH");
    }

    let loadingText = isUpdate ? `Updating` : 'Submitting';
    formBtn.attr('disabled', true).html(loadingText + '...' + SPINNER);

    axios({ method, url, data })
        .then((response) => {
            resetForm();
            formBtn.attr("disabled", false).html("Submit");
            let tableData = dataTable.data().toArray();
            unshiftOrUpdate(tableData, response.data.item);
            dataTable.clear();
            dataTable.rows.add(tableData).draw();
            Swal.fire(response.data.message);
        })
        .catch((error) => {
            formBtn.attr("disabled", false).html("Submit");
            if (error.response && error.response.status === 422) {
                const validationErrors = error.response.data.errors;
                validator.showErrors(validationErrors);
            } else {
                Swal.fire(error.response.data.message);
                // console.error(error);
            }
        });
}

function resetForm() {
    form.find(".reset").val("").removeClass('is-invalid');
    formCard.find(".card-header").html("Add new student");
    form.find('[name="country_id"]').val(1);
    city.empty().append(`<option value="">--Select City--</option>`)
    handleHasSibling(false);
    form.find('[name="mobile_no"]').parent().next('span').html('');
    formBtn.html("Submit");
    setStudentPhotoPath(null);
}

form.find('button[type="reset"]').on("click", () => showAddForm());

const showUpdateForm = async function (element) {
    resetForm();
    let id = $(element).data("id");
    const { data } = await axios.get(`/students/${id}`);
    fillStudentData(data.student);
    fillParentInfoData(data.student.parent, data.cities);
    formCard.find(".card-header").html("Update student");
    formBtn.html("Update");
    window.scrollTo(0, 0);
};

showAddForm();
function showAddForm() {
    resetForm();
}

function fillStudentData(studentData) {
    let fields = ['id', 'name', 'id_no', 'date_of_birth', 'gender', 'date_of_joining', 'aadhar_no',
        'blood_group', 'mother_tounge_id', 'student_status_id'];//'has_sibling', 'sibling_id'

    fields.forEach(field => {
        form.find(`[name="${field}"]`).val(studentData[field]);
    });

    let havingSibling = studentData.has_sibling == 1;
    form.find(`[name="has_sibling"]`).prop('checked', havingSibling);
    handleHasSibling(havingSibling);
    if (havingSibling) {
        siblingId
            .empty()
            .append(`<option value="${studentData.sibling.id}">${studentData.sibling.name}</option>`);

    }
    setStudentPhotoPath(studentData.photo_path);
}

function fillParentInfoData(parentData, cities) {
    let fields = ['father_name', 'mother_name', 'father_occupation', 'mother_occupation',
        'email', 'country_id', 'mobile_no', 'state_id', 'address', 'pincode'];
    fields.forEach(field => {
        form.find(`[name="${field}"]`).val(parentData[field]);
    });
    setSelect2Data(city, cities, 'City');
    city.val(parentData.city_id).trigger('change');
}

select2Init(siblingId, {
    ajax: {
        url: 'student-autocomplete',
        delay: 300,
        processResults: (data) => { return { results: data } },
        cache: true
    },
    minimumInputLength: 3,
});

siblingId.on('change', async () => {
    let id = siblingId.val();
    const { data } = await axios.get(`/parent-info/${id}`);
    fillParentInfoData(data.parent, data.cities);
});

hasSibling.on('change', () => {
    let isChecked = hasSibling.prop('checked');
    handleHasSibling(isChecked);
});

function handleHasSibling(isChecked) {
    hasSibling.prop('checked', isChecked);
    siblingId.attr('disabled', !isChecked);
    if (!isChecked) {
        siblingId.empty();
    }
}

function setStudentPhotoPath(path) {
    let avatar = $('#student-photo');
    if (path == null) {
        avatar.addClass('d-none').attr('href', '');
        return;
    }
    avatar.removeClass('d-none').attr('href', 'storage/' + path);
}

window.showUpdateForm = showUpdateForm;
