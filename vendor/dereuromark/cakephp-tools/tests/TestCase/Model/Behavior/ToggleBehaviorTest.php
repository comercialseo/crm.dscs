<?php

namespace Tools\Test\TestCase\Model\Behavior;

use Cake\ORM\TableRegistry;
use Tools\TestSuite\TestCase;

class ToggleBehaviorTest extends TestCase {

	/**
	 * @var array
	 */
	public $fixtures = [
		'plugin.tools.toggle_addresses'
	];

	/**
	 * @var \Tools\Model\Table\Table|\Tools\Model\Behavior\ToggleBehavior
	 */
	public $Addresses;

	/**
	 * @return void
	 */
	public function setUp() {
		parent::setUp();

		$this->Addresses = TableRegistry::get('ToggleAddresses');
		$this->Addresses->addBehavior('Tools.Toggle', ['scopeFields' => 'category_id']);
	}

	/**
	 * @return void
	 */
	public function testSaveBasic() {
		$data = [
			'name' => 'Foo Bar',
			'category_id' => 2,
		];

		$entity = $this->Addresses->newEntity($data);
		$address = $this->Addresses->save($entity);
		$this->assertTrue((bool)$address);
		$this->assertTrue($address->primary);

		$data = [
			'name' => 'Foo Bar Ext',
			'category_id' => 2,
		];

		$entity2 = $this->Addresses->newEntity($data);
		$address = $this->Addresses->save($entity2);
		$this->assertTrue((bool)$address);

		$address = $this->Addresses->get($entity2->id);
		$this->assertFalse($address->primary);

		$address->primary = true;
		$address = $this->Addresses->save($address);
		$this->assertTrue((bool)$address);

		$address = $this->Addresses->get($address->id);
		$this->assertTrue($address->primary);

		$address = $this->Addresses->get($entity->id);
		$this->assertFalse($address->primary);
	}

	/**
	 * @return void
	 */
	public function testDelete() {
		$data = [
			'name' => 'Foo Bar',
			'category_id' => 2,
		];
		$entity = $this->Addresses->newEntity($data);
		$address = $this->Addresses->save($entity);
		$this->assertTrue((bool)$address);
		$this->assertTrue($address->primary);

		$data = [
			'name' => 'Foo Bar Ext',
			'category_id' => 2,
			'primary' => true,
		];
		$address2 = $this->Addresses->newEntity($data);
		$address2 = $this->Addresses->save($address2);
		$this->assertTrue((bool)$address2);

		$address = $this->Addresses->get($address->id);
		$this->assertFalse($address->primary);

		$address2 = $this->Addresses->get($address2->id);
		$this->assertTrue($address2->primary);

		$this->Addresses->delete($address2);
		$address = $this->Addresses->get($address->id);
		$this->assertTrue($address->primary);
	}

	/**
	 * @return void
	 */
	public function testToggleField() {
		$data = [
			'name' => 'Foo Bar',
			'category_id' => 2,
		];
		$entity = $this->Addresses->newEntity($data);
		$address = $this->Addresses->save($entity);
		$this->assertTrue((bool)$address);
		$this->assertTrue($address->primary);

		$data = [
			'name' => 'Foo Bar Ext',
			'category_id' => 2,
			'primary' => true,
		];
		$address2 = $this->Addresses->newEntity($data);
		$address2 = $this->Addresses->save($address2);
		$this->assertTrue((bool)$address2);

		$address = $this->Addresses->get($address->id);
		$this->assertFalse($address->primary);

		$address2 = $this->Addresses->get($address2->id);
		$this->assertTrue($address2->primary);

		$this->Addresses->toggleField($address);

		$address = $this->Addresses->get($address->id);
		$this->assertTrue($address->primary);

		$address2 = $this->Addresses->get($address2->id);
		$this->assertFalse($address2->primary);
	}

}
