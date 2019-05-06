<?php
/**
 * =====================================================================
 * Controlador de Agendas de la App
 * =====================================================================
 * @author    ComercialSEO GrupoAltaEmpresas S.L.
 * @copyright 2019 ComercialSEO Todos los derechos resevados
 * @link      https://www.comercialseo.es Projects
 * @version   CakePHP/CRM.dscs.es v-1.01
 * @since     3.7
 * @property  \App\Model\Table\AppAgendasTable $AppAgendas
 * @method    \App\Model\Entity\AppAgenda[]|
 * =====================================================================
*/
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;

/**
 * AppAgenda Controller
 *
 * @property \App\Model\Table\AppAgendaTable $AppAgenda
 *
 * @method \App\Model\Entity\AppAgenda[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AgendasController extends AppController
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
    if(isset($usuarioActual['us_rol']) && ( 
        ($usuarioActual['us_rol'] == 'sa') || ($usuarioActual['us_rol'] == 'ad') 
    ))
    {
        if(in_array($this->request->getParam('action'), ['index', 'ver', 'editar', 'crear', 'borrar']))
        {
            return true;
        }
    }else 
    if(isset($usuarioActual['us_rol']) && ( 
    ($usuarioActual['us_rol'] == 'ed')
    ))
    {
        if(in_array($this->request->getParam('action'), ['index', 'ver', 'editar', 'crear']))
        {
            return true;
        }
    }else 
    if(isset($usuarioActual['us_rol']) && ( 
    ($usuarioActual['us_rol'] == 'au')
    ))
    {
        if(in_array($this->request->getParam('action'), ['index', 'ver', 'editar', 'crear']))
        {
            return true;
        }
    }if(isset($usuarioActual['us_rol']) && ( 
    ($usuarioActual['us_rol'] == 'us')
    ))
    {
        if(in_array($this->request->getParam('action'), ['index', 'ver']))
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
        $this->loadModel('AppAgendas');
        $usuarioid  = $this->Auth->user('id');
        $appAgendas = $this->AppAgendas->find('all', [
            'where' => 'AppAgencias.app_usuario_id = $usuarioid'
        ]);
        $this->set(compact('appAgendas'));

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[Agendas_Index]', [], ['ip' => true, 'referer' => true]);
    }

    /**
     * View method
     *
     * @param string|null $id App Agenda id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function ver($id = null)
    {
        $appAgenda = $this->AppAgenda->get($id, [
            'contain' => ['AppUsuarios']
        ]);

        $this->set('appAgenda', $appAgenda);

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[Agendas_Ver]', ['id' => $id], ['ip' => true, 'referer' => true]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function crear()
    {
        $this->loadModel('AppAgendas');
        $usuarioid = $this->Auth->user('id');
        $appAgenda = $this->AppAgendas->newEntity();
        if ($this->request->is('post')) {
            $appAgenda = $this->AppAgendas->patchEntity($appAgenda, $this->request->getData());
            $appAgenda->app_usuario_id = $usuarioid;
            if ($this->AppAgendas->save($appAgenda)) {
                $this->Flash->success(__('El Contacto se ha creado con éxito.'));

                $this->loadComponent('Logging.Log');
                $this->Log->info('RegBrouser', '[Agendas_Crear]', [], ['ip' => true, 'referer' => true]);

                return $this->redirect(['action' => 'index']);
            }else {
                $this->Flash->error(__('No se ha podido crear el nuevo Contacto. Si el fallo persiste por favor, ponte en contacto con los administradores del sistema.'));

                $this->loadComponent('Logging.Log');
                $this->Log->error('RegBrouser', '[Agendas_Crear]', [], ['ip' => true, 'referer' => true]);

            }
        }
        $this->set(compact('appAgenda'));
    }

    /**
     * Edit method
     *
     * @param string|null $id App Agenda id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function editar($id = null)
    {
        $appAgenda = $this->AppAgenda->get($id, [
            'contain' => ['Tags']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appAgenda = $this->AppAgenda->patchEntity($appAgenda, $this->request->getData());
            if ($this->AppAgenda->save($appAgenda)) {
                $this->Flash->success(__('Los datos de la Agenda se han actualizado con éxito.'));

                $this->loadComponent('Logging.Log');
                $this->Log->info('RegBrouser', '[Agendas_Editar]', ['id' => $id], ['ip' => true, 'referer' => true]);

                return $this->redirect(['action' => 'index']);
            }else {
                $this->Flash->error(__('No se han actualizado los datos de la Agenda. Si el fallo persiste por favor, ponte en contacto con los administradores del sistema.'));

                $this->loadComponent('Logging.Log');
                $this->Log->error('RegBrouser', '[Agendas_Editar]', ['id' => $id], ['ip' => true, 'referer' => true]);

            }
        }
        $appUsuarios = $this->AppAgenda->AppUsuarios->find('list', ['limit' => 200]);
        $this->set(compact('appAgenda', 'appUsuarios'));
    }

    /**
     * Delete method
     *
     * @param string|null $id App Agenda id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function borrar($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $appAgenda = $this->AppAgenda->get($id);
        if ($this->AppAgenda->delete($appAgenda)) {
            $this->Flash->success(__('The app agenda has been deleted.'));

            $this->loadComponent('Logging.Log');
            $this->Log->info('RegBrouser', '[Agendas_Borrar]', ['id' => $id], ['ip' => true, 'referer' => true]);


        } else {
            $this->Flash->error(__('The app agenda could not be deleted. Please, try again.'));

            $this->loadComponent('Logging.Log');
            $this->Log->error('RegBrouser', '[Agendas_Borrar]', ['id' => $id], ['ip' => true, 'referer' => true]);

        }
        return $this->redirect(['action' => 'index']);
    }
}
