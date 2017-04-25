<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Adoption Event'), ['action' => 'edit', $adoptionEvent->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Adoption Event'), ['action' => 'delete', $adoptionEvent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adoptionEvent->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Adoption Events'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adoption Event'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users Events'), ['controller' => 'UsersEvents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Users Event'), ['controller' => 'UsersEvents', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cats'), ['controller' => 'Cats', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cat'), ['controller' => 'Cats', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="adoptionEvents view large-9 medium-8 columns content">
    <h3><?= h($adoptionEvent->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($adoptionEvent->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Event Date') ?></th>
            <td><?= h($adoptionEvent->event_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $adoptionEvent->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($adoptionEvent->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Users Events') ?></h4>
        <?php if (!empty($adoptionEvent->users_events)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Adoption Event Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($adoptionEvent->users_events as $usersEvents): ?>
            <tr>
                <td><?= h($usersEvents->id) ?></td>
                <td><?= h($usersEvents->user_id) ?></td>
                <td><?= h($usersEvents->adoption_event_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UsersEvents', 'action' => 'view', $usersEvents->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UsersEvents', 'action' => 'edit', $usersEvents->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UsersEvents', 'action' => 'delete', $usersEvents->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersEvents->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Cats') ?></h4>
        <?php if (!empty($adoptionEvent->cats)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Litter Id') ?></th>
                <th scope="col"><?= __('Adopter Id') ?></th>
                <th scope="col"><?= __('Foster Id') ?></th>
                <th scope="col"><?= __('Cat Name') ?></th>
                <th scope="col"><?= __('Is Kitten') ?></th>
                <th scope="col"><?= __('Dob') ?></th>
                <th scope="col"><?= __('Is Female') ?></th>
                <th scope="col"><?= __('Breed Id') ?></th>
                <th scope="col"><?= __('Color') ?></th>
                <th scope="col"><?= __('Coat') ?></th>
                <th scope="col"><?= __('Bio') ?></th>
                <th scope="col"><?= __('Diet') ?></th>
                <th scope="col"><?= __('Specialty Notes') ?></th>
                <th scope="col"><?= __('Profile Pic File Id') ?></th>
                <th scope="col"><?= __('Microchip Number') ?></th>
                <th scope="col"><?= __('Is Microchip Registered') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Adoption Fee Amount') ?></th>
                <th scope="col"><?= __('Is Paws') ?></th>
                <th scope="col"><?= __('Is Deleted') ?></th>
                <th scope="col"><?= __('Is Exported To Adoptapet') ?></th>
                <th scope="col"><?= __('Good With Kids') ?></th>
                <th scope="col"><?= __('Good With Dogs') ?></th>
                <th scope="col"><?= __('Good With Cats') ?></th>
                <th scope="col"><?= __('Special Needs') ?></th>
                <th scope="col"><?= __('Needs Experienced Adopter') ?></th>
                <th scope="col"><?= __('Is Deceased') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($adoptionEvent->cats as $cats): ?>
            <tr>
                <td><?= h($cats->id) ?></td>
                <td><?= h($cats->litter_id) ?></td>
                <td><?= h($cats->adopter_id) ?></td>
                <td><?= h($cats->foster_id) ?></td>
                <td><?= h($cats->cat_name) ?></td>
                <td><?= h($cats->is_kitten) ?></td>
                <td><?= h($cats->dob) ?></td>
                <td><?= h($cats->is_female) ?></td>
                <td><?= h($cats->breed_id) ?></td>
                <td><?= h($cats->color) ?></td>
                <td><?= h($cats->coat) ?></td>
                <td><?= h($cats->bio) ?></td>
                <td><?= h($cats->diet) ?></td>
                <td><?= h($cats->specialty_notes) ?></td>
                <td><?= h($cats->profile_pic_file_id) ?></td>
                <td><?= h($cats->microchip_number) ?></td>
                <td><?= h($cats->is_microchip_registered) ?></td>
                <td><?= h($cats->created) ?></td>
                <td><?= h($cats->adoption_fee_amount) ?></td>
                <td><?= h($cats->is_paws) ?></td>
                <td><?= h($cats->is_deleted) ?></td>
                <td><?= h($cats->is_exported_to_adoptapet) ?></td>
                <td><?= h($cats->good_with_kids) ?></td>
                <td><?= h($cats->good_with_dogs) ?></td>
                <td><?= h($cats->good_with_cats) ?></td>
                <td><?= h($cats->special_needs) ?></td>
                <td><?= h($cats->needs_experienced_adopter) ?></td>
                <td><?= h($cats->is_deceased) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Cats', 'action' => 'view', $cats->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Cats', 'action' => 'edit', $cats->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cats', 'action' => 'delete', $cats->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cats->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
