var APP_PATH = window.location.origin+"/";

function setupPhotoSelectionBehavior(entity_id, entity_controller_string) {

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
            
            var url = APP_PATH+entity_controller_string+'changeProfilePic';

            $.ajax({
                url : url,
                type : 'POST',
                data : {
                    entity_id : entity_id,
                    file_id: file_id
                }
            }).done(function(result) {
                if(result == 'success') {
                    window.location = APP_PATH+entity_controller_string+'ajaxSuccessMessage';
                } else {
                    window.location = APP_PATH+entity_controller_string+'ajaxFailMessage';
                }
                
              });
        }
    });

    $('#delete-pic-btn').click(function(e){
        e.stopPropagation();
        e.preventDefault();

        if( $(this).hasClass('active') ) {

            var primary = $('.selected').next('.picture-primary').text();
            if (primary == 'H'){
                alert('You can not delete the profile photo! Choose a new profile photo and then delete this one.');
                return;
            }
            
            $( "#dialog-confirm-photo-delete" ).dialog({
                resizable: false,
                height: "auto",
                width: 400,
                modal: true,
                buttons: {
                "Delete!": {
                    text:"Delete!",
                    id:"delPhoto",
                    click : function() {
                        $(this).dialog( "close" );

                        var file_id = $('.selected').parent().data('file-id');
                        var url = APP_PATH+entity_controller_string+'deletePic';

                        $.ajax({
                            url : url,
                            type : 'POST',
                            data : {
                                file_id: file_id
                            }
                        }).done(function(result) {
                            if(result == 'success') {
                                window.location = APP_PATH+entity_controller_string+'ajaxSuccessMessage';
                            } else {
                                window.location = APP_PATH+entity_controller_string+'ajaxFailMessage';
                            }
                          });
                      }
                },
                Cancel: function() {
                    $(this).dialog( "close" );
                    $('.no-horizontal-scroll').scrollLeft(0);
                }
              }
            });
        }
    });
}