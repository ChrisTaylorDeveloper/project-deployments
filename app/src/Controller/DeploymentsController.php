<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Deployments Controller
 *
 * @property \App\Model\Table\DeploymentsTable $Deployments
 */
class DeploymentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Deployments->find()
            ->contain(
                [
                    'Projects',
                    'Hosts',
                    'Urls' => ['Protocols', 'Domains'],
                    'Environments'
                ]
            );

        $deployments = $this->paginate($query);

        $this->set(compact('deployments'));
    }

    /**
     * View method
     *
     * @param string|null $id Deployment id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $deployment = $this->Deployments->get($id, contain: ['Projects', 'Hosts', 'Urls', 'Environments']);
        $this->set(compact('deployment'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $deployment = $this->Deployments->newEmptyEntity();
        if ($this->request->is('post')) {
            $deployment = $this->Deployments->patchEntity($deployment, $this->request->getData());
            if ($this->Deployments->save($deployment)) {
                $this->Flash->success(__('The deployment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The deployment could not be saved. Please, try again.'));
        }
        $projects = $this->Deployments->Projects->find('list', limit: 200)->all();
        $hosts = $this->Deployments->Hosts->find('list', limit: 200)->all();
        $urls = $this->Deployments->Urls->find('list', limit: 200)->all();
        $environments = $this->Deployments->Environments->find('list', limit: 200)->all();
        $this->set(compact('deployment', 'projects', 'hosts', 'urls', 'environments'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Deployment id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $deployment = $this->Deployments->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $deployment = $this->Deployments->patchEntity($deployment, $this->request->getData());
            if ($this->Deployments->save($deployment)) {
                $this->Flash->success(__('The deployment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The deployment could not be saved. Please, try again.'));
        }
        $projects = $this->Deployments->Projects->find('list', limit: 200)->all();
        $hosts = $this->Deployments->Hosts->find('list', limit: 200)->all();
        $urls = $this->Deployments->Urls->find('list', limit: 200)->all();
        $environments = $this->Deployments->Environments->find('list', limit: 200)->all();
        $this->set(compact('deployment', 'projects', 'hosts', 'urls', 'environments'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Deployment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $deployment = $this->Deployments->get($id);
        if ($this->Deployments->delete($deployment)) {
            $this->Flash->success(__('The deployment has been deleted.'));
        } else {
            $this->Flash->error(__('The deployment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
