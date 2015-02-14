<?php namespace Trello\Relationships;

use Trello\Member;
use Trello\Exception\ValidationsFailed;
use Trello\Http;

trait Members
{
    /**
     * Get model members
     *
     * @param  string $model_id
     * @param  array  $options Optional filters
     *
     * @return Collection          Collection of members in organization
     * @throws Trello\Exception\ValidationsFailed
     */
    protected function getMembers($model_id = null, $options = [])
    {
        $this->parseModelId($model_id);
        if ($model_id) {
            $members = Http::get(static::getBasePath($model_id).'/members', $options);
            $ids = Member::getIds($members);

            return Member::fetchMany($ids, $options);
        }
        throw new ValidationsFailed(
            'attempted to get members without id; it\'s gotta have an id'
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
