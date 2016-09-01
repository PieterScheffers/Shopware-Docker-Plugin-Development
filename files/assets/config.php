<?php

$config = [
    'db' => [
        'username' => getenv('SWDB_USER'),
        'password' => getenv('SWDB_PASS'),
        'dbname' => getenv('SWDB_DATABASE'),
        'host' => getenv('SWDB_HOST'),
        'port' => getenv('SWDB_PORT'),
    ]
];

if (getenv('SWS3_STORAGE') == '1') {

	$config = array_merge($config, [
        'cdn' => [
            'backend' => 's3',
            'adapters' => [
                's3' => [
                    'type' => 's3',
                    'mediaUrl' => getenv('SWS3_ENDPOINT'), // s3 or cloudfront endpoint
                    'key' => getenv('SWS3_AWS_KEY'),
                    'secret' => getenv('SWS3_AWS_SECRET'),
                    'region' => getenv('SWS3_REGION'),
                    'bucket' => getenv('SWS3_BUCKET_NAME'),
                    'prefix' => getenv('SWS3_PREFIX'),
                ]
            ]
        ]
	]);
}

// if( getenv("SWDEBUG") == '1' )
// {
	$config = array_merge($config, [
		'front' => [
			'showException' => true,
			'throwExceptions' => true,
			'noErrorHandler' => false,
		]
	]);
// }

return $config;
