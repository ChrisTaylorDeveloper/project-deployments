<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Deployments Model
 *
 * @property \App\Model\Table\ProjectsTable&\Cake\ORM\Association\BelongsTo $Projects
 * @property \App\Model\Table\HostsTable&\Cake\ORM\Association\BelongsTo $Hosts
 * @property \App\Model\Table\UrlsTable&\Cake\ORM\Association\BelongsTo $Urls
 * @property \App\Model\Table\EnvironmentsTable&\Cake\ORM\Association\BelongsTo $Environments
 *
 * @method \App\Model\Entity\Deployment newEmptyEntity()
 * @method \App\Model\Entity\Deployment newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Deployment> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Deployment get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Deployment findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Deployment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Deployment> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Deployment|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Deployment saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Deployment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Deployment>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Deployment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Deployment> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Deployment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Deployment>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Deployment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Deployment> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DeploymentsTable extends Table
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

        $this->setTable('deployments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Hosts', [
            'foreignKey' => 'host_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Urls', [
            'foreignKey' => 'url_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Environments', [
            'foreignKey' => 'environment_id',
            'joinType' => 'INNER',
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
            ->integer('project_id')
            ->notEmptyString('project_id');

        $validator
            ->integer('host_id')
            ->notEmptyString('host_id');

        $validator
            ->integer('url_id')
            ->notEmptyString('url_id');

        $validator
            ->integer('environment_id')
            ->notEmptyString('environment_id');

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
        $rules->add($rules->existsIn(['project_id'], 'Projects'), ['errorField' => 'project_id']);
        $rules->add($rules->existsIn(['host_id'], 'Hosts'), ['errorField' => 'host_id']);
        $rules->add($rules->existsIn(['url_id'], 'Urls'), ['errorField' => 'url_id']);
        $rules->add($rules->existsIn(['environment_id'], 'Environments'), ['errorField' => 'environment_id']);

        return $rules;
    }
}
