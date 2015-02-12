<?php namespace Trello\Relationships;

use Trello\Member;
use Trello\Exception\ValidationsFailed;

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
    public function getMembers($model_id = null, $options = [])
    {
        $this->parseModelId($model_id);
        if ($model_id) {
            $members = static::get(static::getBasePath($model_id).'/members', $options);
            $ids = Member::getIds($members);

            return Member::fetchMany($ids, $options);
        }
        throw new ValidationsFailed(
            'attempted to get members without id; it\'s gotta have an id'
        );
    }
}
