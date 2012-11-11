<?php
/**
 * @package    Joomla.UnitTest
 *
 * @copyright  Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

include_once JPATH_PLATFORM . '/joomla/mail/helper.php';

/**
 * Test class for JMailHelper.
 * Generated by PHPUnit on 2011-10-26 at 19:33:00.
 *
 * @package     Joomla.UnitTest
 * @subpackage  Mail
 * @since       11.1
 */
class JMailHelperTest extends TestCase
{
	/**
	 * Test data for testCleanLine method
	 *
	 * @return  array
	 *
	 * @since   12.1
	 */
	public function dataCleanLine()
	{
		return array(
			array("test\n\nme\r\r", 'testme'),
			array("test%0Ame", 'testme'),
			array("test%0Dme", 'testme')
		);
	}

	/**
	 * Test for the JMailHelper::cleanLine method.
	 *
	 * @param   string  $input     The input to clean
	 * @param   string  $expected  The expected result
	 *
	 * @return  void
	 *
	 * @since   12.1
	 *
	 * @dataProvider  dataCleanLine
	 */
	public function testCleanLine($input, $expected)
	{
		$this->assertThat(
			JMailHelper::cleanLine($input),
			$this->equalTo($expected)
		);
	}

	/**
	 * Test data for testCleanText method
	 *
	 * @return  array
	 *
	 * @since   12.1
	 */
	public function dataCleanText()
	{
		return array(
			array("test\nme", "test\nme"),
			array("test%0AconTenT-Type:me", 'testme'),
			array("test%0Dcontent-type:me", 'testme'),
			array("test\ncontent-type:me", 'testme'),
			array("test\n\ncontent-type:me", 'testme'),
			array("test\rcontent-type:me", 'testme'),
			array("test\r\rcontent-type:me", 'testme'),
			// @TODO Should this be included array("test\r\ncoNTent-tYPe:me", 'testme'),

			array("test%0Ato:me", 'testme'),
			array("test%0DTO:me", 'testme'),
			array("test\nTo:me", 'testme'),
			array("test\n\ntO:me", 'testme'),
			array("test\rto:me", 'testme'),
			array("test\r\rto:me", 'testme'),
			// @TODO Should this be included array("test\r\nto:me", 'testme'),

			array("test%0Acc:me", 'testme'),
			array("test%0DCC:me", 'testme'),
			array("test\nCc:me", 'testme'),
			array("test\n\ncC:me", 'testme'),
			array("test\rcc:me", 'testme'),
			array("test\r\rcc:me", 'testme'),
			// @TODO Should this be included array("test\r\ncc:me", 'testme'),

			array("test%0Abcc:me", 'testme'),
			array("test%0DBCC:me", 'testme'),
			array("test\nBCc:me", 'testme'),
			array("test\n\nbcC:me", 'testme'),
			array("test\rbcc:me", 'testme'),
			array("test\r\rbcc:me", 'testme'),
			// @TODO Should this be included array("test\r\nbcc:me", 'testme'),
		);
	}

	/**
	 * Test for the JMailHelper::cleanText method.
	 *
	 * @param   string  $input     The input to clean
	 * @param   string  $expected  The expected result
	 *
	 * @return  void
	 *
	 * @since   12.1
	 *
	 * @dataProvider  dataCleanText
	 */
	public function testCleanText($input, $expected)
	{
		$this->assertThat(
			JMailHelper::cleanText($input),
			$this->equalTo($expected)
		);
	}

	/**
	 * Test data for testCleanBody method
	 *
	 * @return  array
	 *
	 * @since   12.1
	 */
	public function dataCleanBody()
	{
		return array(
			array("testFrom: Foobar me", "test me"),
			array("testfrom: Foobar me", "testfrom: Foobar me"),
			array("testTo: Foobar me", "test me"),
			array("testto: Foobar me", "testto: Foobar me"),
			array("testCc: Foobar me", "test me"),
			array("testcc: Foobar me", "testcc: Foobar me"),
			array("testBcc: Foobar me", "test me"),
			array("testbcc: Foobar me", "testbcc: Foobar me"),
			array("testSubject: Foobar me", "test me"),
			array("testsubject: Foobar me", "testsubject: Foobar me"),
			array("testContent-type: Foobar me", "test me"),
			array("testcontent-type: Foobar me", "testcontent-type: Foobar me")
			// @TODO should this be case sensitive
		);
	}

