<div class="body w-clearfix">
  <div class="filter-bar" data-ix="page-load-slide-right">
    <div class="filter-header">
      <div class="filter-header">FILTER</div>
    </div>
    <div class="filter-menu w-form">
      <form class="w-clearfix" data-name="Email Form 3" id="email-form-3" name="email-form-3">
        <div class="filter-criteria">Breed:</div>
        <select class="filter-criteria-select w-select" data-name="Field" id="Field-2" name="Field">
          <option value="">Select one...</option>
          <option value="First">Tabby</option>
          <option value="Second">Siamese</option>
          <option value="Third">Third Choice</option>
        </select>
      </form>
      <div class="w-form-done">
        <div>Thank you! Your submission has been received!</div>
      </div>
      <div class="w-form-fail">
        <div>Oops! Something went wrong while submitting the form</div>
      </div>
    </div>
    <div class="filter-menu w-form">
      <form class="w-clearfix" data-name="Email Form 3" id="email-form-3" name="email-form-3">
        <div class="filter-criteria">Age:</div>
        <input class="filter-age filter-criteria-select w-input" data-name="Field 3" id="Field-4" maxlength="256" name="Field-3" placeholder="ex: 13 months" required="required" type="text">
      </form>
      <div class="w-form-done">
        <div>Thank you! Your submission has been received!</div>
      </div>
      <div class="w-form-fail">
        <div>Oops! Something went wrong while submitting the form</div>
      </div>
    </div>
    <div class="filter-menu w-form">
      <form class="w-clearfix" data-name="Email Form 3" id="email-form-3" name="email-form-3">
        <div class="filter-criteria">Color:</div>
        <select class="filter-criteria-select w-select" data-name="Field" id="Field-2" name="Field">
          <option value="">Select one...</option>
          <option value="First">Black</option>
          <option value="Second">Brown</option>
          <option value="Third">White</option>
        </select>
      </form>
      <div class="w-form-done">
        <div>Thank you! Your submission has been received!</div>
      </div>
      <div class="w-form-fail">
        <div>Oops! Something went wrong while submitting the form</div>
      </div>
    </div>
    <div class="filter-menu filter-select w-form">
      <form class="w-clearfix" data-name="Email Form 3" id="email-form-3" name="email-form-3">
        <div class="filter-criteria">Gender:</div>
        <div class="filter-criteria-select">
          <div class="filter-criteria-radio w-radio">
            <input class="w-radio-input" data-name="Radio" id="Alive" name="Radio" type="radio" value="Alive">
            <label class="w-form-label" for="Alive">Male</label>
          </div>
          <div class="filter-criteria-radio w-radio">
            <input class="w-radio-input" data-name="Radio" id="Alive" name="Radio" type="radio" value="Alive">
            <label class="w-form-label" for="Alive">Female</label>
          </div>
        </div>
      </form>
      <div class="w-form-done">
        <div>Thank you! Your submission has been received!</div>
      </div>
      <div class="w-form-fail">
        <div>Oops! Something went wrong while submitting the form</div>
      </div>
    </div>
    <div class="filter-menu filter-select w-form">
      <form class="w-clearfix" data-name="Email Form 3" id="email-form-3" name="email-form-3">
        <div class="filter-criteria">Adoption:</div>
        <div class="filter-criteria-select">
          <div class="filter-criteria-radio w-radio">
            <input class="w-radio-input" data-name="Radio" id="Alive" name="Radio" type="radio" value="Alive">
            <label class="w-form-label" for="Alive">Searching</label>
          </div>
          <div class="filter-criteria-radio w-radio">
            <input class="w-radio-input" data-name="Radio" id="Alive" name="Radio" type="radio" value="Alive">
            <label class="w-form-label" for="Alive">Adopted</label>
          </div>
        </div>
      </form>
      <div class="w-form-done">
        <div>Thank you! Your submission has been received!</div>
      </div>
      <div class="w-form-fail">
        <div>Oops! Something went wrong while submitting the form</div>
      </div>
    </div>
    <div class="filter-menu filter-select w-form">
      <form class="w-clearfix" data-name="Email Form 3" id="email-form-3" name="email-form-3">
        <div class="filter-criteria">Well-being:</div>
        <div class="filter-criteria-select">
          <div class="filter-criteria-radio w-radio">
            <input class="w-radio-input" data-name="Radio" id="Alive" name="Radio" type="radio" value="Alive">
            <label class="w-form-label" for="Alive">Alive</label>
          </div>
          <div class="filter-criteria-radio w-radio">
            <input class="w-radio-input" data-name="Radio" id="Alive" name="Radio" type="radio" value="Alive">
            <label class="w-form-label" for="Alive">Deceased</label>
          </div>
        </div>
      </form>
      <div class="w-form-done">
        <div>Thank you! Your submission has been received!</div>
      </div>
      <div class="w-form-fail">
        <div>Oops! Something went wrong while submitting the form</div>
      </div>
    </div>
    <div class="filter-apply-cont"><a class="filter-apply w-button" data-ix="button-click" href="#">APPLY FILTER</a>
    </div>
  </div>
  <div class="column">
    <div class="button-add-signal" data-ix="add-mobile-showhide-2"></div>
    <div class="list-wrapper scroll1 w-dyn-list" data-ix="page-load-fade-in">
      <div class="list w-dyn-items">
      <?php foreach($adopters as $adopter) : ?>
        <div class="card-cont card-wrapper w-dyn-item">
          <a class="card <?= ($adopter['do_not_adopt']) ? "dna-card-big" : ""; ?> w-clearfix w-inline-block" href="<?= $this->Url->build(['controller'=>'adopters', 'action'=>'view', $adopter->id], ['escape'=>false]);?>"><img class="card-pic" src="<?= $this->Url->image('cat-profile-adopter-01.png') ?>" sizes="(max-width: 479px) 21vw, 96px">
            <div class="card-h1"><?= $adopter->first_name?> <?= $adopter->last_name?></div>
            <div><!--     Need to add this later?
              <div class="card-h2">Last Adopted:</div>
              <div class="card-h2"></div>
                  --> 
            </div>
            <div class="card-field-wrap">
              <div class="card-field-cont left-justify">
                <div class="card-h3">Address:</div>
                <div class="catlist-field-content"><?= $adopter->address ?></div>
              </div>
              <div class="card-field-cont left-justify">
                <div class="card-h3">Phone:</div>
                <div class="catlist-field-content"><?= $adopter->phone ?></div>
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
              <a class="dropdown-cont <?= ($adopter['do_not_adopt']) ? 'dna-card-small' : ''; ?> w-inline-block" data-ix="dropdown">
              <?= ($adopter['do_not_adopt']) ? '<b>DO NOT ADOPT!</b><div class="dropdown-icon"></div>' : 'Click to see adopted cats<div class="dropdown-icon"></div>'; ?>
            </a>
          <?php endif; ?>
          <div class="dropdown-results-cont">
            <?php foreach ($adopter['cat_histories'] as $cat): ?>
            <?php $cat = $cat['cat']; ?>
              <a class="dropdown-cat-cont w-inline-block"><?= $this->Html->image('cat-01.png', ['class'=>'dropdown-cat-pic']); ?>
                <div class="dropdown-cat-name"> <?= $cat['cat_name']; ?> </div>
              </a>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endforeach; ?>
      </div>
    </div>
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
      </div><a class="cat-add w-button" href="<?= $this->Url->build(['controller' => 'Adopters', 'action' => 'add']) ?>">+ New Adopter</a>
    </div> 
  </div>
</div>
<div class="floating-overlay"></div><img class="button-paw" data-ix="paw-click" src="img/add-paw.png" width="60">
<div class="button-cont">
  <div class="button-01">
    <div class="button-icon-text">Add Cat</div><img data-ix="add-click" src="img/add-01.png" width="55">
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
