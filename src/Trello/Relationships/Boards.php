<?php namespace Trello\Relationships;

use Trello\Board;
use Trello\Exception\ValidationsFailed;
use Trello\Http;

trait Boards
{
    /**
     * Get model boards
     *
     * @param  string $model_id
     * @param  array  $options Optional filters
     *
     * @return Collection          Collection of boards in organization
     * @throws Trello\Exception\ValidationsFailed
     */
    protected function getBoards($model_id = null, $options = [])
    {
        $this->parseModelId($model_id);
        if ($model_id) {
            $boards = Http::get(static::getBasePath($model_id).'/boards', $options);
            $ids = Board::getIds($boards);

            return Board::fetchMany($ids, $options);
        }
        throw new ValidationsFailed(
            'attempted to get boards without id; it\'s gotta have an id'
        );
    }

    /**
     * Get attribute
     *
     * @param  string $attribute
     *
     * @return mixed|null
     */
    abstract protected function getAttribute($attribute);

    /**
     * Get parent board
     *
     * @return Board Parent board
     * @throws Exception
     */
    protected function getBoard()
    {
        return Board::fetch($this->getAttribute('idBoard'));
    }

    /**
     * If model id empty, attempt to set same as getId()
     *
     * @param  string $model_id
     *
     * @return void
     */
    abstract protected function parseModelId(&$model_id);
}
