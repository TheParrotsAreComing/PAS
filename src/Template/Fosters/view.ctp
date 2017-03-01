<?= $this->Html->script('moment.js'); ?>
<?= $this->Html->script('cats.js'); ?>
<body class="page">
  <div class="body">
    <div class="column profile">
      <div class="profile-cont" data-ix="page-load-fade-in">
        <div class="profile-header w-clearfix"><img class="cat-profile-pic" src="http://uploads.webflow.com/img/image-placeholder.svg">
          <div>
            <div class="cat-profile-name"><?= h($foster->first_name) ?> <?= h($foster->last_name) ?></div>
			<div>
              <div class="profile-header-text">Rating:</div>
              <div class="profile-header-text"><?= $this->Number->format($foster->rating) ?></div>
            </div>
          </div>
          <a class="cat-profile-back w-inline-block">
            <div>&lt; Back</div>
          </a>
        </div>
        <div class="profile-tabs-cont w-tabs">
          <div class="cat-profile-tabs-menu w-tab-menu">
            <a class="cat-profile-tabs-menu-cont tab-leftmost w--current w-inline-block w-tab-link" data-ix="foster-notification" data-w-tab="Tab 1"><img class="cat-profile-tabs-icon" src="<?= $this->Url->image('cat-profile-foster-01.png');?>">
            </a>
			<a class="cat-profile-tabs-menu-cont w-inline-block w-tab-link" data-ix="overview-notification" data-w-tab="Tab 2"><img class="cat-profile-tabs-icon" src="<?= $this->Url->image('cat-01.png');?>">
            </a>
            <a class="cat-profile-tabs-menu-cont w-inline-block w-tab-link" data-ix="attachment-notification" data-w-tab="Tab 3"><img class="cat-profile-tabs-icon" src="<?= $this->Url->image('attachments-01.png');?>">
            </a>
            <a class="cat-profile-tabs-menu-cont tabs-rightmost w-inline-block w-tab-link" data-ix="more-notification" data-w-tab="Tab 4"><img class="cat-profile-tabs-icon" src="<?= $this->Url->image('more-01.png');?>">
            </a>
          </div>
          <div class="cat-profile-tabs-content w-tab-content">
            <div class="w--tab-active w-clearfix w-tab-pane" data-w-tab="Tab 1">
              <!--<div class="profile-notification-cont">
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
              </div>-->
              <div class="profile-content-cont">
                <div class="profile-text-header">Personal Information</div>
                <div class="profile-field-cont">
                  <div class="left-justify profile-field-cont">
                    <div class="profile-field-name">Phone: </div>
                    <div class="profile-field-text"><?= h($foster->phone) ?></div>
                  </div>
                </div>
                <div class="profile-field-cont">
                  <div class="left-justify profile-field-cont">
                    <div class="profile-field-name">Email: </div>
                    <div class="profile-field-text"><?= h($foster->email) ?></div>
                  </div>
                </div>
                <div class="profile-field-cont">
                  <div class="left-justify profile-field-cont">
                    <div class="profile-field-name">Address: </div>
                    <div class="profile-field-text"><?= h($foster->address) ?></div>
                  </div>
                </div>
              </div>
              <div class="profile-content-cont">
                <div class="profile-text-header">Additional Information</div>
                <div class="profile-field-cont">
                  <div class="profile-field-cont">
                    <div class="profile-field-name">Availability: </div>
                    <div class="block profile-field-text"><?= h($foster->avail) ?></div>
                  </div>
                </div>
                <div class="profile-field-cont">
                  <div class="profile-field-cont">
                    <div class="profile-field-name">Experience: </div>
                    <div class="block profile-field-text"><?= h($foster->exp) ?></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="w-tab-pane" data-w-tab="Tab 2">
				<div class="profile-content-cont">
					<?php if (!empty($foster->cats)): ?>
					<div class="profile-text-header">Fostered Cats</div>
						<?php foreach($foster->cats as $cat) : ?>
						<div class="card-cont card-wrapper w-dyn-item">
							<a class="card w-clearfix w-inline-block" ><img class="card-pic" src="<?= $this->Url->image('cat-01.png'); ?>">
								<div class="card-h1"><?= $cat->cat_name?></div>
								<div>
									<div class="card-h2"><?= ($cat->is_kitten) ? "Kitten" : "Cat" ?></div>
								</div>
								<div class="card-field-wrap">
									<div class="card-field-cont">
										<div class="card-field-cont">
											<div class="card-h3">DOB:</div>
											<div class="card-field-text cat-dob"><?= $cat->dob ?></div>
										</div>
										<div class="card-field-cont">
											<div class="card-h3">Age:</div>
											<div class="card-field-text cat-age"></div>
										</div>
									</div>
									<div class="card-field-cont">
										<div class="card-field-cont">
											<div class="card-h3">Breed:</div>
											<div class="card-field-text"><?= $cat->breed ?></div>
										</div>
									</div>
								</div>
								<div class="list-id-cont">
									<div class="id-text">#</div>
									<div class="id-text"><?= $cat->id ?></div>
								</div>
							</a>
							<?php if($cat->litter_id > 0): ?>
								<a class="dropdown-cont w-inline-block" data-ix="dropdown">
									<div class="dropdown-icon"></div>
								</a>
								<div class="dropdown-results-cont">
									<?php foreach($cat->litter->cats as $mate) : ?>
										<?php if($mate->id != $cat->id): ?>
											<a class="dropdown-cat-cont w-inline-block"><img class="dropdown-cat-pic" src="http://uploads.webflow.com/img/image-placeholder.svg">
												<div class="dropdown-cat-name"><?= $mate->cat_name ?></div>
											</a>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
							<?php else: ?>
								<div class="dropdown-cont dropdown-text">
									<?php if($cat->is_kitten): ?>Kitten has no siblings.
									<?php else: ?> Cat has no kittens.
									<?php endif; ?>
								</div>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				<?php else: ?>
					<a class="card w-clearfix w-inline-block">
							<div class="card-h1">This foster home is not fostering any cats at the moment. Please check the foster's availability.</div>
					</a>
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
      </div>
    </div>
  </div>
  <div class="floating-overlay"></div>
  <div class="button-cont">
    <a class="button-01 w-inline-block" href="#">
      <div class="button-icon-text">Edit</div><img data-ix="add-click" src="images/edit-01.png" width="55">
    </a>
    <div class="button-02">
      <div class="button-icon-text">Upload Attachments</div><img data-ix="add-click" src="images/upload-01.png" width="55">
    </div>
    <div class="button-03" data-ix="add-click">
      <div class="button-icon-text">Export</div><img data-ix="add-click" src="images/export-01.png" width="55">
    </div>
    <div class="button-04">
      <div class="button-icon-text">Delete</div><img data-ix="add-click" src="images/delete-01.png" width="55">
    </div>
  </div><img class="button-paw" data-ix="paw-click" src="images/add-paw.png" width="60">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>