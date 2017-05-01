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
                          <a class="card w-clearfix w-inline-block">
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
                </div> <!-- End Current -->
              </div>
            </div>
            <div class="events-tab w-tab-pane" data-w-tab="Tab 2">
              <div class="event-wrap tab-upcoming">
                <?php foreach ($adoptionEvents as $adoptionEvent): ?>
                <div class="event-cont upcoming <?php echo 'event'. h($adoptionEvent->id) ?>">
                  <div class="event-header-cont" data-ix="event-show-hide-upcoming">
                    <div class="event-h2"><?= h($adoptionEvent->event_date) ?></div>
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
                    <div class="event-description"><?= h($adoptionEvent->description) ?></div>
                    <div class="event-h3">Cats:</div>
                    <div class="events list-wrapper w-dyn-list" data-ix="page-load-fade-in">
                      <div class="events list w-dyn-items">
                        <div class="card-cont card-wrapper w-dyn-item">
                          <a class="card w-clearfix w-inline-block">
                             <?= $this->Url->Image('cat-01.png'); ?>
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
                <?php endforeach; ?>
                <div class="event-cont upcoming">
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
                          <a class="card w-clearfix w-inline-block">
                          <?= $this->Url->Image('cat-01.png') ?>
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
                          <a class="card w-clearfix w-inline-block">
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
              </div> <!-- End Upcoming -->
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
                          <a class="card w-clearfix w-inline-block">
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
                          <a class="card w-clearfix w-inline-block">
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
                          <a class="card w-clearfix w-inline-block">
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
<script>
$(function(){
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
