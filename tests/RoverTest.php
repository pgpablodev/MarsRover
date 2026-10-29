<?php

namespace Tests;

use Pablo\KatasCodurance\Rover;
use PHPUnit\Framework\TestCase;

class RoverTest extends TestCase
{
    public function testGetDirection(): void{
        $rover = new Rover();
        $rover->x = 8;
        $rover->y = 3;
        $rover->direction = 'W';

        $this->assertSame('8:3:W', $rover->getDirection());
    }

    public function testMove(): void{
        $rover = new Rover();
        $rover->x = 0;
        $rover->y = 0;
        $rover->direction = 'N';

        $this->assertSame('0:1:N', $rover->inputMove('M'));
    }

    public function testRotation(): void{
        $rover = new Rover();
        $rover->x = 0;
        $rover->y = 0;
        $rover->direction = 'N';

        $this->assertSame('0:0:W', $rover->inputMove('L'));
    }

    public function testCompleteMove1(): void{
        $rover = new Rover();
        $rover->x = 0;
        $rover->y = 0;
        $rover->direction = 'N';

        $this->assertSame('0:2:N', $rover->inputMove('MM'));
    }

    public function testCompleteMove2(): void{
        $rover = new Rover();
        $rover->x = 0;
        $rover->y = 0;
        $rover->direction = 'N';

        $this->assertSame('1:2:E', $rover->inputMove('MMRM'));
    }

    public function testCompleteMove3(): void{
        $rover = new Rover();
        $rover->x = 0;
        $rover->y = 0;
        $rover->direction = 'N';

        $this->assertSame('2:3:N', $rover->inputMove('MMRMMLM'));
    }

    public function testWrapAround(): void{
        $rover = new Rover();
        $rover->x = 0;
        $rover->y = 0;
        $rover->direction = 'N';

        $this->assertSame('0:0:N', $rover->inputMove('MMMMMMMMMM'));
    }

    public function testWrapAroundMultipleTimes(): void{
        $rover = new Rover();
        $rover->x = 0;
        $rover->y = 0;
        $rover->direction = 'N';

        $this->assertSame('0:0:N', $rover->inputMove('MMMMMMMMMMMMMMMMMMMM'));
    }

    public function testNegativeOverflow(): void{
        $rover = new Rover();
        $rover->x = 0;
        $rover->y = 0;
        $rover->direction = 'N';

        $this->assertSame('8:0:W', $rover->inputMove('LMM'));
    }

    public function testComplexRotation(): void{
        $rover = new Rover();
        $rover->x = 0;
        $rover->y = 0;
        $rover->direction = 'N';

        $this->assertSame('0:6:N', $rover->inputMove('MMLRRLLRMMRLRLMMRL'));
    }
}

?>