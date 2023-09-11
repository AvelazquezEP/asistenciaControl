const log = console.log;

// $(document).ready(function () {

//     $("#ButtonSend").on("click", function () {
//         $(this).attr("disabled", "disabled");
//         let option_a = document.getElementById("option_a").value;
//         let option_b = document.getElementById("option_b").value;
//         let option_c = document.getElementById("option_c").value;

//         var option_a_input = option_a_validation();
//         var option_b_input = option_b_validation();
//         var option_c_input = option_c_validation();

//         if (option_a_input == true && option_b_input == true && option_c_input == true) {
//             change_answer_type(id_radio); //this method contains your logic
//         } else {
//             setTimeout('$("#ButtonSend").removeAttr("disabled")', 3800);
//         }

//     });
// });

const change_answer_type = (id_radio) => {

    let id_question = id_radio.split('_');

    // let number_of_question = document.getElementById('number_of_questions').value;
    let type_category_radio = document.getElementById(id_radio).value;

    let multiple_questions_container = document.getElementById(`multiple-questions-container`);
    let open_answer_container = document.getElementById(`open_answer_container`);

    // multiple_questions_container.style.display = "none";
    // open_answer_container.style.display = "none";
    let question_type_input = document.getElementById('question_type');

    if (type_category_radio == "true") {
        // log(type_category_radio);
        question_type_input.value = true;
        multiple_questions_container.style.display = "block";
        open_answer_container.style.display = "none";
    } else {
        question_type_input.value = false;
        multiple_questions_container.style.display = "none";
        open_answer_container.style.display = "block";
    }
}


/* #region function validations */
const option_a_validation = (name_element) => {
    if (/^ *$/.test(name_element)) {
        document.getElementById('option_a_input').innerHTML = 'Please write your name';
        document.getElementById('option_a_input').style.color = "#F93C17";
        return false;
    } else {
        document.getElementById('option_a_input').innerHTML = '';
        document.getElementById('option_a_input').style.color = "#F93C17";
        return true;
    }
}

const option_b_validation = (name_element) => {
    if (/^ *$/.test(name_element)) {
        document.getElementById('option_b_input').innerHTML = 'Please write your name';
        document.getElementById('option_b_input').style.color = "#F93C17";
        return false;
    } else {
        document.getElementById('option_b_input').innerHTML = '';
        document.getElementById('option_b_input').style.color = "#F93C17";
        return true;
    }
}

const option_c_validation = (name_element) => {
    if (/^ *$/.test(name_element)) {
        document.getElementById('option_c_input').innerHTML = 'Please write your name';
        document.getElementById('option_c_input').style.color = "#F93C17";
        return false;
    } else {
        document.getElementById('option_c_input').innerHTML = '';
        document.getElementById('option_c_input').style.color = "#F93C17";
        return true;
    }
}
/* #endregion */