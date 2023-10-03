import DataTable from "datatables.net-bs5";
import { validatorInit } from "../../utils/validator";
import Swal from "sweetalert2";

const FORM_SELECTOR="#role-form";
const form = $(FORM_SELECTOR);
const formCard = form.closest(".card");
const formBtn = form.find('button[type="submit"]');

const validator = validatorInit(FORM_SELECTOR, {
    rules: {
        name: { required: true, maxlength: 100 },
    },
    messages: {
        name: { required: "Please enter the role name" },
    },
    submitHandler: (form, event) => {
        event.preventDefault();
        if ($(form).find('input:checked').length == 0) {
            Swal.fire({ text: 'Role must have some Permissions....', icon: 'error' });
            return;
        }
        submitForm(form, event);
    },
});

const dataTable = new DataTable("#list", {
    ajax: "roles",
    columns: [
        {
            data: "id",
            render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            },
        },
        { data: "name" },
        {
            data: "id",
            render: function (data) {
                return `
                <button class="btn btn-sm py-0 btn-outline-primary" data-id="${data}" onclick="showUpdateForm(this)">
                    <i class="fa-solid fa-pen-to-square me-2"></i> Edit
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
    let url = isUpdate ? `/roles/${id}` : "/roles";
    let method = "POST";
    if (isUpdate) {
        data.append("_method", "PATCH");
    }

    formBtn.attr("disabled", true).html("Submitting..." + SPINNER);

    axios({ method, url, data })
        .then((response) => {
            formBtn.attr("disabled", false).html("Submit");
            let tableData = dataTable.data().toArray();
            unshiftOrUpdate(tableData, response.data.item);
            dataTable.clear();
            dataTable.rows.add(tableData).draw();
            resetForm();
            Swal.fire(response.data.message);
        })
        .catch((error) => {
            formBtn.attr("disabled", false).html("Submit");
            if (error.response && error.response.status === 422) {
                const validationErrors = error.response.data.errors;
                validator.showErrors(validationErrors);
            } else {
                Swal.fire(error.response.data.message);
            }
        });
}

function resetForm() {
    form.find(".reset").val("");
    formBtn.html("Submit");
    form.find('input[type="checkbox"]').prop('checked', false);
    form.find('.card-header input[type="checkbox"]').prop('indeterminate', false);
    formCard.children('.card-header').html('Add new Role');
}

form.find('button[type="reset"]').on('click', () => resetForm());

resetForm();
const showUpdateForm = async function (element) {
    let id = $(element).data('id');
    const { data } = await axios.get(`/roles/${id}`);
    let fields = ['id', 'name'];
    fields.forEach(field => {
        form.find(`[name="${field}"]`).val(data[field]);
    });
    let cards = form.find('.card');
    let permissions=data.permissions.map(item=>item.id);
    console.log(data.permissions,permissions);
    cards.each(function (i, cardElement) {
        let card = $(cardElement);
        card.find('.card-body input').each(function (j, inputElement) {
            let isChecked=permissions.includes(+inputElement.value);
            console.log(isChecked,inputElement.value);
            inputElement.checked = isChecked;
        });
        updatePermissionGroupState(card);
    });
    formCard.children('.card-header').html('Update Role');
    formBtn.html('Update');
    window.scrollTo(0, 0);
};

const handlePermissionGroupState = function (element) {
    let card = $(element).closest('.card');
    let permissionItems = card.find('.card-body input[type="checkbox"]');
    permissionItems.prop('checked', element.checked);
};

const handlePermissionStateChange = function (element) {
    let card = $(element).closest('.card');
    updatePermissionGroupState(card);
};

const updatePermissionGroupState = function ($card) {
    let noOfItem = $card.find('.card-body input[type="checkbox"]').length;
    let noOfCheckedItem = $card.find('.card-body input[type="checkbox"]:checked').length;
    let selectAll = $card.find('.card-header input[type="checkbox"]');
    if (noOfCheckedItem > 0 && noOfCheckedItem < noOfItem) {
        selectAll.prop('indeterminate', true);
        return;
    }
    let isAllChecked = noOfCheckedItem === noOfItem;
    selectAll.prop('indeterminate', false).prop('checked', isAllChecked);
}

window.handlePermissionGroupState = handlePermissionGroupState;
window.handlePermissionStateChange = handlePermissionStateChange;
window.showUpdateForm = showUpdateForm;