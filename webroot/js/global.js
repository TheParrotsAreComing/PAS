var APP_PATH = window.location.origin+"/";

function setupPhotoSelectionBehavior(cat_id) {

    $('.picture-file').click(function(){
        $('.picture-file').find('img').removeClass('selected');
        $(this).find('img').addClass('selected');

        $('.picture-file-action-cont').find('a').addClass('active');
    });

    $('#mark-profile-pic-btn').click(function(e){
        e.stopPropagation();
        e.preventDefault();

        if( $(this).hasClass('active') ) {

        	var file_id = $('.selected').parent().data('file-id');
        	var url = APP_PATH+'Cats/changeProfilePic';

		    $.ajax({
		        url : url,
		        type : 'POST',
		        data : {
		            cat_id : cat_id,
		            file_id: file_id
		        }
		    }).done(function(result) {
		        //result = JSON.parse(result);
		        if(result == 'success') {
		        	window.location = APP_PATH+'Cats/ajaxSuccessMessage';
		        } else {
		        	window.location = APP_PATH+'Cats/ajaxFailMessage';
		        }
		        
		      });
        }
    });

    $('#delete-pic-btn').click(function(e){
        e.stopPropagation();
        e.preventDefault();
        if( $(this).hasClass('active') ) {
            // do the delete pic stuff
            alert('clicked delete pic...');
        }
    });
}