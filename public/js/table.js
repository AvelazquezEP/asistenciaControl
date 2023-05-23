var log = console.log;

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
    let baseUrl = '/edit/';
    let idUser = document.getElementById('id').value;
    var id = idUser;

    window.location.href = `${baseUrl}${id}`;
}

const deleteUser = () => {
    let baseUrl = '/user/remove/';
    let idUser = document.getElementById('id').value;
    var id = idUser;

    window.location.href = `${baseUrl}${id}`;
}

// #endregion

// #region Post
const editPost = () => {
    let baseUrl = '/post/edit/';
    let idUser = document.getElementById('id').value;
    var id = idUser;

    window.location.href = `${baseUrl}${id}`;
}

const deletePost = () => {
    let baseUrl = '/post/remove/';
    let idUser = document.getElementById('id').value;
    var id = idUser;

    window.location.href = `${baseUrl}${id}`;
}
// #endregion

// #region Post
const editRole = () => {
    let baseUrl = '/role/edit/';
    let idUser = document.getElementById('id').value;
    var id = idUser;

    window.location.href = `${baseUrl}${id}`;
}

const deleteRole = () => {
    let baseUrl = '/role/remove/';
    let idUser = document.getElementById('id').value;
    var id = idUser;

    window.location.href = `${baseUrl}${id}`;
}
// #endregion

// #endregion

