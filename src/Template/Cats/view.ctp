<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cat'), ['action' => 'edit', $cat->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cat'), ['action' => 'delete', $cat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cat->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cats'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cat'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Litters'), ['controller' => 'Litters', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Litter'), ['controller' => 'Litters', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Adopters'), ['controller' => 'Adopters', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adopter'), ['controller' => 'Adopters', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fosters'), ['controller' => 'Fosters', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Foster'), ['controller' => 'Fosters', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cat Histories'), ['controller' => 'CatHistories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cat History'), ['controller' => 'CatHistories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Adoption Events'), ['controller' => 'AdoptionEvents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adoption Event'), ['controller' => 'AdoptionEvents', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cats view large-9 medium-8 columns content">
    <h3><?= h($cat->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Litter') ?></th>
            <td><?= $cat->has('litter') ? $this->Html->link($cat->litter->id, ['controller' => 'Litters', 'action' => 'view', $cat->litter->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adopter') ?></th>
            <td><?= $cat->has('adopter') ? $this->Html->link($cat->adopter->id, ['controller' => 'Adopters', 'action' => 'view', $cat->adopter->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Foster') ?></th>
            <td><?= $cat->has('foster') ? $this->Html->link($cat->foster->id, ['controller' => 'Fosters', 'action' => 'view', $cat->foster->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cat Name') ?></th>
            <td><?= h($cat->cat_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Breed') ?></th>
            <td><?= h($cat->breed) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('File') ?></th>
            <td><?= $cat->has('file') ? $this->Html->link($cat->file->id, ['controller' => 'Files', 'action' => 'view', $cat->file->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cat->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Microchip Number') ?></th>
            <td><?= $this->Number->format($cat->microchip_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dob') ?></th>
            <td><?= h($cat->dob) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Microchiped Date') ?></th>
            <td><?= h($cat->microchiped_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($cat->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adoption Fee Paid') ?></th>
            <td><?= $cat->adoption_fee_paid ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $cat->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Is Kitten') ?></h4>
        <?= $this->Text->autoParagraph(h($cat->is_kitten)); ?>
    </div>
    <div class="row">
        <h4><?= __('Is Female') ?></h4>
        <?= $this->Text->autoParagraph(h($cat->is_female)); ?>
    </div>
    <div class="row">
        <h4><?= __('Bio') ?></h4>
        <?= $this->Text->autoParagraph(h($cat->bio)); ?>
    </div>
    <div class="row">
        <h4><?= __('Caretaker Notes') ?></h4>
        <?= $this->Text->autoParagraph(h($cat->caretaker_notes)); ?>
    </div>
    <div class="row">
        <h4><?= __('Medical Notes') ?></h4>
        <?= $this->Text->autoParagraph(h($cat->medical_notes)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Cat Histories') ?></h4>
        <?php if (!empty($cat->cat_histories)): ?>
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
            <?php foreach ($cat->cat_histories as $catHistories): ?>
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
        <h4><?= __('Related Adoption Events') ?></h4>
        <?php if (!empty($cat->adoption_events)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Event Date') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Is Deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cat->adoption_events as $adoptionEvents): ?>
            <tr>
                <td><?= h($adoptionEvents->id) ?></td>
                <td><?= h($adoptionEvents->event_date) ?></td>
                <td><?= h($adoptionEvents->description) ?></td>
                <td><?= h($adoptionEvents->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AdoptionEvents', 'action' => 'view', $adoptionEvents->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AdoptionEvents', 'action' => 'edit', $adoptionEvents->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AdoptionEvents', 'action' => 'delete', $adoptionEvents->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adoptionEvents->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Tags') ?></h4>
        <?php if (!empty($cat->tags)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Label') ?></th>
                <th scope="col"><?= __('Color') ?></th>
                <th scope="col"><?= __('Type Bit') ?></th>
                <th scope="col"><?= __('Is Deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cat->tags as $tags): ?>
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
