function login(user_id,password) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("POST", "php/loginDB.php", false);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if (xmlhttp.responseText.includes("Name")) {
                  myArr = JSON.parse(xmlhttp.responseText);
                  alert(myArr[0].Name);
                  setCookie("loggedIn","true",1);
                  setCookie("name",myArr[0].Name,1);
                  setCookie("user_id",myArr[0].User_id,1);
                  setCookie("s_email",myArr[0].S_email,1);
                  setCookie("u_id",myArr[0].U_id,1);
                  alert(document.getCookie("loggedIn"));
                }
                else {
                alert(xmlhttp.responseText);
                }
                // myObj = JSON.parse(this.responseText);
                // document.getElementById("demo").innerHTML = myObj.name;
            }
        };
        xmlhttp.send("user_id="+user_id.value+"&password="+password.value);
      }

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=../";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie(cname) {
    var isCookieSet = getCookie(cname);
    if (isCookieSet != "") {
        return true;
    } else {
        return false;
    }
}

//Function that changes the Navbar once a user signs in
function changeNav(){
  if(checkCookie("loggedIn")){
    console.log("still working?");
    document.getElementById("signout").innerHTML = "Sign Out";
    document.getElementById("panel").innerHTML = "Panel";
  }
}
