function dothat(data) {
    document
        .querySelector("#confirm-condultation-modal")
        .classList.toggle("hidden");
    const form = document.querySelector("#reserva-consultation");
    const inputConsultation = document.createElement("input");
    inputConsultation.type = "hidden";
    inputConsultation.name = "consultation_id";
    inputConsultation.value = data.id;
    form.appendChild(inputConsultation);
    console.log(form);
    // console.log(data);
}
const closeModal = () => {
    document
        .querySelector("#confirm-condultation-modal")
        .classList.toggle("hidden");
};
