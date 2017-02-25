<div class="body">
<div class="column">
  <div class="button-add-signal" data-ix="add-mobile-showhide-2"></div>
  <div class="paws-home-cont" data-ix="page-load-fade-in">
	<div class="pas-home-list w-dyn-list" id="homeItems">
	  <div class="pas-home-list w-dyn-items">
		<!-- Cat -->
		<div class="pas-home-button-cont w-dyn-item">
		  <a href="<?=$this->Url->build(['controller'=>'Cats','action'=>'index']) ?>" class="pas-home-button-link-cont w-inline-block"><img src="<?=$this->Url->image('cat-menu.png')?>" class="pas-home-button-icon" sizes="(max-width: 479px) 31vw, 170px">
			<div class="pas-home-button-name">CATS</div>
		  </a>
		</div>
		<!-- Adopter -->
		<div class="pas-home-button-cont w-dyn-item">
		  <a href="<?=$this->Url->build(['controller'=>'Adopters','action'=>'index'])?>" class="pas-home-button-link-cont w-inline-block"><img src="<?=$this->Url->image('adopter-menu.png')?>" class="pas-home-button-icon" sizes="(max-width: 479px) 31vw, 170px">
			<div class="pas-home-button-name">ADOPTERS</div>
		  </a>
		</div>
		<!-- Foster -->
		<div class="pas-home-button-cont w-dyn-item">
		  <a href="<?=$this->Url->build(['controller'=>'Fosters','action'=>'index'])?>" class="pas-home-button-link-cont w-inline-block"><img src="<?=$this->Url->image('foster-menu.png')?>" class="pas-home-button-icon" sizes="(max-width: 479px) 31vw, 170px">
			<div class="pas-home-button-name">FOSTER HOMES</div>
		  </a>
		</div>
		<!-- Litters -->
		<div class="pas-home-button-cont w-dyn-item">
		  <a href="<?=$this->Url->build(['controller'=>'Litters','action'=>'index'])?>" class="pas-home-button-link-cont w-inline-block"><img src="<?=$this->Url->image('litter-menu.png')?>" class="pas-home-button-icon" sizes="(max-width: 479px) 31vw, 170px">
			<div class="pas-home-button-name">INCOMING LITTERS</div>
		  </a>
		</div>
		<!-- Volunteers -->
		<div class="pas-home-button-cont w-dyn-item">
		  <a href="<?=$this->Url->build(['controller'=>'Users','action'=>'index'])?>" class="pas-home-button-link-cont w-inline-block"><img src="<?=$this->Url->image('user-menu.png')?>" class="pas-home-button-icon" sizes="(max-width: 479px) 31vw, 170px">
			<div class="pas-home-button-name">VOLUNTEERS</div>
		  </a>
		</div>
		<!-- Messages -->
		<div class="pas-home-button-cont w-dyn-item">
		  <a href="#" class="pas-home-button-link-cont w-inline-block"><img src="<?=$this->Url->image('message-menu.png')?>" class="pas-home-button-icon" sizes="(max-width: 479px) 31vw, 170px">
			<div class="pas-home-button-name">MESSAGES</div>
		  </a>
		</div>
		<!-- Settings -->
		<div class="pas-home-button-cont w-dyn-item">
		  <a href="#" class="pas-home-button-link-cont w-inline-block"><img src="<?=$this->Url->image('settings-menu.png')?>" class="pas-home-button-icon" sizes="(max-width: 479px) 31vw, 170px">
			<div class="pas-home-button-name">SETTINGS</div>
		  </a>
		</div>
	  </div>
	</div>
  </div>
</div>
</div>
