const log = console.log;

// SAVA THE QUESTION IN ANOTHER TABLE (TEMPORAL)
const save_question = (question_id) => {
    log(`saved - ${question_id}`);

    let question_container = document.getElementById(`question_container_${question_id}`);

    question_container.style.display = 'none';
}

const change_option = (option_id) => {
    let option_a_input = document.getElementById(`option_a_${option_id}`);
    let option_b_input = document.getElementById(`option_b_${option_id}`);
    let option_c_input = document.getElementById(`option_c_${option_id}`);

    let chosen_element = document.getElementById(`chosen_option_${option_id}`);

    if (option_a_input.checked) {
        chosen_element.value = option_a_input.value;
    } else if (option_b_input.checked) {
        chosen_element.value = option_b_input.value;
    } else {
        chosen_element.value = option_c_input.value;
    }
}

const get_questions = () => {

}