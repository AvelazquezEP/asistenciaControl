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

const validate_lees_hour = (b1Start, b1Finish) => {
    let time = timeDifference(b1Start, b1Finish);
    // minutes = time.split(":")[1];
    hours = time.split(":")[0];

    if (hours >= 1 || hours <= -1) {
        // open_dangerAlert('b1Alert');
        // document.getElementById('b1Msg').innerHTML = 'It cannot be registered with more than 1 hour difference';
        return false;
    }

    return true;
}

const validate_less_min = (b1Start, b1Finish) => {
    let time = timeDifference(b1Start, b1Finish);
    minutes = time.split(":")[1];

    if (minutes <= 9 || minutes >= 11) {
        return false;
    }

    return true;
}

const b1_validate = () => {

    let b1Start = document.getElementById('b1_time_start').value;
    let b1Finish = document.getElementById('b1_time_finish').value;

    if (validate_less_min(b1Start, b1Finish) == false || validate_lees_hour(b1Start, b1Finish) == false) {
        open_dangerAlert('b1Alert');
        document.getElementById('b1Msg').innerHTML = 'It is only allowed to register with a 10 minute difference';
    } else {
        close_dangerAlert('b1Alert');
    }

    elseif(validate_lees_hour(b1Start, b1Finish) == false) {
        open_dangerAlert('b1Alert');
        document.getElementById('b1Msg').innerHTML = 'It cannot be registered with more than 1 hour difference';
    } else {
        close_dangerAlert('b1Alert');
    }
}

const b2_validate = () => {
    let b2Enter = document.getElementById('b2_time_start').value;
    let b2Finish = document.getElementById('b2_time_finish').value;

    if (b2Enter <= b2Finish) {
        open_dangerAlert('b2Alert');
        document.getElementById('b2Msg').innerHTML = 'Error message';
        return true;
    } else {
        close_dangerAlert('b2Alert');
        document.getElementById('b2Msg').innerHTML = '';
    }
    return true;
}

const lnc_validate = () => {

    let lncEnter = document.getElementById('lnc_time_start').value;
    let lncFinish = document.getElementById('lnc_time_finish').value;

    if (lncEnter <= lncFinish) {
        open_dangerAlert('lncAlert');
        document.getElementById('lncMsg').innerHTML = 'Error message';
        return true;
    } else {
        close_dangerAlert('lncAlert');
        document.getElementById('lncMsg').innerHTML = '';
    }
    return true;
}