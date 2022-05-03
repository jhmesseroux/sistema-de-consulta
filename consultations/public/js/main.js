function dothat(data) {
    console.log(data);
    document
        .querySelector("#confirm-condultation-modal")
        .classList.toggle("hidden");
    const form = document.querySelector("#reserva-consultation");
    const inputConsultation = document.createElement("input");
    inputConsultation.type = "hidden";
    inputConsultation.name = "consultation_id";
    inputConsultation.value = data;
    form.appendChild(inputConsultation);
    console.log(form);
    // console.log(data);
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
    console.log(comment.value.length);
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
