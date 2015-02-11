<?php namespace Trello\Traits;

use Trello\Action;
use Trello\Exception\ValidationsFailed;

trait ActionTrait
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
    public static function actions($model_id = null, $options = [])
    {
        if ($model_id) {
            $actions = static::get(static::getBasePath($model_id).'/actions', $options);
            $ids = Action::getIds($actions);

            return Action::fetchMany($ids);
        }
        throw new ValidationsFailed(
            'attempted to get actions without id; it\'s gotta have an id'
        );
    }
}
