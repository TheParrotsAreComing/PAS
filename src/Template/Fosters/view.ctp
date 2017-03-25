<?= $this->Html->script('cats.js'); ?>
<?= $this->Html->script('fosters.js'); ?>
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
            <div class="cat-profile-name"><?= h($foster->first_name)." ".h($foster->last_name) ?></div>
            <div>
              <div class="profile-header-text">Rating:</div>

              <div class="profile-header-text"><?= $this->Number->format($foster->rating) ?></div>
            </div>
          </div>
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
            <div class="profile-tab-wrap scroll1 w-tab-content">
                <div class="profile-tab-cont w--tab-active w-clearfix w-tab-pane" data-w-tab="Tab 1">
                    <div class="profile-notification-cont">
                    <?php foreach ($foster['tags'] as $tag): ?>                
                    <div class="tag-cont warning" style="background-color:#<?= $tag['color'] ?>">
                      <div class="tag-text"><?= $tag['label'] ?></div><a class="tag-remove" href="#"></a>
                    </div>
                  <?php endforeach; ?>
                      
                    </div>
                    <div class="example-tag-wrapper">
                      <a class="new-tag-btn w-button" data-ix="add-tag" href="#">Add Tag</a>
                    </div>
                  <div class="profile-content-cont">
                      <div class="profile-text-header">Personal Information</div>
                      <div class="profile-field-cont">
                        <div class="left-justify profile-field-cont">
                          <div class="profile-field-name">Phone: </div>
                          <div class="block profile-field-text"><?= h($foster->phone) ?></div>
                        </div>
                      </div>
                    <div class="profile-field-cont">
                      <div class="left-justify profile-field-cont">
                        <div class="profile-field-name">Email: </div>
                        <div class="block profile-field-text"><?= h($foster->email) ?></div>
                      </div>
                    </div>
                    <div class="profile-field-cont">
                      <div class="left-justify profile-field-cont">
                        <div class="profile-field-name">Address: </div>
                        <div class="block profile-field-text"><?= h($foster->address) ?></div>
                      </div>
                    </div>
                  </div>
                  <div class="profile-content-cont">
                    <div class="profile-text-header">Additional Information</div>
                    <div class="profile-field-cont">
                      <div class="left-justify profile-field-cont">
                        <div class="profile-field-name">Availability: </div>
                        <div class="block profile-field-text"><?= nl2br(h($foster->avail)) ?></div>
                      </div>
                    </div>
                    <div class="profile-field-cont">
                      <div class="left-justify profile-field-cont">
                        <div class="profile-field-name">Experience: </div>
                        <div class="block profile-field-text"><?= nl2br(h($foster->exp)) ?></div>
                      </div>
                    </div>
                    <div class="profile-field-cont">
                      <div class="left-justify profile-field-cont">
                        <div class="profile-field-name">Notes: </div>
                        <div class="block profile-field-text"><?= nl2br(h($foster->notes)) ?></div>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="w-tab-pane" data-w-tab="Tab 2">
                <div class="profile-content-cont">
                  <?php if (empty($foster['cat_histories'])): ?>
                    <a class="card w-clearfix w-inline-block">
                      <div class="card-h1">This foster home is not fostering any cats at the moment. Please check the foster's availability.</div>
                    </a>
                  <?php else: ?> 
                <div class="profile-text-header">Fostered Cats</div>
                    <?php foreach ($foster['cat_histories'] as $cat): ?>
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
          <a class="profile-action-button-cont w-inline-block" href="<?= $this->Url->build(['controller'=>'fosters', 'action'=>'edit
          ', $foster->id], ['escape'=>false]);?>">
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
          <a class="delete-button profile-action-button-cont w-inline-block" data-ix="delete-click-desktop" >
            <div class="basic profile-action-button"></div>
            <div>delete</div>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="notify-cont w-hidden-main">
    <div class="notify-overview">Fostered Cats</div>
    <div class="notify-foster">Foster Home</div>
    <div class="notify-attachments">Attachments</div>
    <div class="notify-more">More...</div>
  </div>
  <div class="floating-overlay">
    <div class="confirm-cont">
      <div class="confirm-text">Are you sure you want to delete this foster?</div>
      <div class="confirm-button-wrap w-form">
        <form class="confirm-button-cont" data-name="Email Form 2" id="email-form-2" name="email-form-2">
            <a class="cancel confirm-button w-button" data-ix="confirm-cancel" href="#">Cancel</a>
            <?= $this->Html->link('Delete', ['controller'=>'fosters', 'action'=>'delete', $foster->id], ['class'=>'confirm-button delete w-button']); ?>
        </form>
      </div>
    </div>
  </div> 
  <div class="button-cont w-hidden-main">
    <a class="button-01 w-inline-block" href="<?= $this->Url->build(['controller'=>'fosters', 'action'=>'edit', $foster->id], ['escape'=>false]);?>">
        <div class="button-icon-text">Edit</div><img src="<?= $this->Url->image('edit-01.png');?>" width="55">
    </a>
    <div class="button-02">
        <div class="button-icon-text">Upload Attachments</div><img data-ix="add-click" src="<?= $this->Url->image('upload-01.png');?>" width="55">
    </div>
    <div class="button-03" data-ix="add-click">
        <div class="button-icon-text">Export</div><img data-ix="add-click" src="<?= $this->Url->image('export-01.png');?>" width="55">
    </div>
    <div class="button-04" data-ix="delete-click">
        <div class="delete-button button-icon-text">Delete</div><img src="<?= $this->Url->image('delete-01.png');?>" width="55">
    </div>
  </div><img class="button-paw" data-ix="paw-click" src="<?= $this->Url->image('add-paw.png');?>" width="60">

  <div class="add-adopter-floating-overlay add-tag">
    <div class="confirm-cont add-tag-inner">
      <h4>Select a tag to add</h4>
      <form class="confirm-button-cont" data-name="Email Form 2" id="email-form-2" name="email-form-2">
        <?= $this->Form->input('tag',['class'=>'add-input w-input','options'=>$foster_tags]) ?>
      </form>
      <br/>
      <div class="confirm-button-wrap w-form">
        <a class="cancel confirm-button w-button" data-ix="confirm-cancel" href="#">Cancel</a>
        <a class="delete add-tag-btn confirm-button w-button" href="#">Add Tag</a>
      </div>
    </div>
  </div> 

