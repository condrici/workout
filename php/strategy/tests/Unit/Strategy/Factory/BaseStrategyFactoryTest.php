<?php
declare(strict_types=1);

namespace App\Tests\Unit\Strategy\Factory;

use App\Tests\BaseUnitTestCase;
use Exception;

use App\Src\Strategy\Strategy;
use App\Src\Strategy\Factory\BaseStrategyFactory;

class BaseStrategyFactoryTest extends BaseUnitTestCase
{
    /*
     * TODO: Retrieve action names from the actual files
     */
    public function testCanCreateStrategyForAction(): void
    {
        $strategyFactory = new BaseStrategyFactory();
        $strategy = $strategyFactory->createByAction('add');

        $this->assertInstanceOf(Strategy::class, $strategy);
    }

    public function testCannotCreateStrategyForAction(): void
    {
        $this->expectException(Exception::class);

        $strategyFactory = new BaseStrategyFactory();
        $strategyFactory->createByAction('invalid action name');
    }

    /*
     * TODO: Extract action names from all created strategy file names and make sure they are valid
     */
    public function testStrategyFileNamesAreValid()
    {
        $this->markTestSkipped();
    }

}