<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DomainRegistrationStatus $domainRegistrationStatus
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Domain Registration Status'), ['action' => 'edit', $domainRegistrationStatus->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Domain Registration Status'), ['action' => 'delete', $domainRegistrationStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $domainRegistrationStatus->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Domain Registration Statuses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Domain Registration Status'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="domainRegistrationStatuses view content">
            <h3><?= h($domainRegistrationStatus->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($domainRegistrationStatus->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($domainRegistrationStatus->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($domainRegistrationStatus->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($domainRegistrationStatus->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
