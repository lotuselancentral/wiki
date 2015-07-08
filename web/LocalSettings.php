<?php

# This file was automatically generated by the MediaWiki installer.
# If you make manual changes, please keep track in case you need to
# recreate them later.
#
# See includes/DefaultSettings.php for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.

# If you customize your file layout, set $IP to the directory that contains
# the other MediaWiki files. It will be used as a base to locate files.
if( defined( 'MW_INSTALL_PATH' ) ) {
	$IP = MW_INSTALL_PATH;
} else {
	$IP = dirname( __FILE__ );
}

$path = array( $IP, "$IP/includes", "$IP/languages" );
set_include_path( implode( PATH_SEPARATOR, $path ) . PATH_SEPARATOR . get_include_path() );

require_once( "includes/DefaultSettings.php" );

# If PHP's memory limit is very low, some operations may fail.
ini_set( 'memory_limit', '20M' );

if ( $wgCommandLineMode ) {
	if ( isset( $_SERVER ) && array_key_exists( 'REQUEST_METHOD', $_SERVER ) ) {
		die( "This script must be run from the command line\n" );
	}
} elseif ( empty( $wgNoOutputBuffer ) ) {
	## Compress output if the browser supports it
	if( !ini_get( 'zlib.output_compression' ) ) @ob_start( 'ob_gzhandler' );
}

$wgSitename         = "WikiLEC";

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
$wgScriptPath       = "";

## For more information on customizing the URLs please see:
## http://www.mediawiki.org/wiki/Manual:Short_URL

$wgEnableEmail      = true;
$wgEnableUserEmail  = true;

$wgEmergencyContact = 'webmaster@lotuselancentral.com';
$wgPasswordSender = 'webmaster@lotuselancentral.com';

## For a detailed description of the following switches see
## http://meta.wikimedia.org/Enotif and http://meta.wikimedia.org/Eauthent
## There are many more options for fine tuning available see
## /includes/DefaultSettings.php
## UPO means: this is also a user preference option
$wgEnotifUserTalk = true; # UPO
$wgEnotifWatchlist = true; # UPO
$wgEmailAuthentication = true;

$wgDBtype           = "mysql";
$wgDBserver         = getenv('WIKILEC_DB_HOST');
$wgDBname           = getenv('WIKILEC_DB_NAME');
$wgDBuser           = getenv('WIKILEC_DB_USER');
$wgDBpassword       = getenv('WIKILEC_DB_PASSWORD');
$wgDBport           = getenv('WIKIPEC_DB_PORT');
$wgDBprefix         = "wikilec_";

# Schemas for Postgres
$wgDBmwschema       = "mediawiki";
$wgDBts2schema      = "public";

# Experimental charset support for MySQL 4.1/5.0.
$wgDBmysql5 = false;

## Shared memory settings
$wgMainCacheType = CACHE_NONE;
$wgMemCachedServers = array();

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads       = true;
$wgUseImageResize      = true;
$wgUseImageMagick = true;
$wgImageMagickConvertCommand = "/usr/bin/convert";

## If you want to use image uploads under safe mode,
## create the directories images/archive, images/thumb and
## images/temp, and make them all writable. Then uncomment
## this, if it's not already uncommented:
$wgHashedUploadDirectory = true;

## If you have the appropriate support software installed
## you can enable inline LaTeX equations:
$wgUseTeX           = true;

$wgLocalInterwiki   = $wgSitename;

$wgLanguageCode = "en";

$wgProxyKey = "";

## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'standard', 'nostalgia', 'cologneblue', 'monobook':
$wgDefaultSkin = 'vector';

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
# $wgEnableCreativeCommonsRdf = true;
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "";
$wgRightsText = "";
$wgRightsIcon = "";
# $wgRightsCode = ""; # Not yet used

$wgDiff3 = "/usr/bin/diff3";

# When you make changes to this configuration file, this will make
# sure that cached pages are cleared.
$configdate = gmdate( 'YmdHis', @filemtime( __FILE__ ) );
$wgCacheEpoch = max( $wgCacheEpoch, $configdate );
	
##
##
##  Changes for WikiLEC
##
##

require("extensions/analytics.php");

$wgLogo="/images/wikilec.png";

$wgEmailConfirmToEdit=true;

# This snippet prevents editing from anonymous users
$wgGroupPermissions['*']['edit'] = false;

# This snippet prevents new registrations from anonymous users
# (Sysops can still create user accounts)
$wgGroupPermissions['*']['createaccount'] = false;

$wgUseAjax=true;

$wgShowExceptionDetails = (bool) getenv('WIKILEC_DEBUG');

?>
