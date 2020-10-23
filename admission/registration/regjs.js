/*eslint-env browser*/

/*eslint-disable no-unused-vars*/

function validate() {

    var regname = document.forms["myform"]["regname"].value;
    var regno = document.forms["myform"]["regno"].value;
    var applno = document.forms["myform"]["applno"].value;
    var mobileno = document.forms["myform"]["mobileno"].value;
    var fatherno = document.forms["myform"]["fatherno"].value;
    var mark1 = document.forms["myform"]["mark1"].value;
    var mark2 = document.forms["myform"]["mark2"].value;
    var mark3 = document.forms["myform"]["mark3"].value;
    var mark4 = document.forms["myform"]["mark4"].value;
    var boarddetail = document.forms["myform"]["boarddetail"].value;
    var sub1 = document.forms["myform"]["sub1"].value;
    var sub2 = document.forms["myform"]["sub2"].value;
    var sub3 = document.forms["myform"]["sub3"].value;
    var sub4 = document.forms["myform"]["sub4"].value;
    var numberpattern = /[^0-9]/;
    var namepattern = /[^A-Z]$/;

    if (namepattern.test(regname)) {
        alert("user");
        callalert("Enter the Name in BLOCK LETTERS");
        callfocus("regname");
        return false;
    }
    if (/[^A-Z]$/i.test(boarddetail)) {
        alert("USer");
        callalert("Enter the Board detail");
        callfocus("boarddetail");
        return false;
    }
    if (numberpattern.test(regno)) {
        callalert("Enter the Register no.");
        callfocus("regno");
        return false;
    }
    if (numberpattern.test(applno)) {
        callalert("Enter the Application no.");
        callfocus("applno");
        return false;
    }
    if (numberpattern.test(mobileno)) {
        callalert("Enter the mobile number");
        callfocus("mobileno");
        return false;
    }
    if (numberpattern.test(fatherno)) {
        callalert("Enter the father contact number");
        callfocus("fatherno");
        return false;
    }
    if (numberpattern.test(mark1)) {
        callalert("Enter the mark in subject 1");
        callfocus("mark1");
        return false;
    }
    if (numberpattern.test(mark2)) {
        callalert("Enter the mark mark in subject 2");
        callfocus("mark2");
        return false;
    }
    if (numberpattern.test(mark3)) {
        callalert("Enter the mark mark in subject 3");
        callfocus("mark3");
        return false;
    }
    if (numberpattern.test(mark4)) {
        callalert("Enter the mark mark in subject 4");
        callfocus("mark4");
        return false;
    }
    if (mark1 < 33 || mark1 > 100) {
        callalert("Enter Mark between 33 - 100");
        callfocus("mark1");
        return false;
    }
    if (mark2 < 33 || mark2 > 100) {
        callalert("Enter Mark between 33 - 100");
        callfocus("mark2");
        return false;
    }
    if (mark3 < 33 || mark3 > 100) {
        callalert("Enter Mark between 33 - 100");
        callfocus("mark3");
        return false;
    }
    if (mark4 < 33 || mark4 > 100) {
        callalert("Enter Mark between 33 - 100");
        callfocus("mark4");
        return false;
    }
    if (/[^A-Z]$/i.test(sub1)) {
        callalert("Enter the subject1");
        callfocus("sub1");
        return false;
    }
    if (/[^A-Z]$/i.test(sub2)) {
        callalert("Enter the subject2");
        callfocus("sub2");
        return false;
    }
    if (/[^A-Z]$/i.test(sub3)) {
        callalert("Enter the subject3");
        callfocus("sub3");
        return false;
    }
    if (/[^A-Z]$/i.test(sub4)) {
        callalert("Enter the subject4");
        callfocus("sub4");
        return false;
    }
}

function callalert(message) {
    swal(message);
}

function callfocus(element) {
    document.forms["myform"][element].focus();
    document.forms["myform"][element].value = "";
}

