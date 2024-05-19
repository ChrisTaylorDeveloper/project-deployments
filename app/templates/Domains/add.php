<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Domain $domain
 * @var \Cake\Collection\CollectionInterface|string[] $registrars
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Domains'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="domains form content">
            <?= $this->Form->create($domain) ?>
            <fieldset>
                <legend><?= __('Add Domain') ?></legend>
                <?php
                    echo $this->Form->control('registrar_id', ['options' => $registrars, 'empty' => true]);
                    echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
