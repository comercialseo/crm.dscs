<?php
namespace Calendar\Controller\Component;

use Cake\Controller\Component;
use Cake\Event\Event;
use Cake\Http\Exception\NotFoundException;

/**
 * Calendar Component
 *
 * inspired by http://www.flipflops.org/2007/09/21/a-simple-php-calendar-function/
 *
 * @author Mark Scherer
 * @copyright 2012 Mark Scherer
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
class CalendarComponent extends Component {

	/**
	 * @var \Cake\Controller\Controller
	 */
	public $Controller;

	/**
	 * @var array
	 */
	public $monthList = [
		'january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];

	/**
	 * @var array
	 */
	public $dayList = [
		'mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'
	];

	/**
	 * @var int|null
	 */
	public $year = null;

	/**
	 * @var int|null
	 */
	public $month = null;

	/**
	 * @var int|null
	 */
	public $day = null;

	/**
	 * Startup controller
	 *
	 * @param \Cake\Event\Event $event
	 * @return void
	 */
	public function startup(Event $event) {
		$this->Controller = $this->_registry->getController();
	}

	/**
	 * @param string $year Year
	 * @param string $month Month
	 * @param int $span Years in both directions
	 * @return void
	 * @throws \Cake\Http\Exception\NotFoundException
	 */
	public function init($year, $month, $span = 10) {
		if (!is_numeric($month)) {
			$month = $this->retrieveMonth($month);
		}
		$year = (int)$year;
		$month = (int)$month;

		if (!$year && !$month) {
			$year = (int)date('Y');
			$month = (int)date('n');
		}

		$current = (int)date('Y');

		if (!$month || $year < $current - $span || $year > $current + $span) {
			throw new NotFoundException('Invalid date');
		}

		$this->year = $year;
		$this->month = $month;

		if ($month < 1 || $month > 12) {
			throw new NotFoundException('Invalid date');
		}

		$this->Controller->set('_calendar', ['year' => $this->year, 'month' => $this->month, 'span' => $span]);
	}

	/**
	 * @return int
	 */
	public function year() {
		return $this->year;
	}

	/**
	 * @return int
	 */
	public function month() {
		return $this->month;
	}

	/**
	 * @return string
	 */
	public function monthAsString() {
		return $this->asString($this->month);
	}

	/**
	 * Month as integer value 1..12 or 0 on error
	 * february => 2
	 *
	 * @param string $month
	 * @return int
	 */
	public function retrieveMonth($month) {
		if (!$month) {
			return 0;
		}
		$month = mb_strtolower($month);
		if (in_array($month, $this->monthList)) {
			$keys = array_keys($this->monthList, $month);
			return $keys[0] + 1;
		}
		return 0;
	}

	/**
	 * Day as integer value 1..31 or 0 on error
	 * february => 2
	 *
	 * @param string $day
	 * @param int|null $month
	 * @return int
	 */
	public function retrieveDay($day, $month = null) {
		$day = (int)$day;
		if ($day < 1 || $day > 31) {
			return 0;
		}

		// TODO check on month days!

		return $day;
	}

	/**
	 * @return array
	 */
	public function months() {
		return $this->monthList;
	}

	/**
	 * @return array
	 */
	public function days() {
		return $this->dayList;
	}

	/**
	 * Converts integer to x-digit string
	 * 1 => 01, 12 => 12
	 *
	 * @param int $number
	 * @param int $digits
	 * @return string
	 */
	protected function asString($number, $digits = 2) {
		$number = (string)$number;
		$count = mb_strlen($number);
		while ($count < $digits) {
			$number = '0' . $number;
			$count++;
		}
		return $number;
	}

}
