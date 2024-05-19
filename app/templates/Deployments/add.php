<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Deployment $deployment
 * @var \Cake\Collection\CollectionInterface|string[] $projects
 * @var \Cake\Collection\CollectionInterface|string[] $hosts
 * @var \Cake\Collection\CollectionInterface|string[] $urls
 * @var \Cake\Collection\CollectionInterface|string[] $environments
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Deployments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="deployments form content">
            <?= $this->Form->create($deployment) ?>
            <fieldset>
                <legend><?= __('Add Deployment') ?></legend>
                <?php
                    echo $this->Form->control('project_id', ['options' => $projects]);
                    echo $this->Form->control('host_id', ['options' => $hosts]);
                    echo $this->Form->control('url_id', ['options' => $urls]);
                    echo $this->Form->control('environment_id', ['options' => $environments]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
