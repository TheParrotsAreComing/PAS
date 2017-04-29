  <div class="body">
    <div class="column profile scroll1">
      <div class="profile-cont" data-ix="page-load-fade-in">
        <div class="button profile-header">
            <a onclick="history.go(-1);" href="#" class="profile-back w-inline-block">
            <div>&lt; Back</div>
            </a>
        </div>
        <div class="profile-header"><img class="cat-profile-pic" src="http://uploads.webflow.com/img/image-placeholder.svg">
          <div>
            <div class="cat-profile-name"><?= h($user->first_name)." ".h($user->last_name) ?></div>
          </div>
        </div>
        <div class="profile-tabs-cont w-tabs">
          <div class="cat-profile-tabs-menu w-tab-menu">
            <a class="cat-profile-tabs-menu-cont tab-leftmost w--current w-inline-block w-tab-link" data-ix="adopter-notification" data-w-tab="Tab 1"><img class="cat-profile-tabs-icon" src="<?= $this->Url->image('user-menu.png');?>">
            </a>
           <a class="cat-profile-tabs-menu-cont w-inline-block w-tab-link" data-ix="overview-notification" data-w-tab="Tab 2"><img class="cat-profile-tabs-icon" src="<?= $this->Url->image('adopter-menu.png');?>">
            </a>
           <a class="cat-profile-tabs-menu-cont w-inline-block w-tab-link" data-ix="overview-notification" data-w-tab="Tab 3"><img class="cat-profile-tabs-icon" src="<?= $this->Url->image('foster-menu.png');?>">
            </a>
            <a class="cat-profile-tabs-menu-cont w-inline-block w-tab-link" data-ix="attachment-notification" data-w-tab="Tab 4"><img class="cat-profile-tabs-icon" src="<?= $this->Url->image('attachments-01.png');?>">
            </a>
            <a class="cat-profile-tabs-menu-cont tabs-rightmost w-inline-block w-tab-link" data-ix="more-notification" data-w-tab="Tab 5"><img class="cat-profile-tabs-icon" src="<?= $this->Url->image('more-01.png');?>">
            </a>
          </div>
          <div class="profile-tab-wrap scroll1 w-tab-content">
            <div class="profile-tab-cont w--tab-active w-clearfix w-tab-pane" data-w-tab="Tab 1">
               <div class="profile-content-cont">
                  <div class="profile-text-header">Personal Information</div>

                    <div class="left-justify profile-field-cont">
                      <div class="profile-field-name">Phone: </div>
                      <div class="block profile-field-text"><?= h($user->phone) ?></div>
                    </div>

                    <div class="left-justify profile-field-cont">
                      <div class="profile-field-name">Email: </div>
                      <div class="block profile-field-text"><?= h($user->email) ?></div>
                    </div>

                    <div class="left-justify profile-field-cont">
                      <div class="profile-field-name">Address: </div>
                      <div class="block profile-field-text"><?= h($user->address) ?></div>
                    </div>
                </div>
                <div class="profile-content-cont">
                    <div class="profile-text-header">Additional Information</div>

                </div>
              </div>
              <div class="w-tab-pane" data-w-tab="Tab 2">
                <div class="profile-content-cont">
                  <?php if (empty($adopter_profile)): ?>
                    <a class="cat-add w-button user-attach-new-adopter">Create Adopter Profile</a>
                  <?php else: ?>
                    <div class="profile-text-header">Adopter</div>
                      <div class="card-cont card-wrapper w-dyn-item">
                      <a class="card w-clearfix w-inline-block" href="<?= $this->Url->build(['controller'=>'adopters', 'action'=>'view', $adopter_profile->id], ['escape'=>false]);?>"><img class="card-pic" src="<?= $this->Url->image('adopter-menu.png'); ?>">
                      <div class="card-h1"><?= h($adopter_profile->first_name)." ".h($adopter_profile->last_name) ?></div>
                      <div class="card-field-wrap">
                        <div class="card-field-cont">
                        <div class="card-field-cont">
                          <div class="card-h3">Notes:</div>
                          <div class="card-field-text"><?= h($adopter_profile->notes) ?></div>
                        </div>
                        </div>
                        <div class="card-field-cont">
                          <div class="card-field-cont">
                          <div class="card-h3">Email:</div>
                          <div class="card-field-text"><?= h($adopter_profile->email) ?></div>
                        </div>
                        </div>
                        <div class="card-field-cont">
                        <div class="card-field-cont">
                          <div class="card-h3">Phone:</div>
                          <div class="card-field-text"><?= h($adopter_profile->phone) ?></div>
                        </div>
                        </div>
                        <div class="card-field-cont">
                        <div class="card-field-cont">
                          <div class="card-h3">Address:</div>
                          <div class="card-field-text"><?= h($adopter_profile->address) ?></div>
                        </div>
                        </div>
                      </div>
                      </a>
                    </div>

                  <?php endif;?>
                </div>
              </div>
              <div class="w-tab-pane" data-w-tab="Tab 3">
                <div class="profile-content-cont">

                  <?php if (empty($foster_profile)): ?>
                    <a class="cat-add w-button user-attach-new-foster">Create Foster Profile</a>
                  <?php else: ?>
                    <div class="profile-text-header">Foster</div>
                      <div class="card-cont card-wrapper w-dyn-item">
                      <a class="card w-clearfix w-inline-block" href="<?= $this->Url->build(['controller'=>'fosters', 'action'=>'view', $foster_profile->id], ['escape'=>false]);?>"><img class="card-pic" src="<?= $this->Url->image('foster-menu.png'); ?>">
                      <div class="card-h1"><?= h($foster_profile->first_name)." ".h($foster_profile->last_name) ?></div>
                      <div class="card-field-wrap">
                        <div class="card-field-cont">
                        <div class="card-field-cont">
                          <div class="card-h3">Notes:</div>
                          <div class="card-field-text"><?= h($foster_profile->notes) ?></div>
                        </div>
                        </div>
                        <div class="card-field-cont">
                          <div class="card-field-cont">
                          <div class="card-h3">Email:</div>
                          <div class="card-field-text"><?= h($foster_profile->email) ?></div>
                        </div>
                        </div>
                        <div class="card-field-cont">
                        <div class="card-field-cont">
                          <div class="card-h3">Phone:</div>
                          <div class="card-field-text"><?= h($foster_profile->phone) ?></div>
                        </div>
                        </div>
                        <div class="card-field-cont">
                        <div class="card-field-cont">
                          <div class="card-h3">Address:</div>
                          <div class="card-field-text"><?= h($foster_profile->address) ?></div>
                        </div>
                        </div>
                      </div>
                      </a>
                    </div>
                  <?php endif;?>

              </div>
              </div>

              <div class="w-tab-pane" data-w-tab="Tab 4">
                <div class="profile-content-cont">
                  <div class="profile-text-header">Pictures (<?= h($photosCountTotal) ?>)</div>
              <div class="picture-file-wrap" data-ix="medical-data-click">
                <div class="picture-file-cont scroll1">
                  <?php if($photosCountTotal > 0):  ?>
                    <?php foreach($photos as $photo): ?>
                      <div class="picture-file" data-file-id="<?= h($photo->id) ?>">
                        <?php echo $this->Html->image('../'.$photo->file_path.'_tn.'.$photo->file_ext, ['class'=>'picture']); ?>
                        <?php if($photo->id == $user->profile_pic_file_id): ?>
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
              </div>
              <div class="profile-text-header">Uploaded Files (todo...)</div>
                </div>
              </div>
              <div class="w-tab-pane" data-w-tab="Tab 5">
                <div class="profile-content-cont">
                  <div class="profile-text-header">More..</div>
                </div>
              </div>
           </div>
        </div>
        <div class="profile-action-cont w-hidden-medium w-hidden-small w-hidden-tiny">
          <?php if ($can_modify): ?>
            <a class="profile-action-button-cont w-inline-block" href="<?= $this->Url->build(['controller'=>'users', 'action'=>'edit', $user->id], ['escape'=>false]);?>">
              <div class="profile-action-button sofware">-</div>
              <div>edit</div>
            </a>
            <a class="profile-action-button-cont w-inline-block add-photo-btn" href="javascript:void(0);" data-ix="add-photo-click-desktop">
              <div class="extend profile-action-button">w</div>
              <div>upload</div>
            </a>
          <?php endif; ?>
          <!--<a class="profile-action-button-cont w-inline-block" href="#">
            <div class="basic profile-action-button"></div>
            <div>export</div>
          </a>-->
          <?php if ($can_delete): ?>
            <a class="delete-button profile-action-button-cont w-inline-block" data-ix="delete-click-desktop" href="javascript:void(0);">
              <div class="basic profile-action-button" ></div>
              <div>delete</div>
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="notify-cont w-hidden-main">
    <div class="notify-overview">Adopted Cats</div>
    <div class="notify-adopter">User</div>
    <div class="notify-attachments">Attachments</div>
    <div class="notify-more">More...</div>
  </div>

  <div class="button-cont">
      <?php if ($can_modify): ?>
        <a class="button-01 w-inline-block" href="<?= $this->Url->build(['controller'=>'users', 'action'=>'edit', $user->id], ['escape'=>false]);?>">
          <div class="button-icon-text">Edit</div><img data-ix="add-click" src="<?= $this->Url->image('edit-01.png');?>" width="55">
        </a>
        <a class="button-02" href="#">
          <div class="button-icon-text">Upload Attachments</div><img data-ix="add-click" src="<?= $this->Url->image('upload-01.png');?>" width="55">
        </a>
      <?php endif; ?>
      <!-- <a class="button-03" data-ix="add-click">
        <div class="button-icon-text">Export</div><img data-ix="add-click" src="<?= $this->Url->image('export-01.png');?>" width="55">
      </a> -->
      <?php if ($can_delete): ?>
        <div class="delete-button button-04" data-ix="delete-click">
          <div class="button-icon-text">Delete</div><img src="<?= $this->Url->image('delete-01.png');?>" width="55">
        </div>
      <?php endif; ?>
  </div><img class="button-paw" data-ix="paw-click" src="<?= $this->Url->image('add-paw.png');?>" width="60">

  <div class="add-adopter-floating-overlay delete-user">
    <div class="confirm-cont">
      <div class="confirm-text">Are you sure you want to delete this user?</div>
      <div class="confirm-button-wrap w-form">
        <form class="confirm-button-cont" data-name="Email Form 2" id="email-form-2" name="email-form-2">
            <a class="cancel cancel-delete confirm-button w-button" data-ix="confirm-cancel" href="#">Cancel</a>
            <?= $this->Html->link('Delete', ['controller'=>'users', 'action'=>'delete', $user->id], ['class'=>'confirm-button delete w-button']); ?>
        </form>
      </div>
    </div>
  </div>

  <div class="add-adopter-floating-overlay add-new-adopter-profile">
    <div class="confirm-cont add-new-adopter-inner">
      <div class="confirm-text">Are you sure you want to create a new adopter profile for this user?</div>
      <div class="confirm-button-wrap w-form">
        <div class="confirm-button-cont">
          <a class="cancel-adopter cancel confirm-button w-button" href="#">Cancel</a>
          <?= $this->Html->link('Create Adopter', ['controller'=>'adopters', 'action'=>'adopterFromUser', $user->id], ['class'=>'delete add-foster-btn confirm-button w-button']); ?>
        </div>
      </div>
    </div>
  </div>


  <div class="add-adopter-floating-overlay add-new-foster-profile">
    <div class="confirm-cont add-new-foster-inner">
      <div class="confirm-text">Are you sure you want to create a new foster profile for this user?</div>
      <div class="confirm-button-wrap w-form">
        <div class="confirm-button-cont">
          <a class="cancel-foster cancel confirm-button w-button" href="#">Cancel</a>
          <?= $this->Html->link('Create Foster', ['controller'=>'fosters', 'action'=>'fosterFromUser', $user->id], ['class'=>'delete add-foster-btn confirm-button w-button']); ?>
        </div>
      </div>
    </div>
  </div>