function groupSelection() {
    var group = document.forms["myform"]["group"].value;
    if (group == "group1") {
        document.forms["myform"]["sub1"].removeAttribute("required");
        document.forms["myform"]["sub2"].removeAttribute("required");
        document.forms["myform"]["sub3"].removeAttribute("required");
        document.forms["myform"]["sub4"].removeAttribute("required");
        document.forms['myform']['sub1'].hidden = true;
        document.forms['myform']['sub2'].hidden = true;
        document.forms['myform']['sub3'].hidden = true;
        document.forms['myform']['sub4'].hidden = true;
        document.forms["myform"]["subject1"].hidden = false;
        document.forms["myform"]["subject2"].hidden = false;
        document.forms["myform"]["subject3"].hidden = false;
        document.forms["myform"]["subject4"].hidden = false;
        document.forms["myform"]["subject1"].value = "Biology";
        document.forms["myform"]["subject2"].value = "Maths";
        document.forms["myform"]["subject3"].value = "Chemistry";
        document.forms["myform"]["subject4"].value = "Physics";
        document.forms["myform"]["subject1"].setAttribute("readonly", "");
        document.forms["myform"]["subject2"].setAttribute("readonly", "");
        document.forms["myform"]["subject3"].setAttribute("readonly", "");
        document.forms["myform"]["subject4"].setAttribute("readonly", "");
    }
    if (group == "group2") {
        document.forms["myform"]["sub1"].removeAttribute("required");
        document.forms["myform"]["sub2"].removeAttribute("required");
        document.forms["myform"]["sub3"].removeAttribute("required");
        document.forms["myform"]["sub4"].removeAttribute("required");
        document.forms['myform']['sub1'].hidden = true;
        document.forms['myform']['sub2'].hidden = true;
        document.forms['myform']['sub3'].hidden = true;
        document.forms['myform']['sub4'].hidden = true;
        document.forms["myform"]["subject1"].hidden = false;
        document.forms["myform"]["subject2"].hidden = false;
        document.forms["myform"]["subject3"].hidden = false;
        document.forms["myform"]["subject4"].hidden = false;
        document.forms["myform"]["subject1"].value = "Computer Science";
        document.forms["myform"]["subject2"].value = "Maths";
        document.forms["myform"]["subject3"].value = "Chemistry";
        document.forms["myform"]["subject4"].value = "Physics";
        document.forms["myform"]["subject1"].setAttribute("readonly", "");
        document.forms["myform"]["subject2"].setAttribute("readonly", "");
        document.forms["myform"]["subject3"].setAttribute("readonly", "");
        document.forms["myform"]["subject4"].setAttribute("readonly", "");
    }
    if (group == "group3") {
        document.forms["myform"]["sub1"].removeAttribute("required");
        document.forms["myform"]["sub2"].removeAttribute("required");
        document.forms["myform"]["sub3"].removeAttribute("required");
        document.forms["myform"]["sub4"].removeAttribute("required");
        document.forms['myform']['sub1'].hidden = true;
        document.forms['myform']['sub2'].hidden = true;
        document.forms['myform']['sub3'].hidden = true;
        document.forms['myform']['sub4'].hidden = true;
        document.forms["myform"]["subject1"].hidden = false;
        document.forms["myform"]["subject2"].hidden = false;
        document.forms["myform"]["subject3"].hidden = false;
        document.forms["myform"]["subject4"].hidden = false;
        document.forms["myform"]["subject1"].value = "Accountacy";
        document.forms["myform"]["subject2"].value = "Business studies";
        document.forms["myform"]["subject3"].value = "Economics";
        document.forms["myform"]["subject4"].value = "Commerce";
        document.forms["myform"]["subject1"].setAttribute("readonly", "");
        document.forms["myform"]["subject2"].setAttribute("readonly", "");
        document.forms["myform"]["subject3"].setAttribute("readonly", "");
        document.forms["myform"]["subject4"].setAttribute("readonly", "");
    }
    if (group == "other") {
        document.forms["myform"]["subject1"].hidden = true;
        document.forms['myform']['sub1'].hidden = false;
        document.forms['myform']['sub1'].style.borderBottom = "1px solid #333333";
        document.forms["myform"]["subject2"].hidden = true;
        document.forms['myform']['sub2'].hidden = false;
        document.forms['myform']['sub2'].style.borderBottom = "1px solid #333333";
        document.forms["myform"]["subject3"].hidden = true;
        document.forms['myform']['sub3'].hidden = false;
        document.forms['myform']['sub3'].style.borderBottom = "1px solid #333333";
        document.forms["myform"]["subject4"].hidden = true;
        document.forms['myform']['sub4'].hidden = false;
        document.forms['myform']['sub4'].style.borderBottom = "1px solid #333333";
        document.forms["myform"]["sub1"].setAttribute("required", "");
        document.forms["myform"]["sub2"].setAttribute("required", "");
        document.forms["myform"]["sub3"].setAttribute("required", "");
        document.forms["myform"]["sub4"].setAttribute("required", "");
    }
}

