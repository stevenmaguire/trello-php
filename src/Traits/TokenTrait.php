<?php namespace Stevenmaguire\Services\Trello\Traits;

trait TokenTrait
{
    /**
     * @return Stevenmaguire\Services\Trello\Http
     */
    abstract public function getHttp();

    /**
     * @param string $tokenId
     *
     * @return object
     */
    public function deleteToken($tokenId)
    {
        return $this->getHttp()->delete(sprintf('tokens/%s', $tokenId));
    }

    /**
     * @param string $tokenId
     *
     * @return object
     */
    public function getToken($tokenId)
    {
        return $this->getHttp()->get(sprintf('tokens/%s', $tokenId));
    }

    /**
     * @param string $tokenId
     * @param string $fieldName
     *
     * @return object
     */
    public function getTokenField($tokenId, $fieldName)
    {
        return $this->getHttp()->get(sprintf('tokens/%s/%s', $tokenId, $fieldName));
    }

    /**
     * @param string $tokenId
     *
     * @return object
     */
    public function getTokenMember($tokenId)
    {
        return $this->getHttp()->get(sprintf('tokens/%s/member', $tokenId));
    }

    /**
     * @param string $tokenId
     * @param string $fieldName
     *
     * @return object
     */
    public function getTokenMemberField($tokenId, $fieldName)
    {
        return $this->getHttp()->get(sprintf('tokens/%s/member/%s', $tokenId, $fieldName));
    }

    /**
     * @param string $tokenId
     *
     * @return object
     */
    public function getTokenWebhooks($tokenId)
    {
        return $this->getHttp()->get(sprintf('tokens/%s/webhooks', $tokenId));
    }

    /**
     * @param string $tokenId
     * @param array  $attributes
     *
     * @return object
     */
    public function addTokenWebhook($tokenId, $attributes = [])
    {
        return $this->getHttp()->post(sprintf('tokens/%s/webhooks', $tokenId), $attributes);
    }

    /**
     * @param string $tokenId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateTokenWebhooks($tokenId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('tokens/%s/webhooks', $tokenId), $attributes);
    }

    /**
     * @param string $tokenId
     * @param string $webhookId
     *
     * @return object
     */
    public function deleteTokenWebhook($tokenId, $webhookId)
    {
        return $this->getHttp()->delete(sprintf('tokens/%s/webhooks/%s', $tokenId, $webhookId));
    }

    /**
     * @param string $tokenId
     * @param string $webhookId
     *
     * @return object
     */
    public function getTokenWebhook($tokenId, $webhookId)
    {
        return $this->getHttp()->get(sprintf('tokens/%s/webhooks/%s', $tokenId, $webhookId));
    }
}
