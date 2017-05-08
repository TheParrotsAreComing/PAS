<?= $this->Html->script('cats.js'); ?>
<div class="body">
    <div class="column profile scroll1">
      <div class="profile-cont" data-ix="page-load-fade-in">
        <div class="button profile-header">
            <a href = "<?= $this->Url->build(['controller' => 'cats', 'action' => 'index']) ?>" class="profile-back w-inline-block">
            <div>&lt; Back</div>
            </a>
            <div class="profile-id-cont">
                <div class="id-text">#</div>
                <div class="id-text"><?= h($cat->id) ?></div>
            </div>
        </div>
        <div class="profile-header">
          <?php 
            if(!empty($profile_pic)){
              echo $this->Html->image('../'.$profile_pic->file_path.'.'.$profile_pic->file_ext, ['class'=>'cat-profile-pic']);
            } else {
              echo $this->Html->image('cat-menu.png', ['class'=>'cat-profile-pic']);
            }
          ?>
          <div>
            <div class="cat-profile-name"><?= h($cat->cat_name) ?></div>
            <div>
                <?= 
                    $status = "";
                    if ($cat->is_kitten == 1) {$status = "Kitten";}
                    else {$status = "Cat";}
                ?>                    
              <div class="profile-header-text"><?= $status ?></div>
                <?= 
                    $gender = "";
                    if($cat->is_female == 1) {$gender = "(female)";}
                    else {$gender = "(male)";}
                ?>
              <div class="profile-header-text"><?= $gender ?></div>
            </div>
            <div>
              <div class="cat-dob" style="display:none;"><?= h($cat->dob) ?></div>
              <div class="profile-header-text">Age:</div>
              <div class="profile-header-text cat-age"></div>
            </div>
            <div>
              <div class="profile-header-text">Breed:</div>
              <div class="profile-header-text"><?= h($cat->breed->breed) ?></div>
            </div>
          </div>
          
        </div>
        <div class="profile-tabs-cont w-tabs">
          <div class="cat-profile-tabs-menu w-tab-menu">
            <a class="cat-profile-tabs-menu-cont tab-leftmost w--current w-inline-block w-tab-link" data-ix="overview-notification" data-w-tab="Tab 1"><img class="cat-profile-tabs-icon" src="<?= $this->Url->image('cat-01.png') ?>">
            </a>
            <a class="cat-profile-tabs-menu-cont w-inline-block w-tab-link" data-ix="medical-notification" data-w-tab="Tab 2"><img class="cat-profile-tabs-icon" src="<?= $this->Url->image('medical-01.png') ?>">
            </a>
            <a class="cat-profile-tabs-menu-cont w-inline-block w-tab-link" data-ix="foster-notification" data-w-tab="Tab 3"><img id="fosterTab" class="cat-profile-tabs-icon" src="<?= $this->Url->image('cat-profile-foster-01.png') ?>">
            </a>
            <a class="cat-profile-tabs-menu-cont w-inline-block w-tab-link" data-ix="adopter-notification" data-w-tab="Tab 4"><img id="adopterTab" class="cat-profile-tabs-icon" src="<?= $this->Url->image('cat-profile-adopter-01.png') ?>">
            </a>
            <a class="cat-profile-tabs-menu-cont w-inline-block w-tab-link" data-ix="attachment-notification" data-w-tab="Tab 5"><img id="fileTab" class="cat-profile-tabs-icon" src="<?= $this->Url->image('attachments-01.png') ?>">
            </a>
            <a class="cat-profile-tabs-menu-cont tabs-rightmost w-inline-block w-tab-link" data-ix="more-notification" data-w-tab="Tab 6"><img id="moreTab" class="cat-profile-tabs-icon" src="<?= $this->Url->image('more-01.png') ?>">
            </a>
          </div>
          <div class="profile-tab-wrap scroll1 w-tab-content">
            <div class="profile-tab-cont w--tab-active w-clearfix w-tab-pane" data-w-tab="Tab 1">
              <div class="profile-notification-cont">
                  <?php foreach ($cat['tags'] as $tag): ?>                
                    <div class="tag-cont" data-id="<?= $tag->id ?>" style="color:#<?= $tag['color'] ?>; border-color: #<?= $tag['color'] ?>;">
                      <div class="tag-text"><?= $tag['label'] ?></div><a data-id="<?= $tag->id ?>" class="tag-remove" style="color:#<?= $tag['color'] ?>;" href="#"></a>
                    </div>
                  <?php endforeach; ?>
                </div>
              <div class="medical-wrap">
                <a class="profile-add-cont" data-ix="add-tag" href="#">+ Add Tag</a>
              </div>
              <div class="profile-content-cont">
                <div class="profile-text-header">Cat Information</div>
                <div class="profile-field-cont">
                  <div class="left-justify profile-field-cont">
                    <div class="profile-field-name">DOB:</div>
                    <div class="profile-field-text"><?php $now = $cat->dob; echo $now->format('F jS, Y'); ?></div>
                    <div class="profile-field-text cat-dob" style="display:none"><?= h($cat->dob) ?></div>
                  </div>
                  <div class="profile-field-cont">
                    <div class="profile-field-name">Age:</div>
                    <div class="profile-field-text cat-age"></div>
                  </div>
                </div>
                <div class="profile-field-cont">
                  <div class="left-justify profile-field-cont">
                    <div class="profile-field-name">Gender:</div>
                    
                    <div class="profile-field-text"><?= $cat->is_female ?></div>
                  </div>
                  <div class="profile-field-cont">
                    <div class="profile-field-name">Breed:</div>
                    <div class="profile-field-text"><?= h($cat->breed->breed) ?></div>
                  </div>
                </div>
                <div class="profile-field-cont">
                  <div class="left-justify profile-field-cont">
                    <div class="profile-field-name">Coat:</div>
                    <div class="profile-field-text"><?= h($cat->coat) ?></div>
                  </div>
                  <div class="profile-field-cont right-justify">
                    <div class="profile-field-name">Color:</div>
                    <div class="profile-field-text"><?= h($cat->color) ?></div>
                  </div>
                </div>
              </div>
              <div class="profile-content-cont">
                <div class="profile-text-header">Relationship Information</div>
                <div class="profile-field-cont">
                  <div class="profile-field-cont full-width">
                    <div class="profile-field-name">Good with Kids:</div>
                    <div class="block profile-field-text"><?= ($cat->good_with_kids) ? "Yes" : "No" ?></div>
                  </div>
                </div>
                <div class="profile-field-cont full-width">
                  <div class="profile-field-cont full-width">
                    <div class="profile-field-name">Good with Dogs:</div>
                    <div class="block profile-field-text"><?= ($cat->good_with_dogs) ? "Yes" : "No" ?></div>
                  </div>
                </div>
                <div class="profile-field-cont full-width">
                  <div class="profile-field-cont full-width">
                    <div class="profile-field-name">Good with Cats:</div>
                    <div class="block profile-field-text"><?= ($cat->good_with_cats) ? "Yes" : "No" ?></div>
                  </div>
                </div>
                <div class="profile-field-cont full-width">
                  <div class="profile-field-cont full-width">
                    <div class="profile-field-name">Special Needs:</div>
                    <div class="block profile-field-text"><?= ($cat->special_needs) ? "Yes" : "No" ?></div>
                  </div>
                </div>
                <div class="profile-field-cont full-width">
                  <div class="profile-field-cont full-width">
                    <div class="profile-field-name">Needs Experienced Adopter:</div>
                    <div class="block profile-field-text"><?= ($cat->needs_experienced_adopter) ? "Yes" : "No" ?></div>
                  </div>
                </div>

              </div>
              <div class="profile-content-cont">
                <div class="profile-text-header">Additional Information</div>
                <div class="profile-field-cont">
                  <div class="profile-field-name">Biography:</div>
                  <div class="block profile-field-text"><?= nl2br(h($cat->bio)) ?></div>
                </div>
                <div class="profile-field-cont">
                  <div class="profile-field-name">Current Diet:</div>
                  <div class="block profile-field-text"><?= nl2br(h($cat->diet)) ?></div>
                </div>
                <div class="profile-field-cont">
                  <div class="profile-field-name">Specialty Notes:</div>
                  <div class="block profile-field-text"><?= nl2br(h($cat->specialty_notes)) ?></div>
                </div>
              </div>
            </div>
            <div class="w-tab-pane" data-w-tab="Tab 2" id="medHistory">
              <div class="expand profile-content-cont">
                <div class="profile-text-header">Medical History</div>
                <div class="medical-wrap">
                  <div class="medical-header-cont">
                    <div class="medical-type-cont">
                      <div class="medical-header">Type</div>
                    </div>
                    <div class="medical-date-cont">
                      <div class="medical-header">Date</div>
                    </div>
                    <div class="medical-notes-cont">
                      <div class="medical-header">Notes</div>
                    </div>
                  </div>
                  <?php if (!empty($cat->cat_medical_histories)): ?>
                    <?php foreach($cat->cat_medical_histories as $mhh_label => $mhh): ?>
            <label> <?= $mhh_label ?> </label>
            <?php if(empty($mhh)): ?>
              <div class="none-text"> None to date</div>
              <?php continue; ?>
            <?php endif; ?>
            <?php foreach($mhh as $mh): ?>
              <?php if(empty($mh)): ?>
                <div> None to date</div>
                <?php continue; ?>
              <?php endif; ?>

              <?php $type = "";
                if ($mh->is_fvrcp) {$type = "FVRCP";} 
                else if ($mh->is_deworm) {$type = "Deworm";} 
                else if ($mh->is_flea) {$type = "Flea";} 
                else if ($mh->is_rabies) {$type = "Rabies";} 
                else if ($mh->is_other) {$type = "Other";} 
                else {$type = "No Type";} 
              ?>

              <div class="scroll1 no-horizontal-scroll">
                <div class="medical-data-cont" data-ix="medical-data-click" data-mh="<?= $mh->id ?>">
                <div class="medical-type-cont">
                  <div class="medical-data-type"><?= $type ?></div>
                </div>
                <div class="medical-date-cont">
                  <div class="medical-date-cont"><?= h($mh->administered_date) ?></div>
                </div>
                <div class="medical-notes-cont">
                  <div class="medical-data-notes"><?= h($mh->notes) ?></div>
                </div>
                <div class="medical-data-action-cont">
                  <a data-mh="<?= $mh->id ?>" class="left medical-data-action w-inline-block" href="<?= $this->Url->build(['controller'=>'CatMedicalHistories', 'action'=>'edit', $mh->id, $cat->id]) ?>">
                  <div class="profile-action-button sofware">-</div>
                  <div>edit</div>
                  </a>
                  <a data-mh="<?= $mh->id ?>" class="mid medical-data-action w-inline-block delete-record-btn" href="#" data-mh="<?= $mh->id ?>">
                  <div class="basic profile-action-button"></div>
                  <div>delete</div>
                  </a>
                  <a data-mh="<?= $mh->id ?>" class="right medical-data-action w-inline-block" href="<?= $this->Url->build(['controller'=>'Files', 'action'=>'download', $mh->id]) ?>">
                  <div class="profile-action-button sofware">p</div>
                  <div>download</div>
                  </a>
                </div>
                </div>
              </div>
            <?php endforeach; ?>
                  <?php endforeach; ?>
                  <?php else: ?>
                    <a class="card w-clearfix w-inline-block"> 
                          <div class="card-h1">This cat currently has no medical records.</div>
                    </a>
                  <?php endif; ?>
                <?php if (!$is_foster && $can_edit): ?>
                  <a id="medAdd" class="profile-add-cont w-inline-block" href="<?= $this->Url->build(['controller'=>'CatMedicalHistories', 'action'=>'add', $cat->id])?>">+ Add New Medical Record</a> 
                <?php endif; ?>
                </div>
              </div>
            </div>
            <div class="w-tab-pane" data-w-tab="Tab 3" id="fosterCard">
                <div class="profile-content-cont">
                  <?php if (!empty($cat->cat_histories)): ?>
                    <?php foreach($cat->cat_histories as $ch): ?>
                      <?php if(!empty($ch->foster_id)): ?>
                        <?php $foster = $ch->foster ?>
                        <?php break; ?>
                      <?php endif; ?>
                    <?php endforeach; ?>
                    <?php if(!empty($foster)) :?>
                      <div class="profile-text-header">Foster Home</div>
                      <div class="card-cont card-wrapper w-dyn-item">
                      <a class="card w-clearfix w-inline-block" href="<?= $this->Url->build(['controller'=>'fosters', 'action'=>'view', $foster->id], ['escape'=>false]);?>">
                      <div class="card-pic-cont">
                        <img class="card-pic" src="<?= $this->Url->image('foster-menu.png'); ?>">
                      </div>
                      <div class="card-h1"><?= h($foster->first_name)." ".h($foster->last_name) ?></div>
                      <div class="card-field-wrap">
                        <div class="card-field-cont">
                          <div class="card-field-cont">
                          <div class="card-h3">Rating:</div>
                          <div class="card-field-text"><?= h($foster->rating) ?></div>
                        </div>
                        </div>
                        <?php if(!empty($fosterPhones)) :?>
                          <?php foreach ($fosterPhones as $number): ?>
                            <?php if ($number->entity_id === $foster->id): ?>
                              <div class="card-field-cont">
                                <div class="card-field-cont">
                                  <div class="card-h3">Primary Phone:</div>
                                  <div class="card-field-text"><?= h($number->phone_num) ?></div>
                                </div>
                              </div>
                              <?php break;?>
                            <?php endif ;?>
                          <?php endforeach; ?>
                        <?php endif; ?>
                        <div class="card-field-cont">
                        <div class="card-field-cont">
                          <div class="card-h3">Email:</div>
                          <div class="card-field-text"><?= h($foster->email) ?></div>
                        </div>
                        </div>
                        <div class="card-field-cont">
                        <div class="card-field-cont">
                          <div class="card-h3">Address:</div>
                          <div class="card-field-text"><?= h($foster->address) ?></div>
                        </div>
                        </div>
                        <div class="card-field-cont">
                        <div class="card-field-cont">
                          <div class="card-h3">Availability:</div>
                          <div class="card-field-text"><?= h($foster->avail) ?></div>
                        </div>
                        </div>
                      </div>
                      </a>
                      </div>
                    <a class="profile-add-cont attach-foster" data-ix="add-foster-click-desktop" href="javascript:void(0);">+ Replace Foster</a>
                    <?php else: ?>
                      <a class="card w-clearfix w-inline-block"> 
                      <div class="card-h1">This cat is currently not in a foster home. </div>
                      </a>
                      <a class="profile-add-cont attach-foster" data-ix="add-foster-click-desktop" href="javascript:void(0);">+ Add Foster</a>
                    <?php endif; ?>
                    <?php else: ?>
                      <a class="card w-clearfix w-inline-block">
                        <div class="card-h1">This cat is not currently in a foster home.</div>
                      </a>
                      <?php if (!$is_foster && $can_edit): ?>
                          <a class="profile-add-cont attach-foster" data-ix="add-foster-click-desktop" href="javascript:void(0);">+ Add Foster</a>
                      <?php endif; ?>
                    <?php endif; ?>
              </div>
            </div>
            <div class="w-tab-pane" data-w-tab="Tab 4" id="adopterCard">
        <?php //IF we change this, we must change the JS. Let Rob know if you change this! ?>
                <div class="profile-content-cont">
      <?php if (!empty($cat->cat_histories)): ?>
              <?php foreach($cat->cat_histories as $ch): //Find most recent adopter. Spaghetti Code Break out once we find it?>
                <?php if(!empty($ch->adopter_id)): ?>
                  <?php $adopter = $ch->adopter ?>
                  <?php break; ?>
                <?php endif; ?>
              <?php endforeach; ?>
              <?php if(!empty($adopter)): ?>
                <div class="profile-text-header">Adopter</div>
                <div class="card-cont card-wrapper w-dyn-item">
                  <a class="card w-clearfix w-inline-block" href="<?= $this->Url->build(['controller'=>'adopters', 'action'=>'view', $adopter->id], ['escape'=>false]);?>">
                  <div class="card-pic-cont">
                    <img class="card-pic" src="<?= $this->Url->image('adopter-menu.png'); ?>">
                  </div>
                  <div class="card-h1"><?= h($adopter->first_name)." ".h($adopter->last_name) ?></div>
                  <div class="card-field-wrap">
                    <div class="card-field-cont">
                    <div class="card-field-cont">
                      <div class="card-h3">Notes:</div>
                      <div class="card-field-text"><?= h($adopter->notes) ?></div>
                    </div>
                    </div>
                    <?php if(!empty($adopterPhones)) :?>
                      <?php foreach ($adopterPhones as $number): ?>
                        <?php if ($number->entity_id === $adopter->id): ?>
                          <div class="card-field-cont">
                            <div class="card-field-cont">
                              <div class="card-h3">Primary Phone:</div>
                              <div class="card-field-text"><?= h($number->phone_num) ?></div>
                            </div>
                          </div>
                          <?php break;?>
                        <?php endif ;?>
                      <?php endforeach; ?>
                    <?php endif; ?>
                    <div class="card-field-cont">
                      <div class="card-field-cont">
                      <div class="card-h3">Email:</div>
                      <div class="card-field-text"><?= h($adopter->email) ?></div>
                    </div>
                    </div>
                    <div class="card-field-cont">
                    <div class="card-field-cont">
                      <div class="card-h3">Address:</div>
                      <div class="card-field-text"><?= h($adopter->address) ?></div>
                    </div>
                    </div>
                  </div>
                  </a>
                </div>
          <a class="profile-add-cont attach-adopter" data-ix="add-adopter-click-desktop" href="javascript:void(0);">+ Replace Adopter</a>
              <?php else: ?>
                <a class="card w-clearfix w-inline-block">
                  <div class="card-h1">This cat is not currently adopted.</div>
                </a>
                <?php if (!$is_foster && $can_edit): ?>
                    <a class="profile-add-cont attach-adopter" data-ix="dd-adopter-click-desktop" href="javascript:void(0);">+ Add Adopter</a>
                <?php endif; ?>
                        <?php endif; ?>
                        <?php else: ?>
                            <a class="card w-clearfix w-inline-block">
                <div class="card-h1">This cat is not currently adopted.</div>
                            </a>
              <?php if (!$is_foster && $can_edit): ?>
                  <a class="profile-add-cont attach-adopter" data-ix="add-adopter-click-desktop" href="javascript:void(0);">+ Add Adopter</a>
              <?php endif; ?>
                    <?php endif; ?>           
                </div>
            </div>
            <div class="w-tab-pane" data-w-tab="Tab 5">
              <div class="expand overflow profile-content-cont">
                <div class="profile-text-header">Pictures (<?= h($photosCountTotal) ?>)</div>
                <div class="picture-file-wrap" data-ix="medical-data-click">
                  <div class="picture-file-cont scroll1">
                    <?php if($photosCountTotal > 0):  ?>
                      <?php foreach($photos as $photo): ?>
                        <div class="picture-file" data-file-id="<?= h($photo->id) ?>">
                          <?php echo $this->Html->image('../'.$photo->file_path.'_tn.'.$photo->file_ext, ['class'=>'picture']); ?>
                          <?php if($photo->id == $cat->profile_pic_file_id): ?>
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
                    <div class="files-data-wrap no-horizontal-scroll">
                      <div class="files-data-cont" data-ix="medical-data-click">
                      <div class="files-date-cont">
                        <div class="medical-data-type"><?= h($file->created) ?></div>
                      </div>
                      <div class="files-name-cont">
                        <div class="files-name"><?= h($file->original_filename) ?>.<?= h($file->file_ext) ?></div>
                        <div class="files-data"><?= h($file->note) ?></div>
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
                      </div>
                  </div>
                  <div class="medical-wrap">
                  <a class="profile-add-cont w-inline-block add-file-btn" href="javascript:void(0);" data-ix="add-file-click-desktop">+ Add New File</a> 
                  </div>
                </div>

            <div class="profile-tab-cont w-tab-pane" data-w-tab="Tab 6">
              <div class="profile-content-cont">
                <div class="profile-text-header">Additional Actions</div>
                <ul class="profile-more-wrap w-list-unstyled">
                  <li class="profile-more-cont">
          <a class="profile-more-link" href="#">Add to Litter</a>
          <a class="profile-more-link" data-controller="CatHistories" data-action="index" href="javascript:void(0);">Cat/Kitten Placement</a>
                  </li>
                </ul>
              </div>
              <div class="profile-content-cont" id="extraContent">
              </div>
            </div>

          </div>
        </div>
        <div class="profile-action-cont w-hidden-medium w-hidden-small w-hidden-tiny">
          <?php if ($can_edit): ?>
        <a class="profile-action-button-cont w-inline-block" href="<?= $this->Url->build(['controller'=>'cats', 'action'=>'edit', $cat->id]) ?> ">
            <div class="profile-action-button sofware">-</div>
            <div>edit</div>
          </a>
          <a class="profile-action-button-cont w-inline-block" href="<?= $this->Url->build(['controller'=>'cats', 'action'=>'aapUpload', $cat->id]) ?>">
            <div class="basic profile-action-button"></div>
            <div>export</div>
          </a>
      <?php endif; ?>
      <?php if ($can_delete): ?>
          <a class="profile-action-button-cont w-inline-block" data-ix="delete-click-desktop" href="#">
            <div class="basic profile-action-button"></div>
            <div>delete</div>
          </a>
      <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="notify-cont w-hidden-main">
    <div class="notify-overview">Overview</div>
    <div class="notify-medical">Medical Information</div>
    <div class="notify-foster">Foster Home</div>
    <div class="notify-adopter">Adopter</div>
    <div class="notify-attachments">Attachments</div>
    <div class="notify-more">More...</div>
  </div>
  <div class="floating-overlay">
    <div class="confirm-cont">
      <div class="confirm-text">Are you sure you want to delete this cat?</div>
      <div class="confirm-button-wrap w-form">
        <form class="confirm-button-cont" data-name="Email Form 2" id="email-form-2" name="email-form-2">
            <a class="cancel confirm-button w-button" data-ix="confirm-cancel" href="#">Cancel</a>
            <?= $this->Html->link('Delete', ['controller'=>'cats', 'action'=>'delete', $cat->id], ['class'=>'confirm-button delete w-button']); ?>
        </form>
      </div>
    </div>
  </div> 

