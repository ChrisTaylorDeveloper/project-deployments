<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * DevelopersProjects Controller
 *
 * @property \App\Model\Table\DevelopersProjectsTable $DevelopersProjects
 */
class DevelopersProjectsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->DevelopersProjects->find()
            ->contain(['Developers', 'Projects']);
        $developersProjects = $this->paginate($query);

        $this->set(compact('developersProjects'));
    }

    /**
     * View method
     *
     * @param string|null $id Developers Project id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $developersProject = $this->DevelopersProjects->get($id, contain: ['Developers', 'Projects']);
        $this->set(compact('developersProject'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $developersProject = $this->DevelopersProjects->newEmptyEntity();
        if ($this->request->is('post')) {
            $developersProject = $this->DevelopersProjects->patchEntity($developersProject, $this->request->getData());
            if ($this->DevelopersProjects->save($developersProject)) {
                $this->Flash->success(__('The developers project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The developers project could not be saved. Please, try again.'));
        }
        $developers = $this->DevelopersProjects->Developers->find('list', limit: 200)->all();
        $projects = $this->DevelopersProjects->Projects->find('list', limit: 200)->all();
        $this->set(compact('developersProject', 'developers', 'projects'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Developers Project id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $developersProject = $this->DevelopersProjects->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $developersProject = $this->DevelopersProjects->patchEntity($developersProject, $this->request->getData());
            if ($this->DevelopersProjects->save($developersProject)) {
                $this->Flash->success(__('The developers project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The developers project could not be saved. Please, try again.'));
        }
        $developers = $this->DevelopersProjects->Developers->find('list', limit: 200)->all();
        $projects = $this->DevelopersProjects->Projects->find('list', limit: 200)->all();
        $this->set(compact('developersProject', 'developers', 'projects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Developers Project id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $developersProject = $this->DevelopersProjects->get($id);
        if ($this->DevelopersProjects->delete($developersProject)) {
            $this->Flash->success(__('The developers project has been deleted.'));
        } else {
            $this->Flash->error(__('The developers project could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
