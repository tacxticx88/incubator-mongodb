<?php declare(strict_types=1);

/**
 * This file is part of the Phalcon Framework.
 *
 * (c) Phalcon Team <team@phalconphp.com>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

namespace Phalcon\Incubator\Mvc\Collection;

use Phalcon\Incubator\Mvc\CollectionInterface;

/**
 * Phalcon\Incubator\Mvc\Collection\Behavior
 *
 * This is an optional base class for ORM behaviors
 *
 * @package Phalcon\Incubator\Mvc\Collection
 */
abstract class Behavior implements BehaviorInterface
{
    protected $options;

    /**
     * Phalcon\Incubator\Mvc\Collection\Behavior
     *
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    /**
     * Returns the behavior options related to an event
     *
     * @param string|null $eventName
     * @return mixed|null
     */
    protected function getOptions(?string $eventName = null)
    {
        if ($eventName !== null) {

            return $this->options[$eventName] ?? null;
        }

        return $this->options;
    }

    /**
     * Checks whether the behavior must take action on certain event
     *
     * @param string $eventName
     * @return bool
     */
    protected function mustTakeAction(string $eventName): bool
    {
        return isset($this->options[$eventName]);
    }

    /**
     * This method receives the notifications from the EventsManager
     *
     * @param string $type
     * @param CollectionInterface $collection
     * @return mixed|null
     */
    public function notify(string $type, CollectionInterface $collection)
    {
        return null;
    }

    /**
     * Acts as fallbacks when a missing method is called on the collection
     *
     * @param CollectionInterface $collection
     * @param string $method
     * @param array $arguments
     * @return mixed|null
     */
    public function missingMethod(CollectionInterface $collection, string $method, array $arguments = [])
    {
        return null;
    }
}