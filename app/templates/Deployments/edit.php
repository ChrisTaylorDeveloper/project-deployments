<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Deployment $deployment
 * @var string[]|\Cake\Collection\CollectionInterface $projects
 * @var string[]|\Cake\Collection\CollectionInterface $hosts
 * @var string[]|\Cake\Collection\CollectionInterface $urls
 * @var string[]|\Cake\Collection\CollectionInterface $environments
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $deployment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $deployment->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Deployments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="deployments form content">
            <?= $this->Form->create($deployment) ?>
            <fieldset>
                <legend><?= __('Edit Deployment') ?></legend>
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
