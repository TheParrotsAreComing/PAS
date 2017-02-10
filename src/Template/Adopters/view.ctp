<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Adopter'), ['action' => 'edit', $adopter->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Adopter'), ['action' => 'delete', $adopter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adopter->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Adopters'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adopter'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cat Histories'), ['controller' => 'CatHistories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cat History'), ['controller' => 'CatHistories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cats'), ['controller' => 'Cats', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cat'), ['controller' => 'Cats', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="adopters view large-9 medium-8 columns content">
    <h3><?= h($adopter->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($adopter->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($adopter->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($adopter->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($adopter->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($adopter->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($adopter->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cat Count') ?></th>
            <td><?= $this->Number->format($adopter->cat_count) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($adopter->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $adopter->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Notes') ?></h4>
        <?= $this->Text->autoParagraph(h($adopter->notes)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Cat Histories') ?></h4>
        <?php if (!empty($adopter->cat_histories)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Cat Id') ?></th>
                <th scope="col"><?= __('Adopter Id') ?></th>
                <th scope="col"><?= __('Foster Id') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('End Date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($adopter->cat_histories as $catHistories): ?>
            <tr>
                <td><?= h($catHistories->id) ?></td>
                <td><?= h($catHistories->cat_id) ?></td>
                <td><?= h($catHistories->adopter_id) ?></td>
                <td><?= h($catHistories->foster_id) ?></td>
                <td><?= h($catHistories->start_date) ?></td>
                <td><?= h($catHistories->end_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CatHistories', 'action' => 'view', $catHistories->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CatHistories', 'action' => 'edit', $catHistories->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CatHistories', 'action' => 'delete', $catHistories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $catHistories->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Cats') ?></h4>
        <?php if (!empty($adopter->cats)): ?>
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
                <th scope="col"><?= __('Breed') ?></th>
                <th scope="col"><?= __('Bio') ?></th>
                <th scope="col"><?= __('Caretaker Notes') ?></th>
                <th scope="col"><?= __('Medical Notes') ?></th>
                <th scope="col"><?= __('Profile Pic File Id') ?></th>
                <th scope="col"><?= __('Microchip Number') ?></th>
                <th scope="col"><?= __('Microchiped Date') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Adoption Fee Paid') ?></th>
                <th scope="col"><?= __('Is Deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($adopter->cats as $cats): ?>
            <tr>
                <td><?= h($cats->id) ?></td>
                <td><?= h($cats->litter_id) ?></td>
                <td><?= h($cats->adopter_id) ?></td>
                <td><?= h($cats->foster_id) ?></td>
                <td><?= h($cats->cat_name) ?></td>
                <td><?= h($cats->is_kitten) ?></td>
                <td><?= h($cats->dob) ?></td>
                <td><?= h($cats->is_female) ?></td>
                <td><?= h($cats->breed) ?></td>
                <td><?= h($cats->bio) ?></td>
                <td><?= h($cats->caretaker_notes) ?></td>
                <td><?= h($cats->medical_notes) ?></td>
                <td><?= h($cats->profile_pic_file_id) ?></td>
                <td><?= h($cats->microchip_number) ?></td>
                <td><?= h($cats->microchiped_date) ?></td>
                <td><?= h($cats->created) ?></td>
                <td><?= h($cats->adoption_fee_paid) ?></td>
                <td><?= h($cats->is_deleted) ?></td>
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
    <div class="related">
        <h4><?= __('Related Tags') ?></h4>
        <?php if (!empty($adopter->tags)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Label') ?></th>
                <th scope="col"><?= __('Color') ?></th>
                <th scope="col"><?= __('Type Bit') ?></th>
                <th scope="col"><?= __('Is Deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($adopter->tags as $tags): ?>
            <tr>
                <td><?= h($tags->id) ?></td>
                <td><?= h($tags->label) ?></td>
                <td><?= h($tags->color) ?></td>
                <td><?= h($tags->type_bit) ?></td>
                <td><?= h($tags->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Tags', 'action' => 'view', $tags->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tags', 'action' => 'edit', $tags->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tags', 'action' => 'delete', $tags->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tags->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
