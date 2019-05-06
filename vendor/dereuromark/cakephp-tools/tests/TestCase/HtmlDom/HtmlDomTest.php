<?php

namespace Tools\Test\TestCase\HtmlDom;

use Tools\HtmlDom\HtmlDom;
use Tools\TestSuite\TestCase;

class HtmlDomTest extends TestCase {

	/**
	 * @var \Tools\HtmlDom\HtmlDom
	 */
	public $HtmlDom;

	/**
	 * @return void
	 */
	public function setUp() {
		parent::setUp();

		$this->skipIf(!class_exists('Yangqi\Htmldom\Htmldom') || version_compare(PHP_VERSION, '7.3') >= 0);
	}

	/**
	 * HtmlDom test
	 *
	 * @return void
	 */
	public function testBasics() {
		$this->HtmlDom = new HtmlDom('<div id="hello">Hello</div><div id="world">World</div>');
		$result = $this->HtmlDom->find('div', 1)->innertext;
		$this->assertSame('World', $result);
	}

}
