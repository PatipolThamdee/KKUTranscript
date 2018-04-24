<?php
session_start();
require_once 'saml/lib/_autoload.php';
$as = new \SimpleSAML_Auth_Simple('default-sp');
$as->requireAuth();
$attributes = $as->getAttributes();
$_SESSION['sso-code-example'] = $attributes;
/**
 * example for set data
 *
 * $attributes = $as->getAttributes();
 * $_SESSION['id'] = $attributes['SSO_USER_ID'][0];
 * $_SESSION['username'] = $attributes['SSO_USERNAME'][0];
 * $_SESSION['firstname'] = $attributes['SSO_FIRSTNAME'][0];
 * $_SESSION['lastname'] = $attributes['SSO_LASTNAME'][0];
 *
 */
header('Location: index.php');