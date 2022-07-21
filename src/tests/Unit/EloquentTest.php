<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;

use App\Models\Friend;
use Tests\TestCase;

class EloquentTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function IDを指定して1件取得()
    {
        $friend = Friend::find(1);

        // dd($friend);

        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function 全件取得()
    {
        $friends = Friend::all();

        // dd($friends);

        $this->assertTrue(true);
    }
}
