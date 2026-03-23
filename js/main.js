
let toggle_btn = document.getElementById("toggle_btn");
let admin = document.getElementById("admin");
let employee = document.getElementById("employee");
let reverse_btn = document.getElementById("reverse_btn");


toggle_btn.onclick =  function(){
    admin.classList.add("disable");
    employee.classList.remove("disable");
    onload(admin.classList.add("disable"));
}

reverse_btn.onclick =  function(){
    admin.classList.remove("disable");
    employee.classList.add("disable");
}

// password checker
function validate(){
    let upass = document.myform.password.value;
    let cpass = document.myform.cpassword.value;

    if(upass == cpass){
        document.getElementById("msg").innerText = "";
    }
    else
    {
        document.getElementById("msg").innerText = "Password did'nt match";
    }
}

// date validdation
var date = new Date();
var tdate = date.getDate();
if(tdate < 10)
{
    tdate = "0" + tdate;
}
var month = date.getMonth() + 1;
if(month < 10)
{
    month = "0" + month;
}
var year = date.getUTCFullYear();
var minDate = year + "-" + month + "-" + tdate;
document.getElementById("fdate").setAttribute('min', minDate)
document.getElementById("todate").setAttribute('min', minDate)
// console.log(minDate);

var todayDate = new Date();
var pmonth = todayDate.getMonth() + 1;
if(pmonth < 10)
{
    pmonth = "0" + pmonth;
}
var pyear = todayDate.getUTCFullYear();
var pdate = todayDate.getDate();
if(pdate < 10)
{
    pdate = "0" + pdate;
}

var maxDate = pyear + "-" + pmonth + "-" + pdate;
document.getElementById("dob").setAttribute('max', maxDate)
console.log(maxDate)


// function validate(){
//     let upass = document.myform.password.value;
//     let cpass = document.myform.cpassword.value;

//     if(upass == cpass){
//         document.getElementById("msg").innerText = "";
//     }
//     else
//     {
//         document.getElementById("msg").innerText = "Password did`nt match";
//     }
// }