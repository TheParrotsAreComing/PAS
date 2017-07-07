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
          <div class="filter-criteria">Rating:</div>
          <?= $this->Form->input('rating',['class'=>'filter-criteria-select w-select','label'=>false,'options'=>['Select Rating','1','2','3','4','5']])?>
      </div>
      <div class="filter">
          <div class="filter-criteria">Availability:</div>
          <?= $this->Form->input('avail',['class'=>'filter-criteria-select w-input','label'=>false,'id'=>'Availability','placeholder'=>'Enter availability']) ?>
      </div>
      <div class="filter">
          <div class="filter-criteria">Phone #:</div>
          
          <?= $this->Form->input('phone',['class'=>'filter-criteria-select w-input','label'=>false,'type'=>'tel', 'maxLength'=>10,'placeholder'=>'Enter phone number']) ?>
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
  	    <div class="filter-criteria">Tags:</div>
  	    <?= $this->Form->input('tag',['multiple'=>'multiple','class'=>'filter-criteria-select w-input','options'=>$foster_tags,'label'=>false,'id'=>'tagFilter']) ?>
  	  </div>
      <div class="filter">
        <div class="filter-criteria">Deleted:</div>
        <?= $this->Form->input('is_deleted', ['type'=>'checkbox', 'label' => false]); ?>
      </div>
      <div class="filter-apply-cont">
        <a class="cancel filter-button w-button" href="<?= $this->Url->build(["action"=>"index"])?>">Cancel</a>
        <button id="filterFosters" type="submit" class="apply filter-button w-button" data-ix="button-click" href="#">APPLY FILTER</button>
      </div>
    <?= $this->Form->end() ?>
  </div>
  <div class="column">
    <div class="button-add-signal" data-ix="add-mobile-showhide-2"></div>
    <div class="cat-header">
      <div class="cat-sort w-clearfix w-dropdown" data-delay="0">
        <div class="cat-sort-cont w-clearfix w-dropdown-toggle"><?= $this->Html->image('up-arrow.png', ['width'=>12, 'sizes'=>'(max-width: 479px) 100vw, (max-width: 991px) 12px, 1vw']); ?>
          <div class="cat-sort-text">Sort</div>
        </div>
        <nav class="w-dropdown-list"><a class="cat-sort-dropdown w-dropdown-link">Name Descending</a><a class="cat-sort-dropdown w-dropdown-link" href="#">Age</a><a class="cat-sort-dropdown w-dropdown-link" href="#">Cat ID</a>
        </nav>
      </div>
      <div class="cat-filter cat-sort w-dropdown" data-delay="0">
        <div class="cat-sort-cont w-clearfix w-dropdown-toggle" data-ix="filter-hideshow">
          <?= $this->Html->image('filter-filled-tool-symbol.png', ['sizes'=>'(max-width: 479px) 100vw, (max-width: 991px) 12px, 1vw', 'width'=>"12"]); ?>
          <div class="cat-sort-text">Filter</div>
        </div>
        <nav class="w-dropdown-list"></nav>
      </div> 
      <?php if ($can_add): ?>
        <?= $this->Html->link('+ New Foster', ['controller'=>'fosters','action'=>'add'],['class'=>'cat-add w-button']); ?>
      <?php endif; ?>
    </div>
    <div class="list-wrapper scroll1 w-dyn-list">
      <div class="list scroll1 w-dyn-items">
        <?php foreach ($fosters as $foster): ?>
            <div class="card-cont card-wrapper w-dyn-item">
                  <a class="card w-clearfix w-inline-block" href="<?= $this->Url->build(['controller'=>'fosters', 'action'=>'view', $foster->id], ['escape'=>false]);?>">
                  <div class="card-pic-cont">
                  <?php 
                      if(!empty($foster->profile_pic)){
                        echo $this->Html->image('../'.$foster->profile_pic->file_path.'_tn.'.$foster->profile_pic->file_ext, ['class'=>'card-pic']);
                      } else {
                        echo $this->Html->image('foster-menu.png', ['class'=>'card-pic']);
                      }
                  ?>
                  </div>
                  <div class="card-h1"><?= $foster['first_name'].' '.$foster['last_name']; ?></div>
                    <div>
                      <div class="card-h2">Rating:</div>
                      <div class="card-h2"><?= $foster['rating']; ?></div>
					           <?php echo str_repeat("&nbsp;", 5); ?>
                    </div>
                    <div class="card-field-wrap">
                      <div class="card-field-cont left-justify">
                        <div class="card-h3">Availability:</div>
                        <div class="catlist-field-content">
                        <?= $foster['avail'];
                        //$this->Text->truncate($foster['avail'],25, ['ellipsis'=>'...', 'exact'=>true]); ?></div>
                      </div>
                      <div class="card-field-cont left-justify">
                        <div class="card-h3">E-mail:</div>
                        <div class="catlist-field-content"><?= $foster['email']; ?></div>
                      </div>
                      <div class="card-field-cont left-justify">
                        <div class="card-h3">Address:</div>
                        <div class="catlist-field-content"><?= $foster['address']; ?></div>
                      </div>
                      <?php if(!empty($phones)) :?>
                        <?php foreach ($phones as $number): ?>
                          <?php if ($number->entity_id === $foster->id): ?>
                            <div class="card-field-cont left-justify">
                              <div class="card-h3">Primary Phone: </div>
                              <div class="catlist-field-content"><?php echo "(".substr($number->phone_num, 0, 3).") ".substr($number->phone_num, 3, 3)."-".substr($number->phone_num,6); ?></div>
                            </div>
                            <?php break;?>
                          <?php endif ;?>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </div>
                  </a>
                  <?php if (empty($foster["cat_histories"])): ?>
                    <a class="dropdown-cont w-inline-block">
                      This foster doesn't currently have any cats!
                    </a>
                  <?php else:?>
                    <a class="cursor-point dropdown-cont w-inline-block" data-ix="dropdown">
                      Click to see foster's current cats<div class="dropdown-icon"></div>
                    </a>
                  <?php endif; ?>
                  <div class="dropdown-results-cont">
                    <?php foreach ($foster["cat_histories"] as $cat): ?>
                      <?php $cat = $cat["cat"]; ?>
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
  </div>
</div>
<div class="floating-overlay"></div>
<div class="button-paw" data-ix="paw-click">
    <div>O</div>
</div>
<div class="button-cont">
  <a class="button-01 w-inline-block" href="<?= $this->Url->build(['controller'=>'fosters','action'=>'add']); ?>">
      <div class="button-icon-text">Add Foster</div>
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
	$('#tagFilter').select2();
  $('#phoneFilter').select2();
});
</script>
