<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Form\Tests\Extension\Core\Type;

use Symfony\Component\Form\Extension\Core\View\ChoiceView;
use Symfony\Component\Form\FormError;

class TimeTypeTest extends LocalizedTestCase
{
    public function testSubmitDateTime()
    {
        $form = $this->factory->create('time', null, array(
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'input' => 'datetime',
        ));

        $input = array(
            'hour' => '3',
            'minute' => '4',
        );

        $form->bind($input);

        $dateTime = new \DateTime('1970-01-01 03:04:00 UTC');

        $this->assertEquals($dateTime, $form->getData());
        $this->assertEquals($input, $form->getViewData());
    }

    public function testSubmitString()
    {
        $form = $this->factory->create('time', null, array(
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'input' => 'string',
        ));

        $input = array(
            'hour' => '3',
            'minute' => '4',
        );

        $form->bind($input);

        $this->assertEquals('03:04:00', $form->getData());
        $this->assertEquals($input, $form->getViewData());
    }

    public function testSubmitTimestamp()
    {
        $form = $this->factory->create('time', null, array(
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'input' => 'timestamp',
        ));

        $input = array(
            'hour' => '3',
            'minute' => '4',
        );

        $form->bind($input);

        $dateTime = new \DateTime('1970-01-01 03:04:00 UTC');

        $this->assertEquals($dateTime->format('U'), $form->getData());
        $this->assertEquals($input, $form->getViewData());
    }

    public function testSubmitArray()
    {
        $form = $this->factory->create('time', null, array(
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'input' => 'array',
        ));

        $input = array(
            'hour' => '3',
            'minute' => '4',
        );

        $form->bind($input);

        $this->assertEquals($input, $form->getData());
        $this->assertEquals($input, $form->getViewData());
    }

    public function testSubmitDatetimeSingleText()
    {
        $form = $this->factory->create('time', null, array(
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'input' => 'datetime',
            'widget' => 'single_text',
        ));

        $form->bind('03:04');

        $this->assertEquals(new \DateTime('1970-01-01 03:04:00 UTC'), $form->getData());
        $this->assertEquals('03:04', $form->getViewData());
    }

    public function testSubmitDatetimeSingleTextWithoutMinutes()
    {
        $form = $this->factory->create('time', null, array(
            'data_timezone' => 'UTC',
            'user_timezone' => 'UTC',
            'input' => 'datetime',
            'widget' => 'single_text',
            'with_minutes' => false,
        ));

        $form->bind('03');

        $this->assertEquals(new \DateTime('1970-01-01 03:00:00 UTC'), $form->getData());
        $this->assertEquals('03', $form->getViewData());
    }

    public function testSubmitArraySingleText()
    {
        $form = $this->factory->create('time', null, array(
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'input' => 'array',
            'widget' => 'single_text',
        ));

        $data = array(
            'hour' => '3',
            'minute' => '4',
        );

        $form->bind('03:04');

        $this->assertEquals($data, $form->getData());
        $this->assertEquals('03:04', $form->getViewData());
    }

    public function testSubmitArraySingleTextWithoutMinutes()
    {
        $form = $this->factory->create('time', null, array(
            'data_timezone' => 'UTC',
            'user_timezone' => 'UTC',
            'input' => 'array',
            'widget' => 'single_text',
            'with_minutes' => false,
        ));

        $data = array(
            'hour' => '3',
        );

        $form->bind('03');

        $this->assertEquals($data, $form->getData());
        $this->assertEquals('03', $form->getViewData());
    }

    public function testSubmitArraySingleTextWithSeconds()
    {
        $form = $this->factory->create('time', null, array(
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'input' => 'array',
            'widget' => 'single_text',
            'with_seconds' => true,
        ));

        $data = array(
            'hour' => '3',
            'minute' => '4',
            'second' => '5',
        );

        $form->bind('03:04:05');

        $this->assertEquals($data, $form->getData());
        $this->assertEquals('03:04:05', $form->getViewData());
    }

    public function testSubmitStringSingleText()
    {
        $form = $this->factory->create('time', null, array(
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'input' => 'string',
            'widget' => 'single_text',
        ));

        $form->bind('03:04');

        $this->assertEquals('03:04:00', $form->getData());
        $this->assertEquals('03:04', $form->getViewData());
    }

