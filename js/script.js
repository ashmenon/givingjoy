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
	})
})