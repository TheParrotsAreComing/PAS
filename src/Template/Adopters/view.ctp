 <?= $this->Html->script('cats.js'); ?> 
  <div class="body">
    <div class="column profile scroll1">
      <div class="profile-cont" data-ix="page-load-fade-in">
        <div class="button profile-header">
            <a href = "<?= $this->Url->build(['controller' => 'adopters', 'action' => 'index']) ?>" class="profile-back w-inline-block">
            <div>&lt; Back</div>
            </a>
            <div class="profile-id-cont">
            </div>
        </div>
        <div class="profile-header"><img class="cat-profile-pic" src="http://uploads.webflow.com/img/image-placeholder.svg">
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
                <div class="profile-notification-cont">
                  <?php foreach ($adopter['tags'] as $tag): ?>                
                    <div class="tag-cont warning">
                      <div class="tag-text"><?= $tag['label'] ?></div><a class="tag-remove" href="#"></a>
                    </div>
                  <?php endforeach; ?>
                  <div class="tag-cont warning">
                    <div class="tag-text">cat(s) due for immunization</div><a class="tag-remove" href="#"></a>
                  </div>
                  <div class="info tag-cont">
                    <div class="tag-text">no dogs</div><a class="tag-remove" href="#"></a>
                  </div>
                  <div class="info tag-cont">
                    <div class="tag-text">has small children</div><a class="tag-remove" href="#"></a>
                  </div>
                  <div class="tag-cont urgent">
                    <div class="tag-text">active home</div><a class="tag-remove" href="#"></a>
                  </div>
                  <div class="tag-cont urgent">
                    <div class="tag-text">has guinea pig</div><a class="tag-remove" href="#"></a>
                  </div>
                  <div class="success tag-cont">
                    <div class="tag-text">has cat</div><a class="tag-remove" href="#"></a>
                  </div>
                </div>
  			     <?php if($adopter->do_not_adopt == 1): ?>
                <div class="profile-content-cont">
          				<div class="profile-text-header">Reason to NOT Adopt</div>
        					<div class="profile-field-cont">
        					  <div class="left-justify profile-field-cont">
        						  <div class="profile-field-text"><?= h($adopter->dna_reason) ?></div>
        					  </div>
        				  </div>
  				      </div>
  			     <?php endif; ?>
  			     <div class="profile-content-cont">
                <div class="profile-text-header">Personal Information</div>
                <div class="profile-field-cont">
                  <div class="left-justify profile-field-cont">
                    <div class="profile-field-name">Phone: </div>
                    <div class="profile-field-text"><?= h($adopter->phone) ?></div>
                  </div>
                </div>
                <div class="profile-field-cont">
                  <div class="left-justify profile-field-cont">
                    <div class="profile-field-name">Email: </div>
                    <div class="profile-field-text"><?= h($adopter->email) ?></div>
                  </div>
                </div>
                <div class="profile-field-cont">
                  <div class="left-justify profile-field-cont">
                    <div class="profile-field-name">Address: </div>
                    <div class="profile-field-text"><?= h($adopter->address) ?></div>
                  </div>
                </div>
              </div>
              <div class="profile-content-cont">
                <div class="profile-text-header">Additional Information</div>
                <div class="profile-field-cont">
                </div>
                <div class="profile-field-cont">
                  <div class="profile-field-cont">
                    <div class="profile-field-name">Notes: </div>
                    <div class="block profile-field-text"><?= h($adopter->notes) ?></div>
                  </div>
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
                        <a class="card w-clearfix w-inline-block" href="<?= $this->Url->build(['controller'=>'cats', 'action'=>'view', $cat['id']], ['escape'=>false]); ?>"><img class="card-pic" src="<?= $this->Url->image('cat-menu.png'); ?>">
                          <div class="card-h1"><?= $cat['cat_name'];?></div>
                          <div>
                            <div class="card-h2"><?= ($cat['is_kitten']) ? "Kitten" : "Cat"; ?></div>
                          </div>
                          <div class="card-field-wrap">
                            <div class="card-field-cont">
                              <div class="card-field-cont">
                                <div class="card-h3">DOB:</div>
                                <div class="card-field-text cat-dob"><?= $cat['dob']; ?></div>
                              </div>
                              <div class="card-field-cont">
                                <div class="card-h3">Age:</div>
                                <div class="card-field-text cat-age"></div>
                              </div>
                            </div>
                            <div class="card-field-cont">
                              <div class="card-field-cont">
                                <div class="card-h3">Breed:</div>
                                <div class="card-field-text"><?= $cat['breed']; ?></div>
                              </div>
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
          <a class="profile-action-button-cont w-inline-block" href="<?= $this->Url->build(['controller'=>'adopters', 'action'=>'edit
          ', $adopter->id], ['escape'=>false]);?>">
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
          <a class="profile-action-button-cont w-inline-block" data-ix="delete-click-desktop" href="#">
            <div class="basic profile-action-button" ></div>
            <div>delete</div>
          </a>
        </div>
      </div>
    </div>
  </div>
    <!--<div class="notify-cont">
    <div class="notify-overview">Overview</div>
    <div class="notify-medical">Medical Information</div>
    <div class="notify-foster">Foster Home</div>
    <div class="notify-adopter">Adopter</div>
    <div class="notify-attachments">Attachments</div>
    <div class="notify-more">More...</div>
  </div>-->
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
      <a class="button-01 w-inline-block" href="<?= $this->Url->build(['controller'=>'adopters', 'action'=>'edit', $adopter->id], ['escape'=>false]);?>">
        <div class="button-icon-text">Edit</div><img data-ix="add-click" src="<?= $this->Url->image('edit-01.png');?>" width="55">
      </a>
      <a class="button-02" href="#">
        <div class="button-icon-text">Upload Attachments</div><img data-ix="add-click" src="<?= $this->Url->image('upload-01.png');?>" width="55">
      </a>
      <a class="button-03" data-ix="add-click">
        <div class="button-icon-text">Export</div><img data-ix="add-click" src="<?= $this->Url->image('export-01.png');?>" width="55">
      </a>
      <div class="button-04" data-ix="delete-click">
        <div class="button-icon-text">Delete</div><img src="<?= $this->Url->image('delete-01.png');?>" width="55">
      </div>
  </div><img class="button-paw" data-ix="paw-click" src="<?= $this->Url->image('add-paw.png');?>" width="60">

<script>
  calculateAndPopulateAgeFields();
</script>
