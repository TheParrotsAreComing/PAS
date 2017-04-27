<div class="body">
<div class="column home">
  <div class="paws-home-cont" data-ix="page-load-fade-in">
		<!-- Cat -->
		  <a href="<?=$this->Url->build(['controller'=>'Cats','action'=>'index']) ?>" class="pas-home-button-cont w-inline-block"><img src="<?=$this->Url->image('cat-menu.png')?>" class="pas-home-button-icon" sizes="(max-width: 479px) 31vw, 170px">
        <div class="pas-home-button-name">CATS</div>
		  </a>
		<!-- Adopter -->
      <?php if (!$is_foster): ?>
        <a href="<?=$this->Url->build(['controller'=>'Adopters','action'=>'index'])?>" class="pas-home-button-cont w-inline-block"><img src="<?=$this->Url->image('adopter-menu.png')?>" class="pas-home-button-icon" sizes="(max-width: 479px) 31vw, 170px">
          <div class="pas-home-button-name">ADOPTERS</div>
        </a>
      <?php endif; ?>
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
		<!-- Messages -->
		  <a href="#" class="pas-home-button-cont w-inline-block"><img src="<?=$this->Url->image('message-menu.png')?>" class="pas-home-button-icon" sizes="(max-width: 479px) 31vw, 170px">
        <div class="pas-home-button-name">MESSAGES</div>
		  </a>
		<!-- Tags -->
      <?php if ($this->request->session()->read('Auth.User.role') == 1): ?>
        <a href="<?=$this->Url->build(['controller'=>'Tags','action'=>'index']);?>" class="pas-home-button-cont w-inline-block"><img src="<?=$this->Url->image('tag-menu.png')?>" class="pas-home-button-icon" sizes="(max-width: 479px) 31vw, 170px">
          <div class="pas-home-button-name">TAGS</div>
        </a>
      <?php endif; ?>
		<!-- Settings -->
		  <a href="#" class="pas-home-button-cont w-inline-block"><img src="<?=$this->Url->image('settings-menu.png')?>" class="pas-home-button-icon" sizes="(max-width: 479px) 31vw, 170px">
        <div class="pas-home-button-name">SETTINGS</div>
		  </a>
  </div>
</div>
</div>

