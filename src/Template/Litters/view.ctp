<?= $this->Html->script('cats.js'); ?>
<div class="body">
    <div class="column profile scroll1">
      <div class="profile-cont" data-ix="page-load-fade-in">
        <div class="top profile-header">
            <a onclick="history.go(-1);" href="#" class="profile-back w-inline-block">
            <div>&lt; Back</div>
            </a>
            <div class="profile-id-cont">
                <div class="id-text">#</div>
                <div class="id-text"><?= h($litter->id) ?></div>
            </div>
        </div>
        <div class="profile-header">
        <?php echo $this->Html->image('../img/litter-menu.png', ['class'=>'cat-profile-pic']); ?>
          <div>
            <div class="cat-profile-name" id="litterName"><?= h($litter->litter_name) ?></div>
            <div>
              <div class="profile-header-text"><?= h($litter->the_cat_count) ?> cat(s)</div>
              <div class="profile-header-text"><?= h($litter->kitten_count) ?> kitten(s)</div>
            </div>
            <div>
              <div class="profile-header-text">Date of Birth</div>
              <div class="profile-header-text"><?= h($litter->dob) ?></div>
            </div>
            <div>
              <div class="profile-header-text">Breed:</div>
              <div class="profile-header-text"><?= h($litter->breed) ?></div>
            </div>
            <div>
              <div class="profile-header-text">Estimated Arrival:</div>
              <div class="profile-header-text"><?= h($litter->est_arrival) ?></div>
            </div>
          </div>
          
        </div>
        <div class="profile-tabs-cont w-tabs">
          <div class="cat-profile-tabs-menu w-tab-menu">
            <a class="cat-profile-tabs-menu-cont tab-leftmost w--current w-inline-block w-tab-link" data-ix="overview-notification" data-w-tab="Tab 1"><img class="cat-profile-tabs-icon" src="<?= $this->Url->image('cat-01.png') ?>">
            </a>
            <!--<a class="cat-profile-tabs-menu-cont w-inline-block w-tab-link" data-ix="medical-notification" data-w-tab="Tab 2"><img class="cat-profile-tabs-icon" src="<?= $this->Url->image('medical-01.png') ?>">
            </a>
            <a class="cat-profile-tabs-menu-cont w-inline-block w-tab-link" data-ix="foster-notification" data-w-tab="Tab 3"><img id="fosterTab" class="cat-profile-tabs-icon" src="<?= $this->Url->image('cat-profile-foster-01.png') ?>">
            </a>
            <a class="cat-profile-tabs-menu-cont w-inline-block w-tab-link" data-ix="adopter-notification" data-w-tab="Tab 4"><img id="adopterTab" class="cat-profile-tabs-icon" src="<?= $this->Url->image('cat-profile-adopter-01.png') ?>">
            </a>-->
            <a class="cat-profile-tabs-menu-cont w-inline-block w-tab-link" data-ix="attachment-notification" data-w-tab="Tab 5"><img id="fileTab" class="cat-profile-tabs-icon" src="<?= $this->Url->image('attachments-01.png') ?>">
            </a>
            <a class="cat-profile-tabs-menu-cont tabs-rightmost w-inline-block w-tab-link" data-ix="more-notification" data-w-tab="Tab 6"><img id="moreTab" class="cat-profile-tabs-icon" src="<?= $this->Url->image('more-01.png') ?>">
            </a>
          </div>
          <div class="profile-tab-wrap scroll1 w-tab-content">
            <div class="profile-tab-cont w--tab-active w-clearfix w-tab-pane" data-w-tab="Tab 1">
              <div class="profile-content-cont">
                <div class="profile-text-header">Litter Information</div>
                <div class="profile-field-cont">
                  <div class="profile-field-name">Foster Notes</div>
                  <div class="block profile-field-text"><?= h($litter->foster_notes) ?></div>
                </div>  
                <div class="profile-field-cont">
                  <div class="profile-field-name">Notes</div>
                  <div class="block profile-field-text"><?= h($litter->notes) ?></div>
                </div>
              </div>
              <div class="profile-content-cont">
                <?php if(!empty($litter->cats)): ?>
                <div class="profile-text-header">Cats/Kittens in Litter</div>
                  <div class="dropdown-results-cont mini">
                  <?php foreach($litter->cats as $cat): ?>
                    <?php if ($cat->is_deleted) continue; ?>
                    <a href = "<?= $this->Url->build(['controller' => 'cats', 'action' => 'view', $cat->id]) ?>" class="dropdown-cat-cont mini w-inline-block" >
                        <?php if($cat->profile_pic_file_id > 0) {
                              echo $this->Html->image('../'.$cat->profile_pic->file_path.'.'.$cat->profile_pic->file_ext, ['class'=>'dropdown-cat-pic']);
                            }
                            else {
                              echo $this->Html->image('../img/cat-menu.png', ['class'=>'dropdown-cat-pic']);
                            }
                          ?>

                        <div class="dropdown-cat-name mini"><?= h($cat->cat_name) ?></div>
                        <div class="card-h2-symbol <?= ($cat->is_female) ? "female" : "male" ?> mini"><?= ($cat->is_female) ? "D" : "C" ?></div>
                        <div class="list-id-cont mini">
                          <div class="id-text">#</div>
                          <div class="id-text"><?= $cat->id ?></div>
                        </div>
                        <div class="card-field-text mini"><?= $cat->breed->breed ?></div>
                    </a>
                  <?php endforeach; ?>
                  </div>
                  <?php if ($can_edit): ?>
                    <a class="profile-add-cont attach-cat" data-ix="add-cat-click-desktop" href="<?= $this->Url->build(['controller'=>'cats','action'=>'add',$litter->id])?>">+ Add New Cat</a>
                    <a class="profile-add-cont attach-cat" data-ix="add-cat-click-desktop" href="<?= $this->Url->build(['controller'=>'litters','action'=>'addExistingCatToLitter',$litter->id])?>">+ Add Existing Cat</a>
                  <?php endif; ?>
                <?php else: ?>
                  <div class="card-h1">This litter currently has no cat(s) or kitten(s).</div>
                <?php endif; ?>
              </div>
            </div>
            <!--<div class="w-tab-pane" data-w-tab="Tab 2"></div>-->
            <!--<div class="w-tab-pane" data-w-tab="Tab 3" ></div>-->
            <!--<div class="w-tab-pane" data-w-tab="Tab 4"></div>-->
            <div class="w-tab-pane" data-w-tab="Tab 5"></div>
            <div class="w-tab-pane" data-w-tab="Tab 6"></div>
          </div>
        </div>
        <div class="profile-action-cont w-hidden-medium w-hidden-small w-hidden-tiny">
          <?php if ($can_edit): ?>
            <a class="profile-action-button-cont w-inline-block" href="<?= $this->Url->build(['controller'=>'litters', 'action'=>'edit', $litter->id]) ?> ">
              <div class="profile-action-button sofware">-</div>
              <div>edit</div>
            </a>
            <a class="profile-action-button-cont w-inline-block" href="#">
              <div class="extend profile-action-button">w</div>
              <div>upload</div>
            </a>
          <?php endif; ?>
          <!--<a class="profile-action-button-cont w-inline-block" href="#">
            <div class="basic profile-action-button"></div>
            <div>export</div>
          </a>-->
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
    <!--<div class="notify-medical">Medical Information</div>-->
    <div class="notify-foster">Foster Home</div>
    <div class="notify-adopter">Adopter</div>
    <div class="notify-attachments">Attachments</div>
    <div class="notify-more">More...</div>
  </div>
  <div class="floating-overlay">
    <div class="confirm-cont">
      <div class="confirm-text">Are you sure you want to delete this litter?</div>
      <div class="confirm-button-wrap w-form">
        <form class="confirm-button-cont" data-name="Email Form 2" id="email-form-2" name="email-form-2">
            <a class="cancel confirm-button w-button" data-ix="confirm-cancel" href="#">Cancel</a>
            <?= $this->Html->link('Delete', ['controller'=>'litters', 'action'=>'delete', $litter->id], ['class'=>'confirm-button delete w-button']); ?>
        </form>
      </div>
    </div>
  </div> 
  <div class="button-cont">
    <a class="button w-inline-block" href="<?= $this->Url->build(['controller'=>'litters', 'action'=>'edit', $litter->id]) ?> ">
      <div class="button-icon-text">Edit</div>
      <div class="floating-button">
        <div>L</div>
        </div>
    </a>
    <!--<div class="button-02">
      <div class="button-icon-text">Upload Attachments</div><img data-ix="add-click" src="<?= $this->Url->image('upload-01.png') ?>" width="55">
    </div>-->
    <div class="button" data-ix="add-click">
        <div class="button-icon-text">Export</div>
        <div class="floating-button">
          <div>N</div>
        </div>
    </div>
    <div class="button" data-ix="delete-click">
        <div class="button-icon-text">Delete</div>
        <div class="floating-button">
          <div>M</div>
        </div>
    </div>
  </div>
  <div class="button-paw" data-ix="paw-click">
      <div>O</div>
  </div>
<script>
  calculateAndPopulateAgeFields();
</script>
