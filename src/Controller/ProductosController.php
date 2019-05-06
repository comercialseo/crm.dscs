<?php
/**
 * =====================================================================
 * Controlador de Productos y Servicios del negocio en la App
 * =====================================================================
 * @author    ComercialSEO GrupoAltaEmpresas S.L.
 * @copyright 2019 ComercialSEO Todos los derechos resevados
 * @link      https://www.comercialseo.es Projects
 * @version   CakePHP/CRM.dscs.es v-1.01
 * @since     3.7
 * @property  \App\Model\Table\AppProductosTable $AppProductos
 * @method    \App\Model\Entity\AppProducto[]|
 * =====================================================================
*/
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;

/**
 * AppProductos Controller
 *
 *
 * @method \App\Model\Entity\AppDepartamento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductosController extends AppController
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

        $this->loadModel('AppProductos');
        $appProductos = $this->AppProductos->find('all', [
            'contain' => ['AppDepartamentos']
        ]);

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[Productos_Index]', [], ['ip' => true, 'referer' => true]);

        $appProducto = $this->AppProductos->newEntity();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appProducto = $this->AppProductos->patchEntity($appProducto, $this->request->getData());
            if ($this->AppProductos->save($appProducto)) {
                $this->Flash->success(__('El Producto se ha creado con éxito.'));

                $this->loadComponent('Logging.Log');
                $this->Log->info('RegBrouser', '[Productos_Crear]', [], ['ip' => true, 'referer' => true]);

                return $this->redirect(['action' => 'index']);
            }else {
                $this->Flash->error(__('No se ha podido crear el nuevo Cliente. Si el fallo persiste por favor, ponte en contacto con los administradores del sistema.'));

                $this->loadComponent('Logging.Log');
                $this->Log->error('RegBrouser', '[Productos_Crear]', [], ['ip' => true, 'referer' => true]);

            }
        }

        $appDepartamentos = $this->AppProductos->AppDepartamentos->find('list', [
                                                'keyField' => 'id',
                                                'valueField' => 'dp_departamento'
                                                ]);

        $this->set(compact('appProductos', 'appProducto', 'appDepartamentos'));
    }

    /**
     * View method
     *
     * @param string|null $id App Producto id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function ver($id = null)
    {
        $appProducto = $this->AppProductos->get($id, [
            'contain' => []
        ]);

        $this->set('appProducto', $appProducto);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function crear()
    {
        $this->loadModel('AppProductos');
        $appProducto = $this->AppProductos->newEntity();
        if ($this->request->is('post')) {
            $appProducto = $this->AppProductos->patchEntity($appProducto, $this->request->getData());
            if ($this->AppProductos->save($appProducto)) {
                $this->Flash->success(__('El Producto se ha creado con éxito.'));

                 $this->loadComponent('Logging.Log');
                 $this->Log->info('RegBrouser', '[Productos_Crear]', [], ['ip' => true, 'referer' => true]);

                return $this->redirect(['action' => 'index']);
            }else {
                $this->Flash->error(__('No se ha podido crear el nuevo Cliente. Si el fallo persiste por favor, ponte en contacto con los administradores del sistema.'));

                $this->loadComponent('Logging.Log');
                $this->Log->error('RegBrouser', '[Productos_Crear]', [], ['ip' => true, 'referer' => true]);

            }
        }

        $appDepartamentos = $this->AppProductos->AppDepartamentos->find('list', [
                                                'keyField' => 'id',
                                                'valueField' => 'dp_departamento'
                                                ]);

        $this->set(compact('appProducto', 'appDepartamentos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id App Producto id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function editar($id = null)
    {
        $this->loadModel('AppProductos');
        $appProducto = $this->AppProductos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appProducto = $this->AppProductos->patchEntity($appProducto, $this->request->getData());
            if ($this->AppProductos->save($appProducto)) {
                $this->Flash->success(__('Los datos del Producto se han actualizado con éxito.'));

                $this->loadComponent('Logging.Log');
                $this->Log->info('RegBrouser', '[Productos_Editar]', ['id' => $id], ['ip' => true, 'referer' => true]);

                return $this->redirect(['action' => 'index']);
            }else {
                $this->Flash->error(__('No se han actualizado los datos del Cliente. Si el fallo persiste por favor, ponte en contacto con los administradores del sistema.'));
                $this->loadComponent('Logging.Log');
                $this->Log->error('RegBrouser', '[Productos_Editar]', ['id' => $id], ['ip' => true, 'referer' => true]);
            }
            
        }

        $appDepartamentos = $this->AppProductos->AppDepartamentos->find('list', [
                                                'keyField' => 'id',
                                                'valueField' => 'dp_departamento'
                                                ]);

        $this->set(compact('appProducto', 'appDepartamentos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id App Producto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function borrar($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $appProducto = $this->AppProductos->get($id);
        if ($this->AppProductos->delete($appProducto)) {
            $this->Flash->success(__('The app producto has been deleted.'));
        } else {
            $this->Flash->error(__('The app producto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
