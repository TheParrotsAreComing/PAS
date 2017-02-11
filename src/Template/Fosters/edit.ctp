<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $foster->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $foster->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Fosters'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cat Histories'), ['controller' => 'CatHistories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cat History'), ['controller' => 'CatHistories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cats'), ['controller' => 'Cats', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cat'), ['controller' => 'Cats', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fosters form large-9 medium-8 columns content">
    <?= $this->Form->create($foster) ?>
    <fieldset>
        <legend><?= __('Edit Foster') ?></legend>
        <?php
            echo $this->Form->input('first_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('phone');
            echo $this->Form->input('address');
            echo $this->Form->input('email');
            echo $this->Form->input('exp');
            echo $this->Form->input('pets');
            echo $this->Form->input('kids');
            echo $this->Form->input('avail');
            echo $this->Form->input('rating');
            echo $this->Form->input('notes');
            echo $this->Form->input('is_deleted');
            echo $this->Form->input('tags._ids', ['options' => $tags]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
