<?php namespace Trello;

/**
 * Trello Generic collection
 * Based on Generic Collection class from:
 * {@link http://codeutopia.net/code/library/CU/Collection.php}
 *
 * @package   Trello
 * @subpackage Utility
 * @copyright 2014 Steven Maguire
 */

class Collection implements \Countable, \IteratorAggregate, \ArrayAccess
{
    /**
     *
     * @var array $collection collection storage
     */
    protected $collection = [];

    public function __construct($items = [])
    {
        foreach ($items as $item) {
            $this->add($item);
        }
    }

    /**
     * Add a value into the collection
     *
     * @param string|array|object $value
     */
    public function add($value)
    {
        $this->collection[] = $value;
    }

    /**
     * Return count of items in collection
     * Implements countable
     * @return integer
     */
    public function count()
    {
        return count($this->collection);
    }

    /**
     * Determine if index exists
     *
     * @param integer $index
     *
     * @return boolean
     */
    public function exists($index)
    {
        if ($index >= $this->count()) {
            return false;
        }

        return true;
    }

    /**
     * Return first value
     *
     * @return string|object
     *
     * @throws OutOfRangeException
     */
    public function first()
    {
        if ($this->count() > 0) {
            return $this->get(0);
        }

        return null;
    }

    /**
     * Return value at index
     *
     * @param integer $index
     *
     * @return string|object
     *
     * @throws OutOfRangeException
     */
    public function get($index)
    {
        if ($index >= $this->count()) {
            throw new \OutOfRangeException('Index out of range');
        }

        return $this->collection[$index];
    }

    /**
     * Return an iterator
     * Implements IteratorAggregate
     *
     * @return ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->collection);
    }

    /**
     * Return last value
     *
     * @return string|object
     *
     * @throws OutOfRangeException
     */
    public function last()
    {
        $index = $this->count();
        if ($index > 0) {
            $index--;
            return $this->get($index);
        }

        return null;
    }

    /**
     * Determine if offset exists
     * Implements ArrayAccess
     * @see exists
     *
     * @param integer $offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return $this->exists($offset);
    }

    /**
     * get an offset's value
     * Implements ArrayAccess
     * @see get
     *
     * @param integer $offset
     *
     * @return string|object
     */
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    /**
     * Set offset to value
     * Implements ArrayAccess
     * @see set
     *
     * @param integer $offset
     * @param string|array|object $value
     */
    public function offsetSet($offset, $value)
    {
        $this->set($offset, $value);
    }

    /**
     * Unset offset
     * Implements ArrayAccess
     * @see remove
     *
     * @param integer $offset
     */
    public function offsetUnset($offset)
    {
        $this->remove($offset);
    }

    /**
     * Remove a value from the collection
     *
     * @param integer $index index to remove
     *
     * @throws OutOfRangeException if index is out of range
     */
    public function remove($index)
    {
        if ($index >= $this->count()) {
            throw new \OutOfRangeException('Index out of range');
        }

        array_splice($this->collection, $index, 1);
    }

    /**
     * Set index's value
     *
     * @param integer $index
     * @param string|array|object $value
     *
     * @throws OutOfRangeException
     */
    public function set($index, $value)
    {
        if ($index >= $this->count()) {
            throw new \OutOfRangeException('Index out of range');
        }

        $this->collection[$index] = $value;
    }
}
