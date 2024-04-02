<?php

chdir('/var/www/mediawiki');

foreach (glob('../src/mediawiki/*') as $origin) {
	$destination = str_replace('../src/mediawiki/', '', $origin);
	if (is_file($destination) || is_dir($destination)) {
		exec('rm -rf ' . $destination);
		exec('ln -s ' . $origin . ' ' . $destination);
	}
	if (!is_link($destination)) {
		exec('ln -s ' . $origin . ' ' . $destination);
	}
}
