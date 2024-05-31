<?php

return [

    'label' => 'ការរុករក Pagination',

    'overview' => '{1} ការបង្កាញលទ្ធផល ១ |[2,*] ការបង្ហាញ :first ដល់ :last នៃ :total លទ្ធផល',

    'fields' => [

        'records_per_page' => [

            'label' => 'ក្នុងមួយទំព័រ',

            'options' => [
                'all' => 'ទាំងអស់។',
            ],

        ],

    ],

    'actions' => [

        'go_to_page' => [
            'label' => 'ទៅកាន់​ទំព័រ :page',
        ],

        'next' => [
            'label' => 'បន្ទាប់',
        ],

        'previous' => [
            'label' => 'មុន',
        ],

    ],

];
