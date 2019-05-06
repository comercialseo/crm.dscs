<?php

namespace Tools\Test\TestCase\Controller\Component;

use App\Controller\MobileComponentTestController;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Http\ServerRequest;
use Detection\MobileDetect;
use Tools\TestSuite\TestCase;

/**
 * Test MobileComponent
 */
class MobileComponentTest extends TestCase {

	/**
	 * @var array
	 */
	public $fixtures = ['core.sessions'];

	/**
	 * @var \Cake\Event\Event
	 */
	public $event;

	/**
	 * @var \App\Controller\MobileComponentTestController
	 */
	public $Controller;

	/**
	 * SetUp method
	 *
	 * @return void
	 */
	public function setUp() {
		parent::setUp();

		ServerRequest::addDetector('mobile', function ($request) {
			$detector = new MobileDetect();
			return $detector->isMobile();
		});
		ServerRequest::addDetector('tablet', function ($request) {
			$detector = new MobileDetect();
			return $detector->isTablet();
		});

		$this->event = new Event('Controller.beforeFilter');
		$this->Controller = new MobileComponentTestController(new ServerRequest());

		$this->Controller->request->getSession()->delete('User');
		Configure::delete('User');
	}

	/**
	 * Tear-down method. Resets environment state.
	 *
	 * @return void
	 */
	public function tearDown() {
		parent::tearDown();

		unset($this->Controller);
	}

	/**
	 * @return void
	 */
	public function testDetect() {
		$is = $this->Controller->Mobile->detect();
		$this->assertFalse($is);

		$this->Controller->request->env('HTTP_ACCEPT', 'text/vnd.wap.wml,text/html,text/plain,image/png,*/*');
		$is = $this->Controller->Mobile->detect();
		$this->assertTrue($is);
	}

	/**
	 * @return void
	 */
	public function testMobileNotMobile() {
		$this->Controller->Mobile->setConfig('on', 'initialize');
		$this->Controller->Mobile->initialize([]);
		$this->assertFalse($this->Controller->Mobile->isMobile);
	}

	/**
	 * @return void
	 */
	public function testMobileForceActivated() {
		$this->Controller->request->query['mobile'] = 1;

		$this->Controller->Mobile->beforeFilter($this->event);
		$session = $this->Controller->request->getSession()->read('User');
		$this->assertSame(['mobile' => 1], $session);

		$this->Controller->Mobile->setMobile();
		$this->assertTrue($this->Controller->Mobile->setMobile);

		$configure = Configure::read('User');
		$this->assertSame(['isMobile' => 0, 'setMobile' => 1], $configure);
		$this->assertEquals(['desktopUrl' => '/?mobile=0'], $this->Controller->viewVars);
	}

	/**
	 * @return void
	 */
	public function testMobileForceDeactivated() {
		$this->Controller->request->query['mobile'] = 0;

		$this->Controller->Mobile->beforeFilter($this->event);
		$session = $this->Controller->request->getSession()->read('User');
		$this->assertSame(['mobile' => 0], $session);

		$this->Controller->Mobile->setMobile();
		$configure = Configure::read('User');
		$this->assertSame(['isMobile' => 0, 'setMobile' => 0], $configure);
		$this->assertEquals(['mobileUrl' => '/?mobile=1'], $this->Controller->viewVars);
	}

	/**
	 * @return void
	 */
	public function testMobileFakeMobile() {
		$_SERVER['HTTP_USER_AGENT'] = 'Some Android device';

		$this->Controller->Mobile->beforeFilter($this->event);
		$this->assertTrue($this->Controller->Mobile->isMobile);

		$this->Controller->Mobile->setMobile();
		$configure = Configure::read('User');
		$this->assertSame(['isMobile' => 1, 'setMobile' => 1], $configure);
	}

	/**
	 * @return void
	 */
	public function testMobileFakeMobileForceDeactivated() {
		$this->Controller->request->query['mobile'] = 0;
		$_SERVER['HTTP_USER_AGENT'] = 'Some Android device';

		$this->Controller->Mobile->beforeFilter($this->event);
		$session = $this->Controller->request->getSession()->read('User');
		$this->assertSame(['mobile' => 0], $session);

		$this->assertTrue($this->Controller->Mobile->isMobile);

		$this->Controller->Mobile->setMobile();
		$this->assertFalse($this->Controller->Mobile->setMobile);

		$configure = Configure::read('User');
		$this->assertSame(['isMobile' => 1, 'setMobile' => 0], $configure);
	}

	/**
	 * @return void
	 */
	public function testMobileFakeMobileAuto() {
		$this->Controller->Mobile->setConfig('auto', true);
		$_SERVER['HTTP_USER_AGENT'] = 'Some Android device';

		$this->Controller->Mobile->beforeFilter($this->event);
		$this->assertTrue($this->Controller->Mobile->isMobile);

		$configure = Configure::read('User');
		$this->assertSame(['isMobile' => 1, 'setMobile' => 1], $configure);
		$this->assertTrue($this->Controller->Mobile->setMobile);
	}

	/**
	 * @return void
	 */
	public function testMobileVendorEngineCake() {
		$this->Controller->Mobile->setConfig('engine', '');
		$_SERVER['HTTP_USER_AGENT'] = 'Some Android device';

		$this->Controller->Mobile->beforeFilter($this->event);
		$session = $this->Controller->request->getSession()->read('User');
		$this->assertTrue($this->Controller->Mobile->isMobile);
	}

	/**
	 * @return void
	 */
	public function testMobileCustomMobileInvalid() {
		$_SERVER['HTTP_USER_AGENT'] = 'Some Foo device';

		$this->Controller->Mobile->beforeFilter($this->event);
		$this->assertFalse($this->Controller->Mobile->isMobile);
	}

	/**
	 * @return void
	 */
	public function testMobileCustomMobile() {
		$_SERVER['HTTP_USER_AGENT'] = 'Some Android device';

		$this->Controller->Mobile->beforeFilter($this->event);
		$this->assertTrue($this->Controller->Mobile->isMobile);
	}

	/**
	 * @return void
	 */
	public function testMobileCustomMobileTablet() {
		$_SERVER['HTTP_USER_AGENT'] = 'Mozilla/5.0 (iPad; CPU OS 6_0 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Version/6.0 Mobile/10A403 Safari/8536.25';

		$this->Controller->Mobile->beforeFilter($this->event);
		$this->assertTrue($this->Controller->Mobile->isMobile);
	}

	/**
	 * @return void
	 */
	public function testMobileEngineClosure() {
		$closure = function() {
			return $_SERVER['HTTP_USER_AGENT'] === 'Foo';
		};
		$this->Controller->Mobile->setConfig('engine', $closure);
		$_SERVER['HTTP_USER_AGENT'] = 'Foo';

		$this->Controller->Mobile->beforeFilter($this->event);
		$this->assertTrue($this->Controller->Mobile->isMobile);
	}

}
