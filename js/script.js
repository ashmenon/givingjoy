var selectedProjects;

$(document).ready(function(){
	$('#sendbyemail').click(function(){

		$('#email_message').slideDown();
    $.post('ajax.php',{
      fn:'send_recipient_email',
      giftcard_token: $('#sendbyemail').data('giftcard-token')
    },function(data){
      if(data.status == 'OK'){
        setTimeout(function(){
          document.location.href = 'index.php';
        },1000);
      }
    })
		
	});

  if($.cookie('selectproject')){
    initProjectSelect();
  }

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

  $('.project-thumbnail-image').click(function(){    
    var thumb = $(this);
    var mainImg = thumb.closest('.well').find('.project-image');
    mainImg.attr('src',thumb.attr('src'));
  })

})


function initProjectSelect(){
  if(!$('#use_form').length) return false;
  $('#project_select_holder').remove();
  $('body').addClass('bottomgap');
  var holder = $('<div id="project_select_holder" class="container" />');
  holder.insertBefore($('#use_form').parent());

  holder.append('<h4>Selected Projects</h4>');
  holder.append('<div id="projects_container" class="row-fluid">');

  var container = holder.find('#projects_container');
  container.append('<div class="clear-both"></div>');

  var form = $('#use_form');
  form.find('[type="reset"]').click(function(){
    container.find('.selected-project .close').click();
  });

  form.submit(function(){
    var str = '';
    var selected = container.find('.selected-project');
    if(!selected.length){
      alert('Please select at least one project to contribute to.');
      return false;
    }
    selected.each(function(index,item){
      if(str.length) str += ',';
      str += $(item).data('project-id');
    });
    form.find('#chosen_projects').val(str);
    $.cookie('selected-projects',str);
    return true;
  })

  $('.btn-select-project').live('click',function(){
    var btn = $(this);
    var projectId = btn.data('project-id');
    var project = btn.closest('.project-entry');

    if(btn.data('project-selected') == true){
      container.find('#selected_project_' + projectId).remove();  
      btn.html('Select Project').removeClass('btn-warning');
      btn.data('project-selected',false);    
    } else {
      if(container.find('.selected-project').length >= 3){
        alert('You have already selected the maximum of 3 projects. Please deselect another project to add this one.');
        return false;
      }
      var selected = $('<div id="selected_project_' + projectId + '" class="selected-project span4" />');
      selected.data('project-id',projectId);
      
      project.find('.project-image').clone().appendTo(selected);
      
      var projectTitle = $('<h4 />');
      projectTitle.text(project.find('.project-title-link').text());
      projectTitle.appendTo(selected);

      var closeButton = $('<a class="close">&times;</a>');
      closeButton.prependTo(selected);
      
      selected.insertBefore(container.find('.clear-both'));
      btn.html('Deselect Project').addClass('btn-warning');
      btn.data('project-selected',true);    
    }

  });

  $('.selected-project .close').live('click',function(){
    var btn = $(this);
    var selected = btn.closest('.selected-project');
    var projectId = selected.data('project-id');
    $('#project_entry_' + projectId + ' .btn-select-project').click();
  })
}
