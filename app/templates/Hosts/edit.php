<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Host $host
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $host->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $host->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Hosts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="hosts form content">
            <?= $this->Form->create($host) ?>
            <fieldset>
                <legend><?= __('Edit Host') ?></legend>
                <?php
                    echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
