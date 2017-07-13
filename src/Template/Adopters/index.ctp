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
          <?= $this->Form->input('phone',['class'=>'filter-criteria-select w-input','label'=>false,'id'=>'Phone', 'type'=>'tel', 'maxLength'=>10,'placeholder'=>'Enter phone number']) ?>
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
      <div class="filter">
        <div class="filter-criteria">Deleted:</div>
        <?= $this->Form->input('is_deleted', ['type'=>'checkbox', 'label' => false]); ?>
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
        <div class="card-cont <?= ($adopter->do_not_adopt) ? "alert" : "" ?> card-wrapper w-dyn-item">
          <?php if ($adopter['do_not_adopt']): ?>
            <div class="card-tag-cont">
                <div class="card-tag warning">
                  <div class="card-tag-symbol">R</div>
                  <div class="card-tag-text">Do Not Adopt</div>
                </div>
            </div>
        <?php endif; ?>
          <a class="card w-clearfix w-inline-block" href="<?= $this->Url->build(['controller'=>'adopters', 'action'=>'view', $adopter->id], ['escape'=>false]);?>">
            <div class="card-pic-cont">
            <?php 
                if(!empty($adopter->profile_pic)){
                  echo $this->Html->image('../'.$adopter->profile_pic->file_path.'_tn.'.$adopter->profile_pic->file_ext, ['class'=>'card-pic']);
                } else {
                  echo $this->Html->image('adopter-menu.png', ['class'=>'card-pic']);
                }
            ?>
            </div>            
            <div class="card-h1"><?= $adopter['first_name'].' '.$adopter['last_name']; ?></div>
            <div>
              <div class="card-h2">E-mail:</div>
              <div class="card-h2"><?= $adopter->email ?></div>
              <!--     Need to add this later?
              <div class="card-h2">Last Adopted:</div>
              <div class="card-h2"></div>
                  --> 
            </div>
            <div class="card-field-wrap">

              <?php if(!empty($phones)) :?>
                <?php foreach ($phones as $number): ?>
                  <?php if ($number->entity_id === $adopter->id): ?>
                    <div class="card-field-cont left-justify">
                      <div class="card-h3">Primary Phone: </div>
                      <div class="catlist-field-content"><?php echo "(".substr($number->phone_num, 0, 3).") ".substr($number->phone_num, 3, 3)."-".substr($number->phone_num,6); ?></div>
                    </div>
                    <?php break;?>
                  <?php endif ;?>
                <?php endforeach; ?>
              <?php endif; ?>

              <div class="card-field-cont left-justify">
                <div class="card-h3">Address:</div>
                <div class="catlist-field-content"><?= $adopter->address ?></div>
              </div>
            </div>
          </a>
          <?php if (empty($adopter['cat_histories'])): ?>
              <a class="dropdown-cont w-inline-block">
                This person has not adopted any cats... yet!
            </a>
          <?php else: ?>
              <a class="cursor-point dropdown-cont w-inline-block" data-ix="dropdown">
                Click to see adopted cats<div class="dropdown-icon"></div>
            </a>
          <?php endif; ?>
          <div class="dropdown-results-cont">
            <?php foreach ($adopter['cat_histories'] as $cat): ?>
            <?php $cat = $cat['cat']; ?>
              <a href = "<?= $this->Url->build(['controller' => 'cats', 'action' => 'view', $cat->id]) ?>" class="dropdown-cat-cont w-inline-block" >
              <?php 
                  if(!empty($cat->profile_pic)) {
                    echo $this->Html->image('../'.$cat->profile_pic->file_path.'_tn.'.$cat->profile_pic->file_ext, ['class'=>'dropdown-cat-pic']);
                  } else {
                    echo $this->Html->image('cat-menu.png', ['class'=>'dropdown-cat-pic']);
                  }
                ?>
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
        </div>
      <?php endforeach; ?>

	  <div class="pagination-w">
		<div class="pagination-wrap">
		  <div class="pagination-cont">
			<div class="pagination"><?= $this->Paginator->prev('') ?></div>
		  </div>
		  <div class="pagination-cont">
            <?= $this->Paginator->numbers() ?>
		  </div>
		  <div class="pagination-cont">
			<div class="pagination"><?= $this->Paginator->next('') ?></div>
		  </div>
		</div>
	  </div>
      </div>
    </div>
   <div class="cat-header" data-ix="page-load-slide-down">
      
    <?php /*
      <div class="cat-sort w-clearfix w-dropdown" data-delay="0">
        <div class="cat-sort-cont w-clearfix w-dropdown-toggle"><?= $this->Html->image('up-arrow.png', ['width'=>12, 'sizes'=>'(max-width: 479px) 100vw, (max-width: 991px) 12px, 1vw']); ?>
          <div class="cat-sort-text">Sort</div>
        </div>
        <nav class="w-dropdown-list"><a class="cat-sort-dropdown w-dropdown-link">Name Descending</a><a class="cat-sort-dropdown w-dropdown-link" href="#">Age</a><a class="cat-sort-dropdown w-dropdown-link" href="#">Cat ID</a>
        </nav>
      </div>
    */ ?>

      <div class="cat-filter cat-sort w-dropdown" data-delay="0">
        <div class="cat-sort-cont w-clearfix w-dropdown-toggle" data-ix="filter-hideshow"><?= $this->Html->image('filter-filled-tool-symbol.png', ['sizes'=>'(max-width: 479px) 100vw, (max-width: 991px) 12px, 1vw', 'width'=>"12"]); ?>
          <div class="cat-sort-text">Filter</div>
        </div>
        <nav class="w-dropdown-list"></nav>
      </div>
      <?php if ($can_add): ?>
        <a class="cat-add w-button" href="<?= $this->Url->build(["controller" => "Adopters", "action" => "add"]) ?>">+ New Adopter</a>
      <?php endif; ?>
    </div> 
  </div>
</div>
<div class="floating-overlay"></div>
<div class="button-paw" data-ix="paw-click">
      <div>O</div>
</div>
<div class="button-cont">
  <a class="button w-inline-block" href="<?= $this->Url->build(['controller'=>'adopters','action'=>'add']); ?>">
      <div class="button-icon-text">Add Adopter</div>
      <div class="floating-button">
        <div>P</div>
      </div>
  </a>
  <a class="button w-inline-block" data-ix="filter-click" href="#">
    <div class="button-icon-text">Sort/Filter</div>
    <div class="floating-button">
      <div>K</div>
    </div>
  </a>
<script>
	$('#tagFilter').select2();
</script>
