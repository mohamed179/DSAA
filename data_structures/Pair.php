<?php

namespace data_structures;

class Pair {
    public $first;
    public $second;

    /**
     * Pair constructor.
     *
     * @param $first
     * @param $second
     */
    public function __construct ($first, $second) {
        $this->first = $first;
        $this->second = $second;
    }

    /**
     * Create new Pair object.
     *
     * @param $first
     * @param $second
     * @return Pair
     */
    public static function make_pair ($first, $second) {
        return new Pair($first, $second);
    }
}
