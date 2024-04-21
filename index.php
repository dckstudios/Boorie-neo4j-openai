<?php
use Laudis\Neo4j\Authentication\Authenticate;
use Laudis\Neo4j\ClientBuilder;
require __DIR__ . '/vendor/autoload.php';
$stack = array();
$url='neo4j://172.176.235.251:7687?database=neo4j';
$auth = Authenticate::basic('neo4j','oPX^xVySa7u04AbR');
$client = ClientBuilder::create()->withDriver('neo4j', $url,$auth) ->build();
$results=$client->run("MATCH (n:Messages{type:'human'}) RETURN n ");
$node = $results[0]->get('n');
array_push($stack, $node->getProperty('content'));
echo $stack[0];