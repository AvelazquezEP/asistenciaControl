const log = console.log;

// const review_question = (id) => {

//     let final_answer = document.getElementById(`id_question_${id}`).value;


// }

const change_to_correct = (id) => {
    let answer = document.getElementById(`question_answer_${id}`);
    let question_element = document.getElementById(`question_container_${id}`);

    // question_element.style.display = "none";
    question_element.style.backgroundColor = "rgb(201, 228, 179)";
    answer.value = 'true';

}

const change_to_incorrect = (id) => {
    let answer = document.getElementById(`question_answer_${id}`);
    let question_element = document.getElementById(`question_container_${id}`);

    // question_element.style.display = "none";
    question_element.style.backgroundColor = "rgb(228, 179, 179)";
    answer.value = 'false';
}