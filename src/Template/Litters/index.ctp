<div class="body w-clearfix">

    <div class="filter-bar" data-ix="page-load-slide-right">
      <div class="filter-header">
        <div class="filter-header">FILTER</div>
      </div>
        <form class="w-clearfix" data-name="Email Form 3" id="email-form-3" name="email-form-3">

	      <?php $this->Form->templates(['inputContainer' => '{{content}}']); ?>
		  <div class="filter">
			  <div class="filter-criteria">Name:</div>
			  <input class="filter-criteria-select w-input" data-name="Field 3" id="Field-4" maxlength="256" name="litter_name" placeholder="Enter a name" type="text">
		  </div>
		  <div class="filter">
			  <div class="filter-criteria">Breed:</div>
			  <input class="filter-criteria-select w-input" data-name="Field 3" id="Field-4" maxlength="256" name="breed" placeholder="Enter a breed" type="text">
		  </div>
		  <div class="filter">
			  <div class="filter-criteria">Date of Birth:</div>
			  <input class="filter-criteria-select w-input" data-name="Field 3" id="litterDob" maxlength="256" name="dob" placeholder="Select a DOB" type="text">
		  </div>
		  <div class="filter">
			  <div class="filter-criteria"># of Kittens:</div>
		      <?= $this->Form->input('kitten_count',['label'=>false,'class'=>'filter-criteria-select w-input','data-name'=>'kitten count','placeholder'=>'Enter a name','type'=>'select','options'=>$count]) ?>
		  </div>
		  <div class="filter">
			  <div class="filter-criteria"># Of Cats:</div>
		      <?= $this->Form->input('the_cat_count',['label'=>false,'class'=>'filter-criteria-select w-input','data-name'=>'kitten count','placeholder'=>'Enter a name','type'=>'select','options'=>$count]) ?>
		  </div>
		  <div class="filter-apply-cont">
			<button type="submit" class="filter-apply w-button" data-ix="button-click" href="#">APPLY FILTER</button>
		  </div>
		</form>
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
            <div class="cat-sort-text">Filter</div>
          </div>
          <nav class="w-dropdown-list"></nav>
        </div><a class="cat-add w-button" href=<?= $this->Url->build(['controller'=>'litters','action'=>'add']); ?>>+ New Litter</a>
      </div>

      <div class="list-wrapper scroll1 w-dyn-list" data-ix="page-load-fade-in">
        <div class="list scroll1 w-dyn-items">
		<?php if(!empty($litters)): ?>
			<?php foreach($litters as $litter) : ?>
				  <div class="card-wrapper w-dyn-item">
					<div class="card-cont">
					  <a class="card w-clearfix w-inline-block">
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
							<a class="dropdown-cat-cont w-inline-block"><img class="dropdown-cat-pic" src="<?= $this->Url->image('cat-01.png'); ?>">
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
  <img class="button-paw" data-ix="paw-click" src="img/add-paw.png" width="60">
  <div class="button-cont">
    <a class="button-01 w-inline-block" href="<?= $this->Url->build(['controller'=>'cats','action'=>'add']); ?>">
      <div class="button-icon-text">Add Cat</div><img data-ix="add-click" src="img/add-01.png" width="55">
    </a>
    <a class="button-02 w-inline-block" href="#">
      <div class="button-icon-text">Sort/Filter</div><img data-ix="add-click" src="img/filter-01.png" width="55">
    </a>
    <a class="button-03 w-inline-block" href="#">
      <div class="button-icon-text">Export</div><img data-ix="add-click" src="img/export-01.png" width="55">
    </a>
    <a class="button-04 w-inline-block" href="#">
      <div class="button-icon-text">Delete</div><img data-ix="add-click" src="img/delete-01.png" width="55">
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
