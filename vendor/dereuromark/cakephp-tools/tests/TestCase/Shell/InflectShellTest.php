<?php

namespace Tools\Test\TestCase\Shell;

use Cake\Console\ConsoleIo;
use Tools\Shell\InflectShell;
use Tools\TestSuite\ConsoleOutput;
use Tools\TestSuite\TestCase;

/**
 */
class InflectShellTest extends TestCase {

	/**
	 * @var \Tools\Shell\InflectShell
	 */
	public $Shell;

	/**
	 * @return void
	 */
	public function setUp() {
		parent::setUp();

		$this->out = new ConsoleOutput();
		$this->err = new ConsoleOutput();
		$io = new ConsoleIo($this->out, $this->err);

		$this->Shell = $this->getMockBuilder(InflectShell::class)
			->setMethods(['in', '_stop'])
			->setConstructorArgs([$io])
			->getMock();
	}

	/**
	 * @return void
	 */
	public function tearDown() {
		parent::tearDown();
		unset($this->Shell);
	}

	/**
	 * test that the startup method supresses the shell header
	 *
	 * @return void
	 */
	public function testMain() {
		$this->Shell->expects($this->any())->method('in')
			->will($this->returnValue('FooBar'));

		$this->Shell->runCommand(['pluralize']);
		$output = $this->out->output();
		$expected = 'FooBars';
		$this->assertContains($expected, $output);

		$this->Shell->runCommand(['underscore']);
		$output = $this->out->output();
		$expected = 'foo_bar';
		$this->assertContains($expected, $output);

		$this->Shell->runCommand(['dasherize']);
		$output = $this->out->output();
		$expected = 'foo-bar';
		$this->assertContains($expected, $output);

		$this->Shell->runCommand(['slug']);
		$output = $this->out->output();
		$expected = 'foo-bar';
		$this->assertContains($expected, $output);

		$this->Shell->runCommand(['tableize']);
		$output = $this->out->output();
		$expected = 'foo_bar';
		$this->assertContains($expected, $output);
	}

}
