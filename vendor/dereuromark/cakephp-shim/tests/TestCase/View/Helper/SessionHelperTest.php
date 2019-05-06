<?php
namespace Shim\Test\TestCase\View\Helper;

use Cake\Core\Plugin;
use Cake\Http\ServerRequest;
use Cake\Http\Session;
use Cake\TestSuite\TestCase;
use Cake\View\View;
use Shim\View\Helper\SessionHelper;

/**
 * SessionHelperTest class
 */
class SessionHelperTest extends TestCase {

	/**
	 * @var \Cake\View\View
	 */
	protected $View;

	/**
	 * @var \Shim\View\Helper\SessionHelper
	 */
	protected $Session;

	/**
	 * setUp method
	 *
	 * @return void
	 */
	public function setUp() {
		parent::setUp();
		$this->View = new View();
		$session = new Session();
		$this->View->request = new ServerRequest(['session' => $session]);
		$this->Session = new SessionHelper($this->View);

		$session->write([
			'test' => 'info',
			'Flash' => [
				'flash' => [
					'type' => 'info',
					'params' => [],
					'message' => 'This is a calling'
				],
				'notification' => [
					'type' => 'info',
					'params' => [
						'title' => 'Notice!',
						'name' => 'Alert!',
						'element' => 'session_helper'
					],
					'message' => 'This is a test of the emergency broadcasting system',
				],
				'classy' => [
					'type' => 'success',
					'params' => ['class' => 'positive'],
					'message' => 'Recorded'
				],
				'incomplete' => [
					'message' => 'A thing happened',
				]
			],
			'Deeply' => ['nested' => ['key' => 'value']],
		]);
	}

	/**
	 * tearDown method
	 *
	 * @return void
	 */
	public function tearDown() {
		$_SESSION = [];
		unset($this->View, $this->Session);
		Plugin::unload();
		parent::tearDown();
	}

	/**
	 * testRead method
	 *
	 * @return void
	 */
	public function testRead() {
		$result = $this->Session->read('Deeply.nested.key');
		$this->assertEquals('value', $result);

		$result = $this->Session->read('test');
		$this->assertEquals('info', $result);
	}

	/**
	 * testCheck method
	 *
	 * @return void
	 */
	public function testCheck() {
		$this->assertTrue($this->Session->check('test'));
		$this->assertTrue($this->Session->check('Flash.flash'));
		$this->assertFalse($this->Session->check('Does.not.exist'));
		$this->assertFalse($this->Session->check('Nope'));
	}

	/**
	 * testRead method
	 *
	 * @return void
	 */
	public function testConsume() {
		$result = $this->Session->consume('Deeply.nested.key');
		$this->assertEquals('value', $result);

		$result = $this->Session->consume('Deeply.nested.key');
		$this->assertNull($result);
	}

}
