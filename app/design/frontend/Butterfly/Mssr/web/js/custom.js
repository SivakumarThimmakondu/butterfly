

var modal = document.getElementById('myModal1');

// When the user clicks anywhere outside of the modal, close it
 window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

$(function(){
	$("#Reg-now").click(function () {
		$("#modal-content,#modal-background").show();			
		$("#myModal1").hide();
	});
});

$(function(){
	$("#modal-close").click(function () {
		$("#myModal1").show();
		$("#modal-content,#modal-background").hide();
		
	});
});



