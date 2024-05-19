<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Project'), ['action' => 'edit', $project->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Project'), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Projects'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Project'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="projects view content">
            <h3><?= h($project->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Client') ?></th>
                    <td><?= $project->hasValue('client') ? $this->Html->link($project->client->name, ['controller' => 'Clients', 'action' => 'view', $project->client->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($project->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Git Repo') ?></th>
                    <td><?= h($project->git_repo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($project->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($project->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($project->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($project->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Developers') ?></h4>
                <?php if (!empty($project->developers)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($project->developers as $developer) : ?>
                        <tr>
                            <td><?= h($developer->id) ?></td>
                            <td><?= h($developer->name) ?></td>
                            <td><?= h($developer->created) ?></td>
                            <td><?= h($developer->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Developers', 'action' => 'view', $developer->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Developers', 'action' => 'edit', $developer->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Developers', 'action' => 'delete', $developer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $developer->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Deployments') ?></h4>
                <?php if (!empty($project->deployments)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Project Id') ?></th>
                            <th><?= __('Host Id') ?></th>
                            <th><?= __('Url Id') ?></th>
                            <th><?= __('Environment Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($project->deployments as $deployment) : ?>
                        <tr>
                            <td><?= h($deployment->id) ?></td>
                            <td><?= h($deployment->project_id) ?></td>
                            <td><?= h($deployment->host_id) ?></td>
                            <td><?= h($deployment->url_id) ?></td>
                            <td><?= h($deployment->environment_id) ?></td>
                            <td><?= h($deployment->created) ?></td>
                            <td><?= h($deployment->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Deployments', 'action' => 'view', $deployment->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Deployments', 'action' => 'edit', $deployment->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Deployments', 'action' => 'delete', $deployment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deployment->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