<div class="add-adopter-floating-overlay add-tag">
    <div class="confirm-cont add-tag-inner">
      <h4>Select a tag to add</h4>
      <form class="confirm-button-cont" data-name="Email Form 2" id="email-form-2" name="email-form-2">
        <div class="tag_options">
          <?= $this->Form->input('tag',['class'=>'add-input w-input','options'=>$cat_tags]) ?>
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
        echo $this->Form->input('uploaded_photo',  array('type' => 'file',
        'label' => ['text' => 'Uploaded Photo:', 'class' => 'upload-message', 'escape' => false]));
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

<div class="add-adopter-floating-overlay add-adopter">
  <div class="confirm-cont add-adopter-inner">
    <div class="confirm-text">Adopt this cat to who?</div>
    <form class="confirm-button-cont" data-name="Email Form 2" id="email-form-2" name="email-form-2">
      <?= $this->Form->input('Adopter',['class'=>'add-input w-input','options'=>$select_adopters]) ?>
    </form>
    <br/>
    <div class="confirm-button-wrap w-form">
      <a class="cancel confirm-button w-button" data-ix="confirm-cancel" href="#">Cancel</a>
      <a class="delete add-adopter-btn confirm-button w-button" href="#">Adopt!</a>
    </div>
  </div>
</div> 

