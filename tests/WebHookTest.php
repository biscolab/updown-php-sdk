<?php
/**
 * Copyright (c) 2019 - present
 * updown - WebHookTest.php
 * author: Roberto Belotti - roby.belotti@gmail.com
 * web : robertobelotti.com, github.com/biscolab
 * Initial version created on: 15/2/2019
 * MIT license: https://github.com/biscolab/updown-php/blob/master/LICENSE
 */

namespace Tests\Unit;

use Biscolab\UpDown\Fields\WebHookFields;
use Biscolab\UpDown\Objects\WebHook;
use Biscolab\UpDown\Tests\TestCase;
use Biscolab\UpDown\Types\WebHooks;

class WebHookTest extends TestCase
{

    /**
     * @var WebHooks
     */
    protected $web_hooks;

    /**
     * @test
     */
    public function testSetCollection()
    {

        $this->assertEquals(1, $this->web_hooks->count());
        $this->assertInstanceOf(WebHooks::class, $this->web_hooks);

    }

    public function testElementIsWebHook() {
        $this->assertInstanceOf(WebHook::class, $this->web_hooks->first());
    }

    /**
     * Setup the test environment.
     */
    protected function setUp()
    {

        parent::setUp(); // TODO: Change the autogenerated stub

        $data = [
            [

                WebHookFields::ID  => "5c4f5d31ccc9ac4bb838c0c7",
                WebHookFields::URL => "http://example.com"

            ]
        ];

        $this->web_hooks = new WebHooks($data);
    }
}