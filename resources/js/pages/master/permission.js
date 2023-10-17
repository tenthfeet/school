import DataTable from "datatables.net-bs5";
import { validatorInit } from "../../utils/validator";
import Swal from "sweetalert2";
import { select2Init, setSelect2Data, toSelect2DataSource } from '../../utils/select2'

const form = $("#permission-form");
const formCard = form.closest(".card");
const formBtn = form.find('button[type="submit"]');
const permissionGroupId = form.find('[name="permission_group_id"]');

const validator = validatorInit("#permission-form", {
    rules: {
        permission_group_id: 'required',
        name: { required: true, maxlength: 100 },
    },
    messages: {
        permission_group_id: { required: "Please select the permission group" },
        name: { required: "Please enter the permission name" },
    },
    submitHandler: (form, event) => {
        submitForm(form, event);
    },
});

const dataTable = new DataTable("#list", {
    ajax: "permissions",
    columns: [
        {
            data: "id",
            render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            },
        },
        { data: "permission_group.name" },
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
    let url = isUpdate ? `/permissions/${id}` : "/permissions";
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
            Swal.fire(response.data.message);
            showAddForm();
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
    form.find(".reset").val("");
    formCard.find(".card-header").html("Add new Permission");
    formBtn.html("Submit");
}

form.find('button[type="reset"]').on("click", () => showAddForm());

const showUpdateForm = async function (element) {
    let id = $(element).data("id");
    const { data } = await axios.get(`/permissions/${id}`);
    let fields = ["id", "name"];
    fields.forEach((field) => {
        form.find(`[name="${field}"]`).val(data['permission'][field]);
    });
    let dataSource = toSelect2DataSource(data.permissionGroups, "id", "name", data.permission.permission_group_id);
    setSelect2Data(permissionGroupId, dataSource, 'Group');
    formCard.find(".card-header").html("Update Permission");
    formBtn.html("Update");
};

showAddForm();
async function showAddForm() {
    resetForm();
    const { data } = await axios.get("/permission-groups");
    let dataSource = toSelect2DataSource(data.data, "id", "name");
    setSelect2Data(permissionGroupId, dataSource, 'Group');
}

window.showUpdateForm = showUpdateForm;
