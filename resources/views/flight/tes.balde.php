<?php
$flight_create_order_url = "https://test.api.amadeus.com/v1/booking/flight-orders";


  $curl = curl_init();

  $data = array(
// Set your API credentials and endpoint URL
$clientId = 'YOUR_CLIENT_ID_HERE';
$clientSecret = 'YOUR_CLIENT_SECRET_HERE';
$url = 'https://test.api.amadeus.com/v1/booking/flight-orders';

// Set your request parameters
$data = [
    'data' => [
        'type' => 'flight-order',
        'flightOffers' => [
            [
                'source' => 'GDS',
                'id' => '1',
                'offerItems' => [
                    [
                        'services' => [
                            [
                                'segments' => [
                                    [
                                        'flightSegment' => [
                                            'departure' => [
                                                'iataCode' => 'JFK',
                                                'terminal' => '1',
                                                'at' => '2023-08-01T08:00:00'
                                            ],
                                            'arrival' => [
                                                'iataCode' => 'LAX',
                                                'terminal' => '1',
                                                'at' => '2023-08-01T11:30:00'
                                            ],
                                            'carrierCode' => 'AA',
                                            'number' => '1234',
                                            'aircraft' => [
                                                'code' => '777'
                                            ],
                                            'operating' => [
                                                'carrierCode' => 'AA'
                                            ],
                                            'duration' => 'PT6H',
                                            'id' => '1',
                                            'numberOfStops' => 0
                                        ],
                                        'pricingDetailPerAdult' => [
                                            'travelClass' => 'ECONOMY',
                                            'fareClass' => 'M',
                                            'availability' => 9,
                                            'fareBasis' => 'MA4AON',
                                            'conditions' => [
                                                [
                                                    'code' => 'MINSTAY',
                                                    'value' => 'P3D'
                                                ],
                                                [
                                                    'code' => 'MAXSTAY',
                                                    'value' => 'P3M'
                                                ]
                                            ]
                                        ]
                                    ],
                                    [
                                        'flightSegment' => [
                                            'departure' => [
                                                'iataCode' => 'LAX',
                                                'terminal' => '4',
                                                'at' => '2023-08-01T14:30:00'
                                            ],
                                            'arrival' => [
                                                'iataCode' => 'SFO',
                                                'terminal' => '3',
                                                'at' => '2023-08-01T16:00:00'
                                            ],
                                            'carrierCode' => 'AA',
                                            'number' => '2345',
                                            'aircraft' => [
                                                'code' => '777'
                                            ],
                                            'operating' => [
                                                'carrierCode' => 'AA'
                                            ],
                                            'duration' => 'PT2H30M',
                                            'id' => '2',
                                            'numberOfStops' => 0
                                        ],
                                        'pricingDetailPerAdult' => [
                                            'travelClass' => 'ECONOMY',
                                            'fareClass' => 'M',
                                            'availability' => 9,
                                            'fareBasis' => 'MA4AON',
                                            'conditions' => [
                                                [
                                                    'code' => 'MINSTAY',
                                                    'value' => 'P3D'
                                                ],
                                                [
                                                    'code' => 'MAXSTAY',
                                                    'value' => 'P3M'
                                                ]
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ],
                'travelerPricings' => [
                    [
                        'travelerId' =>


?>
