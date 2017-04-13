  <div class="body">
    <div class="column profile scroll1">
      <div class="profile-cont" data-ix="page-load-fade-in">
        <div class="button profile-header">
            <a onclick="history.go(-1);" href="#" class="profile-back w-inline-block">
            <div>&lt; Back</div>
            </a>
            <div class="profile-id-cont">
            </div>
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
			       <a class="cat-profile-tabs-menu-cont w-inline-block w-tab-link" data-ix="overview-notification" data-w-tab="Tab 2"><img class="cat-profile-tabs-icon" src="<?= $this->Url->image('cat-01.png');?>">
            </a>
            <a class="cat-profile-tabs-menu-cont w-inline-block w-tab-link" data-ix="attachment-notification" data-w-tab="Tab 3"><img class="cat-profile-tabs-icon" src="<?= $this->Url->image('attachments-01.png');?>">
            </a>
            <a class="cat-profile-tabs-menu-cont tabs-rightmost w-inline-block w-tab-link" data-ix="more-notification" data-w-tab="Tab 4"><img class="cat-profile-tabs-icon" src="<?= $this->Url->image('more-01.png');?>">
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
                  <a class="cat-add w-button attach-foster">Create Adopter Profile</a>
                  <a class="cat-add w-button attach-foster">Attach Existing Adopter Profile</a>
                </div>
              </div>
              <div class="w-tab-pane" data-w-tab="Tab 3">
                <div class="profile-content-cont">
                  <div class="profile-text-header">Attachments</div>
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
          <a class="profile-action-button-cont w-inline-block" href="<?= $this->Url->build(['controller'=>'users', 'action'=>'edit
          ', $user->id], ['escape'=>false]);?>">
            <div class="profile-action-button sofware">-</div>
            <div>edit</div>
          </a>
          <a class="profile-action-button-cont w-inline-block" href="#">
            <div class="extend profile-action-button">w</div>
            <div>upload</div>
          </a>
          <a class="profile-action-button-cont w-inline-block" href="#">
            <div class="basic profile-action-button"></div>
            <div>export</div>
          </a>
          <a class="delete-button profile-action-button-cont w-inline-block" data-ix="delete-click-desktop" href="#">
            <div class="basic profile-action-button" ></div>
            <div>delete</div>
          </a>
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
      <a class="button-01 w-inline-block" href="<?= $this->Url->build(['controller'=>'users', 'action'=>'edit', $user->id], ['escape'=>false]);?>">
        <div class="button-icon-text">Edit</div><img data-ix="add-click" src="<?= $this->Url->image('edit-01.png');?>" width="55">
      </a>
      <a class="button-02" href="#">
        <div class="button-icon-text">Upload Attachments</div><img data-ix="add-click" src="<?= $this->Url->image('upload-01.png');?>" width="55">
      </a>
      <a class="button-03" data-ix="add-click">
        <div class="button-icon-text">Export</div><img data-ix="add-click" src="<?= $this->Url->image('export-01.png');?>" width="55">
      </a>
      <div class="delete-button button-04" data-ix="delete-click">
        <div class="button-icon-text">Delete</div><img src="<?= $this->Url->image('delete-01.png');?>" width="55">
      </div>
  </div><img class="button-paw" data-ix="paw-click" src="<?= $this->Url->image('add-paw.png');?>" width="60">

  <div class="floating-overlay">
    <div class="confirm-cont">
      <div class="confirm-text">Are you sure you want to delete this user?</div>
      <div class="confirm-button-wrap w-form">
        <form class="confirm-button-cont" data-name="Email Form 2" id="email-form-2" name="email-form-2">
            <a class="cancel confirm-button w-button" data-ix="confirm-cancel" href="#">Cancel</a>
            <?= $this->Html->link('Delete', ['controller'=>'users', 'action'=>'delete', $user->id], ['class'=>'confirm-button delete w-button']); ?>
        </form>
      </div>
    </div>
  </div>

  <div id="dialog-confirm" title="Delete this tag?" style="display:none;">
      <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Are you sure you want to delete this tag?</p>
  </div>

<script>
	calculateAndPopulateAgeFields();
	$(function(){
		$('.delete-button').click(function(e){
			e.preventDefault();
      var confirm_text = $('<div class="confirm-text"/>');
      confirm_text.text('This adopter currently has a cat/kitten.');
      $('.confirm-text').after(confirm_text);

      var confirm_text_2 = $('<div class="confirm-text"/>');
      confirm_text_2.text('Deleting this adopter will also mark the cat/kitten as unadopted.');
      confirm_text.after(confirm_text_2);
		});
	});
</script>
