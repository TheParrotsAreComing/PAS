<?= $this->Html->script('cats.js'); ?>
<div class="body">
    <div class="add-view column">
      <div class="events-cont" data-ix="page-load-fade-in">
        <div class="events-header">
          <div class="add-field-h1">adoption events</div>
        </div>
        <div class="events-tab-wrap w-tabs" data-duration-in="300" data-duration-out="100">
          <div class="events-tab-menu-wrap w-tab-menu">
            <a class="events-tab-menu-cont w--current w-inline-block w-tab-link" data-w-tab="Tab 1">
              <div>Current</div>
            </a>
            <a class="events-tab-menu-cont w-inline-block w-tab-link upcoming-tab" data-w-tab="Tab 2">
              <div>Upcoming</div>
            </a>
            <a class="events-tab-menu-cont w-inline-block w-tab-link" data-w-tab="Tab 3">
              <div>past</div>
            </a>
          </div>
          <div class="events-tab-cont w-tab-content">
            <div class="events-tab w--tab-active w-tab-pane" data-w-tab="Tab 1">
              <div class="event-wrap">
                <!-- Insert code for current event here --> 
                <div class="w-dyn-empty">
                  <div>No Current Adoption Event(s)!</div>
                </div>
              </div>
            </div>
            <div class="events-tab w-tab-pane" data-w-tab="Tab 2">
              <div class="event-wrap tab-upcoming">
                <?php foreach ($adoptionEvents as $adoptionEvent): ?>
                <div class="event-cont upcoming <?php echo 'event'. h($adoptionEvent->id) ?>">
                  <div class="event-header-cont" data-ix="event-show-hide-upcoming">
                    <div class="event-h2"><?= h($adoptionEvent->event_date->format('F jS, Y')) ?></div>
                    <div class="event-expand-icon"></div>
                    <div class="events-action-cont">
                      <a class="left medical-data-action w-inline-block" href="<?= $this->Url->build(['controller'=>'AdoptionEvents', 'action'=>'edit', $adoptionEvent->id]) ?>">
                        <div class="profile-action-button sofware">-</div>
                        <div>edit</div>
                      </a>
                      <a class="medical-data-action w-inline-block" data-ix="delete-click-desktop" href="#">
                        <div class="basic profile-action-button"></div>
                        <div>delete</div>
                      </a>
                    </div>
                  </div>
                  <div class="event scroll1">
                    <div class="event-h3">Description:</div>
                    <div class="event-description"><?= h($adoptionEvent->description) ?></div>
                    <div class="event-h3">Cats:</div>
                    <div class="events list-wrapper w-dyn-list" data-ix="page-load-fade-in">
                      <?php if (!empty($adoptionEvent->cats)): ?>
                      <div class="dropdown-results-cont mini">
                        <?php foreach ($adoptionEvent->cats as $cat) :?>
                            <a href = "<?= $this->Url->build(['controller' => 'cats', 'action' => 'view', $cat->id]) ?>" class="dropdown-cat-cont mini w-inline-block" ><img class="dropdown-cat-pic" src="<?= $this->Url->image('cat-menu.png');?>">
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
                      <?php else: ?>
                      <?php endif; ?>
                    </div>
                    <div class="event-h3">Volunteers:</div>
                    <div class="events list-wrapper w-dyn-list" data-ix="page-load-fade-in">
                      <?php if (!empty($adoptionEvent->users)): ?>
                      <div class="dropdown-results-cont mini">
                        <?php foreach ($adoptionEvent->users as $user): ?>
                          <a href = "<?= $this->Url->build(['controller' => 'users', 'action' => 'view', $user->id]) ?>" class="dropdown-cat-cont mini w-inline-block" >
                            <?php 
                                if(!empty($user->profile_pic)){
                                  echo $this->Html->image('../'.$user->profile_pic->file_path.'_tn.'.$user->profile_pic->file_ext, ['class'=>'dropdown-cat-pic']);
                                } else {
                                  echo $this->Html->image('user-menu.png', ['class'=>'dropdown-cat-pic']);
                                }
                            ?>
                            <div class="dropdown-cat-name mini"><?= h($user->first_name) ?> <?= h($user->last_name) ?></div>
                            <div class="card-field-text mini user"><?= $user->email ?></div>
                          </a>
                        <?php endforeach; ?>
                        </div>
                      <?php else: ?>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
                <?php endforeach; ?>
              </div> <!-- End Upcoming -->
            </div>
            <div class="events-tab w--tab-active w-tab-pane" data-w-tab="Tab 3">
              <div class="event-wrap">
                <div class="pagination-w past">
                  <div class="events pagination-wrap">
                    <div class="pagination-cont">
                      <div class="pagination"></div>
                    </div>
                    <div class="pagination-cont">
                      <div class="current pagination-index">1</div>
                      <div class="pagination-index">2</div>
                      <div class="pagination-index">3</div>
                      <div class="pagination-index">4</div>
                      <div class="pagination-index">5</div>
                      <div class="pagination-index">6</div>
                    </div>
                    <div class="pagination-cont">
                      <div class="pagination"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php if ($can_add): ?>
        <div class="events-button-cont">
        <a class="profile-add-cont" href="<?= $this->Url->build(['controller'=>'AdoptionEvents', 'action'=>'add']) ?>">+ Create a New Adoption Event</a>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
<div class="floating-overlay">
<div class="confirm-cont">
  <div class="confirm-text">Are you sure you want to delete this event?</div>
  <div class="confirm event-header-cont" data-ix="event-show-hide-upcoming">
    <div class="event-h2">May 15th, 2017</div>
  </div>
  <div class="confirm-button-wrap w-form">
    <form class="confirm-button-cont" data-name="Email Form 2" id="email-form-2" name="email-form-2">
    <a class="cancel confirm-button w-button" data-ix="confirm-cancel" href="#">Cancel</a>
    <a class="confirm-button delete w-button" href="<?= $this->Url->build(['controller'=>'AdoptionEvents', 'action'=>'delete', $adoptionEvent->id]) ?>" data-wait="Please wait... " type="submit" value="Delete">Delete</a>
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
<script>
$(function(){
   calculateAndPopulateAgeFields(); 
   $('.upcoming').mouseover(function(e) {
        $(this).unbind('click');
        var that = $(this);
        that.removeClass('upcoming');
   }); 
   $('.upcoming').mouseout(function(e) {
        var that = $(this);
        that.addClass('upcoming');
   });
})
</script>
