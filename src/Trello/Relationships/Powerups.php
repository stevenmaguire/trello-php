<?php namespace Trello\Relationships;

use Trello\Exception\ValidationsFailed;

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
    public function addPowerUp($powerup = null)
    {
        if (preg_match('/voting|cardAging|calendar|recap/', $powerup)) {
            return static::post(static::getBasePath($this->id).'/powerUps', ['value' => $powerup]);
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
    public function addPowerUpCardAging()
    {
        return $this->addPowerUp('cardAging');
    }

    /**
     * add calendar powerup to current board
     *
     * @return stdClass|null List of existing powerups
     * @throws Exception\ValidationsFailed
     */
    public function addPowerUpCalendar()
    {
        return $this->addPowerUp('calendar');
    }

    /**
     * add recap powerup to current board
     *
     * @return stdClass|null List of existing powerups
     * @throws Exception\ValidationsFailed
     */
    public function addPowerUpRecap()
    {
        return $this->addPowerUp('recap');
    }

    /**
     * add voting powerup to current board
     *
     * @return stdClass|null List of existing powerups
     * @throws Exception\ValidationsFailed
     */
    public function addPowerUpVoting()
    {
        return $this->addPowerUp('voting');
    }

    /**
     * Checks if value is valid powerup
     *
     * @param  string $powerup
     *
     * @return boolean
     */
    public static function isValidPowerUp($powerup = null)
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
    public function removePowerUp($powerup = null)
    {
        if (self::isValidPowerUp($powerup)) {
            return static::delete(static::getBasePath($this->id).'/powerUps/'.$powerup);
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
    public function removePowerUpCardAging()
    {
        return $this->removePowerUp('cardAging');
    }

    /**
     * remove calendar powerup from current board
     *
     * @return boolean List of existing powerups
     * @throws Exception\ValidationsFailed
     */
    public function removePowerUpCalendar()
    {
        return $this->removePowerUp('calendar');
    }

    /**
     * remove recap powerup from current board
     *
     * @return boolean List of existing powerups
     * @throws Exception\ValidationsFailed
     */
    public function removePowerUpRecap()
    {
        return $this->removePowerUp('recap');
    }

    /**
     * remove voting powerup from current board
     *
     * @return boolean List of existing powerups
     * @throws Exception\ValidationsFailed
     */
    public function removePowerUpVoting()
    {
        return $this->removePowerUp('voting');
    }
}
