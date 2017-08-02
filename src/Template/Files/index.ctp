
<style>
</style>
<div class="body">
  <div class="add-view column">
    <div class="button-add-signal" data-ix="add-mobile-showhide-2"></div>
    <div class="add-cont scroll1" data-ix="page-load-fade-in">
      <div class="add-header">
        <div class="add-field-h1">Files</div>
		<a class="profile-add-cont" href="<?= $this->Url->build(['action'=>'add']);?>">+ Add File</a>
      </div>
	  <?php foreach($files as $file): ?>
		<div class="files-data-wrap no-horizontal-scroll" data-file-id="<?= h($file->id) ?>">
		  <div class="files-data-cont" data-ix="medical-data-click">
		  <div class="files-date-cont">
			<div class="medical-data-type"><?= h($file->created) ?></div>
		  </div>
		  <div class="files-name-cont">
			<div class="files-name"><?= h($file->original_filename) ?></div>
			<div class="files-data"><?= h($file->note) ?></div>
		  </div>
		  <div class="medical-data-action-cont">
			<?= $this->Form->postLink('<div class="basic profile-action-button"></div><div>delete</div>', // first
				['action' => 'delete', $file->id],  // second
				['escape' => false,'class'=>'left medical-data-action w-inline-block delete-file-btn','confirm'=>'Are you sure you want to delete this file?'] // third
			); ?>
			<a class="right medical-data-action w-inline-block" href="<?= $this->Url->build(['controller'=>'Files', 'action'=>'downloadfilebyid', $file->id]) ?>">
			<div class="profile-action-button sofware">p</div>
			<div>download</div>
			</a>
		  </div>
		  </div>
		</div>
	  <?php endforeach; ?>
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
