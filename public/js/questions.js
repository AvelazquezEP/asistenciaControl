const log = console.log;

const change_answer_type = (id_radio) => {

    let id_question = id_radio.split('_');

    let number_of_question = document.getElementById('number_of_questions').value;
    let type_category_radio = document.getElementById(id_radio).value;

    let multiple_questions_container = document.getElementById(`multiple-questions-container${id_radio}`);
    let open_answer_container = document.getElementById(`open_answer_container${id_radio}`);

    // multiple_questions_container.style.display = "none";
    // open_answer_container.style.display = "none";

    if (type_category_radio == "false") {
        log(type_category_radio);
        multiple_questions_container.style.display = "block";
        open_answer_container.style.display = "none";
    } else {
        multiple_questions_container.style.display = "none";
        open_answer_container.style.display = "block";
    }

    // log(type_category_radio);
    // log(id_question[3]);
}

// const show_element = (id_radio) => {
//     let type_category_radio = document.getElementById(id_radio).value;

//     let multiple_questions_container = document.getElementById('multiple-questions-container');
//     let open_answer_container = document.getElementById('open_answer_container');

//     multiple_questions_container.style.display = "block";
//     open_answer_container.style.display = "block";

// }