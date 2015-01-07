<?php

class Card_Test extends IntegrationTestCase
{

    public function test_It_Can_Create_A_New_Board_With_No_Attributes_Provider()
    {
        $card_attributes = [
            'name' => 'new card'
        ];

        $board = Trello_Board::fetch('oEJcCFz7');
        $list = $board->addList('test');
        $list->createCard($card_attributes);

        $cards = $board->getCards();
        print_r($cards);

        $this->assertTrue(false);
    }
}