	/**
	 * Test for the JMailHelper::cleanBody method.
	 *
	 * @param   string  $input     The input to clean
	 * @param   string  $expected  The expected result
	 *
	 * @return  void
	 *
	 * @since   12.1
	 *
	 * @dataProvider  dataCleanBody
	 */
	public function testCleanBody($input, $expected)
	{
		$this->assertThat(
			JMailHelper::cleanBody($input),
			$this->equalTo($expected)
		);
	}

	/**
	 * Test data for testCleanSubject method
	 *
	 * @return  array
	 *
	 * @since   12.1
	 */
	public function dataCleanSubject()
	{
		return array(
			array("testFrom: Foobar me", "test me"),
			array("testfrom: Foobar me", "testfrom: Foobar me"),
			array("testTo: Foobar me", "test me"),
			array("testto: Foobar me", "testto: Foobar me"),
			array("testCc: Foobar me", "test me"),
			array("testcc: Foobar me", "testcc: Foobar me"),
			array("testBcc: Foobar me", "test me"),
			array("testbcc: Foobar me", "testbcc: Foobar me"),
			array("testContent-type: Foobar me", "test me"),
			array("testcontent-type: Foobar me", "testcontent-type: Foobar me"),
			// @TODO should this be case sensitive
		);
	}

	/**
	 * Test for the JMailHelper::cleanSubject method.
	 *
	 * @param   string  $input     The input to clean
	 * @param   string  $expected  The expected result
	 *
	 * @return  void
	 *
	 * @since   12.1
	 *
	 * @dataProvider  dataCleanSubject
	 */
	public function testCleanSubject($input, $expected)
	{
		$this->assertThat(
			JMailHelper::cleanSubject($input),
			$this->equalTo($expected)
		);
	}

	/**
	 * Test data for testCleanAddress method
	 *
	 * @return  array
	 *
	 * @since   12.1
	 */
	public function dataCleanAddress()
	{
		return array(
			array("testme", "testme"),
			array("test me", "test me"),
			array("test;me", "test;me"),
			array("test,me", "test,me"),
			array("test ;,me", false),
		);
	}

	/**
	 * Test for the JMailHelper::cleanAddress method.
	 *
	 * @param   string  $input     The input to clean
	 * @param   string  $expected  The expected result
	 *
	 * @return  void
	 *
	 * @since   12.1
	 *
	 * @dataProvider  dataCleanAddress
	 */
	public function testCleanAddress($input, $expected)
	{
		$this->assertThat(
			JMailHelper::cleanAddress($input),
			$this->equalTo($expected)
		);
	}

	/**
	 * Test data for testIsEmailAddress method
	 *
	 * @return  array
	 *
	 * @since   12.1
	 */
	public function dataIsEmailAddress()
	{
		return array(
			array("joe", false),
			array("joe@home", true),
			array("a@b.c", true),
			array("joe@home.com", true),
			array("joe.bob@home.com", true),
			array("joe-bob[at]home.com", false),
			array("joe@his.home.com", true),
			array("joe@his.home.place", true),
			array("joe@home.org", true),
			array("joe@joebob.name", true),
			array("joe.@bob.com", false),
			array(".joe@bob.com", false),
			array("joe<>bob@bob.come", false),
			array("joe&bob@bob.com", true),
			array("~joe@bob.com", false),
			array("joe$@bob.com", false),
			array("joe+bob@bob.com", true),
			array("o'reilly@there.com", false)
		);
	}

	/**
	 * Test for the JMailHelper::isEmailAddress method.
	 *
	 * @param   string  $input     The input to clean
	 * @param   string  $expected  The expected result
	 *
	 * @return  void
	 *
	 * @since   12.1
	 *
	 * @dataProvider  dataIsEmailAddress
	 */
	public function testIsEmailAddress($input, $expected)
	{
		$this->assertThat(
			JMailHelper::isEmailAddress($input),
			$this->equalTo($expected)
		);
	}
}
