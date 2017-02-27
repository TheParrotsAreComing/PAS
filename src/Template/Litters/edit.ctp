<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $litter->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $litter->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Litters'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cats'), ['controller' => 'Cats', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cat'), ['controller' => 'Cats', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="litters form large-9 medium-8 columns content">
    <?= $this->Form->create($litter) ?>
    <fieldset>
        <legend><?= __('Edit Litter') ?></legend>
        <?php
            echo $this->Form->input('kc_ref_id');
            echo $this->Form->input('litter_name');
            echo $this->Form->input('cat_count');
            echo $this->Form->input('kitten_count');
            echo $this->Form->input('dob', ['empty' => true]);
            echo $this->Form->input('asn_start', ['empty' => true]);
            echo $this->Form->input('asn_end', ['empty' => true]);
            echo $this->Form->input('est_arrival');
            echo $this->Form->input('breed');
            echo $this->Form->input('foster_notes');
            echo $this->Form->input('notes');
            echo $this->Form->input('is_deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
