<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DevelopersProjectsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DevelopersProjectsTable Test Case
 */
class DevelopersProjectsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DevelopersProjectsTable
     */
    protected $DevelopersProjects;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.DevelopersProjects',
        'app.Developers',
        'app.Projects',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('DevelopersProjects') ? [] : ['className' => DevelopersProjectsTable::class];
        $this->DevelopersProjects = $this->getTableLocator()->get('DevelopersProjects', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->DevelopersProjects);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DevelopersProjectsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\DevelopersProjectsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
