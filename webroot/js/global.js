var APP_PATH = window.location.origin+"/";

jQuery(function() {
    //Show me the new select option for photos
    $('a[data-ix="add-photo-click-desktop"]').click(function(){
        $('.add-photo').css('display','flex');
        $('.add-photo').css('opacity','1');
        $('.add-photo-inner').css('display','flex');
        $('.add-photo-inner').css('opacity','1');
    });

    //I don't want to see the select for photos
    $('.cancel').click(function(){
        $('.add-photo').css('display','none');
        $('.add-photo-inner').css('display','none');
        $('.add-photo-inner').css('opacity','0');
    });

    //Show me the new select option for files
    $('a[data-ix="add-file-click-desktop"]').click(function(){
        $('.add-file').css('display','flex');
        $('.add-file').css('opacity','1');
        $('.add-file-inner').css('display','flex');
        $('.add-file-inner').css('opacity','1');
    });

    //I don't want to see the select for files
    $('.cancel').click(function(){
        $('.add-file').css('display','none');
        $('.add-file-inner').css('display','none');
        $('.add-file-inner').css('opacity','0');
    });
});


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

function setupFileBehavior(entity_id, entity_controller_string) {


    $('.delete-file-btn').click(function(e){
        e.stopPropagation();
        e.preventDefault();

        var file_id = $(this).closest('.files-data-wrap').data('file-id');

        $("#dialog-confirm-file-delete").dialog({
            resizable: false,
            height: "auto",
            width: 400,
            modal: true,
            buttons: {
                "Delete!": {
                    text:"Delete!",
                    id:"delFile",
                    click : function() {
                        $(this).dialog( "close" );

                        var url = APP_PATH+entity_controller_string+'deleteFile';

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

    });
}