<div class="body w-clearfix">
  <div class="filter-bar">
    <div class="filter-header">
      <div class="filter-header">FILTER</div>
      <div class="symbol" data-ix="filter-cancel"></div>
    </div>
    <form class="w-clearfix" data-name="Email Form 3" id="email-form-3" name="email-form-3">
    <?php $this->Form->templates(['inputContainer' => '{{content}}']); ?>
    <div class="filter-menu w-form">
        <div class="filter-criteria">First Name:</div>
        <input class="filter-criteria-select w-input" data-name="Field 3" id="First-Name" maxlength="256" name="first_name" placeholder="Enter first name" type="text">
    </div>
    <div class="filter-menu w-form">
        <div class="filter-criteria">Last Name:</div>
        <input class="filter-criteria-select w-input" data-name="Field 3" id="Last-Name" maxlength="256" name="last_name" placeholder="Enter last name" type="text">
    </div>
    <div class="filter-menu w-form">
        <div class="filter-criteria">Rating:</div>
          <input class="filter-criteria-select w-input" data-name="Field 3" id="Rating" maxlength="256" name="rating" placeholder="Enter rating" type="text">
    </div>
    <div class="filter-apply-cont"><button type="submit" class="filter-apply w-button" data-ix="button-click" href="#">APPLY FILTER</button>
    </div>
    </form>
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
                  <a class="card w-clearfix w-inline-block" href="<?= $this->Url->build(['controller'=>'fosters', 'action'=>'view', $foster->id], ['escape'=>false]);?>"><?= $this->Html->image('cat-profile-foster-01.png', ['class'=>'card-pic', 'sizes'=>'(max-width:479px) 21vw, 96px']); ?>
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
                      <a class="dropdown-cat-cont w-inline-block" href="<?= $this->Url->build(['controller'=>'cats', 'action'=>'view', $cat['id']]); ?>"><?= $this->Html->image("cat-01.png", ["class"=>"dropdown-cat-pic"]); ?>
                        <div class="dropdown-cat-name"> <?= $cat["cat_name"]; ?> </div>
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
    <div class="button-icon-text">Sort/Filter</div><img data-ix="add-click" src="img/filter-01.png" width="55">
  </div>
  <div class="button-03" data-ix="add-click">
    <div class="button-icon-text">Export</div><img data-ix="add-click" src="img/export-01.png" width="55">
  </div>
  <div class="button-04">
    <div class="button-icon-text">Delete</div><img data-ix="add-click" src="img/delete-01.png" width="55">
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>

