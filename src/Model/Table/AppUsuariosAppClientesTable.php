<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AppUsuariosAppClientes Model
 *
 * @property \App\Model\Table\AppClientesTable|\Cake\ORM\Association\BelongsTo $AppClientes
 * @property \App\Model\Table\AppUsuariosTable|\Cake\ORM\Association\BelongsTo $AppUsuarios
 *
 * @method \App\Model\Entity\AppUsuariosAppCliente get($primaryKey, $options = [])
 * @method \App\Model\Entity\AppUsuariosAppCliente newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AppUsuariosAppCliente[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AppUsuariosAppCliente|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppUsuariosAppCliente|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppUsuariosAppCliente patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AppUsuariosAppCliente[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AppUsuariosAppCliente findOrCreate($search, callable $callback = null, $options = [])
 */
class AppUsuariosAppClientesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('app_usuarios_app_clientes');
        $this->setDisplayField('app_cliente_id');
        $this->setPrimaryKey(['app_cliente_id', 'app_usuarios_id']);

        $this->belongsTo('AppClientes', [
            'foreignKey' => 'app_cliente_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('AppUsuarios', [
            'foreignKey' => 'app_usuarios_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['app_cliente_id'], 'AppClientes'));
        $rules->add($rules->existsIn(['app_usuarios_id'], 'AppUsuarios'));

        return $rules;
    }
}
