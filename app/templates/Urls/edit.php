<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Url $url
 * @var string[]|\Cake\Collection\CollectionInterface $protocols
 * @var string[]|\Cake\Collection\CollectionInterface $domains
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $url->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $url->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Urls'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="urls form content">
            <?= $this->Form->create($url) ?>
            <fieldset>
                <legend><?= __('Edit Url') ?></legend>
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