    public function testSubmitStringSingleTextWithoutMinutes()
    {
        $form = $this->factory->create('time', null, array(
            'data_timezone' => 'UTC',
            'user_timezone' => 'UTC',
            'input' => 'string',
            'widget' => 'single_text',
            'with_minutes' => false,
        ));

        $form->bind('03');

        $this->assertEquals('03:00:00', $form->getData());
        $this->assertEquals('03', $form->getViewData());
    }

    public function testSetDataWithoutMinutes()
    {
        $form = $this->factory->create('time', null, array(
            'data_timezone' => 'UTC',
            'user_timezone' => 'UTC',
            'input' => 'datetime',
            'with_minutes' => false,
        ));

        $form->setData(new \DateTime('03:04:05 UTC'));

        $this->assertEquals(array('hour' => 3), $form->getViewData());
    }

    public function testSetDataWithSeconds()
    {
        $form = $this->factory->create('time', null, array(
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'input' => 'datetime',
            'with_seconds' => true,
        ));

        $form->setData(new \DateTime('03:04:05 UTC'));

        $this->assertEquals(array('hour' => 3, 'minute' => 4, 'second' => 5), $form->getViewData());
    }

    public function testSetDataDifferentTimezones()
    {
        $form = $this->factory->create('time', null, array(
            'model_timezone' => 'America/New_York',
            'view_timezone' => 'Asia/Hong_Kong',
            'input' => 'string',
            'with_seconds' => true,
        ));

        $dateTime = new \DateTime('2013-01-01 12:04:05');
        $dateTime->setTimezone(new \DateTimeZone('America/New_York'));

        $form->setData($dateTime->format('H:i:s'));

        $outputTime = clone $dateTime;
        $outputTime->setTimezone(new \DateTimeZone('Asia/Hong_Kong'));

        $displayedData = array(
            'hour' => (int) $outputTime->format('H'),
            'minute' => (int) $outputTime->format('i'),
            'second' => (int) $outputTime->format('s')
        );

        $this->assertEquals($displayedData, $form->getViewData());
    }

    public function testSetDataDifferentTimezonesDateTime()
    {
        $form = $this->factory->create('time', null, array(
            'model_timezone' => 'America/New_York',
            'view_timezone' => 'Asia/Hong_Kong',
            'input' => 'datetime',
            'with_seconds' => true,
        ));

        $dateTime = new \DateTime('12:04:05');
        $dateTime->setTimezone(new \DateTimeZone('America/New_York'));

        $form->setData($dateTime);

        $outputTime = clone $dateTime;
        $outputTime->setTimezone(new \DateTimeZone('Asia/Hong_Kong'));

        $displayedData = array(
            'hour' => (int) $outputTime->format('H'),
            'minute' => (int) $outputTime->format('i'),
            'second' => (int) $outputTime->format('s')
        );

        $this->assertDateTimeEquals($dateTime, $form->getData());
        $this->assertEquals($displayedData, $form->getViewData());
    }

    public function testHoursOption()
    {
        $form = $this->factory->create('time', null, array(
            'hours' => array(6, 7),
        ));

        $view = $form->createView();

        $this->assertEquals(array(
            new ChoiceView('6', '6', '06'),
            new ChoiceView('7', '7', '07'),
        ), $view['hour']->vars['choices']);
    }

    public function testIsMinuteWithinRangeReturnsTrueIfWithin()
    {
        $form = $this->factory->create('time', null, array(
            'minutes' => array(6, 7),
        ));

        $view = $form->createView();

        $this->assertEquals(array(
            new ChoiceView('6', '6', '06'),
            new ChoiceView('7', '7', '07'),
        ), $view['minute']->vars['choices']);
    }

    public function testIsSecondWithinRangeReturnsTrueIfWithin()
    {
        $form = $this->factory->create('time', null, array(
            'seconds' => array(6, 7),
            'with_seconds' => true,
        ));

        $view = $form->createView();

        $this->assertEquals(array(
            new ChoiceView('6', '6', '06'),
            new ChoiceView('7', '7', '07'),
        ), $view['second']->vars['choices']);
    }

