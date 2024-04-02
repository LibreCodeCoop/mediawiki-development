<?php

chdir('/var/www/mediawiki');

foreach (glob('../src/mediawiki/*') as $origin) {
	$destination = str_replace('/src/', '/', $origin);
	if (is_file($destination) || is_dir($destination)) {
		exec('rm -rf ' . $destination);
		exec('ln -s ' . $origin . ' ' . $destination);
	}
}
