<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Protocol $protocol
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $protocol->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $protocol->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Protocols'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="protocols form content">
            <?= $this->Form->create($protocol) ?>
            <fieldset>
                <legend><?= __('Edit Protocol') ?></legend>
                <?php
                    echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
