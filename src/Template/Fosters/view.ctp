<?= $this->Html->script('cats.js'); ?>
<?= $this->Html->script('fosters.js'); ?>
  <div class="body">
    <div class="column profile scroll1">
      <div class="profile-cont" data-ix="page-load-fade-in">
        <div class="button profile-header">
            <a onclick="history.go(-1);" href="#" class="profile-back w-inline-block">
              <div>&lt; Back</div>
            </a>
            <div class="profile-id-cont"></div>
        </div>
        <div class="profile-header">
          <?php 
            if(!empty($profile_pic)){
              echo $this->Html->image('../'.$profile_pic->file_path.'.'.$profile_pic->file_ext, ['class'=>'cat-profile-pic']);
            } else {
              echo '<img class="cat-profile-pic" src="http://uploads.webflow.com/img/image-placeholder.svg">';
            }
          ?>
          <div>
            <div class="cat-profile-name"><?= h($foster->first_name)." ".h($foster->last_name) ?></div>
            <div>
              <div class="profile-header-text">Rating:</div>

              <div class="profile-header-text"><?= $this->Number->format($foster->rating) ?></div>
            </div>
          </div>
        </div>
        <div class="profile-tabs-cont w-tabs">
            <div class="cat-profile-tabs-menu w-tab-menu">
              <a class="cat-profile-tabs-menu-cont tab-leftmost w--current w-inline-block w-tab-link" data-ix="foster-notification" data-w-tab="Tab 1"><img class="cat-profile-tabs-icon" src="<?= $this->Url->image('cat-profile-foster-01.png');?>">
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
                    <div class="profile-notification-cont">
                      <?php foreach ($foster['tags'] as $tag): ?>                
                        <div class="tag-cont" data-id="<?= $tag->id ?>" style="color:#<?= $tag['color'] ?>; border-color: #<?= $tag['color'] ?>;">
                          <div class="tag-text"><?= $tag['label'] ?></div><a data-id="<?= $tag->id ?>"  class="tag-remove" style="color:#<?= $tag['color'] ?>;" href="#"></a>
                        </div>
                      <?php endforeach; ?>   
                    </div>
                    <div class="medical-wrap">
                      <a class="profile-add-cont" data-ix="add-tag" href="#">+ Add Tag</a>
                    </div>
                    <div class="profile-content-cont">
                        <div class="profile-text-header">Personal Information</div>
                        <div class="left-justify profile-field-cont">
                          <div class="profile-field-name">Email: </div>
                          <div class="block profile-field-text"><?= h($foster->email) ?></div>
                        </div>

                        <div class="left-justify profile-field-cont">
                          <div class="profile-field-name">Address: </div>
                          <div class="block profile-field-text"><?= h($foster->address) ?></div>
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
                          <div class="profile-field-name">Availability: </div>
                          <div class="block profile-field-text"><?= nl2br(h($foster->avail)) ?></div>
                        </div>

                        <div class="left-justify profile-field-cont">
                          <div class="profile-field-name">Experience: </div>
                          <div class="block profile-field-text"><?= nl2br(h($foster->exp)) ?></div>
                        </div>

                        <div class="left-justify profile-field-cont">
                          <div class="profile-field-name">Notes: </div>
                          <div class="block profile-field-text"><?= nl2br(h($foster->notes)) ?></div>
                        </div>
                    </div>
                  </div>
              <div class="w-tab-pane" data-w-tab="Tab 2">
                <div class="profile-content-cont">
                  <?php if (empty($foster['cat_histories'])): ?>
                    <a class="card w-clearfix w-inline-block">
                      <div class="card-h1">This foster home is not fostering any cats at the moment. Please check the foster's availability.</div>
                    </a>
                  <?php else: ?> 
                <div class="profile-text-header">Fostered Cats</div>
                    <?php foreach ($foster['cat_histories'] as $cat): ?>
                      <?php $cat = $cat['cat']; ?>
                        <div class="card-cont card-wrapper w-dyn-item">
                          <a class="card w-clearfix w-inline-block" href="<?= $this->Url->build(['controller'=>'cats', 'action'=>'view', $cat['id']], ['escape'=>false]); ?>"><img class="card-pic" src="<?= $this->Url->image('cat-menu.png'); ?>">
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
                                  </div>
                                <?php endif;?>
                              <?php endforeach; ?>
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
                              <?php if($photo->id == $foster->profile_pic_file_id): ?>
                                <div class="picture-primary">H</div>
                              <?php endif; ?>
                            </div>
                          <?php endforeach; ?>
                        <?php endif; ?>
                      </div>
					  <?php if ($can_edit): ?>
		                  <div class="picture-file-action-cont">
		                    <a class="left picture-file-action w-button" data-ix="filter-cancel" href="#" id="mark-profile-pic-btn">Mark as Profile Photo</a>
		                    <a class="picture-file-action w-button" href="#" id="delete-pic-btn">Delete Selected</a>
		                  </div>
		                  <div class="picture-file-action-cont">
						    <a class="profile-add-cont w-inline-block add-photo-btn" href="javascript:void(0);" data-ix="add-photo-click-desktop">+ Add New Photo</a> 
						  </div>
					  <?php endif; ?>
                    </div>
                    <div class="profile-text-header">Uploaded Files (<?= h($filesCountTotal) ?>)</div>

              <div class="medical-wrap">
                  <div class="medical-header-cont">
                    <div class="medical-type-cont">
                      <div class="medical-header">Uploaded</div>
                    </div>
                    <div class="medical-date-cont">
                      <div class="medical-header">Original Name</div>
                    </div>
                    <div class="medical-notes-cont">
                      <div class="medical-header">Note</div>
                    </div>
                  </div>
                  <?php if ($filesCountTotal > 0): ?>
                    <?php foreach($files as $file): ?>

                  <div class="scroll1 no-horizontal-scroll">
                    <div class="medical-data-cont" data-ix="medical-data-click">
                    <div class="medical-type-cont">
                      <div class="medical-data-type"><?= h($file->created) ?></div>
                    </div>
                    <div class="medical-date-cont">
                      <div class="medical-date-cont"><?= h($file->original_filename) ?></div>
                    </div>
                    <div class="medical-notes-cont">
                      <div class="medical-data-notes"><?= h($file->note) ?></div>
                    </div>
                    <div class="medical-data-action-cont">
                      <a class="left medical-data-action w-inline-block delete-record-btn" href="#">
                      <div class="basic profile-action-button"></div>
                      <div>delete</div>
                      </a>
                      <a class="right medical-data-action w-inline-block" href="#">
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
        <div class="profile-action-cont w-hidden-medium w-hidden-small w-hidden-tiny">
          <?php if ($can_edit): ?>
			  <a class="profile-action-button-cont w-inline-block" href="<?= $this->Url->build(['controller'=>'fosters', 'action'=>'edit
		      ', $foster->id], ['escape'=>false]);?>">
		        <div class="profile-action-button sofware">-</div>
		        <div>edit</div>
		      </a>
	      <?php endif; ?>
          <a class="profile-action-button-cont w-inline-block" href="#">
            <div class="basic profile-action-button"></div>
            <div>export</div>
          </a>
          <?php if ($can_delete): ?>
            <a class="delete-button profile-action-button-cont w-inline-block" data-ix="delete-click-desktop" >
              <div class="basic profile-action-button"></div>
              <div>delete</div>
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="notify-cont w-hidden-main">
    <div class="notify-overview">Fostered Cats</div>
    <div class="notify-foster">Foster Home</div>
    <div class="notify-attachments">Attachments</div>
    <div class="notify-more">More...</div>
  </div>

  <div class="button-cont w-hidden-main">
    <a class="button-01 w-inline-block" href="<?= $this->Url->build(['controller'=>'fosters', 'action'=>'edit', $foster->id], ['escape'=>false]);?>">
        <div class="button-icon-text">Edit</div><img src="<?= $this->Url->image('edit-01.png');?>" width="55">
    </a>
    <div class="button-02">
        <div class="button-icon-text">Upload Attachments</div><img data-ix="add-click" src="<?= $this->Url->image('upload-01.png');?>" width="55">
    </div>
    <div class="button-03" data-ix="add-click">
        <div class="button-icon-text">Export</div><img data-ix="add-click" src="<?= $this->Url->image('export-01.png');?>" width="55">
    </div>
    <div class="button-04" data-ix="delete-click">
        <div class="delete-button button-icon-text">Delete</div><img src="<?= $this->Url->image('delete-01.png');?>" width="55">
    </div>
  </div><img class="button-paw" data-ix="paw-click" src="<?= $this->Url->image('add-paw.png');?>" width="60">

  <div class="floating-overlay">
    <div class="confirm-cont">
      <div class="confirm-text">Are you sure you want to delete this foster?</div>
      <div class="confirm-button-wrap w-form">
        <form class="confirm-button-cont" data-name="Email Form 2" id="email-form-2" name="email-form-2">
            <a class="cancel confirm-button w-button" data-ix="confirm-cancel" href="#">Cancel</a>
            <?= $this->Html->link('Delete', ['controller'=>'fosters', 'action'=>'delete', $foster->id], ['class'=>'confirm-button delete w-button']); ?>
        </form>
      </div>
    </div>
  </div> 

  <div class="floating-overlay add-tag">
    <div class="confirm-cont add-tag-inner">
      <h4>Select a tag to add</h4>
      <form class="confirm-button-cont" data-name="Email Form 2" id="email-form-2" name="email-form-2">
        <div class="tag_options">
          <?= $this->Form->input('tag',['class'=>'add-input w-input','options'=>$foster_tags]) ?>
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
    <div class="confirm-button-wrap w-form">
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

