<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Url Entity
 *
 * @property int $id
 * @property int $protocol_id
 * @property int $domain_id
 * @property string|null $sub_domain
 * @property int|null $port
 * @property string|null $path
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Protocol $protocol
 * @property \App\Model\Entity\Domain $domain
 * @property \App\Model\Entity\Deployment[] $deployments
 */
class Url extends Entity
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
        'protocol_id' => true,
        'domain_id' => true,
        'sub_domain' => true,
        'port' => true,
        'path' => true,
        'created' => true,
        'modified' => true,
        'protocol' => true,
        'domain' => true,
        'deployments' => true,
    ];
}