    public function testIsPartiallyFilledReturnsFalseIfCompletelyEmpty()
    {
        $this->markTestIncomplete('Needs to be reimplemented using validators');

        $form = $this->factory->create('time', null, array(
            'widget' => 'choice',
        ));

        $form->bind(array(
            'hour' => '',
            'minute' => '',
        ));

        $this->assertFalse($form->isPartiallyFilled());
    }

    public function testIsPartiallyFilledReturnsFalseIfCompletelyEmptyWithSeconds()
    {
        $this->markTestIncomplete('Needs to be reimplemented using validators');

        $form = $this->factory->create('time', null, array(
            'widget' => 'choice',
            'with_seconds' => true,
        ));

        $form->bind(array(
            'hour' => '',
            'minute' => '',
            'second' => '',
        ));

        $this->assertFalse($form->isPartiallyFilled());
    }

    public function testIsPartiallyFilledReturnsFalseIfCompletelyFilled()
    {
        $this->markTestIncomplete('Needs to be reimplemented using validators');

        $form = $this->factory->create('time', null, array(
            'widget' => 'choice',
        ));

        $form->bind(array(
            'hour' => '0',
            'minute' => '0',
        ));

        $this->assertFalse($form->isPartiallyFilled());
    }

    public function testIsPartiallyFilledReturnsFalseIfCompletelyFilledWithSeconds()
    {
        $this->markTestIncomplete('Needs to be reimplemented using validators');

        $form = $this->factory->create('time', null, array(
            'widget' => 'choice',
            'with_seconds' => true,
        ));

        $form->bind(array(
            'hour' => '0',
            'minute' => '0',
            'second' => '0',
        ));

        $this->assertFalse($form->isPartiallyFilled());
    }

    public function testIsPartiallyFilledReturnsTrueIfChoiceAndHourEmpty()
    {
        $this->markTestIncomplete('Needs to be reimplemented using validators');

        $form = $this->factory->create('time', null, array(
            'widget' => 'choice',
            'with_seconds' => true,
        ));

        $form->bind(array(
            'hour' => '',
            'minute' => '0',
            'second' => '0',
        ));

        $this->assertTrue($form->isPartiallyFilled());
    }

    public function testIsPartiallyFilledReturnsTrueIfChoiceAndMinuteEmpty()
    {
        $this->markTestIncomplete('Needs to be reimplemented using validators');

        $form = $this->factory->create('time', null, array(
            'widget' => 'choice',
            'with_seconds' => true,
        ));

        $form->bind(array(
            'hour' => '0',
            'minute' => '',
            'second' => '0',
        ));

        $this->assertTrue($form->isPartiallyFilled());
    }

    public function testIsPartiallyFilledReturnsTrueIfChoiceAndSecondsEmpty()
    {
        $this->markTestIncomplete('Needs to be reimplemented using validators');

        $form = $this->factory->create('time', null, array(
            'widget' => 'choice',
            'with_seconds' => true,
        ));

        $form->bind(array(
            'hour' => '0',
            'minute' => '0',
            'second' => '',
        ));

        $this->assertTrue($form->isPartiallyFilled());
    }

    // Bug fix
    public function testInitializeWithDateTime()
    {
        // Throws an exception if "data_class" option is not explicitly set
        // to null in the type
        $this->factory->create('time', new \DateTime());
    }

    public function testSingleTextWidgetShouldUseTheRightInputType()
    {
        $form = $this->factory->create('time', null, array(
            'widget' => 'single_text',
        ));

        $view = $form->createView();
        $this->assertEquals('time', $view->vars['type']);
    }

    public function testPassDefaultEmptyValueToViewIfNotRequired()
    {
        $form = $this->factory->create('time', null, array(
            'required' => false,
            'with_seconds' => true,
        ));

        $view = $form->createView();
        $this->assertSame('', $view['hour']->vars['empty_value']);
        $this->assertSame('', $view['minute']->vars['empty_value']);
        $this->assertSame('', $view['second']->vars['empty_value']);
    }

