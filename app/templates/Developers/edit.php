<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Developer $developer
 * @var string[]|\Cake\Collection\CollectionInterface $projects
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $developer->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $developer->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Developers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="developers form content">
            <?= $this->Form->create($developer) ?>
            <fieldset>
                <legend><?= __('Edit Developer') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('projects._ids', ['options' => $projects]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
