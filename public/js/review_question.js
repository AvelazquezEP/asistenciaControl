const log = console.log;

// const review_question = (id) => {

//     let final_answer = document.getElementById(`id_question_${id}`).value;


// }

const change_to_correct = (id) => {
    let answer = document.getElementById(`id_question_${id}`);
    answer.value = 'true';
}

const change_to_incorrect = (id) => {
    let answer = document.getElementById(`id_question_${id}`);
    answer.value = 'false';
}