<?php namespace Trello\Tests\Integration;

use \ReflectionClass;
use Trello\Card;

class Card_Test extends IntegrationTestCase
{
    /**
     * @expectedException Trello\Exception\ValidationsFailed
     **/
    public function test_It_Can_Not_Fetch_A_Card_When_Id_Not_Provided()
    {
        $card = Card::fetch();
    }

    public function test_It_Can_Fetch_A_Card_When_Id_Provided()
    {
        $card = $this->createTestCard();

        $result = Card::fetch($card->id);

        $this->assertInstanceOf('Trello\Card', $result);
        $this->assertEquals($card->id, $result->id);
    }

    public function test_It_Can_Fetch_Multiple_Card_When_Ids_Provided()
    {
        $card1 = $this->createTestCard();
        $card2 = $this->createTestCard(true);
        $card_ids = [$card1->id, $card2->id];

        $result = Card::fetch($card_ids);

        $this->assertInstanceOf('Trello\Collection', $result);
        $this->assertEquals($card1->id, $result[0]->id);
        $this->assertEquals($card2->id, $result[1]->id);
    }

    /**
     * @expectedException Trello\Exception\ValidationsFailed
     **/
    public function test_It_Can_Not_Create_A_New_Card_When_No_Attributes_Provided()
    {
        $card = Card::create();
    }

    /**
     * @expectedException Trello\Exception\ValidationsFailed
     **/
    public function test_It_Can_Not_Create_A_New_Card_When_List_Id_Not_Provided()
    {
        $attributes = ['name' => 'test card'];

        $card = Card::create($attributes);
    }

    public function test_It_Can_Create_A_New_Card_When_Name_List_Id_Provided()
    {
        $list = $this->createTestList();
        $attributes = ['name' => 'test card', 'idList' => $list->id];

        $card = Card::create($attributes);

        $this->assertInstanceOf('Trello\Card', $card);
        $this->assertEquals($list->id, $card->idList);

        return $card;
    }

    /**
     * @depends test_It_Can_Create_A_New_Card_When_Name_List_Id_Provided
     **/
    public function test_It_Can_Update_Parent_List_When_List_Model_Provided($card)
    {
        $list = $this->createTestList();

        $result = $card->updateList($list);

        $this->assertEquals($list->id, $result->idList);
    }

    public function test_It_Can_Fetch_Parent_List()
    {
        $card = $this->createTestCard();

        $list = $card->getList();

        $this->assertInstanceOf('Trello\CardList', $list);
    }

    public function test_It_Can_Get_Individual_Fields_When_Property_Does_Exist()
    {
        $card = $this->createTestCard();
        $ref_card = new ReflectionClass($card);
        $fields = $ref_card->getProperties();

        foreach ($fields as $field) {
            if (!$field->isStatic()) {
                $response = $card->getField($field->name, true);
            }
        }
    }

    public function test_It_Can_Get_Individual_Fields_When_Property_Does_Not_Exist()
    {
        $card = $this->createTestCard();
        $response = $card->getField('foo', true);
    }
}
