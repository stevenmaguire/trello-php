<?php namespace Trello\Relationships;

use Trello\Card;
use Trello\Exception\ValidationsFailed;

trait Cards
{
    /**
     * Add a card to the model
     *
     * @param  Card $card Card to add
     *
     * @return Card Updated card
     */
    public function addCard(Card $card)
    {
        $foreign_key = $this->getForeignKey();
        $id = $this->getId();

        return $card->updateAttribute($foreign_key, $id);
    }

    /**
     * Get model cards
     *
     * @param  string $model_id
     * @param  array  $options Optional filters
     *
     * @return Collection          Collection of cards in model
     * @throws ValidationsFailed
     */
    public function getCards($model_id = null, $options = [])
    {
        $this->parseModelId($model_id);
        if ($model_id) {
            $cards = static::get(static::getBasePath($model_id).'/cards', $options);
            $ids = Card::getIds($cards);

            return Card::fetchMany($ids, $options);
        }
        throw new ValidationsFailed(
            'attempted to get cards without id; it\'s gotta have an id'
        );
    }

    /**
     * Create and add a new card to model
     *
     * @param  array $attributes Card attributes to set
     *
     * @return Card  Newly minted trello card
     */
    public function createCard($attributes = [])
    {
        $attributes['idList'] = $this->id;

        return Card::create($attributes);
    }

    /**
     * Remove card from current model
     *
     * @param  Card $card Card to remove from model
     *
     * @return Card  Newly minted trello list
     * @throws Exception\ValidationsFailed
     */
    public function removeCard(Card $card)
    {
        return $card->close();
    }
}
