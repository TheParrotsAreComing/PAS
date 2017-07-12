<?= $this->Html->script('cats.js'); ?>
<div class="body w-clearfix">
  <div class="filter-bar">
    <div class="filter-header">
      <div class="filter-header">FILTER</div>
      <div class="symbol" data-ix="filter-cancel"></div>
    </div>
    <?= $this->Form->create(false,['type'=>'get','class'=>'w-clearfix']) ?>
    <?php $this->Form->templates(['inputContainer' => '{{content}}']); ?>
      <div class="filter">
          <div class="filter-criteria">Date:</div>
          <?= $this->Form->input('event_date',['class'=>'filter-criteria-select w-input','label'=>false,'id'=>'Event-Date','placeholder'=>'Enter date']) ?>
      </div>

      <div class="filter">
        <div class="filter-criteria">Deleted:</div>
        <?= $this->Form->input('is_deleted', ['type'=>'checkbox', 'label' => false]); ?>
      </div>

      <div class="filter-apply-cont">
        <a class="cancel filter-button w-button" href="<?= $this->Url->build(['action'=>'index'])?>">Cancel</a>
        <button id="filterAdopters" type="submit" class="apply filter-button w-button" data-ix="button-click" href="#">APPLY FILTER</button>
      </div>
    <?= $this->Form->end() ?>
  </div>
    <div class="column">
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
                    <div>Past</div>
                </a>
            </div>
            <div class="events-tab-cont w-tab-content">
            <div class="events-tab w--tab-active w-tab-pane" data-w-tab="Tab 1">
                <div class="event-wrap">
                <!-- Insert code for current event here --> 
                <?php 
                    $today = date("Y-m-d"); 
                    $currentFlag = false;
                ?>
                <?php foreach ($adoptionEvents as $adoptionEvent): ?>
                    <?php $date = $adoptionEvent->event_date->format('Y-m-d'); ?>
                    <?php if ($date == $today) : ?>
                        <?php $currentFlag = true; ?>
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
                                        <a href = "<?= $this->Url->build(['controller' => 'cats', 'action' => 'view', $cat->id]) ?>" class="dropdown-cat-cont mini w-inline-block" >
                                        <?php
                                            if(!empty($cat->profile_pic)){
                                                echo $this->Html->image('../'.$cat->profile_pic->file_path.'_tn.'.$cat->profile_pic->file_ext, ['class'=>'dropdown-cat-pic']);
                                            } else {
                                                echo $this->Html->image('cat-menu.png', ['class'=>'dropdown-cat-pic']);
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
                    <?php endif; ?>
                <?php endforeach; ?>
                <?php if (!$currentFlag) : ?>
                    <div class="w-dyn-empty">
                        <div>No Current Adoption Event(s)!</div>
                    </div>
                <?php endif; ?>
                </div>
            </div>
            <div class="events-tab w-tab-pane" data-w-tab="Tab 2">
                <div class="event-wrap tab-upcoming">
                   <?php foreach ($adoptionEvents as $adoptionEvent): ?>
                    <?php $date = $adoptionEvent->event_date->format('Y-m-d'); ?>
                    <?php if ($date > $today) : ?>
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
                                        <a href = "<?= $this->Url->build(['controller' => 'cats', 'action' => 'view', $cat->id]) ?>" class="dropdown-cat-cont mini w-inline-block" >
                                        <?php
                                            if(!empty($cat->profile_pic)){
                                                echo $this->Html->image('../'.$cat->profile_pic->file_path.'_tn.'.$cat->profile_pic->file_ext, ['class'=>'dropdown-cat-pic']);
                                            } else {
                                                echo $this->Html->image('cat-menu.png', ['class'=>'dropdown-cat-pic']);
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
                    <?php endif; ?>
                <?php endforeach; ?>
                </div> <!-- End Upcoming -->
            </div>
            <div class="events-tab w--tab-active w-tab-pane" data-w-tab="Tab 3">
                <div class="event-wrap">
                <?php foreach ($adoptionEvents as $adoptionEvent): ?>
                    <?php $date = $adoptionEvent->event_date->format('Y-m-d'); ?>
                    <?php if ($date < $today) : ?>
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
                                        <a href = "<?= $this->Url->build(['controller' => 'cats', 'action' => 'view', $cat->id]) ?>" class="dropdown-cat-cont mini w-inline-block" >
                                        <?php
                                            if(!empty($cat->profile_pic)){
                                                echo $this->Html->image('../'.$cat->profile_pic->file_path.'_tn.'.$cat->profile_pic->file_ext, ['class'=>'dropdown-cat-pic']);
                                            } else {
                                                echo $this->Html->image('cat-menu.png', ['class'=>'dropdown-cat-pic']);
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
                    <?php endif; ?>
                <?php endforeach; ?>
                <div class="pagination-w">
                    <div class="pagination-wrap">
                      <div class="pagination-cont">
                        <div class="pagination"><?= $this->Paginator->prev('') ?></div>
                      </div>
                      <div class="pagination-cont">
                          <?= $this->Paginator->numbers() ?>
                      </div>
                      <div class="pagination-cont">
                        <div class="pagination"><?= $this->Paginator->next('') ?></div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            </div>
        </div>
        <div class="events-button-cont">
            <div>
            <?php if ($can_add): ?>
                <a class="profile-add-cont" href="<?= $this->Url->build(['controller'=>'AdoptionEvents', 'action'=>'add']) ?>">+ Create Adoption Event</a>
            <?php endif; ?>
            </div>
            <div>
            <a class="profile-add-cont" href="#" data-ix="filter-hideshow">Sort/Filter</a>
            </div>
        </div>
        </div>
    </div>
    </div>
<div class="floating-overlay">
    <div class="confirm-cont">
        <div class="confirm-text">Are you sure you want to delete this event?</div>
        <div class="confirm-button-wrap w-form">
            <form class="confirm-button-cont" data-name="Email Form 2" id="email-form-2" name="email-form-2">
            <a class="cancel confirm-button w-button" data-ix="confirm-cancel" href="#">Cancel</a>
            <a class="confirm-button delete w-button" href="<?= $this->Url->build(['controller'=>'AdoptionEvents', 'action'=>'delete', $adoptionEvent->id]) ?>" data-wait="Please wait... " type="submit" value="Delete">Delete</a>
            </form>
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
