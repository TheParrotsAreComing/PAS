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
		  <div class="filter-criteria">Name:</div>
		  <?= $this->Form->input('cat_name',['class'=>'filter-criteria-select w-input','label'=>false,'id'=>'catNameFilter','placeholder'=>'Enter a name']) ?>
	    </div>
	    <div class="filter">
		  <div class="filter-criteria">Female/Male:</div>
			<?= $this->Form->input('is_female',['class'=>'filter-criteria-select w-select','label'=>false,'empty'=>'Both','options'=>['Male','Female']])?>
	    </div>
	    <div class="filter">
		  <div class="filter-criteria">Adult/Kitten:</div>
			<?= $this->Form->input('is_kitten',['class'=>'filter-criteria-select w-select','label'=>false,'empty'=>'Both','options'=>['Adult','Kitten']])?>
	    </div>
	    <div class="filter">
		  <div class="filter-criteria">Breed:</div>
      <?= $this->Form->input('breed_id', ['label' => false, 'class' => 'filter-criteria-select w-input', 'id' => 'breedFilter', 'options' => $breeds, 'empty' => 'Select a breed...']) ?>
	    </div>
	    <div class="filter">
		  <div class="filter-criteria">Color:</div>
		  <?= $this->Form->input('color',['class'=>'filter-criteria-select w-input','label'=>false,'id'=>'breedFilter','placeholder'=>'Enter a color']) ?>
	    </div>
	    <div class="filter">
		  <div class="filter-criteria">Coat:</div>
		  <?= $this->Form->input('coat',['class'=>'filter-criteria-select w-input','label'=>false,'id'=>'breedFilter','placeholder'=>'Enter a coat']) ?>
	    </div>
	    <div class="filter">
		  <div class="filter-criteria">Date of Birth:</div>
		  <?= $this->Form->input('dob',['class'=>'filter-criteria-select w-input','label'=>false,'id'=>'dobFilter','placeholder'=>'Enter a DOB']) ?>
	    </div>

	      <div class="filter-apply-cont">
			<a class="cancel filter-button w-button" href="<?= $this->Url->build(["action"=>"index"])?>">Cancel</a>
	        <button id="searchCatFilter" type="submit" class="apply filter-button w-button" data-ix="button-click" href="#">Apply Filter</button>
	      </div>
	  <?= $this->Form->end() ?>
    </div>

    <div class="column">
      <div class="button-add-signal" data-ix="add-mobile-showhide-2"></div>
      <div class="list-wrapper scroll1 w-dyn-list" data-ix="page-load-fade-in">
        <div class="list w-dyn-items">
<!-- -->
        <?php foreach($cats as $cat) : ?>
          <div class="card-cont card-wrapper w-dyn-item">
            <a href = "<?= $this->Url->build(['controller' => 'cats', 'action' => 'view', $cat->id]) ?>" class="card w-clearfix w-inline-block">

              <?php 
            if(!empty($cat->profile_pic)){
              echo $this->Html->image('../'.$cat->profile_pic->file_path.'_tn.'.$cat->profile_pic->file_ext, ['class'=>'card-pic']);
            } else {
              echo $this->Html->image('cat-menu.png', ['class'=>'card-pic']);
            }
          ?>

              <div class="card-h1"><?= $cat->cat_name?></div>
              <div class="card-h2-cont">
                <div class="card-h2-symbol <?= ($cat->is_female) ? "female" : "male" ?>"><?= ($cat->is_female) ? "C" : "D" ?></div>
                <div class="card-h2 <?= ($cat->is_female) ? "female" : "male" ?>"><?= ($cat->is_kitten) ? "Kitten" : "Cat" ?></div>
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
                    <div class="card-field-text"><?= h($cat->breed->breed) ?></div>
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
						<a class="dropdown-cat-cont w-inline-block"><img class="dropdown-cat-pic" src="<?= $this->Url->image('cat-menu.png'); ?>">
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

      <div class="pagination-wrap">
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
      <div class="cat-header" data-ix="page-load-slide-down">
        <div class="cat-sort w-clearfix w-dropdown" data-delay="0">
          <div class="cat-sort-cont w-clearfix w-dropdown-toggle"><img sizes="(max-width: 479px) 100vw, (max-width: 991px) 12px, 1vw" src="img/up-arrow.png" srcset="img/up-arrow-p-500x500.png 500w, img/up-arrow.png 512w" width="12">
            <div class="cat-sort-text">Sort</div>
          </div>
          <nav class="w-dropdown-list"><a class="cat-sort-dropdown w-dropdown-link">Name Descending</a><a class="cat-sort-dropdown w-dropdown-link" href="#">Age</a><a class="cat-sort-dropdown w-dropdown-link" href="#">Cat ID</a>
          </nav>
        </div>
        <div class="cat-filter cat-sort w-dropdown" data-delay="0">
          <div class="cat-sort-cont w-clearfix w-dropdown-toggle" data-ix="filter-hideshow"><img sizes="(max-width: 479px) 100vw, (max-width: 991px) 12px, 1vw" src="img/filter-filled-tool-symbol.png" srcset="img/filter-filled-tool-symbol-p-500x500.png 500w, img/filter-filled-tool-symbol.png 512w" width="12">
            <div class="cat-sort-text">Filter</div>
          </div>
          <nav class="w-dropdown-list"></nav>
        </div><a class="cat-add w-button" href=<?= $this->Url->build(['controller'=>'cats','action'=>'add']); ?>>+ New Cat</a>
      </div>
    </div>
  </div>
  <div class="floating-overlay"></div>
  <img class="button-paw" data-ix="paw-click" src="img/add-paw.png" width="60">
  <div class="button-cont">
    <a class="button-01 w-inline-block" href="<?= $this->Url->build(['controller'=>'cats','action'=>'add']); ?>">
      <div class="button-icon-text">Add Cat</div><img data-ix="add-click" src="img/add-01.png" width="55">
    </a>
    <a class="button-02 w-inline-block" href="#">
      <div class="button-icon-text">Sort/Filter</div><img data-ix="filter-click" src="img/filter-01.png" width="55">
    </a>
    <a class="button-03 w-inline-block" href="#">
      <div class="button-icon-text">Export</div><img data-ix="add-click" src="img/export-01.png" width="55">
    </a>
    <a class="button-04 w-inline-block" href="#">
      <div class="button-icon-text">Delete</div><img data-ix="add-click" src="img/delete-01.png" width="55">
    </a>
  </div>
  
<script>
  calculateAndPopulateAgeFields();
</script>
<script>
$(function(){
	$('#dobFilter').datepicker({
		  changeMonth: true,
		  changeYear: true
	});
});
</script>
