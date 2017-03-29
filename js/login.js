function login(user_id,password) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("POST", "loginDB.php", false);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if (xmlhttp.responseText.includes("Name")) {
                  alert(xmlhttp.responseText);
                  setCookie("loggedIn","true",1);
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
