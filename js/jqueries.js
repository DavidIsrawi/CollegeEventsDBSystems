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
		                }
		                else {
		                alert(xhrstuff.responseText);
		                }
			        });
			    });

    		}
