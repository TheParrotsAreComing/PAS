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
      </div><?= $this->Html->link('+ New Foster', ['controller'=>'fosters','action'=>'add'],['class'=>'cat-add w-button']); ?>
    </div>
    <div class="list-wrapper scroll1 w-dyn-list">
      <div class="list scroll1 w-dyn-items">
        <?php foreach ($fosters as $foster): ?>
            <div class="card-wrapper w-dyn-item">
              <div class="card-full-cont">
                <div class="card-cont">
                  <a class="card w-clearfix w-inline-block" href="<?= $this->Url->build(['controller'=>'fosters', 'action'=>'view', $foster->id], ['escape'=>false]);?>"><?= $this->Html->image('foster-01.png', ['class'=>'card-pic', 'sizes'=>'(max-width:479px) 21vw, 96px']); ?>
                  <div class="card-h1"><?= $foster['first_name'].' '.$foster['last_name']; ?></div>
                    <div>
                      <div class="card-h2">Rating:</div>
                      <div class="card-h2"><?= $foster['rating']; ?></div>
					  <?php echo str_repeat("&nbsp;", 10); ?>
                      <div class="card-h2">Availability:</div>
                      <div class="card-h2"><?= $foster['avail']; ?></div>
                    </div>
                    <div class="card-field-wrap">
                      <div class="card-field-cont left-justify">
                        <div class="card-h3">Phone:</div>
                        <div class="catlist-field-content"><?= $foster['phone']; ?></div>
                      </div>
                      <div class="card-field-cont left-justify">
                        <div class="card-h3">E-mail:</div>
                        <div class="catlist-field-content"><?= $foster['email']; ?></div>
                      </div>
                      <div class="card-field-cont left-justify">
                        <div class="card-h3">Address:</div>
                        <div class="catlist-field-content"><?= $foster['address']; ?></div>
                      </div>
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
                      <a class="dropdown-cat-cont w-inline-block" href="<?= $this->Url->build(['controller'=>'cats', 'action'=>'view', $cat['id']]); ?>"><?= $this->Html->image('cat-menu.png', ['class'=>'dropdown-cat-pic']); ?>
                        <div class="dropdown-cat-name"> <?= $cat['cat_name']; ?> </div>
                      </a>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
<div class="floating-overlay"></div><img class="button-paw" data-ix="paw-click" src="img/add-paw.png" width="60">
<div class="button-cont">
  <div class="button-01">
    <div class="button-icon-text">Add Foster</div><?= $this->Html->image("add-01.png", ["data-ix"=>"add-click", "width"=>"55", "url"=>["controller"=>"fosters", "action"=>"add"]]); ?>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>

