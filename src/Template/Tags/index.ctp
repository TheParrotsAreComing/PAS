  <div class="body">
    <div class="add-view column">
      <div class="add-cont scroll1" data-ix="page-load-fade-in">
        <div class="add-header">
          <div class="add-field-h1">tag editor</div>
        </div>
        <div class="form-tag-wrap w-form">
          <div class="index-tag-wrap">
            <div class="index-tag-header-cont">
              <div class="index-tag-header">all tags:</div>
              <div class="text-accent">click on an existing tag to edit!</div>
            </div>
            <div class="index-tag-cont no-horizontal-scroll scroll1">

              <?php foreach ($tags as $tag): ?>
                <div class="index-tag cursor-point" data-ix="medical-data-click" data-id="<?= $tag->id ?>">
                  <div class="tag-cont" data-ix="medical-data-click" style="color:#<?= $tag->color ?>; border-color:#<?= $tag->color ?>;">
                    <div class="tag-text"><?= $tag->label ?></div>
                  </div>
                  <div class="medical-data-action-cont">
                    <a class="left medical-data-action w-inline-block edit-tag" href="#">
                      <div class="profile-action-button sofware">-</div>
                      <div>edit</div>
                    </a>
                    <a class="medical-data-action w-inline-block delete-tag" data-ix="delete-click-desktop" href="#">
                      <div class="basic profile-action-button"></div>
                      <div>delete</div>
                    </a>
                  </div>
                </div>
              <?php endforeach; ?>
            
            </div>
          </div>

          <?= $this->Form->create('Tags'); ?>
          <div class="add-tag-input-cont" data-name="Email Form 5" name="email-form-5" id="email-form-5">
            <div class="add-field-h2"><span class="create-label">create</span><span class="edit-label display-none">edit "<span class="edit-label-original"></span>"</span> tag:</div>
            <?= $this->Form->input('tag-id', ['type'=>'hidden', 'id'=>'tag-id']); ?>
            <?= $this->Form->input('tag', ['class'=>'add-tag-input w-input', 'templates'=>['inputContainer'=>'{{content}}'], 'data-name'=>'tag', 'maxlength'=>256, 'name'=>'tag', 'placeholder'=>'Enter a tag...', 'type'=>'text', 'label'=>false]); ?>
            <div class="add-tag-checkbox-wrap">
              <div class="cat-checkbox-div add-tag-checkbox-cont w-checkbox checked">
                <div class="checkbox-label-symbol">E</div>
                <?= $this->Form->checkbox('cat', ['checked'=>true, 'class'=>'checkbox-webflow w-checkbox-input cat-checkbox', 'data-name'=>'cat-checkbox', 'id'=>'cat-checkbox', 'name'=>'cat-checkbox', 'label'=>false]); ?>
                <label class="checkbox-label w-form-label" for="checkbox">cat</label>
              </div>
              <div class="adopter-checkbox-div add-tag-checkbox-cont w-checkbox">
                <div class="checkbox-label-symbol">F</div>
                <?= $this->Form->checkbox('adopter', ['class'=>'checkbox-webflow w-checkbox-input adopter-checkbox', 'data-name'=>'adopter-checkbox', 'id'=>'adopter-checkbox', 'name'=>'adopter-checkbox', 'label'=>false]); ?>
                <label class="checkbox-label w-form-label" for="checkbox-3">adopter</label>
              </div>
              <div class="foster-checkbox-div add-tag-checkbox-cont w-checkbox">
                <div class="checkbox-label-symbol">G</div>
                <?= $this->Form->checkbox('foster', ['class'=>'checkbox-webflow w-checkbox-input foster-checkbox', 'data-name'=>'foster-checkbox', 'id'=>'foster-checkbox', 'name'=>'foster-checkbox', 'label'=>false]); ?>
                <label class="checkbox-label w-form-label" for="checkbox-4">foster</label>
              </div>
            </div>
            <div class="add-tag-color-wrap">
              <ul class="add-tag-color-cont w-list-unstyled">
                <li class="add-tag-color cursor-point blue" data-color="2485ff"></li>
                <li class="add-tag-color cursor-point green" data-color="3ed84a"></li>
                <li class="add-tag-color cursor-point orange" data-color="ffa722"></li>
                <li class="add-tag-color cursor-point red" data-color="ec4141"></li>
              </ul>
              <div class="custom-color-wrap">
                <div>Custom Color: #</div>
                <?= $this->Form->input('Custom Color', ['label'=>false, 'class'=>'add-tag-color-input w-input', 'data-name'=>'Custom Color', 'id'=>'custom-color', 'maxlength'=>'6', 'name'=>'custom-color', 'placeholder'=>'123abc', 'required'=>true, 'type'=>'text']); ?>
              </div>
            </div>
          </div>
          <div class="cancel-edit-div display-none example-tag-wrapper">
            <?= $this->Form->button('Cancel Edit', ['class'=>'add-cancel', 'type'=>'button', 'id'=>'cancel-edit']); ?>
          </div>
          <div class="add-button-cont"><a class="add-cancel" href="<?= $this->Url->build(['controller'=>'pages', 'action'=>'display','home'])?>">Cancel</a>
            <?= $this->Form->submit('Submit', ['class'=>'add-submit w-button', 'data-wait'=>'Please wait...']); ?>
          </div>
          <div class="w-form-done">
            <div>Thank you! Your submission has been received!</div>
          </div>
          <div class="w-form-fail">
            <div>Oops! Something went wrong while submitting the form</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="floating-overlay">
    <div class="confirm-cont">
      <div class="confirm-text">Are you sure you want to delete this tag?</div>
      <div class="tag-to-delete-div">
      </div>
      <div class="confirm-button-cont">
        <form class="confirm-button-cont" data-name="Email Form 2" id="email-form-2" name="email-form-2">
          <?= $this->Form->button('Cancel', ['class'=>'cancel confirm-button w-button', 'data-ix'=>'confirm-cancel', 'data-id'=>'confirm-cancel', 'type'=>'button']); ?>
          <!--<a class="cancel confirm-button w-button" data-ix="confirm-cancel" href="#">Cancel</a>-->
          <?= $this->Form->button('Delete', ['class'=>'confirm-button delete w-button', 'data-wait'=>'Please wait...', 'type'=>'button']); ?>
          <!--<input class="confirm-button delete w-button" data-wait="Please wait..." type="submit" value="Delete">-->
        </form>
      </div>
    </div>
  </div>
  <?= $this->Form->end(); ?>

