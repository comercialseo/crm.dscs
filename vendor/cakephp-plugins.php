<?php
$baseDir = dirname(dirname(__FILE__));
return [
    'plugins' => [
        'AssetCompress' => $baseDir . '/vendor/markstory/asset_compress/',
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'Cache' => $baseDir . '/vendor/dereuromark/cakephp-cache/',
        'CakeDC/Mixer' => $baseDir . '/vendor/cakedc/mixer/',
        'CakePdf' => $baseDir . '/vendor/friendsofcake/cakepdf/',
        'Calendar' => $baseDir . '/vendor/dereuromark/cakephp-calendar/',
        'CsvView' => $baseDir . '/vendor/friendsofcake/cakephp-csvview/',
        'DatabaseBackup' => $baseDir . '/vendor/mirko-pagliai/cakephp-database-backup/',
        'DatabaseLog' => $baseDir . '/vendor/dereuromark/cakephp-databaselog/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'Feedback' => $baseDir . '/vendor/dereuromark/cakephp-feedback/',
        'Josegonzalez/Upload' => $baseDir . '/vendor/josegonzalez/cakephp-upload/',
        'Logging' => $baseDir . '/vendor/daoandco/cakephp-logging/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/',
        'MiniAsset' => $baseDir . '/vendor/markstory/mini-asset/',
        'Search' => $baseDir . '/vendor/friendsofcake/search/',
        'Settings' => $baseDir . '/vendor/cakemanager/cakephp-settings/',
        'Shim' => $baseDir . '/vendor/dereuromark/cakephp-shim/',
        'Tags' => $baseDir . '/vendor/dereuromark/cakephp-tags/',
        'Tools' => $baseDir . '/vendor/dereuromark/cakephp-tools/',
        'Utils' => $baseDir . '/vendor/cakemanager/cakephp-utils/',
        'WyriHaximus/MinifyHtml' => $baseDir . '/vendor/wyrihaximus/minify-html/',
        'WyriHaximus/TwigView' => $baseDir . '/vendor/wyrihaximus/twig-view/'
    ]
];