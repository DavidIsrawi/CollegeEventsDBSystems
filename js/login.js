function getParameterByName(name, url) {
    if (!url) {
      url = window.location.href;
    }
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
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

function eraseCookie(name) {
    setCookie(name,"",-1);
}

function eraseAllCookies() {
  var cookies = document.cookie.split(";");
  for (var i = 0; i < cookies.length; i++) {
    eraseCookie(cookies[i].split("=")[0]);
  }
  location.reload();
}

//Function that changes the Navbar once a user signs in
function changeNav(){
  if(checkCookie("loggedIn")){
    console.log("still working?");
    document.getElementById("signout").innerHTML = "Sign Out";
    document.getElementById("panel").innerHTML = "Panel";
  }
}
