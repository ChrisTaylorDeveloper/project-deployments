<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Developers Model
 *
 * @property \App\Model\Table\ProjectsTable&\Cake\ORM\Association\BelongsToMany $Projects
 *
 * @method \App\Model\Entity\Developer newEmptyEntity()
 * @method \App\Model\Entity\Developer newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Developer> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Developer get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Developer findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Developer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Developer> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Developer|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Developer saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Developer>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Developer>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Developer>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Developer> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Developer>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Developer>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Developer>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Developer> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DevelopersTable extends Table
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

        $this->setTable('developers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Projects', [
            'foreignKey' => 'developer_id',
            'targetForeignKey' => 'project_id',
            'joinTable' => 'developers_projects',
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
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }
}
