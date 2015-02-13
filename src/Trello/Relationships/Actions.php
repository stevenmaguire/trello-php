<?php namespace Trello\Relationships;

use Trello\Action;
use Trello\Exception\ValidationsFailed;

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
            $actions = static::get(static::getBasePath($model_id).'/actions', $options);
            $ids = Action::getIds($actions);

            return Action::fetchMany($ids);
        }
        throw new ValidationsFailed(
            'attempted to get actions without id; it\'s gotta have an id'
        );
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
