<?php namespace Trello\Relationships;

use Trello\Action;
use Trello\Exception\ValidationsFailed;
use Trello\Http;

trait Actions
{
    /**
     * Get model actions
     *
     * @param  string $model_id
     * @param  array  $options Optional filters
     *
     * @return Collection          Collection of actions in model
     * @throws ValidationsFailed
     */
    protected function getActions($model_id = null, $options = [])
    {
        $this->parseModelId($model_id);
        if ($model_id) {
            $actions = Http::get(static::getBasePath($model_id).'/actions', $options);

            return static::parseCollectionAs($actions, Action::class);
        }
        throw new ValidationsFailed(
            'attempted to get actions without id; it\'s gotta have an id'
        );
    }

    /**
     * Parse collection as model
     *
     * @param  array $collection
     * @param  string $model
     *
     * @return Collection
     */
    abstract protected function parseCollectionAs(array $collection, $model);

    /**
     * If model id empty, attempt to set same as getId()
     *
     * @param  string $model_id
     *
     * @return void
     */
    abstract protected function parseModelId(&$model_id);
}
