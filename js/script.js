$(document).ready(function(){
	$('#sendbyemail').click(function(){
		$('#email_message').slideDown();
		setTimeout(function(){
			document.location.href = 'index.php';
		},5000);
	});

	$('.btn-select-project').click(function(){
		var btn = $(this);
		if(btn.hasClass('btn-warning')){
			btn.removeClass('btn-warning');
			btn.text('Select Project');
		} else {
			btn.addClass('btn-warning');
			btn.text('Deselect Project');
		}
		return false;
	});

	$('#confirm-button a').click(function(){
		$('#confirm-button').slideUp();
		$('#thankyou').slideDown();
		setTimeout(function(){
			document.location.href = 'index.php';
		},5000);
		return false;
	})

  // on Modal shown, hide #opening - how #hidden
  $("#myModal").on("show", function() {
    $("#opening,#organizations").hide(1000);
    $('#giftbuttons').show(1000);
  });

  $("#skipintro").click(function() {    
    $('#giftbuttons').show(1000);
    return false;
  });



  // Youtube end -> close modal
  function onYouTubePlayerReady(playerId) {
    ytplayer = document.getElementById("myytplayer");
    ytplayer.addEventListener("onStateChange", "onytplayerStateChange");

    function onytplayerStateChange(newState) {
      if(newState === 0){
        $("#myModal").modal('hide');
      }
    }
  };

  // on Modal hidden,   how #hidden
  $("#myModal").on("hidden", function() {
    $(".displayHidden").show(1000);
  });

  // Giftcard

  $(function(){
    $("#sender_name").keyup(function(){
      $("#_sender_name").text(this.value);
    });
    $("#reciever_name").keyup(function(){
      $("#_reciever_name").text(this.value);
    });
    $("#message").keyup(function(){
      $("#_message").text(this.value);
    });
  });










})
