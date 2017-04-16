<div class="body w-clearfix">
  <div class="filter-bar">
    <div class="filter-header">
      <div class="filter-header">FILTER</div>
      <div class="symbol" data-ix="filter-cancel"></div>
    </div>
    <?= $this->Form->create(false,['type'=>'get','class'=>'w-clearfix']) ?>
    <?php $this->Form->templates(['inputContainer' => '{{content}}']); ?>
      <div class="filter">
          <div class="filter-criteria">First Name:</div>
          <?= $this->Form->input('first_name',['class'=>'filter-criteria-select w-input','label'=>false,'id'=>'First-Name','placeholder'=>'Enter first name']) ?>
      </div>
      <div class="filter">
          <div class="filter-criteria">Last Name:</div>
          <?= $this->Form->input('last-name',['class'=>'filter-criteria-select w-input','label'=>false,'id'=>'Last-Name','placeholder'=>'Enter last name']) ?>
      </div>
      <div class="filter">
          <div class="filter-criteria">Phone #:</div>
          <?= $this->Form->input('phone',['class'=>'filter-criteria-select w-input','label'=>false,'id'=>'Phone','placeholder'=>'Enter phone number']) ?>
      </div>
      <div class="filter">
          <div class="filter-criteria">Email:</div>
          <?= $this->Form->input('email',['class'=>'filter-criteria-select w-input','label'=>false,'id'=>'Email','placeholder'=>'Enter email']) ?>
      </div>
      <div class="filter">
          <div class="filter-criteria">Address:</div>
          <?= $this->Form->input('address',['class'=>'filter-criteria-select w-input','label'=>false,'id'=>'Address','placeholder'=>'Enter address']) ?>
      </div>
      <div class="filter">
          <div class="filter-criteria"># of Cats Adopted:</div>
          <?= $this->Form->input('cat_count',['class'=>'filter-criteria-select w-input','label'=>false,'id'=>'Cat-Count','placeholder'=>'Enter number of cats']) ?>
      </div>
      <div class="filter">
          <div class="filter-criteria">Do NOT Adopt:</div>
          <?= $this->Form->input('do_not_adopt',['class'=>'filter-criteria-select w-select','label'=>false,'empty'=>'Both','options'=>['False','True']])?>
      </div>
	  <div class="filter">
	    <div class="filter-criteria">Tags:</div>
	    <?= $this->Form->input('tag',['multiple'=>'multiple','class'=>'filter-criteria-select w-input','options'=>$adopter_tags,'label'=>false,'id'=>'tagFilter']) ?>
	  </div>
      <div class="filter-apply-cont">
        <a class="cancel filter-button w-button" href="<?= $this->Url->build(['action'=>'index'])?>">Cancel</a>
        <button id="filterAdopters" type="submit" class="apply filter-button w-button" data-ix="button-click" href="#">APPLY FILTER</button>
      </div>
    <?= $this->Form->end() ?>
  </div>
  <div class="column">
    <div class="button-add-signal" data-ix="add-mobile-showhide-2"></div>
    <div class="list-wrapper scroll1 w-dyn-list" data-ix="page-load-fade-in">
      <div class="list w-dyn-items">
      <?php foreach($adopters as $adopter) : ?>
        <div class="card-cont card-wrapper w-dyn-item">
          <a class="card <?= ($adopter['do_not_adopt']) ? "dna-card-big" : ""; ?> w-clearfix w-inline-block" href="<?= $this->Url->build(['controller'=>'adopters', 'action'=>'view', $adopter->id], ['escape'=>false]);?>">

            <?php 
                if(!empty($adopter->profile_pic)){
                  echo $this->Html->image('../'.$adopter->profile_pic->file_path.'_tn.'.$adopter->profile_pic->file_ext, ['class'=>'card-pic']);
                } else {
                  echo $this->Html->image('adopter-menu.png', ['class'=>'card-pic']);
                }
            ?>
            
            <div class="card-h1"><?= $adopter->first_name?> <?= $adopter->last_name?></div>
            <div><!--     Need to add this later?
              <div class="card-h2">Last Adopted:</div>
              <div class="card-h2"></div>
                  --> 
            </div>
            <div class="card-field-wrap">

              <?php foreach ($adopter->phone_numbers as $number): ?>
                <?php if ($number->entity_type === 2): ?>
                  <?php $type = "";
                      if ($number->phone_type === 1) {$type = "Mobile: ";break; } 
                      else if ($number->phone_type === 2) {$type = "Home: ";break; } 
                      else if ($number->phone_type === 3) {$type = "Other: ";break; }
                  ?>
                <?php endif; ?>
              <?php endforeach; ?> 
              <div class="card-field-cont left-justify">
                <?php if ($number->entity_type === 2 && $number->entity_id === $adopter->id): ?>
                    <div class="card-h3"><?= $type; ?></div>
                    <div class="catlist-field-content"><?= $number->phone_num; ?></div>
                  </div>
                <?php else: ?>
                    <div class="card-h3">Phone: </div>
                    <div class="catlist-field-content"> --- </div>
                  </div>
                <?php endif; ?> 

              <div class="card-field-cont left-justify">
                <div class="card-h3">Address:</div>
                <div class="catlist-field-content"><?= $adopter->address ?></div>
              </div>
              <div class="card-field-cont left-justify">
                <div class="card-h3">E-mail:</div>
                <div class="catlist-field-content"><?= $adopter->email ?></div>
              </div>
            </div>
          </a>
          <?php if (empty($adopter['cat_histories'])): ?>
              <a class="dropdown-cont <?= ($adopter['do_not_adopt']) ? 'dna-card-small' : ''; ?> w-inline-block">
              <?= ($adopter['do_not_adopt']) ? '<b>DO NOT ADOPT!</b>' : 'This person has not adopted any cats... yet!'; ?>
            </a>
          <?php else: ?>
              <a class="cursor-point dropdown-cont <?= ($adopter['do_not_adopt']) ? 'dna-card-small' : ''; ?> w-inline-block" data-ix="dropdown">
              <?= ($adopter['do_not_adopt']) ? '<b>DO NOT ADOPT!</b><div class="dropdown-icon"></div>' : 'Click to see adopted cats<div class="dropdown-icon"></div>'; ?>
            </a>
          <?php endif; ?>
          <div class="dropdown-results-cont">
            <?php foreach ($adopter['cat_histories'] as $cat): ?>
            <?php $cat = $cat['cat']; ?>
              <a class="cursor-point dropdown-cat-cont w-inline-block" href="<?= $this->Url->build(['controller'=>'cats', 'action'=>'view', $cat['id']]); ?>">


                <?php 
                  if(!empty($cat->profile_pic)) {
                    echo $this->Html->image('../'.$cat->profile_pic->file_path.'_tn.'.$cat->profile_pic->file_ext, ['class'=>'dropdown-cat-pic']);
                  } else {
                    echo $this->Html->image('cat-menu.png', ['class'=>'dropdown-cat-pic']);
                  }
                ?>

                <div class="dropdown-cat-name"> <?= $cat['cat_name']; ?> </div>
              </a>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endforeach; ?>

	  <div class="pagination-w">
		<div class="pagination-wrap">
		  <div class="pagination-cont">
			<div class="pagination"><?= $this->Paginator->prev('') ?></div>
		  </div>
		  <div class="pagination-cont">
			<?php if(count($adopters) < 21): ?>	
				<div class="pagination-index">1</div>
			<?php else: ?>	
				<?= $this->Paginator->numbers() ?>
			<?php endif; ?>	
		  </div>
		  <div class="pagination-cont">
			<div class="pagination"><?= $this->Paginator->next('') ?></div>
		  </div>
		</div>
	  </div>
      </div>
    </div>
   <div class="cat-header" data-ix="page-load-slide-down">
      <div class="cat-sort w-clearfix w-dropdown" data-delay="0">
        <div class="cat-sort-cont w-clearfix w-dropdown-toggle"><?= $this->Html->image('up-arrow.png', ['width'=>12, 'sizes'=>'(max-width: 479px) 100vw, (max-width: 991px) 12px, 1vw']); ?>
          <div class="cat-sort-text">Sort</div>
        </div>
        <nav class="w-dropdown-list"><a class="cat-sort-dropdown w-dropdown-link">Name Descending</a><a class="cat-sort-dropdown w-dropdown-link" href="#">Age</a><a class="cat-sort-dropdown w-dropdown-link" href="#">Cat ID</a>
        </nav>
      </div>
      <div class="cat-filter cat-sort w-dropdown" data-delay="0">
        <div class="cat-sort-cont w-clearfix w-dropdown-toggle" data-ix="filter-hideshow"><?= $this->Html->image('filter-filled-tool-symbol.png', ['sizes'=>'(max-width: 479px) 100vw, (max-width: 991px) 12px, 1vw', 'width'=>"12"]); ?>
          <div class="cat-sort-text">Filter</div>
        </div>
        <nav class="w-dropdown-list"></nav>
      </div><a class="cat-add w-button" href="<?= $this->Url->build(["controller" => "Adopters", "action" => "add"]) ?>">+ New Adopter</a>
    </div> 
  </div>
</div>
<div class="floating-overlay"></div><img class="button-paw" data-ix="paw-click" src="img/add-paw.png" width="60">
<div class="button-cont">
  <div class="button-01">
    <div class="button-icon-text">Add Adopter</div><?= $this->Html->image("add-01.png", ["width"=>"55", "data-ix"=>"add-click", "url"=>["controller"=>"adopters", "action"=>"add"]]); ?>
  </div>
  <div class="button-02">
    <div class="button-icon-text">Sort/Filter</div><img data-ix="filter-click" src="img/filter-01.png" width="55">
  </div>
  <div class="button-03" data-ix="add-click">
    <div class="button-icon-text">Export</div><img data-ix="add-click" src="img/export-01.png" width="55">
  </div>
  <div class="button-04">
    <div class="button-icon-text">Delete</div><img data-ix="add-click" src="img/delete-01.png" width="55">
  </div>
</div>

<script>
	$('#tagFilter').select2();
</script>
