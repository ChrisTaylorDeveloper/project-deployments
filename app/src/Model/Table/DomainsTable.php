<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Domains Model
 *
 * @property \App\Model\Table\RegistrarsTable&\Cake\ORM\Association\BelongsTo $Registrars
 * @property \App\Model\Table\UrlsTable&\Cake\ORM\Association\HasMany $Urls
 *
 * @method \App\Model\Entity\Domain newEmptyEntity()
 * @method \App\Model\Entity\Domain newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Domain> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Domain get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Domain findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Domain patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Domain> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Domain|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Domain saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Domain>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Domain>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Domain>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Domain> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Domain>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Domain>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Domain>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Domain> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DomainsTable extends Table
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

        $this->setTable('domains');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Registrars', [
            'foreignKey' => 'registrar_id',
        ]);
        $this->hasMany('Urls', [
            'foreignKey' => 'domain_id',
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
            ->integer('registrar_id')
            ->allowEmptyString('registrar_id');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->allowEmptyString('name');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['registrar_id'], 'Registrars'), ['errorField' => 'registrar_id']);

        return $rules;
    }
}
