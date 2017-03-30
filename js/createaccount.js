function createAccount(first,last,user_id,email,password,confirmPassword) {
        if (password.value != confirmPassword.value) {
            alert("Passwords must match.");
        }
        else {
        var name = first.value + " " + last.value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("POST", "php/createAccountDB.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                alert(xmlhttp.responseText);
            }
        }
        xmlhttp.send("user_id="+user_id.value+"&password="+password.value+"&name="+name+"&s_email="+email.value);
      }
      })
