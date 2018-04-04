/******************** end calendar ********************/
var myCalendar;
function doOnLoad() {
 var today = new Date();
    var nextday = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();      
    var nd = nextday.getDate()+2;
    if(dd<10){
        dd='0'+dd;
    } 
    if(mm<10){
        mm='0'+mm;
    }
    if(nd<10){
        nd='0'+nd;
    } 
    var today = yyyy+'-'+mm+'-'+dd;
    var nextday = yyyy+'-'+mm+'-'+nd;
    myCalendar = new dhtmlXCalendarObject(["date_from","date_to"]);
    myCalendar.setDate("2018-04-10");
    myCalendar.hideTime();
    // init values
    var t = new Date();
    byId("date_from").value = today;
    byId("date_to").value = nextday;
}

function setSens(id, k) {
    // update range
    if (k == "min") {
        myCalendar.setSensitiveRange(byId(id).value, null);
    } else {
        myCalendar.setSensitiveRange(null, byId(id).value);
    }
}
function byId(id) {
    return document.getElementById(id);
}
/******************** end calendar ********************/

/******************** room type ********************/
var obj;
var linkse = window.location.search;
var url = 'db.inc/db.select.php'+ linkse;
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        obj = JSON.parse(this.responseText);
        var data = '';
        data += '<select class="input100" name="r_type" id="r_type" onchange="changeroom(this);">';
        data += '<option value="">Please select room type.</option>';
        for(var i=0; i<obj.length; i++){
            data += '<option value="'+obj[i].R_key+'">'+obj[i].R_typeR+'</option>';
        }
        data += '</select>';
        document.getElementById("out").innerHTML = data;
    }
};
xmlhttp.open("GET", "db.inc/db.select.php?room=roomtype&RT_ID=", true);
xmlhttp.send();
/******************** end room type ********************/

/******************** room ********************/
function changeroom(opt){
    var val = opt.options[opt.selectedIndex].value;
    var optVal = '?room=chooroom&RT_ID='+val;
    var urlall = url + optVal
   // document.getElementById("demo").innerHTML = urlall;
    var out;
    var xmlhttpreq = new XMLHttpRequest();
    xmlhttpreq.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            out = JSON.parse(this.responseText);
            var data = '';
            data += '<div class="cc-selector"><h4>Select Room ID:</h4><ul>';
            for(var i=0; i<out.length; i++){
                data += '<li><h4>'+out[i].r_id+'</h4>';
                data += '<input type="checkbox" id="cb'+(i+1)+'" name="idroom" value="'+out[i].r_key+'" onclick="myroom();"/>';
                data += '<label for="cb'+(i+1)+'"><img src="img/room/Deluxe_Suite.jpg" /></label></li>';
            }
            data += '</ul><input type="text" id="id_R" value=""><input type="text" id="id_roomty" value="'+val+'"></div>';
            document.getElementById("showRoom").innerHTML = data;
        }
    };
    xmlhttpreq.open("GET", urlall, true);
    xmlhttpreq.send();
}
/******************** end room ********************/

/******************** time ********************/
function CheckDate(){
    var cin,cout;
    cin = document.getElementById("date_from").value;
    cout = document.getElementById("date_to").value;
    document.getElementById("demo").innerHTML = cin + " " +cout;
}
/******************** end time ********************/


function myroom() {
    var idroom = document.forms[0];
    var txt = "";
    var i;
    for (i = 0; i < idroom.length; i++) {
        if (idroom[i].checked) {
            txt = txt + idroom[i].value + ";";
        }
    }
    document.getElementById("id_R").value = "id room: " + txt;
}