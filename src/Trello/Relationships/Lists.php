<?php namespace Trello\Relationships;

use Trello\CardList;
use Trello\Exception\ValidationsFailed;

trait Lists
{
    /**
     * Create and add list to current model
     *
     * @param  array $attributes List attributes
     *
     * @return CardList  Newly minted trello list
     * @throws Exception\ValidationsFailed
     */
    protected function addList(CardList $list)
    {
        $foreign_key = $this->getForeignKey();
        $id = $this->getId();

        return $list->updateAttribute($foreign_key, $id);
    }

    /**
     * Create and add list to current model
     *
     * @param  array $attributes List attributes
     *
     * @return CardList  Newly minted trello list
     * @throws Exception\ValidationsFailed
     */
    protected function createList($attributes = [])
    {
        $foreign_key = $this->getForeignKey();
        $attributes[$foreign_key] = $this->getId();

        return CardList::create($attributes);
    }

    /**
     * Get model lists
     *
     * @param  string $model_id
     * @param  array  $options Optional filters
     *
     * @return Collection          Collection of lists in model
     * @throws ValidationsFailed
     */
    protected function getLists($model_id = null, $options = [])
    {
        $this->parseModelId($model_id);
        if ($model_id) {
            $path = static::getBasePath($model_id).'/lists';
            $lists = static::get($path, $options);
            $ids = CardList::getIds($lists);

            return CardList::fetchMany($ids, $options);
        }
        throw new ValidationsFailed(
            'attempted to get lists without id; it\'s gotta have an id'
        );
    }

    /**
     * Remove list from current model
     *
     * @param  CardList $list List to remove from model
     *
     * @return CardList  Newly minted trello list
     * @throws Exception\ValidationsFailed
     */
    protected function removeList(CardList $list)
    {
        return $list->close();
    }

    /**
     * Get parent list
     *
     * @return List Parent list
     * @throws Exception
     */
    protected function getList()
    {
        return CardList::fetch($this->idList);
    }

    /**
     * Update parent list
     *
     * @param  List $list Parent list
     *
     * @return Model
     */
    protected function updateList(CardList $list)
    {
        return $this->updateAttribute('idList', $list->getId());
    }
}
