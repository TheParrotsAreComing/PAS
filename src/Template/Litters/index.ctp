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
			  <?= $this->Form->input('litter_name',['class'=>'filter-criteria-select w-input','label'=>false,'id'=>'litterNameFilter','placeholder'=>'Enter a name']) ?>
		  </div>
		  <div class="filter">
			  <div class="filter-criteria">Breed:</div>
			  <?= $this->Form->input('breed',['class'=>'filter-criteria-select w-input','label'=>false,'id'=>'breedFilter','placeholder'=>'Enter a breed']) ?>
		  </div>
		  <div class="filter">
			  <div class="filter-criteria">Date of Birth:</div>
			  <?= $this->Form->input('dob',['class'=>'filter-criteria-select w-input','label'=>false,'id'=>'litterDob','placeholder'=>'Enter a Date']) ?>
		  </div>
		  <div class="filter">
			  <div class="filter-criteria"># of Kittens:</div>
		      <?= $this->Form->input('kitten_count',['empty' => 'Select Count', 'label'=>false,'class'=>'filter-criteria-select w-input','data-name'=>'kitten count','placeholder'=>'Enter a name','type'=>'select','options'=>$count]) ?>
		  </div>
		  <div class="filter">
			  <div class="filter-criteria"># Of Cats:</div>
		      <?= $this->Form->input('the_cat_count',['empty' => 'Select Count', 'label'=>false,'class'=>'filter-criteria-select w-input','data-name'=>'kitten count','placeholder'=>'Enter a name','type'=>'select','options'=>$count]) ?>
		  </div>
		  <div class="filter-apply-cont">
				<a class="cancel filter-button w-button" href="<?= $this->Url->build(["action"=>"index"])?>">Cancel</a>
				<button id="litterFilter" type="submit" class="apply filter-button w-button" data-ix="button-click" href="#">Apply Filter</button>
		  </div>
	    <?= $this->Form->end() ?>
    </div>

    <div class="column">
      <div class="button-add-signal" data-ix="add-mobile-showhide-2"></div>
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
            <div class="cat-sort-text litter-filter">Filter</div>
          </div>
          <nav class="w-dropdown-list"></nav>
        </div>
        <?php if ($can_add): ?>
          <a class="cat-add w-button" href=<?= $this->Url->build(['controller'=>'litters','action'=>'add']); ?>>+ New Litter</a>
        <?php endif; ?>
      </div>

      <div class="list-wrapper scroll1 w-dyn-list" data-ix="page-load-fade-in">
        <div class="list scroll1 w-dyn-items">
		<?php if(!empty($litters)): ?>
			<?php foreach($litters as $litter) : ?>
				  <div class="card-cont card-wrapper w-dyn-item">
					  <a href = "<?= $this->Url->build(['controller' => 'litters', 'action' => 'view', $litter->id]) ?>" class="card no-picture w-clearfix w-inline-block">
						<div class="card-h1">ETA:</div>
						<div class="card-h1"><?= $litter->est_arrival ?></div>
						<div>
						  <div class="card-h2"><?= $litter->litter_name ?></div>
						</div>
						<div class="card-field-wrap">
						  <div class="card-field-cont">
							<div class="card-field-cont">
							  <div class="card-h3">Quantity:</div>
							  <div class="card-field-text"><?= $litter->the_cat_count ?> cat(s), <?= $litter->kitten_count ?> kitten(s)</div>
							</div>
							<div class="card-field-cont">
							  <div class="card-h3">DOB:</div>
							  <div class="card-field-text"><?php $now = $litter->dob; echo $now->format('F jS, Y'); ?></div>
							</div>
						  </div>
						  <div class="card-field-cont">
							<div class="card-field-cont">
							  <div class="card-h3">Breed:</div>
							  <div class="card-field-text"><?= $litter->breed ?></div>
							</div>
						  </div>
						  <div class="card-field-cont">
							<div class="card-field-cont">
							  <div class="card-h3">Notes:</div>
							  <div class="card-field-text"><?= $litter->notes ?></div>
							</div>
						  </div>
						</div>
						<div class="list-id-cont litter">
						  <div class="id-text">#KC-</div>
						  <div class="id-text"><?= $litter->kc_ref_id ?></div>
						</div>
					  </a>
					  
					  <?php if(!empty($litter->cats)): ?>
						<a class="dropdown-cont w-inline-block" data-ix="dropdown">
						  <div class="dropdown-icon"></div>
						</a>
						<div class="dropdown-results-cont">
						<?php foreach($litter->cats as $cat) : ?>
							<a href = "<?= $this->Url->build(['controller' => 'cats', 'action' => 'view', $cat->id]) ?>" class="dropdown-cat-cont mini w-inline-block" ><img class="dropdown-cat-pic" src="<?= $this->Url->image('cat-menu.png');?>">
                        <div class="dropdown-cat-name mini"><?= h($cat->cat_name) ?></div>
                        <div class="card-h2-symbol <?= ($cat->is_female) ? "female" : "male" ?> mini"><?= ($cat->is_female) ? "D" : "C" ?></div>
                        <div class="list-id-cont mini">
                          <div class="id-text">#</div>
                          <div class="id-text"><?= $cat->id ?></div>
                        </div>
                        <div class="card-field-text mini"><?= $cat->breed->breed ?></div>
                    </a>
						<?php endforeach; ?>
						</div>
					  <?php else: ?> 
						<div class="dropdown-cont dropdown-text">Litter has no cats...</div>
					  <?php endif; ?>
				  </div>
			  <?php endforeach; ?>
		  <?php else: ?> 
			  <div class="card-wrapper w-dyn-item">
				<div class="card-cont">
				  <a  style="text-align:center;" href="#" class="card w-clearfix w-inline-block">
					<div class="card-h1">No Litters to Show</div>
				  </a>
				</div>
			</div>
		  <?php endif; ?>
        </div>
      </div>

      <div class="pagination-w">
        <div class="pagination-wrap">
          <div class="pagination-cont">
            <div class="pagination"><?= $this->Paginator->prev('') ?></div>
          </div>
          <div class="pagination-cont">
            <div class="pagination-index"><?= $this->Paginator->numbers() ?></div>
          </div>
          <div class="pagination-cont">
            <div class="pagination"><?= $this->Paginator->next('') ?></div>
          </div>
        </div>
      </div>

    </div>
</div>

  <div class="floating-overlay"></div>
  <div class="button-paw" data-ix="paw-click">
      <div>O</div>
  </div>
  <div class="button-cont">
    <a class="button-01 w-inline-block" href="<?= $this->Url->build(['controller'=>'litters','action'=>'add']); ?>">
        <div class="button-icon-text">Add Litter</div>
        <div class="floating-button">
          <div>P</div>
        </div>
    </a>
    <a class="button-02 w-inline-block" data-ix="filter-click" href="#">
      <div class="button-icon-text">Sort/Filter</div>
      <div class="floating-button">
        <div>K</div>
      </div>
    </a>
    <!-- <a class="button-03 w-inline-block" href="#">
      <div class="button-icon-text">Export</div>
      <div class="floating-button">
        <div>N</div>
      </div>
    </a>
    <a class="button-04 w-inline-block" href="#">
      <div class="button-icon-text">Delete</div>
      <div class="floating-button">
        <div>M</div>
      </div>
    </a>
    -->

<script>
$(function(){
	$('#litterDob').datepicker({
		  changeMonth: true,
		  changeYear: true
	});
});
</script>
