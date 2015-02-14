<?php namespace Trello\Relationships;

use Trello\Exception\ValidationsFailed;
use Trello\Http;

trait Powerups
{
   /**
     * add specific powerup to current board
     *
     * @param string $powerup Powerup name
     *
     * @return stdClass|null List of existing powerups
     * @throws Exception\ValidationsFailed
     */
    protected function addPowerUp($powerup = null)
    {
        if (preg_match('/voting|cardAging|calendar|recap/', $powerup)) {
            return Http::post(static::getBasePath($this->getId()).'/powerUps', ['value' => $powerup]);
        }
        throw new ValidationsFailed(
            'attempted to add invalid powerup to model; it\'s gotta be a valid powerup'
        );
    }

    /**
     * add card aging powerup to current board
     *
     * @return stdClass|null List of existing powerups
     * @throws Exception\ValidationsFailed
     */
    protected function addPowerUpCardAging()
    {
        return $this->addPowerUp('cardAging');
    }

    /**
     * add calendar powerup to current board
     *
     * @return stdClass|null List of existing powerups
     * @throws Exception\ValidationsFailed
     */
    protected function addPowerUpCalendar()
    {
        return $this->addPowerUp('calendar');
    }

    /**
     * add recap powerup to current board
     *
     * @return stdClass|null List of existing powerups
     * @throws Exception\ValidationsFailed
     */
    protected function addPowerUpRecap()
    {
        return $this->addPowerUp('recap');
    }

    /**
     * add voting powerup to current board
     *
     * @return stdClass|null List of existing powerups
     * @throws Exception\ValidationsFailed
     */
    protected function addPowerUpVoting()
    {
        return $this->addPowerUp('voting');
    }

    /**
     * Get model primary key
     *
     * @return string
     */
    abstract public function getId();

    /**
     * Checks if value is valid powerup
     *
     * @param  string $powerup
     *
     * @return boolean
     */
    protected static function isValidPowerUp($powerup = null)
    {
        $powerups = ['voting','cardAging','calendar','recap'];

        return in_array($powerup, $powerups);
    }

    /**
     * remove specific powerup from current board
     *
     * @param string $powerup Powerup name
     *
     * @return boolean List of existing powerups
     * @throws Exception\ValidationsFailed
     */
    protected function removePowerUp($powerup = null)
    {
        if (self::isValidPowerUp($powerup)) {
            return Http::delete(static::getBasePath($this->getId()).'/powerUps/'.$powerup);
        }
        throw new ValidationsFailed(
            'attempted to remove invalid powerup from board; it\'s gotta be a valid powerup'
        );
    }

    /**
     * remove card aging powerup from current board
     *
     * @return boolean List of existing powerups
     * @throws Exception\ValidationsFailed
     */
    protected function removePowerUpCardAging()
    {
        return $this->removePowerUp('cardAging');
    }

    /**
     * remove calendar powerup from current board
     *
     * @return boolean List of existing powerups
     * @throws Exception\ValidationsFailed
     */
    protected function removePowerUpCalendar()
    {
        return $this->removePowerUp('calendar');
    }

    /**
     * remove recap powerup from current board
     *
     * @return boolean List of existing powerups
     * @throws Exception\ValidationsFailed
     */
    protected function removePowerUpRecap()
    {
        return $this->removePowerUp('recap');
    }

    /**
     * remove voting powerup from current board
     *
     * @return boolean List of existing powerups
     * @throws Exception\ValidationsFailed
     */
    protected function removePowerUpVoting()
    {
        return $this->removePowerUp('voting');
    }
}
