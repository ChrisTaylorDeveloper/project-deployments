<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DevelopersProjects Model
 *
 * @property \App\Model\Table\DevelopersTable&\Cake\ORM\Association\BelongsTo $Developers
 * @property \App\Model\Table\ProjectsTable&\Cake\ORM\Association\BelongsTo $Projects
 *
 * @method \App\Model\Entity\DevelopersProject newEmptyEntity()
 * @method \App\Model\Entity\DevelopersProject newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\DevelopersProject> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DevelopersProject get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\DevelopersProject findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\DevelopersProject patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\DevelopersProject> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\DevelopersProject|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\DevelopersProject saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\DevelopersProject>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DevelopersProject>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DevelopersProject>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DevelopersProject> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DevelopersProject>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DevelopersProject>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DevelopersProject>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DevelopersProject> deleteManyOrFail(iterable $entities, array $options = [])
 */
class DevelopersProjectsTable extends Table
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

        $this->setTable('developers_projects');
        $this->setDisplayField(['developer_id', 'project_id']);
        $this->setPrimaryKey(['developer_id', 'project_id']);

        $this->belongsTo('Developers', [
            'foreignKey' => 'developer_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id',
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
            ->scalar('local_code_folder')
            ->maxLength('local_code_folder', 255)
            ->allowEmptyString('local_code_folder');

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
        $rules->add($rules->existsIn(['developer_id'], 'Developers'), ['errorField' => 'developer_id']);
        $rules->add($rules->existsIn(['project_id'], 'Projects'), ['errorField' => 'project_id']);

        return $rules;
    }
}
