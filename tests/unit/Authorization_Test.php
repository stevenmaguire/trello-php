<?php

class Authorization_Test extends IntegrationTestCase
{
    public function test_It_Can_Authortize_For_Read_Only_For_1_Day()
    {
        $url = Trello_Authorization_Read::getLink(1);

        $this->assertEquals(
            'https://trello.com/1/authorize?'.
            'key='.Trello_Configuration::key().'&'.
            'name='.urlencode(Trello_Configuration::applicationName()).'&'.
            'response_type=token&'.
            'expiration=1day',
            $url
        );
    }

    public function test_It_Can_Authortize_For_Read_Only_For_30_Days()
    {
        $url = Trello_Authorization_Read::getLink(30);

        $this->assertEquals(
            'https://trello.com/1/authorize?'.
            'key='.Trello_Configuration::key().'&'.
            'name='.urlencode(Trello_Configuration::applicationName()).'&'.
            'response_type=token&'.
            'expiration=30days',
            $url
        );
    }

    public function test_It_Can_Authortize_For_Read_Only_For_Eternity()
    {
        $url = Trello_Authorization_Read::getLink('never');

        $this->assertEquals(
            'https://trello.com/1/authorize?'.
            'key='.Trello_Configuration::key().'&'.
            'name='.urlencode(Trello_Configuration::applicationName()).'&'.
            'response_type=token&'.
            'expiration=never',
            $url
        );
    }

    public function test_It_Can_Authortize_For_Read_And_Write_For_Eternity()
    {
        $url = Trello_Authorization_Write::getLink('never');

        $this->assertEquals(
            'https://trello.com/1/authorize?'.
            'key='.Trello_Configuration::key().'&'.
            'name='.urlencode(Trello_Configuration::applicationName()).'&'.
            'response_type=token&'.
            'expiration=never&'.
            'scope=read%2Cwrite',
            $url
        );
    }

    public function test_It_Can_Authortize_For_Read_And_Write_For_No_Duration()
    {
        $url = Trello_Authorization_Write::getLink();

        $this->assertEquals(
            'https://trello.com/1/authorize?'.
            'key='.Trello_Configuration::key().'&'.
            'name='.urlencode(Trello_Configuration::applicationName()).'&'.
            'response_type=token&'.
            'expiration=never',
            $url
        );
    }
}
