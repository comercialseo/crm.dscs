<?php
/**
 * =====================================================================
 * Controlador de Test de la App
 * =====================================================================
 * @author    ComercialSEO GrupoAltaEmpresas S.L.
 * @copyright 2019 ComercialSEO Todos los derechos resevados
 * @link      https://www.comercialseo.es Projects
 * @version   CakePHP/CRM.dscs.es v-1.01
 * @since     3.7
 * @property  \App\Model\Table\App__________Table $App_________
 * @method    \App\Model\Entity\App__________[]|
 * =====================================================================
*/
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;

/**
 * AppTest Controller
 *
 * @property \App\Model\Table\AppUsuariosTable $AppUsuarios
 *
 * @method \App\Model\Entity\AppUsuario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TestController extends AppController
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
            if(in_array($this->request->getParam('action'), ['index', 'tmodals', 'tablauno']))
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

    }

    public function tmodals()
    {

    }

    public function tablauno()
    {

    }
}
