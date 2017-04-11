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
      <div class="filter-apply-cont">
        <a class="cancel filter-button w-button" href="<?= $this->Url->build(['action'=>'index'])?>">Cancel</a>
        <button id="filterUsers" type="submit" class="apply filter-button w-button" data-ix="button-click" href="#">APPLY FILTER</button>
      </div>
    <?= $this->Form->end() ?>
  </div>
  <div class="column">
    <div class="button-add-signal" data-ix="add-mobile-showhide-2"></div>
    <div class="list-wrapper scroll1 w-dyn-list" data-ix="page-load-fade-in">
      <div class="list w-dyn-items">
      <?php foreach($users as $user) : ?>
        <div class="card-cont card-wrapper w-dyn-item">
          <a class="card w-clearfix w-inline-block" href="<?= $this->Url->build(['controller'=>'users', 'action'=>'view', $user->id], ['escape'=>false]);?>"><img class="card-pic" src="<?= $this->Url->image('adopter-menu.png') ?>" sizes="(max-width: 479px) 21vw, 96px">
            <div class="card-h1"><?= $user->first_name?> <?= $user->last_name?></div>
            <div><!--     Need to add this later?
              <div class="card-h2">Last Adopted:</div>
              <div class="card-h2"></div>
                  --> 
            </div>
            <div class="card-field-wrap">
              <div class="card-field-cont left-justify">
                <div class="card-h3">Address:</div>
                <div class="catlist-field-content"><?= ($user->address == "Address") ? "n/a" : $user->address ?></div>
              </div>
              <div class="card-field-cont left-justify">
                <div class="card-h3">Phone:</div>
                <div class="catlist-field-content"><?= ($user->phone == "0") ? "n/a" : $user->phone ?></div>
              </div>
              <div class="card-field-cont left-justify">
                <div class="card-h3">E-mail:</div>
                <div class="catlist-field-content"><?= $user->email ?></div>
              </div>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
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
      </div>
    </div> 
  </div>
</div>
<div class="floating-overlay"></div><img class="button-paw" data-ix="paw-click" src="img/add-paw.png" width="60">
<div class="button-cont">
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
