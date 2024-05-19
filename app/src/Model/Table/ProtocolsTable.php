<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Protocols Model
 *
 * @property \App\Model\Table\UrlsTable&\Cake\ORM\Association\HasMany $Urls
 *
 * @method \App\Model\Entity\Protocol newEmptyEntity()
 * @method \App\Model\Entity\Protocol newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Protocol> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Protocol get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Protocol findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Protocol patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Protocol> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Protocol|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Protocol saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Protocol>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Protocol>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Protocol>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Protocol> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Protocol>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Protocol>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Protocol>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Protocol> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProtocolsTable extends Table
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

        $this->setTable('protocols');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Urls', [
            'foreignKey' => 'protocol_id',
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
