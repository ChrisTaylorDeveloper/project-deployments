<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Hosts Model
 *
 * @property \App\Model\Table\DeploymentsTable&\Cake\ORM\Association\HasMany $Deployments
 *
 * @method \App\Model\Entity\Host newEmptyEntity()
 * @method \App\Model\Entity\Host newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Host> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Host get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Host findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Host patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Host> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Host|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Host saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Host>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Host>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Host>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Host> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Host>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Host>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Host>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Host> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class HostsTable extends Table
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

        $this->setTable('hosts');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Deployments', [
            'foreignKey' => 'host_id',
        ]);
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
