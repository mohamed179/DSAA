<?php

include 'autoload.php';

use data_structures\AdjList;

/**
* Main function of the program
*/
function main () {
    $adjList = new AdjList(16, true);
    $adjList->addEdge(0, 2, 1);
    $adjList->addEdge(0, 3, 1);
    $adjList->addEdge(1, 4, 1);
    $adjList->addEdge(1, 5, 1);
    $adjList->addEdge(3, 6, 1);
    $adjList->addEdge(3, 7, 1);
    $adjList->addEdge(4, 8, 1);
    $adjList->addEdge(4, 9, 1);
    $adjList->addEdge(6, 10, 1);
    $adjList->addEdge(6, 11, 1);
    $adjList->addEdge(10, 12, 1);
    $adjList->addEdge(10, 13, 1);
    $adjList->addEdge(11, 14, 1);
    $adjList->addEdge(11, 15, 1);
    $adjList->print();
    echo "dfs: " . implode( ", ", $adjList->dfs()) . "\n";
    echo "bfs: " . implode( ", ", $adjList->bfs()) . "\n";
}

// running main function of the program
main();

/* input:

16 14
0 2 1
0 3 1
1 4 1
1 5 1
3 6 1
3 7 1
4 8 1
4 9 1
6 10 1
6 11 1
10 12 1
10 13 1
11 14 1
11 15 1

*/

/* output:

visited: 0
visited: 2
visited: 3
visited: 6
visited: 10
visited: 12
visited: 13
visited: 11
visited: 14
visited: 15
visited: 7
visited: 1
visited: 4
visited: 8
visited: 9
visited: 5
visited: 16

*/
