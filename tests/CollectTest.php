<?php

use PHPUnit\Framework\TestCase;

class CollectTest extends TestCase
{
    public function testCount()
    {
        $collect = new Collect\Collect([13, 17]);
        $this->assertSame(2, $collect->count());
    }

    public function testKeys()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2]);
        $this->assertSame(['a', 'b'], $collect->keys()->toArray());
    }

    public function testUnshift()
    {
        $collect = new Collect\Collect([2, 3]);
        $collect->unshift(1);
        $this->assertSame([1, 2, 3], $collect->toArray());
    }


    public function testShift()
    {
        $collect = new Collect\Collect([1, 2, 3, 4]);
        $result = $collect->shift();
        $this->assertInstanceOf(Collect\Collect::class, $result);
        $this->assertEquals([2, 3, 4], $result->toArray());
    }

    public function testValues()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2]);
        $this->assertSame([1, 2], $collect->values()->toArray());
    }

    public function testPush()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $collect->push(4, 'd');
        $this->assertSame(['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4], $collect->toArray());
    }


    public function testOnly()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $result = $collect->only('a', 'c');
        $this->assertInstanceOf(Collect\Collect::class, $result);
        $this->assertEquals(['a' => 1, 'c' => 3], $result->toArray());
    }


    public function testToArray()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertEquals(['a' => 1, 'b' => 2, 'c' => 3], $collect->toArray());
    }

    public function testPop()
    {
        $collect = new Collect\Collect([1, 2, 3]);
        $collect->pop();
        $this->assertSame([1, 2], $collect->toArray());
    }

    public function testSearch()
    {
        $collect = new Collect\Collect([
            ['id' => 1, 'name' => 'Luca'],
            ['id' => 2, 'name' => 'Luca'],
            ['id' => 3, 'name' => 'Tobi']
        ]);
        $result = $collect->search('name', 'Luca')->toArray();
        $this->assertSame([['id' => 1, 'name' => 'Luca'], ['id' => 2, 'name' => 'Luca']], $result);
    }

    public function testExcept()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertSame(['a' => 1, 'c' => 3], $collect->except('b')->toArray());
    }

    public function testFirst()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $result = $collect->first();
        $this->assertEquals(1, $result);
    }

    public function testGet()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2]);
        $this->assertSame(1, $collect->get('a'));
    }

}