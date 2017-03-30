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

if (!checkCookie("loggedIn")) {
  document.getElementById("organizations-content").innerHTML = "<center><b>You must first sign in to access this page.</b></center>";
}
