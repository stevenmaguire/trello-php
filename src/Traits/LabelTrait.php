<?php namespace Stevenmaguire\Services\Trello\Traits;

trait LabelTrait
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
    public function addLabel($attributes = [])
    {
        return $this->getHttp()->post('labels', $attributes);
    }

    /**
     * @param string $labelId
     *
     * @return object
     */
    public function deleteLabel($labelId)
    {
        return $this->getHttp()->delete(sprintf('labels/%s', $labelId));
    }

    /**
     * @param string $labelId
     *
     * @return object
     */
    public function getLabel($labelId)
    {
        return $this->getHttp()->get(sprintf('labels/%s', $labelId));
    }

    /**
     * @param string $labelId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateLabel($labelId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('labels/%s', $labelId), $attributes);
    }

    /**
     * @param string $labelId
     *
     * @return object
     */
    public function getLabelBoard($labelId)
    {
        return $this->getHttp()->get(sprintf('labels/%s/board', $labelId));
    }

    /**
     * @param string $labelId
     * @param string $fieldName
     *
     * @return object
     */
    public function getLabelBoardField($labelId, $fieldName)
    {
        return $this->getHttp()->get(sprintf('labels/%s/board/%s', $labelId, $fieldName));
    }

    /**
     * @param string $labelId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateLabelColor($labelId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('labels/%s/color', $labelId), $attributes);
    }

    /**
     * @param string $labelId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateLabelName($labelId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('labels/%s/name', $labelId), $attributes);
    }
}