function setboarddetail() {
    if (document.forms["myform"]["board"].value == "other") {
        callfocus("boarddetail");
        document.forms["myform"]["boarddetail"].setAttribute("required", "");
    } else {
        document.forms["myform"]["boarddetail"].removeAttribute("required");
        document.forms["myform"]["boarddetail"].value = "";
    }
    if (document.forms["myform"]["board"].value != "other") {
        document.forms["myform"]["boarddetail"].removeAttribute("required");
        document.forms["myform"]["boarddetail"].value = "";
    }
}

function cal() {
    var x = 1;
    alert("hello")
    if (x) {
        gettotal();
        getpercentage();
    }
}

function gettotal() {
    var mark1 = document.forms["myform"]["mark1"].value;
    var mark2 = document.forms["myform"]["mark2"].value;
    var mark3 = document.forms["myform"]["mark3"].value;
    var mark4 = document.forms["myform"]["mark4"].value;
    var numberpattern = /[^0-9]/;
    var total = 0;

    if (numberpattern.test(mark1)) {
        callalert("Enter the mark in subject 1");
        callfocus("mark1");
    }
    if (numberpattern.test(mark2)) {
        callalert("Enter the mark in subject 2");
        callfocus("mark2");
    }
    if (numberpattern.test(mark3)) {
        callalert("Enter the mark in subject 3");
        callfocus("mark3");
    }
    if (numberpattern.test(mark4)) {
        callalert("Enter the mark in subject 4");
        callfocus("mark4");
    }

    if (mark1 == "") {
        mark1 = 0;
    } else {
        mark1 = parseInt(mark1);
    }
    if (mark2 == "") {
        mark2 = 0;
    } else {
        mark2 = parseInt(mark2);
    }
    if (mark3 == "") {
        mark3 = 0;
    } else {
        mark3 = parseInt(mark3);
    }
    if (mark4 == "") {
        mark4 = 0;
    } else {
        mark4 = parseInt(mark4);
    }
    total = mark1 + mark2 + mark3 + mark4;
    if (isNaN(total)) {
        total = "";
    }
    document.forms["myform"]["total"].value = total;
}

function getpercentage() {
    var mark1 = document.forms["myform"]["mark1"].value;
    var mark2 = document.forms["myform"]["mark2"].value;
    var mark3 = document.forms["myform"]["mark3"].value;
    var mark4 = document.forms["myform"]["mark4"].value;
    var total = 0;
    var per = 0;
    var x = 0;
    var numberpattern = /[^0-9]/;

    if (numberpattern.test(mark1)) {
        callalert("Enter the mark in subject 1");
        callfocus("mark1");
    }
    if (numberpattern.test(mark2)) {
        callalert("Enter the mark in subject 2");
        callfocus("mark2");
    }
    if (numberpattern.test(mark3)) {
        callalert("Enter the mark in subject 3");
        callfocus("mark3");
    }
    if (numberpattern.test(mark4)) {
        callalert("Enter the mark in subject 4");
        callfocus("mark4");
    }
    if (mark1 == "" || mark1 == 0) {
        mark1 = 0;
    } else {
        mark1 = parseInt(mark1);
        x++;
    }
    if (mark2 == "" || mark2 == 0) {
        mark2 = 0;
    } else {
        mark2 = parseInt(mark2);
        x++;
    }
    if (mark3 == "" || mark3 == 0) {
        mark3 = 0;
    } else {
        mark3 = parseInt(mark3);
        x++;
    }
    if (mark4 == "" || mark4 == 0) {
        mark4 = 0;
    } else {
        mark4 = parseInt(mark4);
        x++;
    }
    total = mark1 + mark2 + mark3 + mark4;
    per = total / x;
    if (isNaN(per)) {
        per = "";
    }
    document.forms["myform"]["percentage"].value = per.toFixed(2) + "%";
}

function setdate() {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1;
    var yy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd;
    }
    if (mm < 10) {
        mm = '0' + mm;
    }
    today = dd + "-" + mm + "-" + yy;
    document.forms["myform"]["regdate"].value = today;
}
/* eslint-enable no-unused-vars*/