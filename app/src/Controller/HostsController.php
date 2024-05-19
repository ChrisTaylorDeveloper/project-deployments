<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Hosts Controller
 *
 * @property \App\Model\Table\HostsTable $Hosts
 */
class HostsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Hosts->find();
        $hosts = $this->paginate($query);

        $this->set(compact('hosts'));
    }

    /**
     * View method
     *
     * @param string|null $id Host id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $host = $this->Hosts->get($id, contain: ['Deployments']);
        $this->set(compact('host'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $host = $this->Hosts->newEmptyEntity();
        if ($this->request->is('post')) {
            $host = $this->Hosts->patchEntity($host, $this->request->getData());
            if ($this->Hosts->save($host)) {
                $this->Flash->success(__('The host has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The host could not be saved. Please, try again.'));
        }
        $this->set(compact('host'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Host id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $host = $this->Hosts->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $host = $this->Hosts->patchEntity($host, $this->request->getData());
            if ($this->Hosts->save($host)) {
                $this->Flash->success(__('The host has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The host could not be saved. Please, try again.'));
        }
        $this->set(compact('host'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Host id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $host = $this->Hosts->get($id);
        if ($this->Hosts->delete($host)) {
            $this->Flash->success(__('The host has been deleted.'));
        } else {
            $this->Flash->error(__('The host could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
