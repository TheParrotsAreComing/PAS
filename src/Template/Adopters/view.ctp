 <?= $this->Html->script('cats.js'); ?> 
 <?= $this->Html->script('adopters.js'); ?> 
  <div class="body">
    <div class="column profile scroll1">
      <div class="profile-cont" data-ix="page-load-fade-in">
        <div class="top profile-header">
            <a onclick="history.go(-1);" href="#" class="profile-back w-inline-block">
            <div>&lt; Back</div>
            </a>
        </div>
        <div class="profile-header">
          <?php 
            if(!empty($profile_pic)){
              echo $this->Html->image('../'.$profile_pic->file_path.'.'.$profile_pic->file_ext, ['class'=>'cat-profile-pic']);
            } else {
              echo $this->Html->image('../img/adopter-menu.png', ['class'=>'cat-profile-pic']);
            }
          ?>
          <div>
            <div class="cat-profile-name"><?= h($adopter->first_name)." ".h($adopter->last_name) ?></div>
      			<div>
      				<?php if($adopter->do_not_adopt == 1): ?>
      					<div class="profile-header-text">DO NOT ADOPT</div>
      				<?php endif; ?>            
      			</div>
          </div>
        </div>
        <div class="profile-tabs-cont w-tabs">
          <div class="cat-profile-tabs-menu w-tab-menu">
            <a class="cat-profile-tabs-menu-cont tab-leftmost w--current w-inline-block w-tab-link" data-ix="adopter-notification" data-w-tab="Tab 1"><img class="cat-profile-tabs-icon" src="<?= $this->Url->image('cat-profile-adopter-01.png');?>">
            </a>
			       <a class="cat-profile-tabs-menu-cont w-inline-block w-tab-link" data-ix="overview-notification" data-w-tab="Tab 2"><img class="cat-profile-tabs-icon" src="<?= $this->Url->image('cat-01.png');?>">
            </a>
            <a class="cat-profile-tabs-menu-cont w-inline-block w-tab-link" data-ix="attachment-notification" data-w-tab="Tab 3"><img class="cat-profile-tabs-icon" src="<?= $this->Url->image('attachments-01.png');?>">
            </a>
            <a class="cat-profile-tabs-menu-cont tabs-rightmost w-inline-block w-tab-link" data-ix="more-notification" data-w-tab="Tab 4"><img class="cat-profile-tabs-icon" src="<?= $this->Url->image('more-01.png');?>">
            </a>
          </div>
          <div class="profile-tab-wrap scroll1 w-tab-content">
            <div class="profile-tab-cont w--tab-active w-clearfix w-tab-pane" data-w-tab="Tab 1">
                <div class="profile-notification-cont" style="overflow: auto;">
                  <?php foreach ($adopter['tags'] as $tag): ?>                
                    <div class="tag-cont" data-id="<?= $tag->id ?>" style="color:#<?= $tag['color'] ?>; border-color: #<?= $tag['color'] ?>;">
                      <div class="tag-text"><?= $tag['label'] ?></div><a data-id="<?= $tag->id ?>" class="tag-remove" style="color:#<?= $tag['color'] ?>;" href="#"></a>
                    </div>
                  <?php endforeach; ?>
                </div>
                <div class="medical-wrap">
                  <a class="profile-add-cont" data-ix="add-tag" href="#">+ Add Tag</a>
                </div>
    			     <?php if($adopter->do_not_adopt == 1): ?>
                  <div class="profile-content-cont">
            				<div class="profile-text-header">Reason to NOT Adopt</div>
          					<div class="profile-field-cont">
          					  <div class="left-justify profile-field-cont">
          						  <div class="profile-field-text"><?= nl2br(h($adopter->dna_reason)) ?></div>
          					  </div>
          				  </div>
    				      </div>
    			     <?php endif; ?>
    			     <div class="profile-content-cont">
                  <div class="profile-text-header">Personal Information</div>
                    <div class="left-justify profile-field-cont">
                      <div class="profile-field-name">Email: </div>
                      <div class="block profile-field-text"><?= h($adopter->email) ?></div>
                    </div>

                    <div class="left-justify profile-field-cont">
                      <div class="profile-field-name">Address: </div>
                      <div class="block profile-field-text"><?= h($adopter->address) ?></div>
                    </div>

                      <div class="profile-text-header">Phone Number(s) </div>
                        <div class="medical-wrap">
                          <?php foreach ($phones as $number): ?>
                            <?php $type = "";
                              if ($number->phone_type === 0) {$type = "Mobile: ";} 
                              else if ($number->phone_type === 1) {$type = "Home: ";} 
                              else if ($number->phone_type === 2) {$type = "Organization: ";}
                              else if ($number->phone_type === 3) {$type = "Other: ";} 
                            ?>
                            <div class="scroll1 no-horizontal-scroll">
                              <div class="medical-data-cont" data-ix="medical-data-click">
                                <div class="phone-number-type-cont">
                                  <div class="medical-data-type"><?= $type ?></div>
                                </div>
                                <div class="phone-number-num-cont">
                                  <div class="phone-number-num-cont"><?php echo "(".substr($number->phone_num, 0, 3).") ".substr($number->phone_num, 3, 3)."-".substr($number->phone_num,6); ?></div>
                                </div>
                              </div>
                            </div>
                          <?php endforeach; ?>
                        </div>
                </div>
                <div class="profile-content-cont">
                    <div class="profile-text-header">Additional Information</div>

                      <div class="left-justify profile-field-cont">
                        <div class="profile-field-name">Notes: </div>
                        <div class="block profile-field-text"><?= nl2br(h($adopter->notes)) ?></div>
                      </div>

                </div>
              </div>
              <div class="w-tab-pane" data-w-tab="Tab 2">
                  <div class="profile-content-cont">
                    <?php if (empty($adopter['cat_histories'])): ?>
                      <a class="card w-clearfix w-inline-block">
                        <div class="card-h1">This person has not adopted a cat.</div>
                      </a>
                    <?php else: ?> 
                  <div class="profile-text-header">Adopted Cats</div>
                      <?php foreach ($adopter['cat_histories'] as $cat): ?>
                        <?php $cat = $cat['cat']; ?>
                        <div class="card-cont card-wrapper w-dyn-item">
                          <a class="card w-clearfix w-inline-block" href="<?= $this->Url->build(['controller'=>'cats', 'action'=>'view', $cat['id']], ['escape'=>false]); ?>">
                          <div class="card-pic-cont">
                          <?php if($cat->profile_pic_file_id > 0) {
                              echo $this->Html->image('../'.$cat->profile_pic->file_path.'.'.$cat->profile_pic->file_ext, ['class'=>'card-pic']);
                            }
                            else {
                              echo $this->Html->image('../img/cat-menu.png', ['class'=>'card-pic']);
                            }
                          ?>

                          </div>
                            <div class="card-h1"><?= $cat['cat_name'];?></div>
                            <div class="card-h2-cont">
                              <div class="card-h2-symbol <?= ($cat->is_female) ? "female" : "male" ?>"><?= ($cat->is_female) ? "D" : "C" ?></div>
                              <div class="card-h2 <?= ($cat->is_female) ? "female" : "male" ?>"><?= ($cat->is_kitten) ? "Kitten" : "Cat" ?></div>
                            </div>
                            <div class="card-field-wrap">
                              <div class="card-field-cont">
                                <div class="card-field-cont" style="display:none;">
                                  <div class="card-h3">DOB:</div>
                                  <div class="card-field-text cat-dob"><?= h($cat->dob) ?></div>
                                </div>
                                <div class="card-field-cont">
                                  <div class="card-h3">Age:</div>
                                  <div class="card-field-text cat-age"></div>
                                </div>
                              </div>
                              <?php foreach($cat_breeds as $breed): ?>
                                <?php if($cat->breed_id == $breed->id): ?>
                                  <div class="card-field-cont">
                                    <div class="card-field-cont">
                                      <div class="card-h3">Breed:</div>
                                      <div class="card-field-text"><?= $breed['breed']; ?></div>
                                    </div>
                                <?php endif;?>
                              <?php endforeach; ?>
                                <div class="card-field-cont">
                                  <div class="card-h3">Fee paid:</div>
                                  <div class="card-field-text">$<?= $cat['adoption_fee_amount'] ?></div>
                                </div>
                              </div>
                            </div>
                              </a>
                          </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="w-tab-pane" data-w-tab="Tab 3">
          				<div class="profile-content-cont">
          					<div class="profile-text-header">Pictures (<?= h($photosCountTotal) ?>)</div>
          				  <div class="picture-file-wrap" data-ix="medical-data-click">
                      <div class="picture-file-cont scroll1">
                        <?php if($photosCountTotal > 0):  ?>
                          <?php foreach($photos as $photo): ?>
                            <div class="picture-file" data-file-id="<?= h($photo->id) ?>">
                              <?php echo $this->Html->image('../'.$photo->file_path.'_tn.'.$photo->file_ext, ['class'=>'picture']); ?>
                              <?php if($photo->id == $adopter->profile_pic_file_id): ?>
                                <div class="picture-primary">H</div>
                              <?php endif; ?>
                            </div>
                          <?php endforeach; ?>
                        <?php endif; ?>
                      </div>
                      <div class="picture-file-action-cont">
                        <a class="left picture-file-action w-button" data-ix="filter-cancel" href="#" id="mark-profile-pic-btn">Mark as Profile Photo</a>
                        <a class="picture-file-action w-button" href="#" id="delete-pic-btn">Delete Selected</a>
                      </div>
                      <div class="picture-file-action-cont">
                  <a class="profile-add-cont w-inline-block add-photo-btn" href="javascript:void(0);" data-ix="add-photo-click-desktop">+ Add New Photo</a> 
                </div>
                    </div>
                <div class="profile-text-header">Uploaded Files (<?= h($filesCountTotal) ?>)</div>
                <div class="files-wrap">
                    <div class="files-header-cont">
                      <div class="files-date-cont">
                        <div class="files-header">date</div>
                      </div>
                      <div class="files-name-cont">
                        <div class="files-header">filename & notes</div>
                      </div>
                    </div>
                  <?php if ($filesCountTotal > 0): ?>
                    <?php foreach($files as $file): ?>
                    <div class="files-data-wrap no-horizontal-scroll" data-file-id="<?= h($file->id) ?>">
                      <div class="files-data-cont" data-ix="medical-data-click">
                      <div class="files-date-cont">
                        <div class="medical-data-type"><?= h($file->created) ?></div>
                      </div>
                      <div class="files-name-cont">
                        <div class="files-name"><?= h($file->original_filename) ?>.<?= h($file->file_ext) ?></div>
                        <div class="files-data"><?= h($file->note) ?></div>
                      </div>
                      <div class="medical-data-action-cont">
                        <a class="left medical-data-action w-inline-block delete-file-btn" href="#">
                        <div class="basic profile-action-button"></div>
                        <div>delete</div>
                        </a>
                        <a class="right medical-data-action w-inline-block" href="<?= $this->Url->build(['controller'=>'Files', 'action'=>'downloadfilebyid', $file->id]) ?>">
                        <div class="profile-action-button sofware">p</div>
                        <div>download</div>
                        </a>
                      </div>
                      </div>
                    </div>
                <?php endforeach; ?>
                <?php else : ?>
                  <!-- No uploaded documents to load-->
                <?php endif; ?>
                <a class="profile-add-cont w-inline-block add-file-btn" href="javascript:void(0);" data-ix="add-file-click-desktop">+ Add New File</a> 
                    </div>
                  </div>
          			</div>
                <div class="w-tab-pane" data-w-tab="Tab 4">
          				<div class="profile-content-cont">
          					<div class="profile-text-header">More..</div>
          				</div>
          			</div>
           </div>
        </div>
        <div class="profile-action-cont w-hidden-small w-hidden-tiny">
        <?php if ($can_edit): ?>       
		<a class="profile-action-button-cont w-inline-block" href="<?= $this->Url->build(['controller'=>'adopters', 'action'=>'edit
          ', $adopter->id], ['escape'=>false]);?>">
            <div class="profile-action-button sofware">-</div>
            <div>edit</div>
          </a>
          <a class="profile-action-button-cont w-inline-block" href="#">
		<?php endif; ?>           
		 <div class="basic profile-action-button"></div>
            <div>export</div>
          </a>
          <?php if ($can_delete): ?>
            <a class="delete-button profile-action-button-cont w-inline-block" data-ix="delete-click-desktop" href="#">
              <div class="basic profile-action-button" ></div>
              <div>delete</div>
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="notify-cont w-hidden-main w-hidden-medium">
    <div class="notify-overview">Adopted Cats</div>
    <div class="notify-adopter">Adopter</div>
    <div class="notify-attachments">Attachments</div>
    <div class="notify-more">More...</div>
  </div>

  <div class="floating-overlay">
    <div class="confirm-cont">
      <div class="confirm-text">Are you sure you want to delete this adopter?</div>
      <div class="confirm-button-wrap w-form">
        <form class="confirm-button-cont" data-name="Email Form 2" id="email-form-2" name="email-form-2">
            <a class="cancel confirm-button w-button" data-ix="confirm-cancel" href="#">Cancel</a>
            <?= $this->Html->link('Delete', ['controller'=>'adopters', 'action'=>'delete', $adopter->id], ['class'=>'confirm-button delete w-button']); ?>
        </form>
      </div>
    </div>
  </div>

  <div class="button-cont">
    <?php if ($can_edit): ?>
      <a class="button w-inline-block" href="<?= $this->Url->build(['controller'=>'adopters', 'action'=>'edit', $adopter->id]) ?> ">
        <div class="button-icon-text">Edit</div>
        <div class="floating-button">
          <div>L</div>
        </div>
      </a>
    <?php endif; ?>
    <!--<div class="button-02">
      <div class="button-icon-text">Upload Attachments</div><img data-ix="add-click" src="<?= $this->Url->image('upload-01.png') ?>" width="55">
    </div>-->
    <?php if ($can_delete): ?>
      <a class="button w-inline-block" href="<?= $this->Url->build(['controller'=>'cats', 'action'=>'aapUpload', $adopter->id]) ?>">
        <div class="button-icon-text">Export</div>
        <div class="floating-button">
          <div>N</div>
        </div>
      </a>
      <a class="button w-inline-block" data-ix="delete-click">
        <div class="button-icon-text">Delete</div>
        <div class="floating-button">
          <div>M</div>
        </div>
        </a>
    <?php endif; ?>
  </div>
  <div class="button-paw w-hidden-main w-hidden-medium" data-ix="paw-click">
      <div>O</div>
  </div>
	<div id="dialog-confirm" title="Adopt this kitten?" style="display:none;">
		<p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Are you sure you want to mark this cat/kitten as adopted?</p>
	</div>

  <div class="add-adopter-floating-overlay add-tag">
    <div class="confirm-cont add-tag-inner">
      <h4>Select a tag to add</h4>
      <form class="confirm-button-cont" data-name="Email Form 2" id="email-form-2" name="email-form-2">
        <div class="tag_options">
          <?= $this->Form->input('tag',['class'=>'add-input w-input','options'=>$adopter_tags]) ?>
        </div>
      </form>
      <br/>
      <div class="confirm-button-wrap w-form">
        <a class="cancel confirm-button w-button" data-ix="confirm-cancel" href="#">Cancel</a>
        <a class="delete add-tag-btn confirm-button w-button" href="#">Add Tag</a>
      </div>
    </div>
  </div>

  <div class="add-adopter-floating-overlay add-photo">
  <div class="confirm-cont add-photo-inner">
    <div class="confirm-text">Choose a Photo...</div>
      <?php 
        echo $this->Form->create($uploaded_photo, ['enctype' => 'multipart/form-data']);
        echo $this->Form->input('uploaded_photo', ['type' => 'file', 'accept' => 'image/*']);
      ?>
    <br/>
    <div class="confirm-button-wrap w-form add-button-cont">
      <a class="cancel confirm-button w-button" data-ix="confirm-cancel" href="#">Cancel</a>
      <?php
        echo $this->Form->submit("Upload!", ['class' => 'delete add-photo-btn confirm-button w-button']);
        echo $this->Form->end();
       ?>
    </div>
  </div>
