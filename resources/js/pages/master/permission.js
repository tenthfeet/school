import DataTable from "datatables.net-dt";
import { validatorInit } from "../../utils/validator";
import Swal from "sweetalert2";
import { setSelect2Data, toSelect2DataSource } from '../../utils/select2'

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
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: "id",
            render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            },
        },
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: "permission_group.name"
        },
        {
            className: 'table-td border border-slate-100 dark:bg-slate-800 dark:border-slate-700',
            data: "name"
        },
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
    let url = isUpdate ? `/permissions/${id}` : "/permissions";
    let method = "POST";
    if (isUpdate) {
        data.append("_method", "PATCH");
    }

    let loadingText = isUpdate ? `Updating` : 'Submitting';
    formBtn.attr('disabled', true).html(loadingText + '...' + SPINNER);

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
    window.scrollTo(0, 0);
};

showAddForm();
async function showAddForm() {
    resetForm();
    const { data } = await axios.get("/permission-groups");
    let dataSource = toSelect2DataSource(data.data, "id", "name");
    setSelect2Data(permissionGroupId, dataSource, 'Group');
}

window.showUpdateForm = showUpdateForm;
