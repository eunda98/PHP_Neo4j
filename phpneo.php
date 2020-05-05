<?php
require __DIR__.'/vendor/autoload.php';

use GraphAware\Neo4j\Client\ClientBuilder;

$neo4j_url = "bolt://neo4j:12345@localhost";

$client = ClientBuilder::create()
    ->addConnection('default', $neo4j_url)
    ->build();
	
// setup data
$insert = <<<EOQ
MERGE (a:cancion{codigo:1,nombre:"un ratico",idioma:"Español",genero:"balada",duracion:"00:03:51"})
MERGE (aa:interprete{codigo:11,nombre:" Andres cepeda",pais:" Colombia "})
MERGE (a)-[:canta]->(aa);
EOQ;

// insert data
$client->run($insert);