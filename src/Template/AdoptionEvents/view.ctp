<?php
/**
  * @var \App\View\AppView $this
  */
/*
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Adoption Event'), ['action' => 'edit', $adoptionEvent->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Adoption Event'), ['action' => 'delete', $adoptionEvent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adoptionEvent->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Adoption Events'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adoption Event'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cats'), ['controller' => 'Cats', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cat'), ['controller' => 'Cats', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="adoptionEvents view large-9 medium-8 columns content">
    <h3><?= h($adoptionEvent->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($adoptionEvent->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Event Date') ?></th>
            <td><?= h($adoptionEvent->event_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $adoptionEvent->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($adoptionEvent->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Cats') ?></h4>
        <?php if (!empty($adoptionEvent->cats)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Litter Id') ?></th>
                <th scope="col"><?= __('Adopter Id') ?></th>
                <th scope="col"><?= __('Foster Id') ?></th>
                <th scope="col"><?= __('Cat Name') ?></th>
                <th scope="col"><?= __('Is Kitten') ?></th>
                <th scope="col"><?= __('Dob') ?></th>
                <th scope="col"><?= __('Is Female') ?></th>
                <th scope="col"><?= __('Breed Id') ?></th>
                <th scope="col"><?= __('Color') ?></th>
                <th scope="col"><?= __('Coat') ?></th>
                <th scope="col"><?= __('Bio') ?></th>
                <th scope="col"><?= __('Diet') ?></th>
                <th scope="col"><?= __('Specialty Notes') ?></th>
                <th scope="col"><?= __('Profile Pic File Id') ?></th>
                <th scope="col"><?= __('Microchip Number') ?></th>
                <th scope="col"><?= __('Is Microchip Registered') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Adoption Fee Amount') ?></th>
                <th scope="col"><?= __('Is Paws') ?></th>
                <th scope="col"><?= __('Is Deleted') ?></th>
                <th scope="col"><?= __('Is Exported To Adoptapet') ?></th>
                <th scope="col"><?= __('Good With Kids') ?></th>
                <th scope="col"><?= __('Good With Dogs') ?></th>
                <th scope="col"><?= __('Good With Cats') ?></th>
                <th scope="col"><?= __('Special Needs') ?></th>
                <th scope="col"><?= __('Needs Experienced Adopter') ?></th>
                <th scope="col"><?= __('Is Deceased') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($adoptionEvent->cats as $cats): ?>
            <tr>
                <td><?= h($cats->id) ?></td>
                <td><?= h($cats->litter_id) ?></td>
                <td><?= h($cats->adopter_id) ?></td>
                <td><?= h($cats->foster_id) ?></td>
                <td><?= h($cats->cat_name) ?></td>
                <td><?= h($cats->is_kitten) ?></td>
                <td><?= h($cats->dob) ?></td>
                <td><?= h($cats->is_female) ?></td>
                <td><?= h($cats->breed_id) ?></td>
                <td><?= h($cats->color) ?></td>
                <td><?= h($cats->coat) ?></td>
                <td><?= h($cats->bio) ?></td>
                <td><?= h($cats->diet) ?></td>
                <td><?= h($cats->specialty_notes) ?></td>
                <td><?= h($cats->profile_pic_file_id) ?></td>
                <td><?= h($cats->microchip_number) ?></td>
                <td><?= h($cats->is_microchip_registered) ?></td>
                <td><?= h($cats->created) ?></td>
                <td><?= h($cats->adoption_fee_amount) ?></td>
                <td><?= h($cats->is_paws) ?></td>
                <td><?= h($cats->is_deleted) ?></td>
                <td><?= h($cats->is_exported_to_adoptapet) ?></td>
                <td><?= h($cats->good_with_kids) ?></td>
                <td><?= h($cats->good_with_dogs) ?></td>
                <td><?= h($cats->good_with_cats) ?></td>
                <td><?= h($cats->special_needs) ?></td>
                <td><?= h($cats->needs_experienced_adopter) ?></td>
                <td><?= h($cats->is_deceased) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Cats', 'action' => 'view', $cats->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Cats', 'action' => 'edit', $cats->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cats', 'action' => 'delete', $cats->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cats->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
        <?php foreach ($adoptionEvent->users as $user): ?>
            <?= h($user->id) ?>
        <?php endforeach; ?>
    </div>
</div>
*/ ?>

