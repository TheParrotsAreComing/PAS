<div class="body">
  <div class="add-view column">
    <div class="button-add-signal" data-ix="add-mobile-showhide-2"></div>
    <div class="add-cont scroll1" data-ix="page-load-fade-in">
      <div class="add-header">
        <div class="add-field-h1">Create a Tag</div>
      </div>
      <?= $this->Form->create($tag);?>
      
      <div class="add-input-form-wrap w-form">

          <div class="example-tag-wrapper">
            <div class="example-tag-div">
              <div class="example-tag tag-cont info">
                <div class="tag-text">enter your tag label below...</div><a class="tag-remove" href="#"></a>
              </div>
            </div>
          </div>

          <div class="clearfix">
          <label class="add-field-h3" for="Label">Label <span class="required-field-indicator"><span class="pre"></span></span>:</label>
          <?= $this->Form->input('label', ['class'=>'add-input w-input', 'data-name'=>'Label', 'label'=>false]);?>

          <label class="add-field-h3" for="Color">Color <span class="required-field-indicator"><span class="pre"></span></span>:</label>
          <?= $this->Form->input('color', ['class'=>'add-input w-input', 'data-name'=>'Color', 'label'=>false]);?>

          <label class="add-field-h3" for="Type">What is this tag for? <span class="required-field-indicator"><span class="pre"></span></span></label>
          <?= $this->Form->input('  Cats', ['type'=>'checkbox', 'checked'=>true, 'name'=>'for_cats']);?>
          <?= $this->Form->input('  Adopters', ['type'=>'checkbox', 'name'=>'for_adopters']);?>
          <?= $this->Form->input('  Fosters', ['type'=>'checkbox', 'name'=>'for_fosters']);?>

          <div class="add-button-cont">
            <?= $this->Html->link('Cancel', ['controller'=>'fosters','action'=>'index'],['class'=>'add-cancel w-button', 'id'=>'FosterCancel']); ?>
            <?= $this->Form->submit("Submit", ['class'=>'add-submit w-button','id'=>'FosterAdd'])?>
          </div>
      </div>
      <?= $this->Form->end();?>
    </div>
  </div>
</div>

<script>

$(document).ready(function() {
    
  $('#color').on('change', function() {
    $('.example-tag').removeClass('info');
    $('.example-tag').css('background-color', '#'+$(this).val());
  });

  $('#label').on('keyup', function() {
    if ($(this).val() == "") {
      $('.tag-text').text('Enter your tag label below...');
    } else {
      $('.tag-text').text($(this).val());
    }
  });

});

</script>
