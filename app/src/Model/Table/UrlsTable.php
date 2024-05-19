<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Urls Model
 *
 * @property \App\Model\Table\ProtocolsTable&\Cake\ORM\Association\BelongsTo $Protocols
 * @property \App\Model\Table\DomainsTable&\Cake\ORM\Association\BelongsTo $Domains
 * @property \App\Model\Table\DeploymentsTable&\Cake\ORM\Association\HasMany $Deployments
 *
 * @method \App\Model\Entity\Url newEmptyEntity()
 * @method \App\Model\Entity\Url newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Url> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Url get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Url findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Url patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Url> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Url|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Url saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Url>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Url>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Url>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Url> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Url>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Url>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Url>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Url> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UrlsTable extends Table
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

        $this->setTable('urls');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Protocols', [
            'foreignKey' => 'protocol_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Domains', [
            'foreignKey' => 'domain_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Deployments', [
            'foreignKey' => 'url_id',
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
            ->integer('protocol_id')
            ->notEmptyString('protocol_id');

        $validator
            ->integer('domain_id')
            ->notEmptyString('domain_id');

        $validator
            ->scalar('sub_domain')
            ->maxLength('sub_domain', 255)
            ->allowEmptyString('sub_domain');

        $validator
            ->integer('port')
            ->allowEmptyString('port');

        $validator
            ->scalar('path')
            ->maxLength('path', 255)
            ->allowEmptyString('path');

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
        $rules->add($rules->existsIn(['protocol_id'], 'Protocols'), ['errorField' => 'protocol_id']);
        $rules->add($rules->existsIn(['domain_id'], 'Domains'), ['errorField' => 'domain_id']);

        return $rules;
    }
}
