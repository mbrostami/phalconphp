<?php
namespace Test;

/**
 * Class UnitTest
 */
class Test extends \UnitTestCase
{
    public function testTestCase()
    {
        $this->assertEquals(
            "1",
            $this->di->get('config')->test,
            "This is OK"
        );
    }
}