<script>
  calculateAndPopulateAgeFields();
	var foster = new Foster();
	$(function(){
		$('.delete-button').click(function(e){
			e.preventDefault();
			$.when(foster.deleteCheck(<?= $foster->id ?>)).done(function(){
				if(foster.empty == '1'){
					var confirm_text = $('<div class="confirm-text"/>');
					confirm_text.text('This foster currently has a cat/kitten.');
					$('.confirm-text').after(confirm_text);

					var confirm_text_2 = $('<div class="confirm-text"/>');
					confirm_text_2.text('Deleting this foster will also mark the cat/kitten as unfostered.');
					confirm_text.after(confirm_text_2);
				}
			});
		});

    $('.add-tag-btn').click(function(e) {
      e.stopPropagation();
      e.preventDefault();
      $.ajax({
        url : "<?= $this->Url->build(['controller'=>'fosters','action'=>'attachTag']); ?>",
        type : 'POST',
        data : {
          tag_id : $('#tag').val(),
          foster_id : '<?= $foster->id ?>'
        }
      }).done(function(result) {
        result = JSON.parse(result);
        $('.add-tag').css('display','none');
        $('.add-tag-inner').css('display','none');
        $('.add-tag-inner').css('opacity','0');

        var tag_cont = $('<div/>');
        tag_cont.addClass('tag-cont');
        tag_cont.addClass('warning');
        tag_cont.css('background-color',result['color']);

        var tag_text = $('<div/>');
        tag_text.addClass('tag-text');
        tag_text.text(result['label']);

        tag_cont.append(tag_text);
        tag_cont.append('<a class="tag-remove" href="#"></a>');

        $('.profile-notification-cont').prepend(tag_cont);
      });
    });
	});

</script>
