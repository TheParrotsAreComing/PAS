<div class="body w-clearfix">

    <div class="filter-bar" data-ix="page-load-slide-right">
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
	  <br/>
      <div class="list-wrapper scroll1 w-dyn-list" data-ix="page-load-fade-in">
		  <div class="card-cont card-wrapper w-dyn-item">
			<a href = "<?= $this->Url->build(['controller' => 'cats', 'action' => 'view', $cat->id]) ?>" class="card w-clearfix w-inline-block"><img class="card-pic" src="<?= $this->Url->image('cat-menu.png'); ?>">
			  <div class="card-h1"><?= $cat->cat_name?></div>
			  <div>
				<div class="card-h2"><?= ($cat->is_kitten) ? "Kitten" : "Cat" ?></div>
				<div class="card-h2"></div>
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
		  </div>
	  </div>

      <div class="list-wrapper scroll1 w-dyn-list" data-ix="page-load-fade-in">
        <div class="list scroll1 w-dyn-items">
		<?php if(!empty($litters)): ?>
			<?php foreach($litters as $litter) : ?>
				  <div class="card-wrapper w-dyn-item">
					<div class="card-cont">
					  <a href = "<?= $this->Url->build(['controller' => 'litters', 'action' => 'view', $litter->id]) ?>" class="card w-clearfix w-inline-block">
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
							  <div class="card-field-text"><?= $litter->dob ?></div>
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
							<a class="dropdown-cat-cont w-inline-block"><img class="dropdown-cat-pic" src="<?= $this->Url->image('cat-menu.png'); ?>">
								<div class="dropdown-cat-name"><?= $cat->cat_name ?></div>
							</a>
						<?php endforeach; ?>
						</div>
					  <?php else: ?> 
						<div class="dropdown-cont dropdown-text">Litter has no cats...</div>
					  <?php endif; ?>
					  
					</div>
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
    </div>
</div>

  <div class="floating-overlay"></div>
  <img class="button-paw" data-ix="paw-click" src="<?= $this->Url->image('add-paw.png'); ?>" width="60">
  <div class="button-cont">
    <a class="button-01 w-inline-block" href="<?= $this->Url->build(['controller'=>'cats','action'=>'add']); ?>">
      <div class="button-icon-text">Add Litter</div><img data-ix="add-click" src="<?= $this->Url->image('add-01.png'); ?>" width="55">
    </a>
    <a class="button-02 w-inline-block" href="#">
      <div class="button-icon-text">Sort/Filter</div><img data-ix="filter-click" src="<?= $this->Url->image('filter-01.png'); ?>" width="55">
    </a>
    <a class="button-03 w-inline-block" href="#">
      <div class="button-icon-text">Export</div><img data-ix="add-click" src="<?= $this->Url->image('export-01.png'); ?>" width="55">
    </a>
    <a class="button-04 w-inline-block" href="#">
      <div class="button-icon-text">Delete</div><img data-ix="add-click" src="<?= $this->Url->image('delete-01.png'); ?>" width="55">
    </a>
  </div>

<script>
$(function(){
	$('#litterDob').datepicker({
		  changeMonth: true,
		  changeYear: true
	});
});
</script>
