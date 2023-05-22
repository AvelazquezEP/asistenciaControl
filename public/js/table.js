var log = console.log;

const getId = (id) => {
    changeBG(id);
    log(id);
    return id;
}

const changeBG = (id) => {
    let rowSelected = document.getElementById(`${id}`);
    rowSelected.style.backgroundColor = "lightblue";

    let table = document.getElementById("userTable");

    for (var i = 1, row; row = table.rows[i]; i++) {
        if (row != rowSelected) {
            row.style.backgroundColor = "white";
        }
    }

    document.getElementById('idUser').value = id;
}

const editUser = () => {
    let baseUrl = '/edit/';
    let idUser = document.getElementById('idUser').value;
    var id = idUser;

    window.location.href = `${baseUrl}${id}`;
}

const deleteUser = () => {
    let baseUrl = '/user/remove/';
    let idUser = document.getElementById('idUser').value;
    var id = idUser;

    window.location.href = `${baseUrl}${id}`;
}

const openModal = () => {
    // document.getElementById('myModal').setAttribute('hidden', true);
    document.getElementById('myModal').removeAttribute('hidden');
}

const closeModal = () => {
    document.getElementById('myModal').removeAttribute('hidden');
    // document.getElementById('myModal').setAttribute('hidden', true);
}
