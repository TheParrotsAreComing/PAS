<div class="catlist-wrapper scroll1 w-dyn-list">
    <div class="catlist scroll1 w-dyn-items">
    <!-- Foreach -->
    <?php foreach($fosters as $foster): ?>
      <div class="cat-card-cont w-dyn-item">
        <div class="catlist-profile-cont">
          <div class="catlist-cat-cont">
            <a class="cat-card w-clearfix w-inline-block"><img class="catlist-profile-pic" sizes="(max-width: 479px) 100vw, 96px">
              <div class="catlist-name"><?php echo $foster['first_name'].' '.$foster['last_name']; ?></div>
              <div>
                <div class="cat-age">Availability:</div>
                <div class="cat-age"><?php echo $foster['avail']; ?></div>
              </div>
              <div class="catlist-field-cont">
                <div class="catlist-field-wrap left-justify">
                  <div class="cat-list-field-text">Address:</div>
                  <div class="catlist-field-content"><?php echo $foster['address']; ?></div>
                </div>
                <div class="catlist-field-wrap left-justify">
                  <div class="cat-list-field-text">Phone:</div>
                  <div class="catlist-field-content"><?php echo $foster['phone']; ?></div>
                </div>
                <div class="catlist-field-wrap left-justify">
                  <div class="cat-list-field-text">E-mail:</div>
                  <div class="catlist-field-content"><?php echo $foster['email']; ?></div>
                </div>
              </div>
            </a>
            <a class="dropdown-cont w-inline-block" data-ix="dropdown">
              <div class="dropdown-text">Expand for Cats</div><img class="dropdown-icon" src="images/expand-01.png">
            </a>
            <div class="dropdown-results-cont">
              <a class="dropdown-cat-cont w-inline-block"><img class="dropdown-cat-pic" src="http://uploads.webflow.com/img/image-placeholder.svg">
                <div class="dropdown-cat-name">This is some text inside of a div block.</div>
              </a>
            </div>
          </div>
        </div>
      </div>
    <!-- Foreach -->
    <?php endforeach; ?>
    </div>
</div>
