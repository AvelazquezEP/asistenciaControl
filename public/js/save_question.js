const log = console.log;

// SAVA THE QUESTION IN ANOTHER TABLE (TEMPORAL)
const save_question = (question_id) => {

    // chosen_option_{{ $question->id }}
    let final_chosen_element = document.getElementById(`chosen_option_${question_id}`).value;
    log(final_chosen_element);

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

const change_option = (option_id) => {
    let option_a_input = document.getElementById(`option_a_${option_id}`);
    let option_b_input = document.getElementById(`option_b_${option_id}`);
    let option_c_input = document.getElementById(`option_c_${option_id}`);

    let chosen_element = document.getElementById(`chosen_option_${option_id}`);

    if (option_a_input.checked) {
        // console.log('checked');
        // console.log(option_a_input.value);
        chosen_element.value = option_a_input.value;
    } else if (option_b_input.checked) {
        // console.log('checked');
        // console.log(option_b_input.value);
        chosen_element.value = option_b_input.value;
    } else {
        // console.log('checked');
        // console.log(option_c_input.value);
        chosen_element.value = option_c_input.value;
    }
}