<?php
/**
 * Copyright (c) 2019 - present
 * updown - EventTest.phpthor: Roberto Belotti - roby.belotti@gmail.com
 * web : robertobelotti.com, github.com/biscolab
 * Initial version created on: 18/2/2019
 * MIT license: https://github.com/biscolab/updown-php/blob/master/LICENSE
 */

namespace Tests\Unit;

use Biscolab\UpDown\Fields\CheckFields;
use Biscolab\UpDown\Fields\DownTimeFields;
use Biscolab\UpDown\Fields\EventFields;
use Biscolab\UpDown\Objects\Check;
use Biscolab\UpDown\Objects\Event;
use Biscolab\UpDown\Tests\TestCase;
use Biscolab\UpDown\Types\DownTime;

class EventTest extends TestCase
{

    protected $web_hook;

    /**
     * @test
     */
    public function testSetWebHook()
    {

        $this->assertInstanceOf(Check::class, $this->web_hook->{EventFields::CHECK});
        $this->assertInstanceOf(DownTime::class, $this->web_hook->{EventFields::DOWNTIME});

        $this->assertEquals("500", $this->web_hook->{EventFields::DOWNTIME}->{DownTimeFields::ERROR});
        $this->assertEquals("2016", date('Y', $this->web_hook->{EventFields::DOWNTIME}->{DownTimeFields::STARTED_AT}));
    }

    /**
     * @test
     */
    public function testWebHookGetEvent()
    {

        $this->assertEquals("check.up", $this->web_hook->{EventFields::EVENT});
    }

    /**
     * @test
     */
    public function testDateTimeFields()
    {

        $this->assertEquals("2016", date('Y', $this->web_hook->{EventFields::CHECK}->{CheckFields::LAST_CHECK_AT}));

    }

    /**
     * Setup the test environment.
     */
    protected function setUp()
    {

        parent::setUp(); // TODO: Change the autogenerated stub

        $data = [
            "event"    => "check.up",
            "check"    => [
                "token"              => "ngg8",
                "url"                => "https://updown.io",
                "alias"              => "",
                "last_status"        => 200,
                "uptime"             => 99.954,
                "down"               => false,
                "down_since"         => null,
                "error"              => null,
                "period"             => 30,
                "apdex_t"            => 0.25,
                "string_match"       => "",
                "enabled"            => true,
                "published"          => true,
                "disabled_locations" => [],
                "last_check_at"      => "2016-02-07T13:16:07Z",
                "next_check_at"      => "2016-02-07T13:16:37Z",
                "mute_until"         => null,
                "favicon_url"        => "https://updown.io/favicon.png",
                "custom_headers"     => []
            ],
            "downtime" => [
                "error"      => "500",
                "started_at" => "2016-02-07T13:11:43Z",
                "ended_at"   => "2016-02-07T13:16:07Z",
                "duration"   => 265
            ]
        ];

        $this->web_hook = new Event($data);
    }
}