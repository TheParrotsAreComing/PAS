<style>
    select option:first-child {
        color: #99a5c2;
    }

    .scroll {
      width: 20px;
      height: 200px;
      overflow: auto;
      float: left;
      margin: 0 10px;
    }
    .scroll1::-webkit-scrollbar {
      width: 5px;
    }
    .scroll1::-webkit-scrollbar-track {
      background: #fff;
    }
    .scroll1::-webkit-scrollbar-thumb {
      background: #5d5d5d
    }
    .star-rating {
      font-family: 'FontAwesome';
    }
    .star-rating > fieldset {
      border: none;
    }
    .star-rating > fieldset:not(:checked) > input {
      position: absolute;
      clip: rect(0, 0, 0, 0);
    }
    .star-rating > fieldset:not(:checked) > label {
      float: right;
      overflow: hidden;
      white-space: nowrap;
      cursor: pointer;
      color: #0172FF;
      font-weight: 100;
    }
    .star-rating > fieldset:not(:checked) > label:before {
      content: '\f006  ';
    }
    .star-rating > fieldset:not(:checked) > label:hover,
    .star-rating > fieldset:not(:checked) > label:hover ~ label {
      color: #0172FF;
      text-shadow: 0 0 3px #0172FF;
    }
    .star-rating > fieldset:not(:checked) > label:hover:before,
    .star-rating > fieldset:not(:checked) > label:hover ~ label:before {
      content: '\f005  ';
    }
    .star-rating > fieldset > input:checked ~ label:before {
      content: '\f005  ';
    }
    .star-rating > fieldset > label:active {
      position: relative;
      }
    label {
      padding-top: 5px;
      padding-bottom: 5px;
      margin-bottom: 0;
      -webkit-tap-highlight-color: rgba(0,0,0,0);
    }
      a {
      -webkit-tap-highlight-color: rgba(0,0,0,0);
      }
</style>


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
            <div class="index-tag-cont tag-div-scroll scroll1">

              <?php foreach ($tags as $tag): ?>
                <div class="index-tag" data-ix="medical-data-click" data-id="<?= $tag->id ?>">
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
          <form class="add-tag-input-cont" data-name="Email Form 5" id="email-form-5" name="email-form-5">
            <div class="add-field-h2">create/edit tag:</div>
            <input class="add-tag-input w-input" data-name="tag" id="tag" maxlength="256" name="tag" placeholder="Enter a tag..." type="text">
            <div class="add-tag-checkbox-wrap">
              <div class="add-tag-checkbox-cont w-checkbox">
                <div class="checkbox-label-symbol">E</div>
                <input class="checkbox-webflow w-checkbox-input" data-name="Checkbox" id="checkbox" name="checkbox" type="checkbox">
                <label class="checkbox-label w-form-label" for="checkbox">cat</label>
              </div>
              <div class="add-tag-checkbox-cont w-checkbox">
                <div class="checkbox-label-symbol">F</div>
                <input class="checkbox-webflow w-checkbox-input" data-name="Checkbox 3" id="checkbox-3" name="checkbox-3" type="checkbox">
                <label class="checkbox-label w-form-label" for="checkbox-3">adopter</label>
              </div>
              <div class="add-tag-checkbox-cont checked w-checkbox">
                <div class="checkbox-label-symbol">G</div>
                <input checked="checked" class="checkbox-webflow w-checkbox-input" data-name="Checkbox 4" id="checkbox-4" name="checkbox-4" type="checkbox">
                <label class="checkbox-label w-form-label" for="checkbox-4">foster</label>
              </div>
            </div>
            <div class="add-tag-color-wrap">
              <ul class="add-tag-color-cont w-list-unstyled">
                <li class="add-tag-color"></li>
                <li class="add-tag-color green"></li>
                <li class="add-tag-color orange"></li>
                <li class="add-tag-color red"></li>
              </ul>
              <div class="custom-color-wrap">
                <div>Custom Color:</div>
                <input class="add-tag-color-input w-input" data-name="Field" id="Field-2" maxlength="256" name="Field" placeholder="#123abc" required="required" type="text">
              </div>
            </div>
          </form>
          <div class="add-button-cont"><a class="add-cancel" href="cat-list.html">Cancel</a>
            <input class="add-submit w-button" data-wait="Please wait..." type="submit" value="Save">
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
      <div class="tag-cont warning" data-ix="tag-action-show-hide">
        <div class="tag-text">due for immunization sdasd a dsad asd sda</div>
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
  var tags = JSON.parse('<?= json_encode($tags) ?>');
  console.log(tags);
  
  $('.index-tag-cont').on('click', '.edit-tag', function() {
    var tag_div = $(this).closest('.index-tag');
    var tag_id = tag_div.attr('data-id');

    //var tag = $.grep(tags, function(e){ return e.id == tag_id; })[0];
    //console.log(tag['label']);

    //$('#tag').val(tag['label']);
  });

});

</script>
