
/* #region UTILITIES */
var log = console.log;

const open_dangerAlert = (alertElement) => {
    document.getElementById(alertElement).style.display = 'block';
}

const close_dangerAlert = (alertElement) => {
    document.getElementById(alertElement).style.display = 'none';
}

/* #endregion */

$(document).ready(function () {
    close_dangerAlert('dangerAlertEdit');
    close_dangerAlert('dangerAlertDelete');
});


const getId = (id) => {
    changeBG(id);
    log(id);
    return id;
}

const changeBG = (id) => {
    let rowSelected = document.getElementById(`${id}`);
    rowSelected.style.backgroundColor = "lightblue";

    let table = document.getElementById("myTable");

    for (var i = 1, row; row = table.rows[i]; i++) {
        if (row != rowSelected) {
            row.style.backgroundColor = "white";
        }
    }

    document.getElementById('id').value = id;
}

// #region REDIRECTION

// #region User

const editUser = () => {
    // let dangerAlert = document.getElementById('dangerAlert');
    let baseUrl = '/edit/';
    let idUser = document.getElementById('id').value;
    var id = idUser;

    if (id != 0) {
        window.location.href = `${baseUrl}${id}`;
    } else {
        open_dangerAlert('dangerAlertEdit');
    }
}

const deleteUser = () => {
    let baseUrl = '/user/remove/';
    let idUser = document.getElementById('id').value;
    var id = idUser;

    if (id != 0) {
        window.location.href = `${baseUrl}${id}`;
    } else {
        open_dangerAlert('dangerAlertDelete');
    }
}

const schedulerUser = () => {
    let baseUrl = '/scheduler/edit/';
    let idUser = document.getElementById('id').value;
    var id = idUser;

    if (id != 0) {
        window.location.href = `${baseUrl}${id}`;
    } else {
        open_dangerAlert('dangerAlertEdit');
    }
}

// #endregion

// #region Post
const editPost = () => {
    let baseUrl = '/post/edit/';
    let idUser = document.getElementById('id').value;
    var id = idUser;

    if (id != 0) {
        window.location.href = `${baseUrl}${id}`;
    } else {
        open_dangerAlert('dangerAlertEdit');
    }
}

const deletePost = () => {
    let baseUrl = '/post/remove/';
    let idUser = document.getElementById('id').value;
    var id = idUser;

    if (id != 0) {
        window.location.href = `${baseUrl}${id}`;
    } else {
        open_dangerAlert('dangerAlertDelete');
    }
}
// #endregion

// #region Roles
const editRole = () => {
    let baseUrl = '/roles/edit/';
    let idUser = document.getElementById('id').value;
    var id = idUser;

    if (id != 0) {
        window.location.href = `${baseUrl}${id}`;
    } else {
        open_dangerAlert('dangerAlertEdit');
    }
}

const deleteRole = () => {
    let baseUrl = '/roles/destroy/';
    let idUser = document.getElementById('id').value;
    var id = idUser;

    if (id != 0) {
        window.location.href = `${baseUrl}${id}`;
    } else {
        open_dangerAlert('dangerAlertDelete');
    }
}
// #endregion

/* #region Resources */
const editResource = () => {
    let baseUrl = '/resource/edit/';
    let idUser = document.getElementById('id').value;
    var id = idUser;

    if (id != 0) {
        window.location.href = `${baseUrl}${id}`;
    } else {
        open_dangerAlert('dangerAlertEdit');
    }
}

const deleteResource = () => {
    let baseUrl = '/resource/destroy/';
    let idUser = document.getElementById('id').value;
    var id = idUser;

    log(idUser);

    if (id != 0) {
        window.location.href = `${baseUrl}${id}`;
    } else {
        open_dangerAlert('dangerAlertDelete');
    }
}

const showResource = () => {
    let baseUrl = '/resource/show/';
    let idUser = document.getElementById('id').value;
    var id = idUser;

    if (id != 0) {
        window.location.href = `${baseUrl}${id}`;
    } else {
        open_dangerAlert('dangerAlertDelete');
    }
}

/* #endregion */

/* #region Category Resource*/

const getID = (id) => {
    allItems = document.getElementById('itemsContainer').getElementsByClassName('itemCategory');
    for (var i = 0; i < allItems.length; i++) {
        if (id != allItems[i].id) {
            document.getElementById(allItems[i].id).style.scale = '1'; //<-- escala a 1 es el tamaño original
        } else {
            document.getElementById(allItems[i].id).style.scale = '1.1'; //<-- escala a 1.1 es el zoom (se vera mas grande)
        }
    }

    let id_category = id;
    document.getElementById('id').value = id_category;
}

const editCategory = () => {

    let baseUrl = '/category/edit/';
    let idUser = document.getElementById('id').value;
    var id = idUser;

    if (id != 0) {
        window.location.href = `${baseUrl}${id}`;
    } else {
        open_dangerAlert('dangerAlertEdit');
    }
}

const deleteCategory = () => {
    let baseUrl = '/category/destroy/';
    let idUser = document.getElementById('id').value;
    var id = idUser;

    // log(idUser);

    if (id != 0) {
        window.location.href = `${baseUrl}${id}`;
    } else {
        open_dangerAlert('dangerAlertDelete');
    }
}

/* #endregion */

/* #region Resource Examen Category */

const editExam = () => {
    let baseUrl = '/resource/exam/edit/';
    let idUser = document.getElementById('id').value;
    var id = idUser;

    if (id != 0) {
        window.location.href = `${baseUrl}${id}`;
    } else {
        open_dangerAlert('dangerAlertEdit');
    }
}

