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
            user_id1:$("#ruser_id1").val(),
            user_id2:$("#ruser_id2").val(),
            user_id3:$("#ruser_id3").val(),
            user_id4:$("#ruser_id4").val(),
            user_id5:$("#ruser_id5").val(),
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

// -----------------------------------------------------------------------

  function approveRSOMember(pname,pauser_id,prso_id){
          $.post("php/approveRSOMember.php",
          {
            ruser_id:getCookie("user_id"),
            auser_id:pauser_id,
            rso_id:prso_id
          },
          function(data,status,xhrstuff){
            if (xhrstuff.responseText.includes("approved")) {
                  alert(xhrstuff.responseText);
                }
                else {
                alert(xhrstuff.responseText);
                }
          });
  	}

// -----------------------------------------------------------------------

  function approvePendingEvent(eventid){
          $.post("php/approveEvent.php",
          {
            event_id:eventid,
          },
          function(data,status,xhrstuff){
            if (xhrstuff.responseText.includes("approved")) {
                  alert(xhrstuff.responseText);
                }
                else {
                alert(xhrstuff.responseText);
                }
          });
  	}

// -----------------------------------------------------------------------

  function createEvent(){
     		  $("#createeventbtn").click(function(){

            var email = getCookie('s_email');
            var domainval = email.replace(/.*@/, "");

          $.post("php/createEvent.php",
          {
            user_id: getCookie('user_id'),
            event_id: $("#event_id").val(),
            name: $("#name").val(),
            category: $("#category").val(),
            type: $("#type").val(),
            start_date: $("#start_date").val(),
            end_date: $("#end_date").val(),
            contact_name: $("#contact_name").val(),
            description: $("#description").val(),
            contact_email: $("#contact_email").val(),
            location_name: $("#location_name").val(),
            tags: $("#tags").val()
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
  // -----------------------------------------------------------------------

    function joinRSO(rsoid){
            $.post("php/joinRSO.php",
            {
              user_id:getCookie("user_id"),
              rso_id:rsoid
            },
            function(data,status,xhrstuff){
              if (xhrstuff.responseText.includes("RSO_id")) {
                    alert("Succesffully applied to join RSO.");
                  }
                  else {
                  alert(xhrstuff.responseText);
                  }
            });
    	}

  // -----------------------------------------------------------------------

   function createRSOEvent(){
      		  $("#createRSOeventbtn").click(function(){

           $.post("php/createRSOEvent.php",
           {
             user_id: getCookie('user_id'),
             rso_id: $("#rso_id").val(),
             event_id: $("#event_id").val(),
             name: $("#name").val(),
             category: "RSO",
             type: $("#type").val(),
             start_date: $("#start_date").val(),
             end_date: $("#end_date").val(),
             contact_name: $("#contact_name").val(),
             description: $("#description").val(),
             contact_email: $("#contact_email").val(),
             location_name: $("#location_name").val(),
             tags: $("#tags").val()
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

 // -----------------------------------------------------------------------

 function modifyCommentFunc(){
         $("#modifycommentbtn").click(function(){

         $.post("php/modifyComment.php",
         {
           user_id: getCookie('user_id'),
           event_id: location.href.substring(47),
           text: $("#modifycommenttxt").val(),
           rating:$("#modifycommentrating").val()
         },
         function(data,status,xhrstuff){
           if (xhrstuff.responseText.includes("Successfully")) {
                 alert(xhrstuff.responseText);
                 location.reload();
               }
               else {
               alert(xhrstuff.responseText);
               }
         });
     });

   }

// -----------------------------------------------------------------------

function deleteCommentFunc(){

       $.post("php/deleteComment.php",
       {
         user_id: getCookie('user_id'),
         event_id: location.href.substring(47)
       },
       function(data,status,xhrstuff){
         if (xhrstuff.responseText.includes("Successfully")) {
               alert(xhrstuff.responseText);
               location.reload();
             }
             else {
             alert(xhrstuff.responseText);
             }
       });

 }

 // -----------------------------------------------------------------------

 function addComment(){
         $("#addcommentbtn").click(function(){

         $.post("php/addComment.php",
         {
           user_id: getCookie('user_id'),
           event_id: location.href.substring(47),
           text: $("#addcommenttxt").val(),
           rating:$("#addcommentrating").val()
         },
         function(data,status,xhrstuff){
           if (xhrstuff.responseText.includes("Successfully")) {
                 alert(xhrstuff.responseText);
                 location.reload();
               }
           else if (xhrstuff.responseText.includes("Duplicate entry")) {
                 alert("You can only comment once per event. Try modifying your comment instead.");
           }
           else {
           alert(xhrstuff.responseText);
           }
         });
     });

   }
