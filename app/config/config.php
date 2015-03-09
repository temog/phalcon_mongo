<?php

return new \Phalcon\Config(array(
    'database' => array(
		'adapter'     => 'mongodb',
		'host'        => 'localhost', // replicaSet serverA:port,serverB:port
		'port'        => 27017,
		'username'    => '',
		'password'    => '',
		'dbname'      => '',
		'replicaSet'  => null,
    ),
    'application' => array(
        'controllersDir' => __DIR__ . '/../../app/controllers/',
        'modelsDir'      => __DIR__ . '/../../app/models/',
        'viewsDir'       => __DIR__ . '/../../app/views/',
        'pluginsDir'     => __DIR__ . '/../../app/plugins/',
        'libraryDir'     => __DIR__ . '/../../app/library/',
        'cacheDir'       => __DIR__ . '/../../app/cache/',
        'vendorDir'       => __DIR__ . '/../../app/vendor/',
        'baseUri'        => '/',
	),
	'session' => array(
        'sessionDir' => __DIR__ . '/../../data/session/',
		'name' => 'sid_test',
		'lifetime' => 86400 * 7,
		'path' => '/',
		'domain' => null,
		'secure' => false, // sslなら true
	),
));
