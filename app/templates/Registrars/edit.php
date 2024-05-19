<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Registrar $registrar
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $registrar->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $registrar->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Registrars'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="registrars form content">
            <?= $this->Form->create($registrar) ?>
            <fieldset>
                <legend><?= __('Edit Registrar') ?></legend>
                <?php
                    echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
