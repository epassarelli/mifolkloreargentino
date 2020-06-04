<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
| 
| To get API details you have to create a Google Project
| at Google API Console (https://console.developers.google.com)
| 
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/
$config['google']['client_id']        = '487147293916-ef937bj9b31vrh4oni1uvg3mic16dunc.apps.googleusercontent.com';
$config['google']['client_secret']    = 'F4NJw0eBOKCO8cxEv2T2Na3i';
$config['google']['redirect_uri']     = 'https://www.mifolkloreargentino.com.ar/';
$config['google']['application_name'] = 'Login MFA';
$config['google']['api_key']          = '';
$config['google']['scopes']           = array();