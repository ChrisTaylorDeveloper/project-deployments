<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Url $url
 * @var \Cake\Collection\CollectionInterface|string[] $protocols
 * @var \Cake\Collection\CollectionInterface|string[] $domains
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Urls'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="urls form content">
            <?= $this->Form->create($url) ?>
            <fieldset>
                <legend><?= __('Add Url') ?></legend>
                <?php
                    echo $this->Form->control('protocol_id', ['options' => $protocols]);
                    echo $this->Form->control('domain_id', ['options' => $domains]);
                    echo $this->Form->control('sub_domain');
                    echo $this->Form->control('port');
                    echo $this->Form->control('path');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
