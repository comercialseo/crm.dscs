<?php
namespace Shim\Test\TestCase\Controller\Component;

use Cake\Controller\ComponentRegistry;
use Cake\Controller\Controller;
use Cake\Core\Configure;
use Cake\Http\ServerRequest;
use Cake\Http\Session;
use Cake\Routing\DispatcherFactory;
use Shim\Controller\Component\SessionComponent;
use Shim\TestSuite\TestCase;

/**
 * SessionComponentTest class
 */
class SessionComponentTest extends TestCase {

	/**
	 * @var array
	 */
	public $fixtures = ['core.sessions'];

	/**
	 * test case startup
	 *
	 * @return void
	 */
	public static function setupBeforeClass() {
		DispatcherFactory::add('Routing');
		DispatcherFactory::add('ControllerFactory');
	}

	/**
	 * cleanup after test case.
	 *
	 * @return void
	 */
	public static function teardownAfterClass() {
		DispatcherFactory::clear();
	}

	/**
	 * setUp method
	 *
	 * @return void
	 */
	public function setUp() {
		parent::setUp();
		$_SESSION = [];
		Configure::write('App.namespace', 'TestApp');
		$controller = new Controller(new ServerRequest(['session' => new Session()]));
		$this->ComponentRegistry = new ComponentRegistry($controller);
	}

	/**
	 * tearDown method
	 *
	 * @return void
	 */
	public function tearDown() {
		parent::tearDown();
	}

	/**
	 * testSessionReadWrite method
	 *
	 * @return void
	 */
	public function testSessionReadWrite() {
		$Session = new SessionComponent($this->ComponentRegistry);

		$this->assertNull($Session->read('Test'));

		$Session->write('Test', 'some value');
		$this->assertEquals('some value', $Session->read('Test'));
		$Session->delete('Test');

		$Session->write('Test.key.path', 'some value');
		$this->assertEquals('some value', $Session->read('Test.key.path'));
		$this->assertEquals(['path' => 'some value'], $Session->read('Test.key'));
		$Session->write('Test.key.path2', 'another value');
		$this->assertEquals(['path' => 'some value', 'path2' => 'another value'], $Session->read('Test.key'));
		$Session->delete('Test');

		$array = ['key1' => 'val1', 'key2' => 'val2', 'key3' => 'val3'];
		$Session->write('Test', $array);
		$this->assertEquals($Session->read('Test'), $array);
		$Session->delete('Test');

		$Session->write(['Test'], 'some value');
		$Session->write(['Test' => 'some value']);
		$this->assertEquals('some value', $Session->read('Test'));
		$Session->delete('Test');
	}

	/**
	 * Test consuming session data.
	 *
	 * @return void
	 */
	public function testConsume() {
		$Session = new SessionComponent($this->ComponentRegistry);

		$Session->write('Some.string', 'value');
		$Session->write('Some.array', ['key1' => 'value1', 'key2' => 'value2']);
		$this->assertEquals('value', $Session->read('Some.string'));

		$value = $Session->consume('Some.string');
		$this->assertEquals('value', $value);
		$this->assertFalse($Session->check('Some.string'));

		$value = $Session->consume('');
		$this->assertNull($value);

		$value = $Session->consume(null);
		$this->assertNull($value);

		$value = $Session->consume('Some.array');
		$expected = ['key1' => 'value1', 'key2' => 'value2'];
		$this->assertEquals($expected, $value);
		$this->assertFalse($Session->check('Some.array'));
	}

	/**
	 * testSessionDelete method
	 *
	 * @return void
	 */
	public function testSessionDelete() {
		$Session = new SessionComponent($this->ComponentRegistry);

		$Session->write('Test', 'some value');
		$Session->delete('Test');
		$this->assertNull($Session->read('Test'));
	}

	/**
	 * testSessionCheck method
	 *
	 * @return void
	 */
	public function testSessionCheck() {
		$Session = new SessionComponent($this->ComponentRegistry);

		$this->assertFalse($Session->check('Test'));

		$Session->write('Test', 'some value');
		$this->assertTrue($Session->check('Test'));
		$Session->delete('Test');
	}

	/**
	 * testSessionId method
	 *
	 * @return void
	 */
	public function testSessionId() {
		$Session = new SessionComponent($this->ComponentRegistry);
		$this->assertEquals(session_id(), $Session->id());
	}

	/**
	 * testSessionDestroy method
	 *
	 * @return void
	 */
	public function testSessionDestroy() {
		$Session = new SessionComponent($this->ComponentRegistry);

		$Session->write('Test', 'some value');
		$this->assertEquals('some value', $Session->read('Test'));
		$Session->destroy('Test');
		$this->assertNull($Session->read('Test'));
	}

}
