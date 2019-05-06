<?php

namespace Tools\Test\TestCase\View\Helper;

use Cake\Core\Plugin;
use Cake\Http\ServerRequest;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\View\View;
use Tools\TestSuite\TestCase;
use Tools\View\Helper\HtmlHelper;

/**
 * Datetime Test Case
 */
class HtmlHelperTest extends TestCase {

	/**
	 * @var \Tools\View\Helper\HtmlHelper
	 */
	protected $Html;

	/**
	 * @return void
	 */
	public function setUp() {
		parent::setUp();

		$this->Html = new HtmlHelper(new View(null));
		$this->Html->request = new ServerRequest();
		$this->Html->request->webroot = '';
		$this->Html->Url->request = $this->Html->request;
	}

	/**
	 * HtmlHelperTest::testImageFromBlob()
	 *
	 * @return void
	 */
	public function testImageFromBlob() {
		$folder = Plugin::path('Tools') . 'tests' . DS . 'test_files' . DS . 'img' . DS;
		$content = file_get_contents($folder . 'hotel.png');
		$is = $this->Html->imageFromBlob($content);
		$this->assertTrue(!empty($is));
	}

	/**
	 * Tests
	 *
	 * @return void
	 */
	public function testLinkReset() {
		Router::connect('/:controller/:action/*');

		$result = $this->Html->linkReset('Foo', ['controller' => 'foobar', 'action' => 'test']);
		$expected = '<a href="/foobar/test">Foo</a>';
		$this->assertEquals($expected, $result);

		$this->Html->request->here = '/admin/foobar/test';
		$this->Html->request->params['admin'] = true;
		$this->Html->request->params['prefix'] = 'admin';
		Router::reload();
		Router::connect('/:controller/:action/*');
		Router::prefix('admin', function (RouteBuilder $routes) {
			$routes->connect('/:controller/:action/*');
		});

		$result = $this->Html->link('Foo', ['prefix' => 'admin', 'controller' => 'foobar', 'action' => 'test']);
		$expected = '<a href="/admin/foobar/test">Foo</a>';
		$this->assertEquals($expected, $result);

		$result = $this->Html->link('Foo', ['controller' => 'foobar', 'action' => 'test']);
		$expected = '<a href="/admin/foobar/test">Foo</a>';
		//debug($result);
		//$this->assertEquals($expected, $result);

		$result = $this->Html->linkReset('Foo', ['controller' => 'foobar', 'action' => 'test']);
		$expected = '<a href="/foobar/test">Foo</a>';
		$this->assertEquals($expected, $result);
	}

	/**
	 * Tests
	 *
	 * @return void
	 */
	public function testLinkComplete() {
		$this->Html->request->query['x'] = 'y';

		$result = $this->Html->linkComplete('Foo', ['action' => 'test']);
		$expected = '<a href="/test?x=y">Foo</a>';
		$this->assertEquals($expected, $result);

		$result = $this->Html->linkComplete('Foo', ['action' => 'test', '?' => ['a' => 'b']]);
		$expected = '<a href="/test?a=b&amp;x=y">Foo</a>';
		$this->assertEquals($expected, $result);
	}

	/**
	 * TearDown method
	 *
	 * @return void
	 */
	public function tearDown() {
		parent::tearDown();

		unset($this->Html);
	}

}
