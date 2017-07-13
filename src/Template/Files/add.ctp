<style>
	#FileForm{
		margin:1em;
	}
</style>
<div class="body">
  <div class="add-view column">
    <div class="button-add-signal" data-ix="add-mobile-showhide-2"></div>
    <div class="add-cont scroll1" data-ix="page-load-fade-in">
      <div class="add-header">
        <div class="add-field-h1">Upload File</div>
      </div>
      <?= $this->Form->create('SystemFiles',['type'=>'file','id'=>'FileForm']);?>
	  <div class="search-field">
		  <?= $this->Form->input('add_file',['class'=>'w-input','type'=>'file']); ?>
		  <label> Description </label>
		  <?= $this->Form->textarea('description',['class'=>'w-input']); ?>
      </div>
	  <div class="btn-search">
		  <button class="w-button" type="submit" id="SearchBtn"> Add File </button>
      </div>
	  <div id="Results" class=""></div>
      <?= $this->Form->end();?>
    </div>
  </div>
</div>

<div id="dialog-confirm-add-existing" title="Add this cat?" style="display:none;">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Are you sure you want to add this cat to this litter?</p>
</div>

<script>

$(function() {

});

</script>
