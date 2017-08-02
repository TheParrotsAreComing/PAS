	
	<div class="profile-text-header">Cat/Kitten History</div>
			<?php foreach ($catHistories as $catHistory): ?>
				<?php if(!empty($catHistory->adopter)): ?>
					<div class="profile-field-cont">
						<div class="profile-field-name">Adopter</div>
					</div>
					<div class="card-cont card-wrapper w-dyn-item">
						<a class="card w-clearfix w-inline-block" href="<?= $this->Url->build(['controller'=>'adopters', 'action'=>'view', $catHistory->adopter->id], ['escape'=>false]);?>">
						<div class="card-pic-cont">
							<img class="card-pic" src="<?= $this->Url->image('adopter-menu.png'); ?>">
						</div>
							<div class="card-h1"><?= h($catHistory->adopter->first_name)." ".h($catHistory->adopter->last_name) ?></div>
							<div class="card-field-wrap">
								<div class="card-field-cont left-justify">
									<div class="card-h3">From:</div>
									<div class="card-field-text"><?= h($catHistory->start_date) ?></div>
									<div class="card-h3">&nbsp;&nbsp;To:</div>
									<div class="card-field-text"><?= h($catHistory->end_date) ?></div>
								</div>
								<div class="card-field-cont left-justify">
									<div class="card-h3">Phone:</div>
									<div class="card-field-text"><?= h($catHistory->adopter->phone) ?></div>
								</div>
								<div class="card-field-cont left-justify">
									<div class="card-h3">Email:</div>
									<div class="card-field-text"><?= h($catHistory->adopter->email) ?></div>
								</div>
							</div>
						</a>
					</div>
				<?php endif; ?>
				<?php if(!empty($catHistory->foster)): ?>
					<div class="profile-field-cont">
						<div class="profile-field-name">Foster</div>
					</div>
					<div class="card-cont card-wrapper w-dyn-item">
						<a class="card w-clearfix w-inline-block" href="<?= $this->Url->build(['controller'=>'fosters', 'action'=>'view', $catHistory->foster->id], ['escape'=>false]);?>">
						<div class="card-pic-cont">
							<img class="card-pic" src="<?= $this->Url->image('foster-menu.png'); ?>">
						</div>
							<div class="card-h1"><?= h($catHistory->foster->first_name)." ".h($catHistory->foster->last_name) ?></div>
							<div>
								<div class="card-h2">From:</div>
								<div class="card-h2"><?= h($catHistory->start_date) ?></div>
								<div class="card-h2">&nbsp;&nbsp;To:</div>
								<div class="card-h2"><?= h($catHistory->end_date) ?></div>
							</div>
							<div class="card-field-wrap">
								<div class="card-field-cont left-justify">
									<div class="card-h3">Phone:</div>
									<div class="card-field-text"><?= h($catHistory->foster->phone) ?></div>
								</div>
								<div class="card-field-cont left-justify">
									<div class="card-h3">Email:</div>
									<div class="card-field-text"><?= h($catHistory->foster->email) ?></div>
								</div>
							</div>
						</a>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>