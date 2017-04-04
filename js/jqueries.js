function signIn(){
   		  $("#signinbtn").click(function(){
        $.post("php/loginDB.php",
        {
          user_id: $("#usid").val(),
          password: $("#upsw").val()
        },
        function(data,status,xhrstuff){
          if (xhrstuff.responseText.includes("Name")) {
                myArr = JSON.parse(xhrstuff.responseText);
                alert(myArr[0].Name);
                setCookie("loggedIn","true",1);
                setCookie("name",myArr[0].Name,1);
                setCookie("user_id",myArr[0].User_id,1);
                setCookie("s_email",myArr[0].S_email,1);
                setCookie("u_id",myArr[0].U_id,1);
                location.reload();
              }
              else {
              alert(xhrstuff.responseText);
              }
        });
    });
	}

// -----------------------------------------------------------------------

  function createAccount(){
     		  $("#signupbtn").click(function(){
            if ( !(String($("#semail").val()).includes(".edu"))) {
              alert("Must be student email.");
            }
            else if ( $("#psw").val() != $("#pswRepeat").val() ){
              alert("Passwords do not match.");
            }
            else {
          $.post("php/createAccountDB.php",
          {
            user_id: $("#sid").val(),
            s_email: $("#semail").val(),
            name: $("#firstname").val() + " " + $("#lastname").val(),
            password: $("#psw").val(),
            u_id: $("#schools").val()
          },
          function(data,status,xhrstuff){
            if (xhrstuff.responseText.includes("Welcome")) {
                  alert(xhrstuff.responseText);
                }
                else {
                alert(xhrstuff.responseText);
                }
          });
      }});
  	}

// -----------------------------------------------------------------------

function changePassword(){
        $("#changepasswordbtn").click(function(){
          if ( $("#cpsw").val() != $("#ccpsw").val() ){
            alert("Passwords do not match.");
          }
          else {
        $.post("php/changePassword.php",
        {
          user_id: getCookie('user_id'),
          oldPassword: $("#opsw").val(),
          newPassword: $("#cpsw").val()
        },
        function(data,status,xhrstuff){
          if (xhrstuff.responseText.includes("Successful")) {
                alert(xhrstuff.responseText);
              }
              else {
              alert(xhrstuff.responseText);
              }
        });
    }});
  }

  // -----------------------------------------------------------------------

    function createRSO(){
       		  $("#creatersobtn").click(function(){

              var email = getCookie('s_email');
              var domainval = email.replace(/.*@/, "");

            $.post("php/createRSO.php",
            {
              user_id: getCookie('user_id'),
              domain: domainval,
              name: $("#rname").val(),
              description: $("#rdesc").val(),
              logo: $("#rlogo").val()
            },
            function(data,status,xhrstuff){
              if (xhrstuff.responseText.includes("Successfully")) {
                    alert(xhrstuff.responseText);
                  }
                  else {
                  alert(xhrstuff.responseText);
                  }
            });
        });
    	}
