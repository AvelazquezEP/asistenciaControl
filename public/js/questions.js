const log = console.log;

const change_answer_type = () => {

    let number_of_question = document.getElementById('number_of_questions').value;

    for (i = 0; i < number_of_question; i++) {
        let answer_type = document.getElementsByName(`type_answer_${i}`);

        for (j = 0; j < answer_type.length; j++) {
            // if (answer_type, checked == true) {
            //     log('FALSE');
            // } else {
            //     log('TRUE');
            // }
            if (answer_type[j].checked) {
                log(answer_type[j].value);
            }
        }
    }

}