<div id="dialog-confirm-photo-delete" title="Delete this photo?" style="display:none;">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Are you sure you want to delete this photo?</p>
</div>

<script>
	$(function(){
    var foster_id = "<?= $foster->id ?>";
    var foster_controller_string = "Fosters/";
    var foster = new Foster();
    var tagDel = "<?= $this->Url->build(['controller'=>'fosters','action'=>'deleteTag']); ?>";
    var deletePhone = "<?= $this->Url->build(['controller'=>'PhoneNumbers', 'action'=>'delete']) ?>";

    calculateAndPopulateAgeFields();
    setupPhotoSelectionBehavior(foster_id, foster_controller_string);

		$('.delete-button').click(function(e){
			e.preventDefault();
			$.when(foster.deleteCheck(<?= $foster->id ?>)).done(function(){
				if(foster.empty == '1'){
					var confirm_text = $('<div class="confirm-text"/>');
					confirm_text.text('This foster currently has a cat/kitten.');
					$('.confirm-text').after(confirm_text);

					var confirm_text_2 = $('<div classć"confirm-text"/>');
					confirm_text_2.text('Deleting this foster will also mark the cat/kitten as unfostered.');
					confirm_text.after(confirm_text_2);
				}
			});
		});

    $('.add-tag-btn').click(function(e) {
      e.stopPropagation();
      e.preventDefault();
      $.ajax({
        url : "<?= $this->Url->build(['controller'=>'fosters','action'=>'attachTag']); ?>",
        type : 'POST',
        data : {
          tag_id : $('#tag').val(),
          foster_id : '<?= $foster->id ?>'
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
						'foster_id' : '<?= $foster->id ?>',
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
  });
</script>