    public function testPassNoEmptyValueToViewIfRequired()
    {
        $form = $this->factory->create('time', null, array(
            'required' => true,
            'with_seconds' => true,
        ));

        $view = $form->createView();
        $this->assertNull($view['hour']->vars['empty_value']);
        $this->assertNull($view['minute']->vars['empty_value']);
        $this->assertNull($view['second']->vars['empty_value']);
    }

    public function testPassEmptyValueAsString()
    {
        $form = $this->factory->create('time', null, array(
            'empty_value' => 'Empty',
            'with_seconds' => true,
        ));

        $view = $form->createView();
        $this->assertSame('Empty', $view['hour']->vars['empty_value']);
        $this->assertSame('Empty', $view['minute']->vars['empty_value']);
        $this->assertSame('Empty', $view['second']->vars['empty_value']);
    }

    public function testPassEmptyValueAsArray()
    {
        $form = $this->factory->create('time', null, array(
            'empty_value' => array(
                'hour' => 'Empty hour',
                'minute' => 'Empty minute',
                'second' => 'Empty second',
            ),
            'with_seconds' => true,
        ));

        $view = $form->createView();
        $this->assertSame('Empty hour', $view['hour']->vars['empty_value']);
        $this->assertSame('Empty minute', $view['minute']->vars['empty_value']);
        $this->assertSame('Empty second', $view['second']->vars['empty_value']);
    }

    public function testPassEmptyValueAsPartialArrayAddEmptyIfNotRequired()
    {
        $form = $this->factory->create('time', null, array(
            'required' => false,
            'empty_value' => array(
                'hour' => 'Empty hour',
                'second' => 'Empty second',
            ),
            'with_seconds' => true,
        ));

        $view = $form->createView();
        $this->assertSame('Empty hour', $view['hour']->vars['empty_value']);
        $this->assertSame('', $view['minute']->vars['empty_value']);
        $this->assertSame('Empty second', $view['second']->vars['empty_value']);
    }

    public function testPassEmptyValueAsPartialArrayAddNullIfRequired()
    {
        $form = $this->factory->create('time', null, array(
            'required' => true,
            'empty_value' => array(
                'hour' => 'Empty hour',
                'second' => 'Empty second',
            ),
            'with_seconds' => true,
        ));

        $view = $form->createView();
        $this->assertSame('Empty hour', $view['hour']->vars['empty_value']);
        $this->assertNull($view['minute']->vars['empty_value']);
        $this->assertSame('Empty second', $view['second']->vars['empty_value']);
    }

    public function provideCompoundWidgets()
    {
        return array(
            array('text'),
            array('choice'),
        );
    }

    /**
     * @dataProvider provideCompoundWidgets
     */
    public function testHourErrorsBubbleUp($widget)
    {
        $error = new FormError('Invalid!');
        $form = $this->factory->create('time', null, array(
            'widget' => $widget,
        ));
        $form['hour']->addError($error);

        $this->assertSame(array(), $form['hour']->getErrors());
        $this->assertSame(array($error), $form->getErrors());
    }

    /**
     * @dataProvider provideCompoundWidgets
     */
    public function testMinuteErrorsBubbleUp($widget)
    {
        $error = new FormError('Invalid!');
        $form = $this->factory->create('time', null, array(
            'widget' => $widget,
        ));
        $form['minute']->addError($error);

        $this->assertSame(array(), $form['minute']->getErrors());
        $this->assertSame(array($error), $form->getErrors());
    }

    /**
     * @dataProvider provideCompoundWidgets
     */
    public function testSecondErrorsBubbleUp($widget)
    {
        $error = new FormError('Invalid!');
        $form = $this->factory->create('time', null, array(
            'widget' => $widget,
            'with_seconds' => true,
        ));
        $form['second']->addError($error);

        $this->assertSame(array(), $form['second']->getErrors());
        $this->assertSame(array($error), $form->getErrors());
    }

    /**
     * @expectedException \Symfony\Component\Form\Exception\InvalidConfigurationException
     */
    public function testInitializeWithSecondsAndWithoutMinutes()
    {
        $this->factory->create('time', null, array(
            'with_minutes' => false,
            'with_seconds' => true,
        ));
    }
}