<script>

(function() {
  var tick_filter_tag;
  tick_filter_tag = function(label) {
    if ($('#checkbox-' + label).attr('checked')) {
      $('#checkbox-' + label).removeAttr('checked');
      return $('.button-' + label).removeClass('button-active');
    } else {
      $('#checkbox-' + label).attr('checked', true);
      return $('.button-' + label).addClass('button-active');
    }
  };
  $(document).ready(function() {
    tick_filter_tag('hard');
    return $('.filter-tag').click(function() {
      var tag_value;
      tag_value = $(this).attr('value');
      return tick_filter_tag(tag_value);
    });
  });
}).call(this);

$(document).ready(function() {
  var tags = JSON.parse("<?= addslashes(json_encode($tags)) ?>");

  $('#cancel-edit').on('click', function() {
    $('.cancel-edit-div').slideUp();
    $('#tag-id').val('');
    $('.create-label').css('display', 'inline');
    $('.edit-label').hide();
    $('#tag').val('');
  });
  
  $('.index-tag-cont').on('click', '.edit-tag', function() {

    var tag_div = $(this).closest('.index-tag');
    var tag_id = tag_div.attr('data-id');

    var tag = $.grep(tags, function(e){ return e.id == tag_id; })[0];

    $('.cancel-edit-div').slideDown();
    $('#tag-id').val(tag_id);
    $('.create-label').hide();
    $('.edit-label-original').text(tag['label']);
    $('.edit-label').css('display', 'inline');

    $('#tag').val(tag['label']);
    $('.w-checkbox').removeClass('checked');
    if (tag['type_bit'] & 100) {
      $('.cat-checkbox-div').addClass('checked');
      $('.cat-checkbox').prop('checked',true);
    } else {
      $('.cat-checkbox').prop('checked',false);
    }
    if (tag['type_bit'] & 10) {
      $('.adopter-checkbox-div').addClass('checked');
      $('.adopter-checkbox').prop('checked',true);
    } else {
      $('.adopter-checkbox').prop('checked',false);
    }
    if (tag['type_bit'] & 1) {
      $('.foster-checkbox-div').addClass('checked');
      $('.foster-checkbox').prop('checked',true);
    } else {
      $('.foster-checkbox').prop('checked',false);
    }
    $('.add-tag-color').css('box-shadow','');
    $('.add-tag-color[data-color="'+tag['color']+'"]').css('box-shadow','0 0 12px 0 #303030');
    $('#custom-color').val(tag['color']);
  });

  $('.w-checkbox-input').on('click', function() {
    if ($(this).is(':checked')) {
      $(this).closest('.w-checkbox').addClass('checked');
    } else {
      $(this).closest('.w-checkbox').removeClass('checked');
    }
  });

  $('.add-tag-color').on('click', function() {
    $('.add-tag-color').css('box-shadow','');
    $(this).css('box-shadow','0 0 12px 0 #303030');
    $('#custom-color').val($(this).data('color'));
  });

  $('.delete-tag').on('click', function() {
    $('.tag-to-delete-div').empty();
    $('#tag-id').val($(this).closest('.index-tag').attr('data-id'));
    var tag_id = $('#tag-id').val();

    var tag = $.grep(tags, function(e){ return e.id == tag_id; })[0];
    var tag_to_delete = $('<div/>');
    tag_to_delete.addClass('tag-cont');
    tag_to_delete.css('color', '#'+tag['color']);
    tag_to_delete.css('border-color', '#'+tag['color']);

    var tag_text = $('<div/>');
    tag_text.addClass('tag-text');
    tag_text.text(tag['label']);

    tag_to_delete.append(tag_text);
    $('.tag-to-delete-div').append(tag_to_delete);
  });

  $('.delete').on('click', function() {
    var tag_id = $('#tag-id').val();
    $.ajax({
      'url' : '<?= $this->Url->build(['controller'=>'tags','action'=>'ajaxDelete']); ?>',
      'type' : 'POST',
      'data' : { 'tag_id' : tag_id }
    }).done(function() {
      location.reload();
    });
  });

});

</script>
