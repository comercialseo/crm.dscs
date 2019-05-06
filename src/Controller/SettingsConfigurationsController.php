<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SettingsConfigurations Controller
 *
 * @property \App\Model\Table\SettingsConfigurationsTable $SettingsConfigurations
 *
 * @method \App\Model\Entity\SettingsConfiguration[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SettingsConfigurationsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
    }

    public function beforeFilter(Event $event) 
    {
        parent::beforeFilter($event);
    }

    public function isAuthorized($usuarioActual)
    {
        if(isset($usuarioActual['us_rol']) && ($usuarioActual['us_rol'] == 'sa'))
        {
            if(in_array($this->request->getParam('action'), ['index', 'ver', 'crear', 'editar', 'borrar']))
            {
                return true;
            }
        }
        return parent::isAuthorized($usuarioActual);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {

        $this->loadModel('SettingsConfigurations');
        $appOpciones = $this->SettingsConfigurations->find('all');
        $this->set(compact('appOpciones'));
    }

    /**
     * View method
     *
     * @param string|null $id Settings Configuration id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $settingsConfiguration = $this->SettingsConfigurations->get($id, [
            'contain' => []
        ]);

        $this->set('settingsConfiguration', $settingsConfiguration);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $settingsConfiguration = $this->SettingsConfigurations->newEntity();
        if ($this->request->is('post')) {
            $settingsConfiguration = $this->SettingsConfigurations->patchEntity($settingsConfiguration, $this->request->getData());
            if ($this->SettingsConfigurations->save($settingsConfiguration)) {
                $this->Flash->success(__('The settings configuration has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The settings configuration could not be saved. Please, try again.'));
        }
        $this->set(compact('settingsConfiguration'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Settings Configuration id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $settingsConfiguration = $this->SettingsConfigurations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $settingsConfiguration = $this->SettingsConfigurations->patchEntity($settingsConfiguration, $this->request->getData());
            if ($this->SettingsConfigurations->save($settingsConfiguration)) {
                $this->Flash->success(__('The settings configuration has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The settings configuration could not be saved. Please, try again.'));
        }
        $this->set(compact('settingsConfiguration'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Settings Configuration id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $settingsConfiguration = $this->SettingsConfigurations->get($id);
        if ($this->SettingsConfigurations->delete($settingsConfiguration)) {
            $this->Flash->success(__('The settings configuration has been deleted.'));
        } else {
            $this->Flash->error(__('The settings configuration could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
