<?php
/**
 * =====================================================================
 * Controlador de Equipos de Trabajo de la App
 * =====================================================================
 * @author    ComercialSEO GrupoAltaEmpresas S.L.
 * @copyright 2019 ComercialSEO Todos los derechos resevados
 * @link      https://www.comercialseo.es Projects
 * @version   CakePHP/CRM.dscs.es v-1.01
 * @since     3.7
 * @property  \App\Model\Table\AppEquiposTable $AppEquipos
 * @method    \App\Model\Entity\AppEquipo[]|
 * =====================================================================
*/
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;

/**
 * AppEquipos Controller
 *
 * @property \App\Model\Table\AppEquiposTable $AppEquipos
 *
 * @method \App\Model\Entity\AppEquipo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EquiposController extends AppController
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
        if(in_array($this->request->getParam('action'), ['index', 'ver', 'editar', 'crear', 'borrar', 'quitar']))
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
        $this->loadModel('AppEquipos');
        $appEquipos = $this->AppEquipos->find('all', [
            'contain' => ['AppUsuarios', 'AppDepartamentos']
        ]);
        $this->set(compact('appEquipos'));

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[Equipos_Index]', [], ['ip' => true, 'referer' => true]);
    }

    /**
     * View method
     *
     * @param string|null $id App Equipo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function ver($id = null)
    {
        $this->loadModel('AppEquipos');
        $appEquipo = $this->AppEquipos->get($id, [
            'contain' => ['AppUsuarios', 'AppDepartamentos']
        ]);

        $this->set('appEquipo', $appEquipo);

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[Equipos_Ver]', ['id' => $id], ['ip' => true, 'referer' => true]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function crear()
    {
        $this->loadModel('AppEquipos');

        //debug($this->request->getData());
        $appEquipo = $this->AppEquipos->newEntity();
        if ($this->request->is('post')) {
            $appEquipo = $this->AppEquipos->patchEntity($appEquipo, $this->request->getData());
            $appEquipo->app_usuarios_id = $this->request->data['app_usuarios_id'];
            if ($this->AppEquipos->save($appEquipo)) {
                $this->Flash->success(__('El Equipo se ha creado con éxito.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se ha podido crear el nuevo Equipo. Si el fallo persiste por favor, ponte en contacto con los administradores del sistema.'));
        }

        $appUsuarios = $this->AppEquipos->AppUsuarios->find('list', [
                                                'keyField' => 'id',
                                                'valueField' => 'us_usuario'
                                                ]);

        $appUsuariosLeader = $this->AppEquipos->AppUsuarios->find('list', [
                                                'keyField' => 'us_usuario',
                                                'valueField' => 'us_usuario'
                                                ]);

        $appDepartamentos = $this->AppEquipos->AppDepartamentos->find('list', [
                                                'keyField' => 'id',
                                                'valueField' => 'dp_departamento'
                                                ]);

        $this->set(compact('appEquipo', 'appUsuarios', 'appUsuariosLeader', 'appDepartamentos'));

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[Equipos_Crear]', [], ['ip' => true, 'referer' => true]);
    }

    /**
     * Edit method
     *
     * @param string|null $id App Equipo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function editar($id = null)
    {
        $this->loadModel('AppEquipos');
        $appEquipo = $this->AppEquipos->get($id, [
            'contain' => ['AppUsuarios', 'AppDepartamentos']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appEquipo = $this->AppEquipos->patchEntity($appEquipo, $this->request->getData());
            if ($this->AppEquipos->save($appEquipo)) {
                $this->Flash->success(__('Los datos del Equipo se han actualizado con éxito.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se han actualizado los datos del Equipo. Si el fallo persiste por favor, ponte en contacto con los administradores del sistema.'));
        }
        $appUsuarios = $this->AppEquipos->AppUsuarios->find('list', [
                                                'keyField' => 'id',
                                                'valueField' => 'us_usuario',
                                                'spacer' => '˓→ '
                                                ]);

        $appUsuariosLeader = $this->AppEquipos->AppUsuarios->find('list', [
                                                'keyField' => 'us_usuario',
                                                'valueField' => 'us_usuario'
                                                ]);

        $appDepartamentos = $this->AppEquipos->AppDepartamentos->find('list', [
                                                'keyField' => 'id',
                                                'valueField' => 'dp_departamento'
                                                ]);
        $this->set(compact('appEquipo', 'appUsuarios', 'appUsuariosLeader', 'appDepartamentos'));

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[Equipos_Editar]', ['id' => $id], ['ip' => true, 'referer' => true]);
    }

    public function quitar($idEq = null, $idUs = null)
    {
        $this->loadModel('AppUsuariosAppEquipos');
        $query = $this->AppUsuariosAppEquipos->find();
        $query->where(['app_equipo_id' => $idEq, 'app_usuario_id' => $idUs]);

        $nrow = $query->func()->count($query);
        if($nrow !== 0)
        {
            $queryDelete = $this->AppUsuariosAppEquipos->query();
            $delet = $queryDelete->delete()
                                 ->where(['app_equipo_id' => $idEq, 'app_usuario_id' => $idUs])
                                 ->execute();
            if($nrow !== 0)
            {
                $this->Flash->success(__('El Usuario ha salido del Equipo con éxito.'));
            }else {
                $this->Flash->error(__('Fallo al sacar al Usuario del Equipo, si el fallo continúa por favor, ponte en contacto con los administradores del sistema para que puedan solucionarlo.'));
            }                     
            
        }else {
            $this->Flash->error(__('No encontramos al Usuario dentro del Equipo, si crees que es un error por favor, ponte en contacto con los administradores del sistema.'));
        }

        return $this->redirect(['action' => 'index']);

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[Equipos_Quitar]', ['idEq' => $idEq, 'idUs' => $idUs], ['ip' => true, 'referer' => true]);
    }

    /**
     * Delete method
     *
     * @param string|null $id App Equipo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function borrar($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $appEquipo = $this->AppEquipos->get($id);
        if ($this->AppEquipos->delete($appEquipo)) {
            $this->Flash->success(__('El Equipo se ha borrado con éxito.'));
        } else {
            $this->Flash->error(__('No se ha podido borrar del sistema al Equipo. Si el fallo persiste por favor, ponte en contacto con los administradores del sistema.'));
        }

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[Equipos_Borrar]', ['id' => $id], ['ip' => true, 'referer' => true]);

        return $this->redirect(['action' => 'index']);
    }
}
