<?php

return [

    'connections' => [

        /*
         * The environment name.
         */
        'prod' => [

            /*
             * The hostname to send the env file to
             */
            'host'  => '104.131.182.125',

            /*
             * The username to be used when connecting to the server where the logs are located
             */
            'user' => 'forge',

            /*
             * The full path to the directory where the .env is located MUST end in /
             */
            'rootEnvDirectory' => '/home/forge/default/',

            'port' => 22
        ],
    ],
];
