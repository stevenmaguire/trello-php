<?php namespace Stevenmaguire\Services\Trello\Traits;

trait WebhookTrait
{
    /**
     * @return Stevenmaguire\Services\Trello\Http
     */
    abstract public function getHttp();

    /**
     * @param array  $attributes
     *
     * @return object
     */
    public function addWebhook($attributes = [])
    {
        return $this->getHttp()->post('webhooks', $attributes);
    }

    /**
     * @param string $webhookId
     *
     * @return object
     */
    public function deleteWebhook($webhookId)
    {
        return $this->getHttp()->delete(sprintf('webhooks/%s', $webhookId));
    }

    /**
     * @param string $webhookId
     *
     * @return object
     */
    public function getWebhook($webhookId)
    {
        return $this->getHttp()->get(sprintf('webhooks/%s', $webhookId));
    }

    /**
     * @param string $webhookId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateWebhook($webhookId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('webhooks/%s', $webhookId), $attributes);
    }

    /**
     * @param string $webhookId
     * @param string $fieldName
     *
     * @return object
     */
    public function getWebhookField($webhookId, $fieldName)
    {
        return $this->getHttp()->get(sprintf('webhooks/%s/%s', $webhookId, $fieldName));
    }

    /**
     * @param string $webhookId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateWebhookActive($webhookId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('webhooks/%s/active', $webhookId), $attributes);
    }

    /**
     * @param string $webhookId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateWebhookCallbackURL($webhookId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('webhooks/%s/callbackURL', $webhookId), $attributes);
    }

    /**
     * @param string $webhookId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateWebhookDescription($webhookId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('webhooks/%s/description', $webhookId), $attributes);
    }

    /**
     * @param string $webhookId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateWebhookIdModel($webhookId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('webhooks/%s/idModel', $webhookId), $attributes);
    }
}
