<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ambiences Controller
 *
 * @property \App\Model\Table\AmbiencesTable $Ambiences
 */
class AmbiencesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $ambiences = $this->paginate($this->Ambiences);

        $this->set(compact('ambiences'));
        $this->set('_serialize', ['ambiences']);
    }

    /**
     * View method
     *
     * @param string|null $id Ambience id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ambience = $this->Ambiences->get($id, [
            'contain' => ['Recipes']
        ]);

        $this->set('ambience', $ambience);
        $this->set('_serialize', ['ambience']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ambience = $this->Ambiences->newEntity();
        if ($this->request->is('post')) {
            $ambience = $this->Ambiences->patchEntity($ambience, $this->request->data);
            if ($this->Ambiences->save($ambience)) {
                $this->Flash->success(__('The ambience has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ambience could not be saved. Please, try again.'));
            }
        }
        $recipes = $this->Ambiences->Recipes->find('list', ['limit' => 200]);
        $this->set(compact('ambience', 'recipes'));
        $this->set('_serialize', ['ambience']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ambience id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ambience = $this->Ambiences->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ambience = $this->Ambiences->patchEntity($ambience, $this->request->data);
            if ($this->Ambiences->save($ambience)) {
                $this->Flash->success(__('The ambience has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ambience could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('ambience'));
        $this->set('_serialize', ['ambience']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ambience id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ambience = $this->Ambiences->get($id);
        if ($this->Ambiences->delete($ambience)) {
            $this->Flash->success(__('The ambience has been deleted.'));
        } else {
            $this->Flash->error(__('The ambience could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