<div class="add-adopter-floating-overlay add-foster">
  <div class="confirm-cont add-foster-inner">
    <div class="confirm-text">Foster this cat to who?</div>
    <form class="confirm-button-cont" data-name="Email Form 2" id="email-form-2" name="email-form-2">
      <?= $this->Form->input('Foster',['class'=>'add-input w-input','options'=>$select_fosters]) ?>
    </form>
    <br/>
    <div class="confirm-button-wrap w-form">
      <a class="cancel confirm-button w-button" data-ix="confirm-cancel" href="#">Cancel</a>
      <a class="delete add-foster-btn confirm-button w-button" href="#">Foster!</a>
    </div>
  </div>
</div>

<div id="dialog-confirm" title="Adopt this kitten?" style="display:none;">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Are you sure you want to mark this cat/kitten as adopted?</p>
</div>

<div id="dialog-confirm-foster" title="Foster this kitten?" style="display:none;">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Are you sure you want to foster this cat/kitten?</p>
</div>

<div id="dialog-confirm-record" title="Delete this record?" style="display:none;">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Are you sure you want to delete this medical record?</p>
</div>

<div id="dialog-confirm-tag" title="Delete this tag?" style="display:none;">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Are you sure you want to delete this tag?</p>
</div>

<div id="dialog-confirm-photo-delete" title="Delete this photo?" style="display:none;">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Are you sure you want to delete this photo?</p>
</div>

