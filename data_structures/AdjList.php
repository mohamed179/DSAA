<?php

namespace data_structures;

class AdjList {
    private $N;
    private $E;
    private $isBiDirection;
    private $adjList;

    private const VISITED = 1;
    private const UNVISITED = 0;

    /**
     * AdjList constructor.
     *
     * @param int $N
     * @param bool $isBiDirection
     */
    public function __construct ($N, $isBiDirection = true) {
        $this->N = $N;
        $this->E = 0;
        $this->isBiDirection = $isBiDirection;
        $this->adjList = array_fill(0, $this->N + 10, []);
    }

    /**
     * Add edge to an adjList.
     *
     * @param int $u
     * @param int $v
     * @param int $w
     */
    public function addEdge ($u, $v, $w) {
        array_push($this->adjList[$u], Pair::make_pair($v, $w));
        if ($this->isBiDirection) array_push($this->adjList[$v], Pair::make_pair($u, $w));
        $this->E++;
    }

    /**
     * Print an adjList.
     */
    public function print () {
        for ($u = 0; $u < $this->N; $u++) {
            echo "Node: " . $u . " has edges:";
            for ($i = 0; $i < count($this->adjList[$u]); $i++) {
                $vw = $this->adjList[$u][$i];
                echo " ( " . $vw->first . " , " . $vw->second . " )";
            }
            echo "\n";
        }
    }

    /**
     * Depth first search of an adjList.
     *
     * @return array
     */
    public function dfs () {
        $visited = array_fill(0, $this->N + 10, self::UNVISITED);
        $dfs_list = [];
        for ($u = 0; $u < $this->N; $u++) {
            if ($visited[$u] == self::UNVISITED) {
                $this->run_dfs($u, $visited, $dfs_list);
            }
        }
        return $dfs_list;
    }

    /**
     * Run the depth first search for a sub graph of an adjList.
     *
     * @param int $u
     * @param array $visited
     */
    private function run_dfs ($u, &$visited, &$dfs_list) {
        if ($visited[$u] == self::UNVISITED) {
            $visited[$u] = self::VISITED;
            array_push($dfs_list, $u);
            for ($i = 0; $i < count($this->adjList[$u]); $i++) {
                $v = $this->adjList[$u][$i]->first;
                $this->run_dfs($v, $visited, $dfs_list);
            }
        }
    }

    /**
     * Breadth first search of an adjList.
     */
    public function bfs () {
        $visited = array_fill(0, $this->N + 10, self::UNVISITED);
        $bfs_list = [];
        for ($u = 0; $u < $this->N; $u++) {
            if ($visited[$u] == self::UNVISITED) {
                $this->run_bfs($u, $visited, $bfs_list);
            }
        }
        return $bfs_list;
    }

    private function run_bfs ($u, &$visited, &$bfs_list) {
        $queue = new Queue();
        $queue->enqueue($u);
        while ($queue->size() > 0) {
            $u = $queue->dequeue();
            $visited[$u] = self::VISITED;
            array_push($bfs_list, $u);
            for ($i = 0; $i < count($this->adjList[$u]); $i++) {
                $vw = $this->adjList[$u][$i];
                if ($visited[$vw->first] == self::UNVISITED) {
                    $queue->enqueue($vw->first);
                }
            }
        }
    }
}
