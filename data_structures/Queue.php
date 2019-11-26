<?php

namespace data_structures;

class Queue {
    private $queue;

    /**
     * Queue constructor.
     */
    public function __construct () {
        $this->queue = [];
    }

    /**
     * Queue size.
     *
     * @return int
     */
    public function size () {
        return count($this->queue);
    }

    /**
     * Enqueue a new element to a queue.
     *
     * @param $element
     */
    public function enqueue ($element) {
        array_push($this->queue, $element);
    }

    /**
     * Dequeue the top element of a queue.
     *
     * @return mixed
     */
    public function dequeue () {
        if ($this->size() > 0) {
            return array_shift($this->queue);
        }
    }
}