<div class="button-cont w-hidden-main">
  <?php if ($can_edit): ?>
    <a class="button-01 w-inline-block" href="<?= $this->Url->build(['controller'=>'cats', 'action'=>'edit', $cat->id]) ?> ">
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
    <a class="button-03 w-inline-block" href="<?= $this->Url->build(['controller'=>'cats', 'action'=>'aapUpload', $cat->id]) ?>">
      <div class="button-icon-text">Export</div>
      <div class="floating-button">
        <div>N</div>
      </div>
    </a>
    <a class="button-04 w-inline-block" data-ix="delete-click">
      <div class="button-icon-text">Delete</div>
      <div class="floating-button">
        <div>M</div>
      </div>
      </a>
  <?php endif; ?>
</div>
<div class="button-paw" data-ix="paw-click">
    <div>O</div>
</div>

<script>
$(function () {

  var cat_id = "<?= $cat->id ?>";
  var cat_controller_string = "Cats/";
  var current_kitty = new Cat();
  var deleteRecord = "<?= $this->Url->build(['controller'=>'CatMedicalHistories', 'action'=>'delete']) ?>";
  var tagDel = "<?= $this->Url->build(['controller'=>'cats','action'=>'deleteTag']); ?>";
  calculateAndPopulateAgeFields();
  setupPhotoSelectionBehavior(cat_id, cat_controller_string);

  $('.add-adopter-btn').click(function(){
     $( "#dialog-confirm" ).dialog({
        resizable: false,
        height: "auto",
        width: 400,
        modal: true,
        buttons: {
        "Adopt!":  {
			text:"Adopt!",
			id:"confirmAdopt",
			click : function() {
				$( this ).dialog( "close" );
				$.when(current_kitty.attachAdopter($('#adopter').val(),"<?= $cat->id ?>")).done(function(){
					$('.add-adopter').css('display','none');
					$('.add-adopter-inner').css('display','none');
					$('.add-adopter-inner').css('opacity','0');
					current_kitty.buildAdopterCard($('#adopter').val(),$('#adopterCard'));
				});
			}
        },
        Cancel: function() {
          $( this ).dialog( "close" );
        }
        }
      });
  });

  
  $('.add-foster-btn').click(function(){
   $( "#dialog-confirm-foster" ).dialog({
      resizable: false,
      height: "auto",
      width: 400,
      modal: true,
      buttons: {
			"Foster!":  {
				text:"Foster!",
				id:"confirmFoster",
				click : function() {
					$( this ).dialog( "close" );
					$.when(current_kitty.attachFoster($('#foster').val(),"<?= $cat->id ?>")).done(function(){
						$('.add-foster').css('display','none');
						$('.add-foster-inner').css('display','none');
						$('.add-foster-inner').css('opacity','0');
						current_kitty.buildFosterCard($('#foster').val(),$('#fosterCard'));
					});
				}
			},
      Cancel: function() {
        $( this ).dialog( "close" );
      }
      }
    });
  });

  $('.delete-record-btn').click(function(){
   var parent = $(this).parent().parent().parent();
   var that = $(this); 
   $( "#dialog-confirm-record" ).dialog({
      resizable: false,
      height: "auto",
      width: 400,
      modal: true,
      buttons: {
      "Delete!": {
      text:"Delete!",
      id:"delMed",
      click : function() {
      $.get(deleteRecord+'/'+that.data('mh'));
      $(this).dialog( "close" );
      if(parent.prev().is('label') && parent.next().is('label')){
        parent.before('<div class="none-text"> None to date</div>');
      }
      parent.remove();
        }
      },
      Cancel: function() {
        $(this).dialog( "close" );
        $('.no-horizontal-scroll').scrollLeft(0);
      }
      }
    });
  });

  $('.add-tag-btn').click(function(e) {
      e.stopPropagation();
      e.preventDefault();
      $.ajax({
        url : "<?= $this->Url->build(['controller'=>'cats','action'=>'attachTag']); ?>",
        type : 'POST',
        data : {
          tag_id : $('#tag').val(),
          cat_id : '<?= $cat->id ?>'
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
    tag_rmv.attr('data-id', result['id']);

        tag_cont.append(tag_text);
        tag_cont.append(tag_rmv);

        $('.profile-notification-cont').prepend(tag_cont);

        var dropdown_option = $('.tag_options option[value='+result['id']+']');
        dropdown_option.remove();
      });
    });

  $('.profile-cont').on('click','.tag-remove',function(){
    var that = $(this); 
    var tag_id = that.attr('data-id');
    $( "#dialog-confirm-tag" ).dialog({
      resizable: false,
      height: "auto",
      width: 400,
      modal: true,
      buttons: {
        "Delete": {
          text:"Delete!",
          id:"delTag",
          click : function() {
            $.ajax({
              url : tagDel,
              type : 'POST',
              data : {
              'cat_id' : '<?= $cat->id ?>',
              'tag_id' : tag_id
            }
            }).done(function(result){
              result = JSON.parse(result);
              $('#tag').append('<option value="'+result['id']+'">'+result['label']+'</option>');
            });
            that.parent().remove();
            $( this ).dialog( "close" );
          }
        },
        Cancel: function() {
          $( this ).dialog( "close" );
        }
      }
    });
  });

  $('.profile-more-link').click(function(e){
    var url = APP_PATH+"/"+$(this).data('controller')+"/"+$(this).data('action')+"/"+"<?= $cat->id ?>";
    $.ajax({
      url:url
    }).done(function(result){
      $('#extraContent').html(result);
      $('#extraContent')[0].scrollIntoView();
    });
  });

});
</script>