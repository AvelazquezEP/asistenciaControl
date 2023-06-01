/* #region UTILITIES */

const log = console.log;

const open_dangerAlert = (alertElement) => {
    document.getElementById(alertElement).style.display = 'block';
}

const close_dangerAlert = (alertElement) => {
    document.getElementById(alertElement).style.display = 'none';
}

$(document).ready(function () {
    close_dangerAlert('b1Alert');
    close_dangerAlert('b2Alert');
    close_dangerAlert('lncAlert');

    // TEST
    close_dangerAlert('mainAlert');
});

const timeDifference = (timeStart, timeFinish) => {
    start = timeStart.split(":");
    end = timeFinish.split(":");

    var startDate = new Date(0, 0, 0, start[0], start[1], 0);
    var endDate = new Date(0, 0, 0, end[0], end[1], 0);
    var diff = endDate.getTime() - startDate.getTime();
    var hours = Math.floor(diff / 1000 / 60 / 60);
    diff -= hours * 1000 * 60 * 60;
    var minutes = Math.floor(diff / 1000 / 60);

    return `${hours}:${minutes}`;
    // return (hours < 9 ? "0" : "") + hours + ":" + (minutes < 9 ? "0" : "") + minutes;
}
/* #endregion */

const open_all_alerts = () => {
    b1();
    b2();
    lnc();
}

const validate_less_min = (b1Start, b1Finish) => {
    let time = timeDifference(b1Start, b1Finish);
    minutes = time.split(":")[1];
    hours = time.split(":")[0];

    if (minutes <= 9 || minutes >= 11) {
        return false;
    }

    return true;
}

const b1_validate = (actualInput) => {

    let b1Start = document.getElementById('b1_time_start').value;
    let b1Finish = document.getElementById('b1_time_finish').value;

    let time = timeDifference(b1Start, b1Finish);
    minutes = time.split(":")[1];
    hours = time.split(":")[0];

    let timeArray = get_all_times(actualInput);
    validate_all(actualInput, timeArray);

    //#region Validation

    if (minutes < 10
        || minutes > 10
        || hours != 0) {
        open_dangerAlert('b1Alert');
        document.getElementById('b1Msg').innerHTML = "only a 10 minute difference is allowed";
        return false;
    } else {
        close_dangerAlert('b1Alert');
        return true;
    }

    //#endregion
}

const b2_validate = (actualInput) => {
    let b2Start = document.getElementById('b2_time_start').value;
    let b2Finish = document.getElementById('b2_time_finish').value;

    let time = timeDifference(b2Start, b2Finish);
    minutes = time.split(":")[1];
    hours = time.split(":")[0];

    let timeArray = get_all_times(actualInput);
    validate_all(actualInput, timeArray);

    //#region Validation

    if (minutes < 10
        || minutes > 10
        || hours != 0) {
        open_dangerAlert('b2Alert');
        document.getElementById('b2Msg').innerHTML = "only a 10 minute difference is allowed";
        return false;
    } else {
        close_dangerAlert('b2Alert');
        return true;
    }

    //#endregion 
}

const lnc_validate = (actualInput) => {

    let lncStart = document.getElementById('lnc_time_start').value;
    let lncFinish = document.getElementById('lnc_time_finish').value;

    let time = timeDifference(lncStart, lncFinish);
    minutes = time.split(":")[1];
    hours = time.split(":")[0];

    let timeArray = get_all_times(actualInput);
    validate_all(actualInput, timeArray);

    //#region validation

    if (minutes < 30
        || minutes > 30
        || hours != 0) {
        open_dangerAlert('lncAlert');
        document.getElementById('lncMsg').innerHTML = "only a 30 minute difference is allowed";
        return false;
    } else {
        close_dangerAlert('lncAlert');
        return true;
    }

    //#endregion 
}

const validate_all = (timeInput, timeArray) => {
    let actualInput = document.getElementById(timeInput).value;

    for (i = 0; i < timeArray.length; i++) {
        if (actualInput == timeArray[i]) {
            open_dangerAlert('mainAlert');
            document.getElementById('mainMsg').innerHTML = 'There can be no schedules with the same time';
            break;
        } else {
            close_dangerAlert('mainAlert');
        }
    }
}

const get_all_times = (this_divTime) => {

    var mainTime = document.getElementById(this_divTime);

    var elementArray = [];
    var timeArray = [];
    var elementResult = [];
    timeArray.splice(0, 5);

    let b1Start = document.getElementById('b1_time_start');
    let b1Finish = document.getElementById('b1_time_finish');

    let b2Start = document.getElementById('b2_time_start');
    let b2Finish = document.getElementById('b2_time_finish');

    let lncStart = document.getElementById('lnc_time_start');
    let lncFinish = document.getElementById('lnc_time_finish');

    elementArray.push(b1Start);
    elementArray.push(b1Finish);
    elementArray.push(b2Start);
    elementArray.push(b2Finish);
    elementArray.push(lncStart);
    elementArray.push(lncFinish);

    for (i = 0; i < elementArray.length; i++) {
        if (mainTime != elementArray[i]) {
            elementResult.push(elementArray[i]);
        }
    }

    for (i = 0; i < elementResult.length; i++) {
        timeArray.push(elementResult[i].value);
    }
    // log(timeArray);

    return (timeArray);
}

const getID = () => {
    allItems = document.getElementById('itemsContainer').getElementsByClassName('formTime');
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