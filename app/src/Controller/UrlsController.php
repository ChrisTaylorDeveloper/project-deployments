<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Urls Controller
 *
 * @property \App\Model\Table\UrlsTable $Urls
 */
class UrlsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Urls->find()
            ->contain(['Protocols', 'Domains']);
        $urls = $this->paginate($query);

        $this->set(compact('urls'));
    }

    /**
     * View method
     *
     * @param string|null $id Url id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $url = $this->Urls->get($id, contain: ['Protocols', 'Domains', 'Deployments']);
        $this->set(compact('url'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $url = $this->Urls->newEmptyEntity();
        if ($this->request->is('post')) {
            $url = $this->Urls->patchEntity($url, $this->request->getData());
            if ($this->Urls->save($url)) {
                $this->Flash->success(__('The url has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The url could not be saved. Please, try again.'));
        }
        $protocols = $this->Urls->Protocols->find('list', limit: 200)->all();
        $domains = $this->Urls->Domains->find('list', limit: 200)->all();
        $this->set(compact('url', 'protocols', 'domains'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Url id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $url = $this->Urls->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $url = $this->Urls->patchEntity($url, $this->request->getData());
            if ($this->Urls->save($url)) {
                $this->Flash->success(__('The url has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The url could not be saved. Please, try again.'));
        }
        $protocols = $this->Urls->Protocols->find('list', limit: 200)->all();
        $domains = $this->Urls->Domains->find('list', limit: 200)->all();
        $this->set(compact('url', 'protocols', 'domains'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Url id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $url = $this->Urls->get($id);
        if ($this->Urls->delete($url)) {
            $this->Flash->success(__('The url has been deleted.'));
        } else {
            $this->Flash->error(__('The url could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
