<?php

return [
    'readBufferFlushPerc' => 0.8,
    'reportInterval'      => 30000,
    'reportTimeout'       => 5000,
    'bootstrapTimeout'    => 15000,

    /*
	|--------------------------------------------------------------------------
	| Heartbeat Interval
	|--------------------------------------------------------------------------
	|
	| The interval between heartbeats on Arduino in minutes.
	|
	*/
    'heartbeatInterval' => 15,

    /*
	|--------------------------------------------------------------------------
	| Version
	|--------------------------------------------------------------------------
	|
	| The version of this configuration. Every time a configuration parameter
    | changes here you need to increment the version so that the Arduino devices
    | know they have to update their configurations.
	|
	*/
    'version' => 1,
];