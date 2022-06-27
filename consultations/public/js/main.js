function dothat(id,date) {
    // console.log(data);
    document
        .querySelector("#confirm-condultation-modal")
        .classList.toggle("hidden");
    const form = document.querySelector("#reserva-consultation");
    const inputConsultation = document.createElement("input");
    inputConsultation.type = "hidden";
    inputConsultation.name = "consultation_id";
    inputConsultation.value = id;
    inputDate = document.querySelector("#dateConsultation");
    inputDate.value = date;

    form.appendChild(inputConsultation);
    console.log(form);
    // console.log(date);
}
const closeModal = () => {
    document
        .querySelector("#confirm-condultation-modal")
        .classList.toggle("hidden");
};
const updateCounter = (e) => {
    const counter = document.querySelector("#counter");
    const comment = document.querySelector("#comment");
    const btnConfirm = document.querySelector("#confirm");
    const error = document.querySelector("#comment-error");
    counter.textContent = comment.value.length;
    if (comment.value.length > 100 || comment.value.length < 5) {
        error.classList.remove("hidden");
        btnConfirm.disabled = true;

        comment.classList.add(
            "!border-red-400",
            "focus:!border-red-400",
            "focus:ring-red-500"
        );
        comment.classList.remove(
            "!border-green-400",
            "focus:!border-green-400",
            "focus:ring-green-500"
        );
    } else {
        error.classList.add("hidden");
        btnConfirm.disabled = false;
        comment.classList.remove(
            "!border-red-400",
            "focus:!border-red-400",
            "focus:ring-red-500"
        );
        comment.classList.add(
            "!border-green-400",
            "focus:!border-green-400",
            "focus:ring-green-500"
        );
    }
};

const PreviewAvatar = (e) => {
    console.log(e.files);
    const [file] = e.files;
    if (file) {
        document.querySelector(".preview-box").classList.remove("hidden");
        const imagePreview = document.querySelector("#imagePreview");
        document.querySelector(".filename").textContent = file.name;
        imagePreview.src = URL.createObjectURL(file);
    }
};
const deleteRole = (role) => {
    const modal = document.getElementById("modal-delete-rol");
    const form = document.getElementById("delete-rol");
    const title = document.getElementById("title-delete-rol");
    form.setAttribute("action", `/admin/role/delete/${role.id}`);
    title.textContent =
        "¿Estás seguro de borrar el rol con id " + role.id + " ?";
    modal.classList.remove("hidden");
    modal.setAttribute("role", "dialog");
    document.getElementById("modal-button").focus();
};


const darDeBaja = (id) => {
    // console.log(role);
    const form = document.getElementById("dar-baja");
    const modal = document.getElementById("modal-dar-baja");
    const title = document.getElementById("title-dar-baja");
    console.log(title);
    title.textContent =
        "¿Estas seguro de darse de baja de TODAS las consultas por 1 semana?";
    form.setAttribute("action", `/consultation/baja/${id}`);
    modal.classList.remove("hidden");
    console.log(form);
};

const closeModalBaja = () => {
    // const form = document.getElementById("delete-rol");
    const modal = document.getElementById("modal-dar-baja");
    // form.setAttribute("action", `/admin/role/remove/${role.id}`);
    modal.classList.add("hidden");
    // console.log(form);
};

const closeModalDelete = () => {
    // const form = document.getElementById("delete-rol");
    const modal = document.getElementById("modal-delete-rol");
    // form.setAttribute("action", `/admin/role/remove/${role.id}`);
    modal.classList.add("hidden");
    // console.log(form);
};

document.querySelector(".form-search").addEventListener("submit", function (e) {
    e.preventDefault();
    const search = document.querySelector("#search-consultation").value;

    if (search != "") {
        this.submit();
    } else {
        document
            .querySelector(".error-consultation")
            .classList.remove("hidden");
        setTimeout(() => {
            document
                .querySelector(".error-consultation")
                .classList.add("hidden");
        }, 5000);
    }
});
document
    .querySelector("#form-search-top")
    .addEventListener("submit", function (e) {
        e.preventDefault();
        const search = document.querySelector("#search-top").value;

        if (search != "") {
            this.submit();
        } else {
            alert("Campo obligatorio !");
        }
    });