<div class="add-adopter-floating-overlay add-photo">
  <div class="confirm-cont add-photo-inner">
    <div class="confirm-text">Choose a Photo...</div>
      <?php 
        echo $this->Form->create($uploaded_photo, ['enctype' => 'multipart/form-data']);
        echo $this->Form->input('uploaded_photo', ['type' => 'file', 'accept' => 'image/*']);
        //echo $this->Form->button('Update Details', ['class' => 'btn btn-lg btn-success1 btn-block padding-t-b-15']);
      ?>
    <br/>
    <div class="confirm-button-wrap w-form">
      <a class="cancel confirm-button w-button" data-ix="confirm-cancel" href="#">Cancel</a>
      <!-- <a class="delete add-photo-btn confirm-button w-button" href="#">Upload!</a> -->
      <?php
        echo $this->Form->submit("Upload!", ['class' => 'delete add-photo-btn confirm-button w-button']);
        echo $this->Form->end();
       ?>
    </div>
  </div>
</div> 

<div id="dialog-confirm-photo-delete" title="Delete this photo?" style="display:none;">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Are you sure you want to delete this photo?</p>
</div>

<script>
	$(function(){

    var user_id = "<?= $user->id ?>";
    setupPhotoSelectionBehavior(user_id);


		$('.delete-button').click(function(e){
			e.preventDefault();
		});
	});

  $('.delete-button').on('click', function() {
    $('.delete-user').css('display','flex');
    $('.delete-user').css('opacity',1);
  });

  $('.cancel-delete').on('click', function() {
    $('.delete-user').css('display','none');
    $('.delete-user').css('opacity',0);
  });

  $('.user-attach-new-adopter').on('click', function() {
    $('.add-new-adopter-profile').css('display','flex');
    $('.add-new-adopter-profile').css('opacity',1);
    $('.add-new-adopter-inner').css('display','flex');
    $('.add-new-adopter-inner').css('opacity',1);
  });

  $('.cancel-adopter').on('click', function() {
    $('.add-new-adopter-profile').css('display','none');
    $('.add-new-adopter-profile').css('opacity',0);
    $('.add-new-adopter-inner').css('display','none');
    $('.add-new-adopter-inner').css('opacity',0);  
  });

 $('.user-attach-new-foster').on('click', function() {
    $('.add-new-foster-profile').css('display','flex');
    $('.add-new-foster-profile').css('opacity',1);
    $('.add-new-foster-inner').css('display','flex');
    $('.add-new-foster-inner').css('opacity',1);
  });

  $('.cancel-foster').on('click', function() {
    $('.add-new-foster-profile').css('display','none');
    $('.add-new-foster-profile').css('opacity',0);
    $('.add-new-foster-inner').css('display','none');
    $('.add-new-foster-inner').css('opacity',0);  
  });


</script>
