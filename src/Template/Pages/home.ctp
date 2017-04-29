<div class="body">
<div class="column home">
  <div class="paws-home-cont" data-ix="page-load-fade-in">
		<!-- Cat -->
		  <a href="<?=$this->Url->build(['controller'=>'Cats','action'=>'index']) ?>" class="pas-home-button-cont w-inline-block"><img src="<?=$this->Url->image('cat-menu.png')?>" class="pas-home-button-icon" sizes="(max-width: 479px) 31vw, 170px">
			<div class="pas-home-button-name">CATS</div>
		  </a>
		<!-- Adopter -->
		  <a href="<?=$this->Url->build(['controller'=>'Adopters','action'=>'index'])?>" class="pas-home-button-cont w-inline-block"><img src="<?=$this->Url->image('adopter-menu.png')?>" class="pas-home-button-icon" sizes="(max-width: 479px) 31vw, 170px">
			<div class="pas-home-button-name">ADOPTERS</div>
		  </a>
		<!-- Foster -->
		  <a href="<?=$this->Url->build(['controller'=>'Fosters','action'=>'index'])?>" class="pas-home-button-cont w-inline-block"><img src="<?=$this->Url->image('foster-menu.png')?>" class="pas-home-button-icon" sizes="(max-width: 479px) 31vw, 170px">
			<div class="pas-home-button-name">FOSTER HOMES</div>
		  </a>
		<!-- Litters -->
		  <a href="<?=$this->Url->build(['controller'=>'Litters','action'=>'index'])?>" class="pas-home-button-cont w-inline-block"><img src="<?=$this->Url->image('litter-menu.png')?>" class="pas-home-button-icon" sizes="(max-width: 479px) 31vw, 170px">
			<div class="pas-home-button-name">INCOMING LITTERS</div>
		  </a>
		<!-- Volunteers -->
		  <a href="<?=$this->Url->build(['controller'=>'Users','action'=>'index'])?>" class="pas-home-button-cont w-inline-block"><img src="<?=$this->Url->image('user-menu.png')?>" class="pas-home-button-icon" sizes="(max-width: 479px) 31vw, 170px">
			<div class="pas-home-button-name">VOLUNTEERS</div>
		  </a>
		<!-- Contacts -->
		  <a href="#" class="pas-home-button-cont w-inline-block"><img src="<?=$this->Url->image('contacts-menu.png')?>" class="pas-home-button-icon" sizes="(max-width: 479px) 31vw, 170px">
			<div class="pas-home-button-name">CONTACTS</div>
		  </a>
		<!-- Tags -->
      <?php if ($this->request->session()->read('Auth.User.role') == 1): ?>
        <a href="<?=$this->Url->build(['controller'=>'Tags','action'=>'index']);?>" class="pas-home-button-cont w-inline-block"><img src="<?=$this->Url->image('tag-menu.png')?>" class="pas-home-button-icon" sizes="(max-width: 479px) 31vw, 170px">
          <div class="pas-home-button-name">TAGS</div>
        </a>
      <?php endif; ?>
		<!-- Adoption Events -->
		  <a href="#" class="pas-home-button-cont w-inline-block"><img src="<?=$this->Url->image('calendar-menu.png')?>" class="pas-home-button-icon" sizes="(max-width: 479px) 31vw, 170px">
			<div class="pas-home-button-name">ADOPTION EVENTS</div>
		  </a>
		<!-- Settings -->
		  <a href="#" class="pas-home-button-cont w-inline-block"><img src="<?=$this->Url->image('settings-menu.png')?>" class="pas-home-button-icon" sizes="(max-width: 479px) 31vw, 170px">
			<div class="pas-home-button-name">SETTINGS</div>
		  </a>
  </div>
</div>
</div>

