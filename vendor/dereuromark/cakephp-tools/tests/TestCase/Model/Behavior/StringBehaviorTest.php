<?php

namespace Tools\Test\TestCase\Model\Behavior;

use Cake\ORM\TableRegistry;
use Tools\TestSuite\TestCase;

class StringBehaviorTest extends TestCase {

	/**
	 * @var array
	 */
	public $fixtures = [
		'plugin.tools.string_comments'
	];

	/**
	 * @var \Tools\Model\Table\Table
	 */
	public $Comments;

	/**
	 * @return void
	 */
	public function setUp() {
		parent::setUp();

		$this->Comments = TableRegistry::get('StringComments');
		$this->Comments->addBehavior('Tools.String', ['fields' => ['title'], 'input' => ['ucfirst']]);
	}

	/**
	 * @return void
	 */
	public function testBasic() {
		$data = [
			'title' => 'some Name',
			'comment' => 'blabla',
			'url' => 'www.dereuromark.de',
		];
		$entity = $this->Comments->newEntity($data);
		$res = $this->Comments->save($entity);
		$this->assertTrue((bool)$res);

		$this->assertSame('Some Name', $res['title']);
	}

	/**
	 * @return void
	 */
	public function testMultipleFieldsAndMultipleFilters() {
		$this->Comments->behaviors()->String->setConfig(['fields' => ['title', 'comment'], 'input' => ['strtolower', 'ucwords']]);

		$data = [
			'title' => 'some nAme',
			'comment' => 'blaBla',
			'url' => 'www.dereuromark.de',
		];
		$entity = $this->Comments->newEntity($data);
		$res = $this->Comments->save($entity);
		$this->assertTrue((bool)$res);

		$this->assertSame('Some Name', $res['title']);
		$this->assertSame('Blabla', $res['comment']);
	}

	/**
	 * @return void
	 */
	public function testBasicOutput() {
		$this->Comments->removeBehavior('String');

		$data = [
			'title' => 'some Name',
			'comment' => 'blabla',
			'url' => ''
		];
		$entity = $this->Comments->newEntity($data);
		$res = $this->Comments->save($entity);
		$this->assertTrue((bool)$res);

		$this->Comments->addBehavior('Tools.String', ['fields' => ['title'], 'output' => ['ucfirst']]);

		$res = $this->Comments->get($entity->id);
		$this->assertSame('Some Name', $res['title']);
	}

}
