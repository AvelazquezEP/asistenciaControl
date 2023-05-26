
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

// #endregion

