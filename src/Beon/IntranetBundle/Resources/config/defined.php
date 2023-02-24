<?php
/**
 * User: LITVAN
 * Date: 3/2/14
 * Time: 10:48 PM
 */

/** @var $container \Symfony\Component\DependencyInjection\ContainerBuilder */
$container->setParameter('def.upload_path', realpath(__DIR__ . '/../../../../../uploads'));
$container->setParameter('fromEmail', array('no-reply@beon-support.de' => 'EMAT by beon-communications'));
$container->setParameter(
    'disalowedFileTypes',
    [
        'bat',
        'exe',
        'cmd',
        'sh',
        'php',
        'pl',
        'cgi',
        '386',
        'dll',
        'com',
        'torrent',
        'js',
        'app',
        'jar',
        'pif',
        'vb',
        'vbscript',
        'wsf',
        'asp',
        'cer',
        'csr',
        'jsp',
        'drv',
        'sys',
        'ade',
        'adp',
        'bas',
        'chm',
        'cpl',
        'crt',
        'csh',
        'fxp',
        'hlp',
        'hta',
        'inf',
        'ins',
        'isp',
        'jse',
        'htaccess',
        'htpasswd',
        'ksh',
        'lnk',
        'mdb',
        'mde',
        'mdt',
        'mdw',
        'msc',
        'msi',
        'msp',
        'mst',
        'ops',
        'pcd',
        'prg',
        'reg',
        'scr',
        'sct',
        'shb',
        'shs',
        'url',
        'vbe',
        'vbs',
        'wsc',
        'wsf',
        'wsh',
        'db'
    ]
);
$container->setParameter('fb_app_id', '400464766680639');
$container->setParameter('fb_app_secret', '936eb13cb86ab122305048ab4f07a1bc');
$container->setParameter('graph_api_endpoint', 'https://graph.facebook.com/v2.2');
$container->setParameter('fbRedirectUrl', '');
