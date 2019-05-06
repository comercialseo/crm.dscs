<?php
/**
 * =====================================================================
 * Controlador de Tipos de Proveedores de la App
 * =====================================================================
 * @author    ComercialSEO GrupoAltaEmpresas S.L.
 * @copyright 2019 ComercialSEO Todos los derechos resevados
 * @link      https://www.comercialseo.es Projects
 * @version   CakePHP/CRM.dscs.es v-1.01
 * @since     3.7
 * @property  \App\Model\Table\AppProveedoresTiposTable $AppProveedoresTipos
 * @method    \App\Model\Entity\AppProveedoresTipo[]|
 * =====================================================================
*/
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;

/**
 * AppProveedoresTipos Controller
 *
 * @property \App\Model\Table\AppProveedoresTiposTable $AppProveedoresTipos
 *
 * @method \App\Model\Entity\AppProveedoresTipo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProveedoresTiposController extends AppController
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
        if(in_array($this->request->getParam('action'), ['index', 'ver', 'editar', 'crear', 'asignar', 'borrar']))
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
        $this->loadModel('AppProveedoresTipos');
        $appProveedoresTipos = $this->AppProveedoresTipos->find('all', [
            'contain' => ['AppProveedores']
        ]);
        $this->set(compact('appProveedoresTipos'));

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[ProveedoresTipos_Index]', [], ['ip' => true, 'referer' => true]);
    }

    /**
     * View method
     *
     * @param string|null $id App Proveedores Tipo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function ver($id = null)
    {
        $this->loadModel('AppProveedoresTipos');
        $appProveedoresTipo = $this->AppProveedoresTipos->get($id, [
            'contain' => ['AppProveedores']
        ]);
        $this->set('appProveedoresTipo', $appProveedoresTipo);

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[ProveedoresTipos_Ver]', ['id' => $id], ['ip' => true, 'referer' => true]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function crear()
    {
        $this->loadModel('AppProveedoresTipos');
        $appProveedoresTipo = $this->AppProveedoresTipos->newEntity();
        if ($this->request->is('post')) {
            $appProveedoresTipo = $this->AppProveedoresTipos->patchEntity($appProveedoresTipo, $this->request->getData());
            if ($this->AppProveedoresTipos->save($appProveedoresTipo)) {
                $this->Flash->success(__('El Tipo de Proveedor se ha creado con éxito.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se ha podido crear el nuevo Tipo de Proveedor. Si el fallo persiste por favor, ponte en contacto con los administradores del sistema.'));
        }
        $this->set(compact('appProveedoresTipo'));

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[ProveedoresTipos_Crear]', [], ['ip' => true, 'referer' => true]);
    }

    /**
     * Edit method
     *
     * @param string|null $id App Proveedores Tipo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function editar($id = null)
    {
        $appProveedoresTipo = $this->AppProveedoresTipos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appProveedoresTipo = $this->AppProveedoresTipos->patchEntity($appProveedoresTipo, $this->request->getData());
            if ($this->AppProveedoresTipos->save($appProveedoresTipo)) {
                $this->Flash->success(__('The app proveedores tipo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app proveedores tipo could not be saved. Please, try again.'));
        }
        $this->set(compact('appProveedoresTipo'));

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[ProveedoresTipos_Editar]', ['id' => $id], ['ip' => true, 'referer' => true]);
    }

    /**
     * Delete method
     *
     * @param string|null $id App Proveedores Tipo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function borrar($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $appProveedoresTipo = $this->AppProveedoresTipos->get($id);
        if ($this->AppProveedoresTipos->delete($appProveedoresTipo)) {
            $this->Flash->success(__('The app proveedores tipo has been deleted.'));
        } else {
            $this->Flash->error(__('The app proveedores tipo could not be deleted. Please, try again.'));
        }

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[ProveedoresTipos_Borrar]', ['id' => $id], ['ip' => true, 'referer' => true]);

        return $this->redirect(['action' => 'index']);
    }
}
