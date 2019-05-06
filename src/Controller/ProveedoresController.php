<?php
/**
 * =====================================================================
 * Controlador de Proveedores de la App
 * =====================================================================
 * @author    ComercialSEO GrupoAltaEmpresas S.L.
 * @copyright 2019 ComercialSEO Todos los derechos resevados
 * @link      https://www.comercialseo.es Projects
 * @version   CakePHP/CRM.dscs.es v-1.01
 * @since     3.7
 * @property  \App\Model\Table\AppProveedoresTable $AppProveedores
 * @method    \App\Model\Entity\AppProveedore[]|
 * =====================================================================
*/
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;

/**
 * AppProveedores Controller
 *
 * @property \App\Model\Table\AppProveedoresTable $AppProveedores
 *
 * @method \App\Model\Entity\AppProveedore[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProveedoresController extends AppController
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
        $this->loadModel('AppProveedores');
        $appProveedores = $this->AppProveedores->find('all', [
            'contain' => ['AppProveedoresTipos']
        ]);

        $appProveedore = $this->AppProveedores->newEntity();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appProveedore = $this->AppProveedores->patchEntity($appProveedore, $this->request->getData());
            if ($this->AppProveedores->save($appProveedore)) {

                $this->loadComponent('Logging.Log');
                $this->Log->info('RegBrouser', '[Proveedores_Crear]', [], ['ip' => true, 'referer' => true]);

                $this->Flash->success(__('El Proveedor se ha creado con éxito.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se ha podido crear el nuevo Proveedor. Si el fallo persiste por favor, ponte en contacto con los administradores del sistema.'));
        }
        $appProveedoresTipos = $this->AppProveedores->AppProveedoresTipos->find('list', 
                                            [
                                                'keyField' => 'id',
                                                'valueField' => 'pt_tipo'
                                            ]);

        $this->set(compact('appProveedores', 'appProveedore', 'appProveedoresTipos'));

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[Proveedores_Index]', [], ['ip' => true, 'referer' => true]);
    }

    /**
     * View method
     *
     * @param string|null $id App Proveedore id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function ver($id = null)
    {
        $this->loadModel('AppProveedores');
        $appProveedore = $this->AppProveedores->get($id, [
            'contain' => ['AppProveedoresTipos']
        ]);
        $this->set('appProveedore', $appProveedore);

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[Proveedores_Ver]', ['id' => $id], ['ip' => true, 'referer' => true]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function crear()
    {
        $this->loadModel('AppProveedores');
        $appProveedore = $this->AppProveedores->newEntity();
        if ($this->request->is('post')) {
            $appProveedore = $this->AppProveedores->patchEntity($appProveedore, $this->request->getData());
            if ($this->AppProveedores->save($appProveedore)) {
                $this->Flash->success(__('El Proveedor se ha creado con éxito.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se ha podido crear el nuevo Proveedor. Si el fallo persiste por favor, ponte en contacto con los administradores del sistema.'));
        }
        $appProveedoresTipos = $this->AppProveedores->AppProveedoresTipos->find('list', 
                                            [
                                                'keyField' => 'id',
                                                'valueField' => 'pt_tipo'
                                            ]);
        $this->set(compact('appProveedore', 'appProveedoresTipos'));

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[Proveedores_Crear]', [], ['ip' => true, 'referer' => true]);
    }

    /**
     * Edit method
     *
     * @param string|null $id App Proveedore id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function editar($id = null)
    {
        $this->loadModel('AppProveedores');
        $appProveedore = $this->AppProveedores->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appProveedore = $this->AppProveedores->patchEntity($appProveedore, $this->request->getData());
            if ($this->AppProveedores->save($appProveedore)) {
                $this->Flash->success(__('Los datos del Proveedor se han actualizado con éxito.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se han actualizado los datos del Proveedor. Si el fallo persiste por favor, ponte en contacto con los administradores del sistema.'));
        }
        $appProveedoresTipos = $this->AppProveedores->AppProveedoresTipos->find('list', 
                                            [
                                                'keyField' => 'id',
                                                'valueField' => 'pt_tipo'
                                            ]);
        $this->set(compact('appProveedore', 'appProveedoresTipos'));

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[Proveedores_Editar]', ['id' => $id], ['ip' => true, 'referer' => true]);
    }

    /**
     * Delete method
     *
     * @param string|null $id App Proveedore id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function borrar($id = null)
    {
        $this->loadModel('AppProveedores');
        $this->request->allowMethod(['post', 'delete']);
        $appProveedore = $this->AppProveedores->get($id);
        if ($this->AppProveedores->delete($appProveedore)) {
            $this->Flash->success(__('The app proveedore has been deleted.'));
        } else {
            $this->Flash->error(__('The app proveedore could not be deleted. Please, try again.'));
        }

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[Borrar_Ver]', ['id' => $id], ['ip' => true, 'referer' => true]);

        return $this->redirect(['action' => 'index']);
    }
}
