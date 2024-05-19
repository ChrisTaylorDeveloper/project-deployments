<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DevelopersProject $developersProject
 * @var \Cake\Collection\CollectionInterface|string[] $developers
 * @var \Cake\Collection\CollectionInterface|string[] $projects
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Developers Projects'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="developersProjects form content">
            <?= $this->Form->create($developersProject) ?>
            <fieldset>
                <legend><?= __('Add Developers Project') ?></legend>
                <?php
                    echo $this->Form->control('local_code_folder');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
