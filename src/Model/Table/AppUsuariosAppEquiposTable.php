<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AppUsuariosAppEquipos Model
 *
 * @property \App\Model\Table\AppEquiposTable|\Cake\ORM\Association\BelongsTo $AppEquipos
 * @property \App\Model\Table\AppUsuariosTable|\Cake\ORM\Association\BelongsTo $AppUsuarios
 *
 * @method \App\Model\Entity\AppUsuariosAppEquipo get($primaryKey, $options = [])
 * @method \App\Model\Entity\AppUsuariosAppEquipo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AppUsuariosAppEquipo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AppUsuariosAppEquipo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppUsuariosAppEquipo|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppUsuariosAppEquipo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AppUsuariosAppEquipo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AppUsuariosAppEquipo findOrCreate($search, callable $callback = null, $options = [])
 */
class AppUsuariosAppEquiposTable extends Table
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

        $this->setTable('app_usuarios_app_equipos');
        $this->setDisplayField('app_equipo_id');
        $this->setPrimaryKey(['app_equipo_id', 'app_usuario_id']);

        $this->belongsTo('AppEquipos', [
            'foreignKey' => 'app_equipo_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('AppUsuarios', [
            'foreignKey' => 'app_usuario_id',
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
        $rules->add($rules->existsIn(['app_equipo_id'], 'AppEquipos'));
        $rules->add($rules->existsIn(['app_usuario_id'], 'AppUsuarios'));

        return $rules;
    }
}
