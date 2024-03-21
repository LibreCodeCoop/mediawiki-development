<?php

chdir('/var/www/mediawiki');

$localSettings = fopen('LocalSettings.php', 'a');
fwrite($localSettings, <<<'SETTINGS'
    $wgPasswordPolicy['policies']['sysop']['MinimumPasswordLengthToLogin'] = 1;
    $wgPasswordPolicy['policies']['sysop']['MinimalPasswordLength'] = 1;

    SETTINGS
);