<div class="body">
    <div class="add-view column">
      <div class="events-cont" data-ix="page-load-fade-in">
        <div class="events-header">
          <div class="add-field-h1">adoption events</div>
        </div>
        <div class="events-tab-wrap w-tabs" data-duration-in="300" data-duration-out="100">
          <div class="events-tab-menu-wrap w-tab-menu">
            <a class="events-tab-menu-cont w-inline-block w-tab-link" data-w-tab="Tab 1">
              <div>Current</div>
            </a>
            <a class="events-tab-menu-cont w-inline-block w-tab-link" data-w-tab="Tab 2">
              <div>Upcoming</div>
            </a>
            <a class="events-tab-menu-cont w--current w-inline-block w-tab-link" data-w-tab="Tab 3">
              <div>past</div>
            </a>
          </div>
          <div class="events-tab-cont w-tab-content">
            <div class="events-tab w-tab-pane" data-w-tab="Tab 1">
              <div class="event-wrap">
                <div class="event-cont">
                  <div class="event-header-cont" data-ix="event-show-hide-upcoming">
                    <div class="event-h2">May 15th, 2017</div>
                    <div class="event-expand-icon"></div>
                    <div class="events-action-cont">
                      <a class="left medical-data-action w-inline-block" href="#">
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
                    <div class="event-description">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
                    <div class="event-h3">Cats:</div>
                    <div class="events list-wrapper w-dyn-list" data-ix="page-load-fade-in">
                      <div class="events list w-dyn-items">
                        <div class="card-cont card-wrapper w-dyn-item">
                          <a class="card w-clearfix w-inline-block"><img class="card-pic" src="images/cat.png">
                            <div class="card-h1"></div>
                            <div class="card-h2-cont">
                              <div class="card-h2-symbol male">C</div>
                              <div class="card-h2-symbol female">D</div>
                              <div class="card-h2 male">Kitten</div>
                              <div class="card-h2 female">Kitten</div>
                            </div>
                            <div class="card-field-wrap">
                              <div class="card-field-cont">
                                <div class="card-field-cont">
                                  <div class="card-h3">DOB:</div>
                                  <div class="card-field-text"></div>
                                </div>
                                <div class="card-field-cont">
                                  <div class="card-h3">Age:</div>
                                  <div class="card-field-text"></div>
                                </div>
                              </div>
                              <div class="card-field-cont">
                                <div class="card-field-cont">
                                  <div class="card-h3">Breed:</div>
                                  <div class="card-field-text"></div>
                                </div>
                              </div>
                              <div class="card-field-cont">
                                <div class="card-field-cont">
                                  <div class="card-h3">Color:</div>
                                  <div class="card-field-text"></div>
                                </div>
                                <div class="card-field-cont">
                                  <div class="card-h3">Coat:</div>
                                  <div class="card-field-text">Short/Long</div>
                                </div>
                              </div>
                            </div>
                            <div class="list-id-cont">
                              <div class="id-text">#</div>
                              <div class="id-text"></div>
                            </div>
                          </a>
                          <div class="dropdown-results-cont">
                            <a class="dropdown-cat-cont w-inline-block"><img class="dropdown-cat-pic" src="https://d3e54v103j8qbb.cloudfront.net/img/image-placeholder.svg">
                              <div class="dropdown-cat-name"></div>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="w-dyn-empty">
                        <div>No items found.</div>
                      </div>
                    </div>
                    <div class="event-h3">Volunteers:</div>
                    <div class="events list-wrapper w-dyn-list" data-ix="page-load-fade-in">
                      <div class="events list w-dyn-items">
                        <div class="card-cont card-wrapper w-dyn-item">
                          <a class="card w-clearfix w-inline-block"><img class="card-pic" sizes="100vw">
                            <div class="card-h1"></div>
                            <div>
                              <div class="card-h2">Rating:</div>
                              <div class="card-h2"></div>
                            </div>
                            <div class="card-field-wrap">
                              <div class="card-field-cont left-justify">
                                <div class="card-h3">Address:</div>
                                <div class="catlist-field-content"></div>
                              </div>
                              <div class="card-field-cont left-justify">
                                <div class="card-h3">Phone:</div>
                                <div class="catlist-field-content"></div>
                              </div>
                              <div class="card-field-cont left-justify">
                                <div class="card-h3">E-mail:</div>
                                <div class="catlist-field-content"></div>
                              </div>
                            </div>
                          </a>
                        </div>
                      </div>
                      <div class="w-dyn-empty">
                        <div>No items found.</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="events-tab w-tab-pane" data-w-tab="Tab 2">
              <div class="event-wrap">
                <div class="event-cont upcoming">
                  <div class="event-header-cont">
                    <div class="event-h2">June 3rd, 2017</div>
                    <div class="event-expand-icon"></div>
                    <div class="events-action-cont">
                      <a class="left medical-data-action w-inline-block" href="#">
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
                    <div class="event-description">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
                    <div class="event-h3">Cats:</div>
                    <div class="events list-wrapper w-dyn-list" data-ix="page-load-fade-in">
                      <div class="events list w-dyn-items">
                        <div class="card-cont card-wrapper w-dyn-item">
                          <a class="card w-clearfix w-inline-block"><img class="card-pic" src="images/cat.png">
                            <div class="card-h1"></div>
                            <div class="card-h2-cont">
                              <div class="card-h2-symbol male">C</div>
                              <div class="card-h2-symbol female">D</div>
                              <div class="card-h2 male">Kitten</div>
                              <div class="card-h2 female">Kitten</div>
                            </div>
                            <div class="card-field-wrap">
                              <div class="card-field-cont">
                                <div class="card-field-cont">
                                  <div class="card-h3">DOB:</div>
                                  <div class="card-field-text"></div>
                                </div>
                                <div class="card-field-cont">
                                  <div class="card-h3">Age:</div>
                                  <div class="card-field-text"></div>
                                </div>
                              </div>
                              <div class="card-field-cont">
                                <div class="card-field-cont">
                                  <div class="card-h3">Breed:</div>
                                  <div class="card-field-text"></div>
                                </div>
                              </div>
                              <div class="card-field-cont">
                                <div class="card-field-cont">
                                  <div class="card-h3">Color:</div>
                                  <div class="card-field-text"></div>
                                </div>
                                <div class="card-field-cont">
                                  <div class="card-h3">Coat:</div>
                                  <div class="card-field-text">Short/Long</div>
                                </div>
                              </div>
                            </div>
                            <div class="list-id-cont">
                              <div class="id-text">#</div>
                              <div class="id-text"></div>
                            </div>
                          </a>
                          <div class="dropdown-results-cont">
                            <a class="dropdown-cat-cont w-inline-block"><img class="dropdown-cat-pic" src="https://d3e54v103j8qbb.cloudfront.net/img/image-placeholder.svg">
                              <div class="dropdown-cat-name"></div>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="w-dyn-empty">
                        <div>No items found.</div>
                      </div>
                    </div>
                    <div class="event-h3">Volunteers:</div>
                    <div class="events list-wrapper w-dyn-list" data-ix="page-load-fade-in">
                      <div class="events list w-dyn-items">
                        <div class="card-cont card-wrapper w-dyn-item">
                          <a class="card w-clearfix w-inline-block"><img class="card-pic" sizes="100vw">
                            <div class="card-h1"></div>
                            <div>
                              <div class="card-h2">Rating:</div>
                              <div class="card-h2"></div>
                            </div>
                            <div class="card-field-wrap">
                              <div class="card-field-cont left-justify">
                                <div class="card-h3">Address:</div>
                                <div class="catlist-field-content"></div>
                              </div>
                              <div class="card-field-cont left-justify">
                                <div class="card-h3">Phone:</div>
                                <div class="catlist-field-content"></div>
                              </div>
                              <div class="card-field-cont left-justify">
                                <div class="card-h3">E-mail:</div>
                                <div class="catlist-field-content"></div>
                              </div>
                            </div>
                          </a>
                        </div>
                      </div>
                      <div class="w-dyn-empty">
                        <div>No items found.</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="event-cont">
                  <div class="event-header-cont" data-ix="event-show-hide-upcoming">
                    <div class="event-h2">May 15th, 2017</div>
                    <div class="event-expand-icon"></div>
                    <div class="events-action-cont">
                      <a class="left medical-data-action w-inline-block" href="#">
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
                    <div class="event-description">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
                    <div class="event-h3">Cats:</div>
                    <div class="events list-wrapper w-dyn-list" data-ix="page-load-fade-in">
                      <div class="events list w-dyn-items">
                        <div class="card-cont card-wrapper w-dyn-item">
                          <a class="card w-clearfix w-inline-block"><img class="card-pic" src="images/cat.png">
                            <div class="card-h1"></div>
                            <div class="card-h2-cont">
                              <div class="card-h2-symbol male">C</div>
                              <div class="card-h2-symbol female">D</div>
                              <div class="card-h2 male">Kitten</div>
                              <div class="card-h2 female">Kitten</div>
                            </div>
                            <div class="card-field-wrap">
                              <div class="card-field-cont">
                                <div class="card-field-cont">
                                  <div class="card-h3">DOB:</div>
                                  <div class="card-field-text"></div>
                                </div>
                                <div class="card-field-cont">
                                  <div class="card-h3">Age:</div>
                                  <div class="card-field-text"></div>
                                </div>
                              </div>
                              <div class="card-field-cont">
                                <div class="card-field-cont">
                                  <div class="card-h3">Breed:</div>
                                  <div class="card-field-text"></div>
                                </div>
                              </div>
                              <div class="card-field-cont">
                                <div class="card-field-cont">
                                  <div class="card-h3">Color:</div>
                                  <div class="card-field-text"></div>
                                </div>
                                <div class="card-field-cont">
                                  <div class="card-h3">Coat:</div>
                                  <div class="card-field-text">Short/Long</div>
                                </div>
                              </div>
                            </div>
                            <div class="list-id-cont">
                              <div class="id-text">#</div>
                              <div class="id-text"></div>
                            </div>
                          </a>
                          <div class="dropdown-results-cont">
                            <a class="dropdown-cat-cont w-inline-block"><img class="dropdown-cat-pic" src="https://d3e54v103j8qbb.cloudfront.net/img/image-placeholder.svg">
                              <div class="dropdown-cat-name"></div>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="w-dyn-empty">
                        <div>No items found.</div>
                      </div>
                    </div>
                    <div class="event-h3">Volunteers:</div>
                    <div class="events list-wrapper w-dyn-list" data-ix="page-load-fade-in">
                      <div class="events list w-dyn-items">
                        <div class="card-cont card-wrapper w-dyn-item">
                          <a class="card w-clearfix w-inline-block"><img class="card-pic" sizes="100vw">
                            <div class="card-h1"></div>
                            <div>
                              <div class="card-h2">Rating:</div>
                              <div class="card-h2"></div>
                            </div>
                            <div class="card-field-wrap">
                              <div class="card-field-cont left-justify">
                                <div class="card-h3">Address:</div>
                                <div class="catlist-field-content"></div>
                              </div>
                              <div class="card-field-cont left-justify">
                                <div class="card-h3">Phone:</div>
                                <div class="catlist-field-content"></div>
                              </div>
                              <div class="card-field-cont left-justify">
                                <div class="card-h3">E-mail:</div>
                                <div class="catlist-field-content"></div>
                              </div>
                            </div>
                          </a>
                        </div>
                      </div>
                      <div class="w-dyn-empty">
                        <div>No items found.</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="event-cont upcoming">
                  <div class="event-header-cont">
                    <div class="event-h2">May 25th, 2017</div>
                    <div class="event-expand-icon"></div>
                    <div class="events-action-cont">
                      <a class="left medical-data-action w-inline-block" href="#">
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
                    <div class="event-description">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
                    <div class="event-h3">Cats:</div>
                    <div class="events list-wrapper w-dyn-list" data-ix="page-load-fade-in">
                      <div class="events list w-dyn-items">
                        <div class="card-cont card-wrapper w-dyn-item">
                          <a class="card w-clearfix w-inline-block"><img class="card-pic" src="images/cat.png">
                            <div class="card-h1"></div>
                            <div class="card-h2-cont">
                              <div class="card-h2-symbol male">C</div>
                              <div class="card-h2-symbol female">D</div>
                              <div class="card-h2 male">Kitten</div>
                              <div class="card-h2 female">Kitten</div>
                            </div>
                            <div class="card-field-wrap">
                              <div class="card-field-cont">
                                <div class="card-field-cont">
                                  <div class="card-h3">DOB:</div>
                                  <div class="card-field-text"></div>
                                </div>
                                <div class="card-field-cont">
                                  <div class="card-h3">Age:</div>
                                  <div class="card-field-text"></div>
                                </div>
                              </div>
                              <div class="card-field-cont">
                                <div class="card-field-cont">
                                  <div class="card-h3">Breed:</div>
                                  <div class="card-field-text"></div>
                                </div>
                              </div>
                              <div class="card-field-cont">
                                <div class="card-field-cont">
                                  <div class="card-h3">Color:</div>
                                  <div class="card-field-text"></div>
                                </div>
                                <div class="card-field-cont">
                                  <div class="card-h3">Coat:</div>
                                  <div class="card-field-text">Short/Long</div>
                                </div>
                              </div>
                            </div>
                            <div class="list-id-cont">
                              <div class="id-text">#</div>
                              <div class="id-text"></div>
                            </div>
                          </a>
                          <div class="dropdown-results-cont">
                            <a class="dropdown-cat-cont w-inline-block"><img class="dropdown-cat-pic" src="https://d3e54v103j8qbb.cloudfront.net/img/image-placeholder.svg">
                              <div class="dropdown-cat-name"></div>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="w-dyn-empty">
                        <div>No items found.</div>
                      </div>
                    </div>
                    <div class="event-h3">Volunteers:</div>
                    <div class="events list-wrapper w-dyn-list" data-ix="page-load-fade-in">
                      <div class="events list w-dyn-items">
                        <div class="card-cont card-wrapper w-dyn-item">
                          <a class="card w-clearfix w-inline-block"><img class="card-pic" sizes="100vw">
                            <div class="card-h1"></div>
                            <div>
                              <div class="card-h2">Rating:</div>
                              <div class="card-h2"></div>
                            </div>
                            <div class="card-field-wrap">
                              <div class="card-field-cont left-justify">
                                <div class="card-h3">Address:</div>
                                <div class="catlist-field-content"></div>
                              </div>
                              <div class="card-field-cont left-justify">
                                <div class="card-h3">Phone:</div>
                                <div class="catlist-field-content"></div>
                              </div>
                              <div class="card-field-cont left-justify">
                                <div class="card-h3">E-mail:</div>
                                <div class="catlist-field-content"></div>
                              </div>
                            </div>
                          </a>
                        </div>
                      </div>
                      <div class="w-dyn-empty">
                        <div>No items found.</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="pagination-w upcoming">
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
            <div class="events-tab w--tab-active w-tab-pane" data-w-tab="Tab 3">
              <div class="event-wrap">
                <div class="event-cont past">
                  <div class="event-header-cont">
                    <div class="event-h2">May 15th, 2017</div>
                    <div class="event-expand-icon"></div>
                    <div class="events-action-cont">
                      <a class="left medical-data-action w-inline-block" href="#">
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
                    <div class="event-description">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
                    <div class="event-h3">Cats:</div>
                    <div class="events list-wrapper w-dyn-list" data-ix="page-load-fade-in">
                      <div class="events list w-dyn-items">
                        <div class="card-cont card-wrapper w-dyn-item">
                          <a class="card w-clearfix w-inline-block"><img class="card-pic" src="images/cat.png">
                            <div class="card-h1"></div>
                            <div class="card-h2-cont">
                              <div class="card-h2-symbol male">C</div>
                              <div class="card-h2-symbol female">D</div>
                              <div class="card-h2 male">Kitten</div>
                              <div class="card-h2 female">Kitten</div>
                            </div>
                            <div class="card-field-wrap">
                              <div class="card-field-cont">
                                <div class="card-field-cont">
                                  <div class="card-h3">DOB:</div>
                                  <div class="card-field-text"></div>
                                </div>
                                <div class="card-field-cont">
                                  <div class="card-h3">Age:</div>
                                  <div class="card-field-text"></div>
                                </div>
                              </div>
                              <div class="card-field-cont">
                                <div class="card-field-cont">
                                  <div class="card-h3">Breed:</div>
                                  <div class="card-field-text"></div>
                                </div>
                              </div>
                              <div class="card-field-cont">
                                <div class="card-field-cont">
                                  <div class="card-h3">Color:</div>
                                  <div class="card-field-text"></div>
                                </div>
                                <div class="card-field-cont">
                                  <div class="card-h3">Coat:</div>
                                  <div class="card-field-text">Short/Long</div>
                                </div>
                              </div>
                            </div>
                            <div class="list-id-cont">
                              <div class="id-text">#</div>
                              <div class="id-text"></div>
                            </div>
                          </a>
                          <div class="dropdown-results-cont">
                            <a class="dropdown-cat-cont w-inline-block"><img class="dropdown-cat-pic" src="https://d3e54v103j8qbb.cloudfront.net/img/image-placeholder.svg">
                              <div class="dropdown-cat-name"></div>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="w-dyn-empty">
                        <div>No items found.</div>
                      </div>
                    </div>
                    <div class="event-h3">Volunteers:</div>
                    <div class="events list-wrapper w-dyn-list" data-ix="page-load-fade-in">
                      <div class="events list w-dyn-items">
                        <div class="card-cont card-wrapper w-dyn-item">
                          <a class="card w-clearfix w-inline-block"><img class="card-pic" sizes="100vw">
                            <div class="card-h1"></div>
                            <div>
                              <div class="card-h2">Rating:</div>
                              <div class="card-h2"></div>
                            </div>
                            <div class="card-field-wrap">
                              <div class="card-field-cont left-justify">
                                <div class="card-h3">Address:</div>
                                <div class="catlist-field-content"></div>
                              </div>
                              <div class="card-field-cont left-justify">
                                <div class="card-h3">Phone:</div>
                                <div class="catlist-field-content"></div>
                              </div>
                              <div class="card-field-cont left-justify">
                                <div class="card-h3">E-mail:</div>
                                <div class="catlist-field-content"></div>
                              </div>
                            </div>
                          </a>
                        </div>
                      </div>
                      <div class="w-dyn-empty">
                        <div>No items found.</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="event-cont">
                  <div class="event-header-cont" data-ix="event-show-hide-past">
                    <div class="event-h2">May 25th, 2017</div>
                    <div class="event-expand-icon"></div>
                    <div class="events-action-cont">
                      <a class="left medical-data-action w-inline-block" href="#">
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
                    <div class="event-description">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
                    <div class="event-h3">Cats:</div>
                    <div class="events list-wrapper w-dyn-list" data-ix="page-load-fade-in">
                      <div class="events list w-dyn-items">
                        <div class="card-cont card-wrapper w-dyn-item">
                          <a class="card w-clearfix w-inline-block"><img class="card-pic" src="images/cat.png">
                            <div class="card-h1"></div>
                            <div class="card-h2-cont">
                              <div class="card-h2-symbol male">C</div>
                              <div class="card-h2-symbol female">D</div>
                              <div class="card-h2 male">Kitten</div>
                              <div class="card-h2 female">Kitten</div>
                            </div>
                            <div class="card-field-wrap">
                              <div class="card-field-cont">
                                <div class="card-field-cont">
                                  <div class="card-h3">DOB:</div>
                                  <div class="card-field-text"></div>
                                </div>
                                <div class="card-field-cont">
                                  <div class="card-h3">Age:</div>
                                  <div class="card-field-text"></div>
                                </div>
                              </div>
                              <div class="card-field-cont">
                                <div class="card-field-cont">
                                  <div class="card-h3">Breed:</div>
                                  <div class="card-field-text"></div>
                                </div>
                              </div>
                              <div class="card-field-cont">
                                <div class="card-field-cont">
                                  <div class="card-h3">Color:</div>
                                  <div class="card-field-text"></div>
                                </div>
                                <div class="card-field-cont">
                                  <div class="card-h3">Coat:</div>
                                  <div class="card-field-text">Short/Long</div>
                                </div>
                              </div>
                            </div>
                            <div class="list-id-cont">
                              <div class="id-text">#</div>
                              <div class="id-text"></div>
                            </div>
                          </a>
                          <div class="dropdown-results-cont">
                            <a class="dropdown-cat-cont w-inline-block"><img class="dropdown-cat-pic" src="https://d3e54v103j8qbb.cloudfront.net/img/image-placeholder.svg">
                              <div class="dropdown-cat-name"></div>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="w-dyn-empty">
                        <div>No items found.</div>
                      </div>
                    </div>
                    <div class="event-h3">Volunteers:</div>
                    <div class="events list-wrapper w-dyn-list" data-ix="page-load-fade-in">
                      <div class="events list w-dyn-items">
                        <div class="card-cont card-wrapper w-dyn-item">
                          <a class="card w-clearfix w-inline-block"><img class="card-pic" sizes="100vw">
                            <div class="card-h1"></div>
                            <div>
                              <div class="card-h2">Rating:</div>
                              <div class="card-h2"></div>
                            </div>
                            <div class="card-field-wrap">
                              <div class="card-field-cont left-justify">
                                <div class="card-h3">Address:</div>
                                <div class="catlist-field-content"></div>
                              </div>
                              <div class="card-field-cont left-justify">
                                <div class="card-h3">Phone:</div>
                                <div class="catlist-field-content"></div>
                              </div>
                              <div class="card-field-cont left-justify">
                                <div class="card-h3">E-mail:</div>
                                <div class="catlist-field-content"></div>
                              </div>
                            </div>
                          </a>
                        </div>
                      </div>
                      <div class="w-dyn-empty">
                        <div>No items found.</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="event-cont past">
                  <div class="event-header-cont">
                    <div class="event-h2">June 3rd, 2017</div>
                    <div class="event-expand-icon"></div>
                    <div class="events-action-cont">
                      <a class="left medical-data-action w-inline-block" href="#">
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
                    <div class="event-description">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
                    <div class="event-h3">Cats:</div>
                    <div class="events list-wrapper w-dyn-list" data-ix="page-load-fade-in">
                      <div class="events list w-dyn-items">
                        <div class="card-cont card-wrapper w-dyn-item">
                          <a class="card w-clearfix w-inline-block"><img class="card-pic" src="images/cat.png">
                            <div class="card-h1"></div>
                            <div class="card-h2-cont">
                              <div class="card-h2-symbol male">C</div>
                              <div class="card-h2-symbol female">D</div>
                              <div class="card-h2 male">Kitten</div>
                              <div class="card-h2 female">Kitten</div>
                            </div>
                            <div class="card-field-wrap">
                              <div class="card-field-cont">
                                <div class="card-field-cont">
                                  <div class="card-h3">DOB:</div>
                                  <div class="card-field-text"></div>
                                </div>
                                <div class="card-field-cont">
                                  <div class="card-h3">Age:</div>
                                  <div class="card-field-text"></div>
                                </div>
                              </div>
                              <div class="card-field-cont">
                                <div class="card-field-cont">
                                  <div class="card-h3">Breed:</div>
                                  <div class="card-field-text"></div>
                                </div>
                              </div>
                              <div class="card-field-cont">
                                <div class="card-field-cont">
                                  <div class="card-h3">Color:</div>
                                  <div class="card-field-text"></div>
                                </div>
                                <div class="card-field-cont">
                                  <div class="card-h3">Coat:</div>
                                  <div class="card-field-text">Short/Long</div>
                                </div>
                              </div>
                            </div>
                            <div class="list-id-cont">
                              <div class="id-text">#</div>
                              <div class="id-text"></div>
                            </div>
                          </a>
                          <div class="dropdown-results-cont">
                            <a class="dropdown-cat-cont w-inline-block"><img class="dropdown-cat-pic" src="https://d3e54v103j8qbb.cloudfront.net/img/image-placeholder.svg">
                              <div class="dropdown-cat-name"></div>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="w-dyn-empty">
                        <div>No items found.</div>
                      </div>
                    </div>
                    <div class="event-h3">Volunteers:</div>
                    <div class="events list-wrapper w-dyn-list" data-ix="page-load-fade-in">
                      <div class="events list w-dyn-items">
                        <div class="card-cont card-wrapper w-dyn-item">
                          <a class="card w-clearfix w-inline-block"><img class="card-pic" sizes="100vw">
                            <div class="card-h1"></div>
                            <div>
                              <div class="card-h2">Rating:</div>
                              <div class="card-h2"></div>
                            </div>
                            <div class="card-field-wrap">
                              <div class="card-field-cont left-justify">
                                <div class="card-h3">Address:</div>
                                <div class="catlist-field-content"></div>
                              </div>
                              <div class="card-field-cont left-justify">
                                <div class="card-h3">Phone:</div>
                                <div class="catlist-field-content"></div>
                              </div>
                              <div class="card-field-cont left-justify">
                                <div class="card-h3">E-mail:</div>
                                <div class="catlist-field-content"></div>
                              </div>
                            </div>
                          </a>
                        </div>
                      </div>
                      <div class="w-dyn-empty">
                        <div>No items found.</div>
                      </div>
                    </div>
                  </div>
                </div>
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
        <div class="events-button-cont"><a class="add-cancel" href="cat-list.html">Return</a><a class="add-submit" href="cat-list.html">Create Event</a>
        </div>
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