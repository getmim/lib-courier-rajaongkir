<?php

return [
    '__name' => 'lib-courier-rajaongkir',
    '__version' => '0.0.1',
    '__git' => 'git@github.com:getmim/lib-courier-rajaongkir.git',
    '__license' => 'MIT',
    '__author' => [
        'name' => 'Iqbal Fauzi',
        'email' => 'iqbalfawz@gmail.com',
        'website' => 'http://iqbalfn.com/'
    ],
    '__files' => [
        'modules/lib-courier-rajaongkir' => ['install','update','remove']
    ],
    '__dependencies' => [
        'required' => [
            [
                'lib-courier' => NULL
            ],
            [
                'lib-curl' => NULL
            ]
        ],
        'optional' => []
    ],
    'autoload' => [
        'classes' => [
            'LibCourierRajaongkir\\Library' => [
                'type' => 'file',
                'base' => 'modules/lib-courier-rajaongkir/library'
            ]
        ],
        'files' => []
    ],
    'libCourier' => [
        'handlers' => [
            'pos' => 'LibCourierRajaongkir\\Library\\RajaOngkir',
            'wahana' => 'LibCourierRajaongkir\\Library\\RajaOngkir',
            'jnt' => 'LibCourierRajaongkir\\Library\\RajaOngkir',
            'sap' => 'LibCourierRajaongkir\\Library\\RajaOngkir',
            'sicepat' => 'LibCourierRajaongkir\\Library\\RajaOngkir',
            'jet' => 'LibCourierRajaongkir\\Library\\RajaOngkir',
            'dse' => 'LibCourierRajaongkir\\Library\\RajaOngkir',
            'first' => 'LibCourierRajaongkir\\Library\\RajaOngkir',
            'ninja' => 'LibCourierRajaongkir\\Library\\RajaOngkir',
            'lion' => 'LibCourierRajaongkir\\Library\\RajaOngkir',
            'idl' => 'LibCourierRajaongkir\\Library\\RajaOngkir',
            'rex' => 'LibCourierRajaongkir\\Library\\RajaOngkir',
            'ide' => 'LibCourierRajaongkir\\Library\\RajaOngkir',
            'sentral' => 'LibCourierRajaongkir\\Library\\RajaOngkir',
            'anteraja' => 'LibCourierRajaongkir\\Library\\RajaOngkir'
        ]
    ],
    'libCourierRajaOngkir' => [
        'package' => 'starter',
        'apikey' => ''
    ]
];
