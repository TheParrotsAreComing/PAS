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
          <?= $this->Form->input('email',['class'=>'filter-criteria-select w-input','label'=>false,'id'=>'Email', 'placeholder'=>'Enter email']) ?>
      </div>
      <div class="filter">
          <div class="filter-criteria">Address:</div>
          <?= $this->Form->input('address',['class'=>'filter-criteria-select w-input','label'=>false,'id'=>'Address','placeholder'=>'Enter address']) ?>
      </div>
      <div class="filter">
          <div class="filter-criteria">Deleted:</div>
          <?= $this->Form->input('is_deleted', ['type'=>'checkbox', 'label' => false]); ?>
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
          <a class="card w-clearfix w-inline-block" href="<?= $this->Url->build(['controller'=>'users', 'action'=>'view', $user->id], ['escape'=>false]);?>" style="border-radius: 3px 3px 3px 3px;">
          <div class="card-pic-cont">
            <img class="card-pic" src="<?= $this->Url->image('user-menu.png') ?>" sizes="(max-width: 479px) 21vw, 96px">
          </div>
            <div class="card-h1"><?= ($user->first_name == 'First' && $user->last_name == 'Last') ? '(Unconfirmed User)' : $user->first_name.' '.$user->last_name ?></div>
            <div>
              <div class="card-h2">E-mail:</div>
              <div class="card-h2"><?= $user->email ?></div>
            <!--     Need to add this later?
              <div class="card-h2">Last Adopted:</div>
              <div class="card-h2"></div --> 
            </div>
            <div class="card-field-wrap">
              <?php if(!empty($phones)) :?>
                <?php foreach ($phones as $number): ?>
                  <?php if ($number->entity_id === $user->id): ?>
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
                <div class="card-field-text"><?= ($user->address == "Address") ? "n/a" : $user->address ?></div>
              </div>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
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
        <a class="cat-add w-button" href=<?= $this->Url->build(['controller'=>'users','action'=>'add']); ?>>+ Invite New User</a>
      <?php endif; ?>
    </div> 
  </div>
</div>
<div class="floating-overlay"></div>
<div class="button-paw" data-ix="paw-click">
    <div>O</div>
</div>
<div class="button-cont">
  <a class="button w-inline-block" href="<?= $this->Url->build(['controller'=>'users','action'=>'add']); ?>">
      <div class="button-icon-text">Add User</div>
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
