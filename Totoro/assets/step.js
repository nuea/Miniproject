var currentTab = 0;
showTab(currentTab); 
function showTab(n) {
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";            
        document.getElementById("fsubmit").style.display = "none";
    }
    else if (n == (x.length - 1)) {
        document.getElementById("fsubmit").style.display= "inline";            
        document.getElementById("nextBtn").style.display = 'none';            
        document.getElementById("prevBtn").style.display = "none";
    } 
    else {
        document.getElementById("prevBtn").style.display = "inline";      
    }

    if (n == (x.length - 2)) {
        document.getElementById("nextBtn").innerHTML = "hey!";
        BookingDetails();
    } else {
        document.getElementById("nextBtn").innerHTML = "Next";
    }

    fixStepIndicator(n)
}

function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
      // ... the form gets submitted:
      document.getElementById("regForm").submit();
      return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
  }

function validateForm() {
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
        // add an "invalid" class to the field:
        y[i].className += " invalid";
        // and set the current valid status to false
        valid = false;
        }
    }
    if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; 
}

function fixStepIndicator(n) {
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    x[n].className += " active";
}


function BookingDetails(){
    /*var f_name,id_card,email,phone,cin,cout,r_type,id_R,price;
    var info='';
    f_name = document.getElementById("name").value;
    id_card = document.getElementById("idcard").value;
    email = document.getElementById("email").value;
    phone = document.getElementById("phone").value;
    cin = document.getElementById("date_from").value;
    cout = document.getElementById("date_to").value;
    r_type = document.getElementById("id_roomtype").value;
    id_room = document.getElementsByName("id_R").value;
    price = document.getElementsByName("price").value;

    info += '';
    info += '<h3><u>Booking details</u></h3>';
    info += '<p><h3>Guest Details:</h3></p>';
    info += '<div>';
    info += '<p><h4>&nbsp;&nbsp;&nbsp;&nbsp;Full name: '+f_name+'</h4></p>';
    info += '<p><h4>&nbsp;&nbsp;&nbsp;&nbsp;ID Card: '+id_card+'</h4></p>';
    info += '<p><h4>&nbsp;&nbsp;&nbsp;&nbsp;E-mail: '+email+'</h4></p>';
    info += '<p><h4>&nbsp;&nbsp;&nbsp;&nbsp;Phone: '+phone+'<h4></p>';
    info += '</div>';
    info += '<p><h4>Room Type: '+r_type+'</h4></p>';
    info += '<div>';
    info += '<p><h4>&nbsp;&nbsp;&nbsp;&nbsp;ID Room: '+id_room+'</h4></p>';
    info += '<p><h4>&nbsp;&nbsp;&nbsp;&nbsp;Price Room: '+price+'</h4></p>';
    info += '</div>';
    info += '<p><h4>Check In: '+cin+'</h4></p>';
    info += '<p><h4>Check Out: '+cout+'</h4></p> ';
    document.getElementById("bookdetail").innerHTML = info;*/
}