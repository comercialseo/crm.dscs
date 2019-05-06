<?php
namespace Calendar\Test\TestCase\View\Helper;

use Cake\I18n\Time;
use Cake\Network\Request;
use Cake\Routing\Router;
use Cake\TestSuite\TestCase;
use Cake\View\View;
use Calendar\View\Helper\CalendarHelper;

/**
 *
 */
class CalendarHelperTest extends TestCase {

	/**
	 * @var \Calendar\View\Helper\CalendarHelper
	 */
	public $Calendar;

	/**
	 * @var \Cake\View\View
	 */
	public $View;

	/**
	 * setUp method
	 *
	 * @return void
	 */
	public function setUp() {
		parent::setUp();

		$this->request = new Request();// $this->getMockBuilder(Request::class)->getMock();
		$this->request->params['action'] = 'index';
		$this->request->params['controller'] = 'Events';

		$this->View = new View($this->request);
		$this->Calendar = new CalendarHelper($this->View);

		Router::reload();

		Router::connect('/:controller', ['action' => 'index']);
		Router::connect('/:controller/:action/*');
	}

	/**
	 * tearDown method
	 *
	 * @return void
	 */
	public function tearDown() {
		parent::tearDown();

		unset($this->Calendar);
	}

	/**
	 * @return void
	 */
	public function testRenderEmpty() {
		$this->View->viewVars['_calendar'] = [
			'span' => 3,
			'year' => 2010,
			'month' => 12,
		];

		$result = $this->Calendar->render();
		$this->assertContains('<table class="calendar">', $result);
	}

	/**
	 * @return void
	 */
	public function testRender() {
		$this->View->viewVars['_calendar'] = [
			'span' => 3,
			'year' => date('Y'),
			'month' => 12,
		];

		$this->Calendar->addRow(new Time(date('Y') . '-12-02 11:12:13'), 'Foo Bar', ['class' => 'event']);

		$result = $this->Calendar->render();

		$expected = '<div class="cell-number">2</div><div class="cell-data"><ul><li class="event">Foo Bar</li></ul></div>';
		$this->assertContains($expected, $result);

		$this->assertContains('<th class="cell-prev"><a', $result);
		$this->assertContains('<th class="cell-next"><a', $result);
	}

	/**
	 * @return void
	 */
	public function testRenderNoPref() {
		$this->View->viewVars['_calendar'] = [
			'span' => 3,
			'year' => date('Y') - 4,
			'month' => 12,
		];

		$result = $this->Calendar->render();

		$expected = '><th class="cell-prev"></th>';
		$this->assertContains($expected, $result);

		$this->assertContains('<th class="cell-next"><a', $result);
	}

	/**
	 * @return void
	 */
	public function testRenderNoNext() {
		$this->View->viewVars['_calendar'] = [
			'span' => 3,
			'year' => date('Y') + 4,
			'month' => 12,
		];

		$result = $this->Calendar->render();

		$expected = '><th class="cell-next"></th>';
		$this->assertContains($expected, $result);

		$this->assertContains('<th class="cell-prev"><a', $result);
	}

}