</div> 

<div class="add-adopter-floating-overlay add-file">
  <div class="confirm-cont add-file-inner">
    <div class="confirm-text">Choose a File...</div>
      <?php 
        echo $this->Form->create($uploaded_file, ['enctype' => 'multipart/form-data']);
        echo $this->Form->input('uploaded_file', ['type' => 'file', 'accept' => '*']);
        echo $this->Form->input('file-note', ['class'=>'add-tag-input w-input', 'templates'=>['inputContainer'=>'{{content}}'], 'data-name'=>'file-note', 'maxlength'=>256, 'name'=>'file-note', 'placeholder'=>'Enter a note about this file...', 'type'=>'text']);
      ?>
    <br/>
    <div class="confirm-button-wrap w-form add-button-cont">
      <a class="cancel confirm-button w-button" data-ix="confirm-cancel" href="#">Cancel</a>
      <?php
        echo $this->Form->submit("Upload!", ['class' => 'delete add-file-btn confirm-button w-button']);
        echo $this->Form->end();
       ?>
    </div>
  </div>
</div> 

<div id="dialog-confirm-tag" title="Delete this tag?" style="display:none;">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Are you sure you want to delete this tag?</p>
</div>

<div id="dialog-confirm-number" title="Delete this phone number?" style="display:none;">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Are you sure you want to delete this phone number?</p>
</div>

