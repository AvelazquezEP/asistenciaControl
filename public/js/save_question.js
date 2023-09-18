// const log = console.log();

// SAVA THE QUESTION IN ANOTHER TABLE (TEMPORAL)
const save_question = (chosen_option, open_element) => {

    let option_selected = document.getElementById(chosen_option);
    let open_answer = document.getElementById(open_element);

    // if (/^ * $ /.test(open_answer)) {
    if (open_answer.value == "-") {
        console.log(option_selected.value);
    } else {
        console.log(open_answer.value);
    }

    // $.ajax({
    //     type: 'POST',
    //     url: 'test.php',
    //     data: {
    //         "FirstName": first_name,
    //     },
    //     dataType: 'json',
    //     success: function (data) {

    //     }, error: function (data) {

    //     }
    // });
}

// const test = (chosen_option) => {
//     let question_option = document.getElementById(option).value;
//     let chosen_option = document.getElementById('');

//     console.log(question_option);
// }

const change_option = (option, element_option_to_save) => {
    let option_input = document.getElementById(option).value
    let chosen_element = document.getElementById(element_option_to_save);

    chosen_element.value = option;
}