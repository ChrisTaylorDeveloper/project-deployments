<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Deployment Entity
 *
 * @property int $id
 * @property int $project_id
 * @property int $host_id
 * @property int $url_id
 * @property int $environment_id
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Project $project
 * @property \App\Model\Entity\Host $host
 * @property \App\Model\Entity\Url $url
 * @property \App\Model\Entity\Environment $environment
 */
class Deployment extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'project_id' => true,
        'host_id' => true,
        'url_id' => true,
        'environment_id' => true,
        'created' => true,
        'modified' => true,
        'project' => true,
        'host' => true,
        'url' => true,
        'environment' => true,
    ];
}
