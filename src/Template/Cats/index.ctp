<div class="catlist scroll1 w-dyn-items">
<?php foreach ($cats as $cat): ?>
  <!-- Not sure where to handle the filter for showing deleted? -->
  <?php if(!$cat->is_deleted): ?>
  <div class="cat-card-cont w-dyn-item">
	<div class="catlist-profile-cont">
	  <div class="catlist-cat-cont">
		<a class="cat-card w-clearfix w-inline-block">
		<!-- TODO: Find and load actual profile pic, or create a better cat default profile pic? -->
		  <img class="catlist-profile-pic" src="http://uploads.webflow.com/img/image-placeholder.svg">
		  <div class="catlist-name"><?= $cat->cat_name ?></div>
		  <div>
			<div class="cat-age">
				<?php if($cat->is_kitten): ?>Kitten
				<?php else: ?> Cat
				<?php endif ?> 
				<?php if($cat->is_female): ?>(Female)
				<?php else: ?>(Male)
				<?php endif ?>
			</div>
		  </div>
		  <div class="catlist-field-cont">
			<div class="catlist-field-wrap">
			  <div class="catlist-field-wrap left-justify">
				<div class="cat-list-field-text"><span class="cat-list-field-label">DOB:</span> <?= $cat->dob ?></div>
			  </div>
			  <div class="catlist-field-wrap right-justify">
				<div class="cat-list-field-text"><span class="cat-list-field-label">Age:</span> TODO: Calc this</div>
			  </div>
			</div>
			<div class="catlist-field-wrap">
			  <div class="catlist-field-wrap left-justify">
				<div class="cat-list-field-text"><span class="cat-list-field-label">Breed/Color/Coat:</span> <?= $cat->breed ?></div>
			  </div>
			</div>
		  </div>
		</a>
		
		<!-- if there's a litter, iterate through and list the sibblings/mom TODO: actually iterate through-->
		<?php if($cat->litterid>0): ?>
			<a class="dropdown-cont w-inline-block" data-ix="dropdown">
			  <div class="dropdown-text">Expand for Relationships... <?= $cat->litterid ?></div><img class="dropdown-icon" src="images/expand-01.png">
			</a>
			<div class="dropdown-results-cont">
			  <a class="dropdown-cat-cont w-inline-block"><img class="dropdown-cat-pic" src="http://uploads.webflow.com/img/image-placeholder.svg">
				<div class="dropdown-cat-name">sibling name</div>
			  </a>
			</div>
		<!-- else, litterid is null or 0, so display "Cat/kitten is not in a litter" -->
		<?php else: ?>
			<div class="dropdown-cont dropdown-text">
			<?php if($cat->is_kitten): ?>Kitten has no siblings.
			<?php else: ?> Cat has no kittens.
			<?php endif ?>
			</div>
		<?php endif ?>
	  </div>
	</div>
  </div>
  <?php endif ?>	  
<?php endforeach; ?>
</div>