<div id="dialog-confirm-photo-delete" title="Delete this photo?" style="display:none;">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Are you sure you want to delete this photo?</p>
</div>

<div id="dialog-confirm-file-delete" title="Delete this file?" style="display:none;">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Are you sure you want to delete this file?</p>
</div>

<script>
	$(function(){
    var adopter_id = "<?= $adopter->id ?>";
    var adopter_controller_string = "Adopters/"
    var adopter = new Adopter();
    var tagDel = "<?= $this->Url->build(['controller'=>'adopters','action'=>'deleteTag']); ?>";
    var deletePhone = "<?= $this->Url->build(['controller'=>'PhoneNumbers', 'action'=>'delete']) ?>";
    
    calculateAndPopulateAgeFields();
    setupPhotoSelectionBehavior(adopter_id, adopter_controller_string);
    setupFileBehavior(adopter_id, adopter_controller_string);

		$('.delete-button').click(function(e){
			e.preventDefault();
			$.when(adopter.deleteCheck(<?= $adopter->id ?>)).done(function(){
				if(adopter.empty == '1'){
					var confirm_text = $('<div class="confirm-text"/>');
					confirm_text.text('This adopter currently has a cat/kitten.');
					$('.confirm-text').after(confirm_text);

					var confirm_text_2 = $('<div class="confirm-text"/>');
					confirm_text_2.text('Deleting this adopter will also mark the cat/kitten as unadopted.');
					confirm_text.after(confirm_text_2);
				}
			});
		});

		$('.add-tag-btn').click(function(e) {
		  e.stopPropagation();
		  e.preventDefault();
		  $.ajax({
		    url : "<?= $this->Url->build(['controller'=>'adopters','action'=>'attachTag']); ?>",
		    type : 'POST',
		    data : {
		      tag_id : $('#tag').val(),
		      adopter_id : '<?= $adopter->id ?>'
		    }
		  }).done(function(result) {
		    result = JSON.parse(result);
		    $('.add-tag').css('display','none');
		    $('.add-tag-inner').css('display','none');
		    $('.add-tag-inner').css('opacity','0');

		    var tag_cont = $('<div/>');
		    tag_cont.addClass('tag-cont');
		    tag_cont.css('border-color','#'+result['color']);
		    tag_cont.css('color','#'+result['color']);
            tag_cont.attr('data-id', result['id']);

		    var tag_text = $('<div/>');
		    tag_text.addClass('tag-text');
		    tag_text.text(result['label']);

        var tag_rmv = $('<a/>');
        tag_rmv.addClass('tag-remove');
        tag_rmv.attr('href', '#');
        tag_rmv.css('color', '#'+result['color']);
        tag_rmv.text('');

        tag_cont.append(tag_text);
        tag_cont.append(tag_rmv);

		    $('.profile-notification-cont').prepend(tag_cont);

        var dropdown_option = $('.tag_options option[value='+result['id']+']');
        dropdown_option.remove();
		  });
		});

     $('.tag-remove').click(function(){
      var that = $(this); 
      var tag_id = that.attr('data-id');
       $( "#dialog-confirm-tag" ).dialog({
          resizable: false,
          height: "auto",
          width: 400,
          modal: true,
          buttons: {
          "Delete": {
			text : "Delete",
			id : "confirmTag",
			click : function() {
				$.ajax({
				  url : tagDel,
				  type : 'POST',
				  data : {
					'adopter_id' : '<?= $adopter->id ?>',
					'tag_id' : tag_id
				}
				}).done(function(result){
				  result = JSON.parse(result);
				  $('#tag').append('<option value="'+result['id']+'">'+result['label']+'</option>');
				});
				  that.parent().remove();
				  $( this ).dialog( "close" );
			  },
          },
          Cancel: function() {
            $( this ).dialog( "close" );
          }
          }
        });
    });
    $('.delete-number-btn').click(function(){
     var parent = $(this).parent().parent().parent();
     var that = $(this); 
     $( "#dialog-confirm-number" ).dialog({
        resizable: false,
        height: "auto",
        width: 400,
        modal: true,
        buttons: {
        "Delete!": function() {
          $.get(deletePhone+'/'+that.data('number'));
          $(this).dialog( "close" );
          parent.remove();
        },
        Cancel: function() {
          $(this).dialog( "close" );
          $('.no-horizontal-scroll').scrollLeft(0);
        }
        }
      });
    });
	});
</script>
