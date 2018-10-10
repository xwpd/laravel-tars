<?php
//php tarsCmd.php  conf restart
$config_path = $argv[1];
$pos = strpos($config_path, '--config=');
$config_path = substr($config_path, $pos + 9);
$cmd = strtolower($argv[2]);

if ($cmd === 'stop') {
    include_once __DIR__ . '/vendor/autoload.php';

    $class = new \Tars\cmd\Command($cmd, $config_path);
    $class->run();
} else {
    $_SERVER['argv'][0] = $argv[0] = __DIR__ .'/artisan';
    $_SERVER['argv'][1] = $argv[1] = 'tars:entry';
    $_SERVER['argv'][2] = $argv[2] = '--cmd=' . $cmd;
    $_SERVER['argv'][3] = $argv[3] = '--config_path=' . $config_path;

    include_once __DIR__ . '/artisan';
}