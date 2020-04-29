<?php
/* eShopCart - Fonctions toolkit
* author @NikelseDev */

class Fonctions {

/* read csv source file (with separator) of objects data */
public static function ReadObjectDatas ($path) {

  $datas = array();
  $row = 1;
  /* read the csv source row by row */
  if (($handle = fopen($path, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {

      /* first row is the header so ignore at loading */
      if ($row > 1) {
        $datas[$row-1] = $data;
        }
      $row++;
      }
    fclose($handle);

    /* return array of objects loaded in csv source file */
    return $datas;
    }

  }

}

?>