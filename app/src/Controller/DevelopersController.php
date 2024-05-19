<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Developers Controller
 *
 * @property \App\Model\Table\DevelopersTable $Developers
 */
class DevelopersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Developers->find();
        $developers = $this->paginate($query);

        $this->set(compact('developers'));
    }

    /**
     * View method
     *
     * @param string|null $id Developer id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $developer = $this->Developers->get($id, contain: ['Projects']);
        $this->set(compact('developer'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $developer = $this->Developers->newEmptyEntity();
        if ($this->request->is('post')) {
            $developer = $this->Developers->patchEntity($developer, $this->request->getData());
            if ($this->Developers->save($developer)) {
                $this->Flash->success(__('The developer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The developer could not be saved. Please, try again.'));
        }
        $projects = $this->Developers->Projects->find('list', limit: 200)->all();
        $this->set(compact('developer', 'projects'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Developer id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $developer = $this->Developers->get($id, contain: ['Projects']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $developer = $this->Developers->patchEntity($developer, $this->request->getData());
            if ($this->Developers->save($developer)) {
                $this->Flash->success(__('The developer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The developer could not be saved. Please, try again.'));
        }
        $projects = $this->Developers->Projects->find('list', limit: 200)->all();
        $this->set(compact('developer', 'projects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Developer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $developer = $this->Developers->get($id);
        if ($this->Developers->delete($developer)) {
            $this->Flash->success(__('The developer has been deleted.'));
        } else {
            $this->Flash->error(__('The developer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
