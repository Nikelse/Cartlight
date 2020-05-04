<?php
/* eShopCart - Configuration File
* source file package for setup configuration
* setup your web server to use with
* author @NikelseDev */

$CONFIG = array (

  "WebSiteUrl"      => "http://localhost:8080/ESHOPCART/",
  "WebName"         => "eShopCart",
  "MailContact"     => "contact@nikelse.net",

  "Charset"         => "UTF-8",
  "TimeZone"        => "Europe/Paris",
  "Langage"         => "fr_FR",

  "ModuleEnable"    => true,
  "Error_Report"    => true,
  "Demonstration"   => true,
  "Reservation"     => true,

  "ExportCookie"    => true,
  "ExportMail"      => false,

  "ExportOrder"     => true,
  "Export_Path"     => "FILES/ExportCart/",

  "Image_Path"      => "MEDIAS/Images/"

);

$PRODUCT = array (

  "File_Product"          => "objects.csv",

  "Money_Symbol"          => "€",
  "Max_Product_Quantity"  => 99

);

?>