const deleteExam = () => {
    let baseUrl = '/resource/exam/destroy/';
    let idUser = document.getElementById('id').value;
    var id = idUser;

    if (id != 0) {
        window.location.href = `${baseUrl}${id}`;
    } else {
        open_dangerAlert('dangerAlertEdit');
    }
}

/* #endregion */

/* #region EXAM ITEM */
const createExamItem = () => {
    let baseUrl = '/exam/create/';
    let idUser = document.getElementById('id').value;
    var id = idUser;

    if (id != 0) {
        window.location.href = `${baseUrl}${id}`;
    } else {
        open_dangerAlert('dangerAlertEdit');
    }
}

const editExamItem = () => {
    let baseUrl = '/exam/edit/';
    let idUser = document.getElementById('id').value;
    var id = idUser;

    if (id != 0) {
        window.location.href = `${baseUrl}${id}`;
    } else {
        open_dangerAlert('dangerAlertEdit');
    }
}

const showExamItem = () => {
    let baseUrl = '/exam/show/';
    let idUser = document.getElementById('id').value;
    var id = idUser;

    if (id != 0) {
        window.location.href = `${baseUrl}${id}`;
    } else {
        open_dangerAlert('dangerAlertDelete');
    }
}

const deleteExamItem = () => {
    let baseUrl = '/resource/exam/edit/';
    let idUser = document.getElementById('id').value;
    var id = idUser;

    if (id != 0) {
        window.location.href = `${baseUrl}${id}`;
    } else {
        open_dangerAlert('dangerAlertEdit');
    }
}
/* #endregion */

/* #region Exam Questions */

const createExamQuestion = () => {
    let baseUrl = '/question/create/';
    let idUser = document.getElementById('id_exam').value;
    var id = idUser;

    if (id != 0) {
        window.location.href = `${baseUrl}${id}`;
    } else {
        open_dangerAlert('dangerAlertEdit');
    }
}

const editExamQuestion = () => {
    let baseUrl = '/question/edit/';
    let idUser = document.getElementById('id').value;
    var id = idUser;

    if (id != 0) {
        window.location.href = `${baseUrl}${id}`;
    } else {
        open_dangerAlert('dangerAlertEdit');
    }
}

const removeExamQuestion = () => {
    let baseUrl = '/question/destroy/';
    let idUser = document.getElementById('id').value;
    var id = idUser;

    if (id != 0) {
        window.location.href = `${baseUrl}${id}`;
    } else {
        open_dangerAlert('dangerAlertEdit');
    }
}

/* #endregion */

/* #region Exam user */
const examUser_index = () => {
    let baseUrl = '/exam/user/';
    let idUser = document.getElementById('id_exam').value;
    var id = idUser;

    if (id != 0) {
        window.location.href = `${baseUrl}${id}`;
    } else {
        open_dangerAlert('dangerAlertEdit');
    }
}

const examUser_create = () => {
    let baseUrl = '/exam/user/create';
    let idUser = document.getElementById('id_exam').value;
    var id = idUser;

    if (id != 0) {
        window.location.href = `${baseUrl}${id}`;
    } else {
        open_dangerAlert('dangerAlertEdit');
    }
}
/* #endregion */

/* #region EXAM USER DETAILS */

const exam_details = () => {
    let baseUrl = '/examuser/details/';
    let idUser = document.getElementById('id').value;
    var id = idUser;

    if (id != 0) {
        window.location.href = `${baseUrl}${id}`;
    } else {
        open_dangerAlert('dangerAlertEdit');
    }
}

const final_result = () => {
    let baseUrl = '/examuser/review-exam/';
    let idUser = document.getElementById('id').value;
    var id = idUser;

    if (id != 0) {
        window.location.href = `${baseUrl}${id}`;
    } else {
        open_dangerAlert('dangerAlertEdit');
    }
}

/* #endregion */

/* #region SCHEDULER */

const createScheduler = () => {
    let baseUrl = '/scheduler/create/';
    let idUser = document.getElementById('id').value;
    var id = idUser;

    if (id != 0) {
        window.location.href = `${baseUrl}${id}`;
    } else {
        open_dangerAlert('dangerAlertEdit');
    }
}

const editScheduler = () => {
    let baseUrl = '/scheduler/edit/';
    let idUser = document.getElementById('id').value;
    var id = idUser;

    if (id != 0) {
        window.location.href = `${baseUrl}${id}`;
    } else {
        open_dangerAlert('dangerAlertEdit');
    }
}

const deleteScheduler = () => {
    let baseUrl = '/scheduler/destroy/';
    let idUser = document.getElementById('id').value;
    var id = idUser;

    if (id != 0) {
        window.location.href = `${baseUrl}${id}`;
    } else {
        open_dangerAlert('dangerAlertDelete');
    }
}

// json_data = JSON.stringify(my_array);


/* #endregion */

/* #region REQUEST */

const editRequest = () => {
    let baseUrl = '/request/edit/';
    let idUser = document.getElementById('id').value;
    var id = idUser;

    if (id != 0) {
        window.location.href = `${baseUrl}${id}`;
    } else {
        open_dangerAlert('dangerAlertEdit');
    }
}

const deleteRequest = () => {
    let baseUrl = '/request/destroy/';
    let idUser = document.getElementById('id').value;
    var id = idUser;

    if (id != 0) {
        window.location.href = `${baseUrl}${id}`;
    } else {
        open_dangerAlert('dangerAlertDelete');
    }
}
/* #endregion */

// #endregion

