$(document).ready(function(){
  //Script for sign-in form
  // Get the modal
  var modal = document.getElementById('signin');

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  }


});
