<?= $this->Html->script('moment.js'); ?>
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
        <div class="profile-header"><img class="cat-profile-pic" src="http://uploads.webflow.com/img/image-placeholder.svg">
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
              <div class="profile-header-text"><?= h($cat->breed) ?></div>
            </div>
          </div>
          
        </div>
        <div class="profile-tabs-cont w-tabs">
          <div class="cat-profile-tabs-menu w-tab-menu">
            <a class="cat-profile-tabs-menu-cont tab-leftmost w--current w-inline-block w-tab-link" data-ix="overview-notification" data-w-tab="Tab 1"><img class="cat-profile-tabs-icon" src="/img/cat-01.png">
            </a>
            <!--<a class="cat-profile-tabs-menu-cont w-inline-block w-tab-link" data-ix="medical-notification" data-w-tab="Tab 2"><img class="cat-profile-tabs-icon" src="/img/medical-01.png">
            </a>-->
            <a class="cat-profile-tabs-menu-cont w-inline-block w-tab-link" data-ix="foster-notification" data-w-tab="Tab 3"><img class="cat-profile-tabs-icon" src="/img/cat-profile-foster-01.png">
            </a>
            <a class="cat-profile-tabs-menu-cont w-inline-block w-tab-link" data-ix="adopter-notification" data-w-tab="Tab 4"><img class="cat-profile-tabs-icon" src="/img/cat-profile-adopter-01.png">
            </a>
            <a class="cat-profile-tabs-menu-cont w-inline-block w-tab-link" data-ix="attachment-notification" data-w-tab="Tab 5"><img class="cat-profile-tabs-icon" src="/img/attachments-01.png">
            </a>
            <a class="cat-profile-tabs-menu-cont tabs-rightmost w-inline-block w-tab-link" data-ix="more-notification" data-w-tab="Tab 6"><img class="cat-profile-tabs-icon" src="/img/more-01.png">
            </a>
          </div>
          <div class="profile-tab-wrap scroll1 w-tab-content">
            <div class="profile-tab-cont w--tab-active w-clearfix w-tab-pane" data-w-tab="Tab 1">
              <div class="profile-notification-cont">
                <div class="tag-cont warning">
                  <div class="tag-text">due for immunization</div><a class="tag-remove" href="#"></a>
                </div>
                <div class="info tag-cont">
                  <div class="tag-text">Playful</div><a class="tag-remove" href="#"></a>
                </div>
                <div class="info tag-cont">
                  <div class="tag-text">good with children</div><a class="tag-remove" href="#"></a>
                </div>
                <div class="tag-cont urgent">
                  <div class="tag-text">dislikes dogs</div><a class="tag-remove" href="#"></a>
                </div>
                <div class="tag-cont urgent">
                  <div class="tag-text">scratches</div><a class="tag-remove" href="#"></a>
                </div>
                <div class="success tag-cont">
                  <div class="tag-text">microchipped</div><a class="tag-remove" href="#"></a>
                </div>
              </div>
              <div class="profile-content-cont">
                <div class="profile-text-header">Personal Information</div>
                <div class="profile-field-cont">
                  <div class="left-justify profile-field-cont">
                    <div class="profile-field-name">DOB:</div>
                    <div class="profile-field-text cat-dob"><?= h($cat->dob) ?></div>
                  </div>
                  <div class="profile-field-cont">
                    <div class="profile-field-name">Age:</div>
                    <div class="profile-field-text cat-age"></div>
                  </div>
                </div>
                <div class="profile-field-cont">
                  <div class="left-justify profile-field-cont">
                    <div class="profile-field-name">Gender:</div>
                    
                    <div class="profile-field-text"><?= $gender ?></div>
                  </div>
                  <div class="profile-field-cont">
                    <div class="profile-field-name">Breed:</div>
                    <div class="profile-field-text"><?= h($cat->breed) ?></div>
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
                <div class="profile-text-header">Additional Information</div>
                <div class="profile-field-cont">
                  <div class="profile-field-cont">
                    <div class="profile-field-name">Biography:</div>
                    <div class="block profile-field-text"><?= h($cat->bio) ?></div>
                  </div>
                </div>
                <div class="profile-field-cont">
                  <div class="profile-field-cont">
                    <div class="profile-field-name">Reason not to adopt from this person:</div>
                    <div class="profile-field-text">0</div>
                  </div>
                </div>
                <div class="profile-field-cont">
                  <div class="profile-field-cont">
                    <div class="profile-field-name">Current Diet:</div>
                    <div class="block profile-field-text"><?= h($cat->diet) ?></div>
                  </div>
                </div>
                <div class="profile-field-cont">
                  <div class="profile-field-cont">
                    <div class="profile-field-name">Specialty Notes:</div>
                    <div class="block profile-field-text"><?= h($cat->specialty_notes) ?></div>
                  </div>
                </div>
              </div>
            </div>
            <!--<div class="w-tab-pane" data-w-tab="Tab 2"></div>-->
            <div class="profile-tab-cont w-tab-pane" data-w-tab="Tab 3"></div>
            <div class="w-tab-pane" data-w-tab="Tab 4"></div>
            <div class="w-tab-pane" data-w-tab="Tab 5"></div>
            <div class="w-tab-pane" data-w-tab="Tab 6"></div>
          </div>
        </div>
        <div class="profile-action-cont w-hidden-medium w-hidden-small w-hidden-tiny">
          <a class="profile-action-button-cont w-inline-block" href="<?= $this->Url->build(['controller'=>'cats', 'action'=>'edit', $cat->id]) ?> ">
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
            <div class="basic profile-action-button"></div>
            <div>delete</div>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="notify-cont">
    <div class="notify-overview">Overview</div>
    <!--<div class="notify-medical">Medical Information</div>-->
    <div class="notify-foster">Foster Home</div>
    <div class="notify-adopter">Adopter</div>
    <div class="notify-attachments">Attachments</div>
    <div class="notify-more">More...</div>
  </div>
  <div class="floating-overlay">
    <div class="confirm-cont">
      <div class="confirm-text">Are you sure you want to delete this cat?</div>
      <div class="confirm-button-wrap w-form">
        <form class="confirm-button-cont" data-name="Email Form 2" id="email-form-2" name="email-form-2"><a class="cancel confirm-button w-button" data-ix="confirm-cancel" href="#">Cancel</a>
          <input class="confirm-button delete w-button" data-wait="Please wait..." type="submit" value="Delete">
        </form>
        <div class="w-form-done">
          <div>Thank you! Your submission has been received!</div>
        </div>
        <div class="w-form-fail">
          <div>Oops! Something went wrong while submitting the form</div>
        </div>
      </div>
    </div>
  </div> 
  <div class="button-cont w-hidden-main">
    <a class="button-01 w-inline-block" href="<?= $this->Url->build(['controller'=>'cats', 'action'=>'edit', $cat->id]) ?> ">
      <div class="button-icon-text">Edit</div><img data-ix="add-click" src="/img/edit-01.png" width="55">
    </a>
    <div class="button-02">
      <div class="button-icon-text">Upload Attachments</div><img data-ix="add-click" src="/img/upload-01.png" width="55">
    </div>
    <div class="button-03" data-ix="add-click">
      <div class="button-icon-text">Export</div><img data-ix="add-click" src="/img/export-01.png" width="55">
    </div>
    <div class="button-04">
      <div class="button-icon-text">Delete</div><img data-ix="add-click" src="/img/delete-01.png" width="55">
    </div>
  </div><img class="button-paw" data-ix="paw-click" src="/img/add-paw.png" width="60">
