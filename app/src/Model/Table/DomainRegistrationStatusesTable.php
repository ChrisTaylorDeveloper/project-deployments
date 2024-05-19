<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DomainRegistrationStatuses Model
 *
 * @method \App\Model\Entity\DomainRegistrationStatus newEmptyEntity()
 * @method \App\Model\Entity\DomainRegistrationStatus newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\DomainRegistrationStatus> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DomainRegistrationStatus get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\DomainRegistrationStatus findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\DomainRegistrationStatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\DomainRegistrationStatus> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\DomainRegistrationStatus|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\DomainRegistrationStatus saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\DomainRegistrationStatus>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DomainRegistrationStatus>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DomainRegistrationStatus>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DomainRegistrationStatus> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DomainRegistrationStatus>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DomainRegistrationStatus>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DomainRegistrationStatus>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DomainRegistrationStatus> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DomainRegistrationStatusesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('domain_registration_statuses');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->allowEmptyString('name');

        return $validator;
    }
}
