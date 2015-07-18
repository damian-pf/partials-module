<?php

return [
    'name'        => [
        'name'         => 'Name',
        'placeholder'  => 'Example',
        'instructions' => 'Specify an easily identifiable name.'
    ],
    'slug'        => [
        'name'         => 'Slug',
        'placeholder'  => 'example',
        'instructions' => 'The slug will be used when accessing partials with the plugin.'
    ],
    'css'         => [
        'name'         => 'CSS',
        'instructions' => 'CSS files are parsed when loading so feel free to use theme settings and other tags.'
    ],
    'js'          => [
        'name'         => 'JS',
        'instructions' => 'JS files are parsed when loading so feel free to use theme settings and other tags.'
    ],
    'type'        => [
        'name'         => 'Type',
        'instructions' => 'Specify what type of partial this is.'
    ],
    'description' => [
        'name'         => 'Description',
        'instructions' => 'Briefly describe the partial type and how it might be used.',
        'placeholder'  => 'The example partials are used to display product example presentations for the website\'s product pages.'
    ],
    'layout'      => [
        'name'         => 'Layout',
        'instructions' => 'The layout is used to wrap the display the partial\'s output.'
    ]
];
