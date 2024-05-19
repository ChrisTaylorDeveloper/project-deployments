<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Registrars Model
 *
 * @property \App\Model\Table\DomainsTable&\Cake\ORM\Association\HasMany $Domains
 *
 * @method \App\Model\Entity\Registrar newEmptyEntity()
 * @method \App\Model\Entity\Registrar newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Registrar> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Registrar get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Registrar findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Registrar patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Registrar> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Registrar|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Registrar saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Registrar>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Registrar>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Registrar>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Registrar> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Registrar>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Registrar>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Registrar>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Registrar> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RegistrarsTable extends Table
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

        $this->setTable('registrars');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Domains', [
            'foreignKey' => 'registrar_id',
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
