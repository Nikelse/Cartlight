<?php
/* eShopCart - Fonctions toolkit
* author @NikelseDev */

class Fonctions {

/* read csv source file (with separator) of objects data */
public static function ReadObjectDatas ( $path ) {
  $datas = array();
  $row = 1;

  /* read the csv source row by row */
  if (($handle = fopen($path, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1024, ";")) !== FALSE) {
      /* first row is the header so ignore at loading */
      if ($row > 1) {
        $tab = array();
        foreach ($data as $k => $v) {
          $tab[$index[$k]] = $v;
          }
        $datas[$row-1] = $tab;
        }
      /* set the collection heading name for array */
      else {
        $index = $data;
        }
      $row++;
      }
    fclose($handle);

    /* return array of objects loaded in csv source file */
    return $datas;
    }

  }

/* read csv of reservation id - quantity */
public static function ReadReservationDatas ( $path ) {
  $datas = array();
  $row = 0;

  /* read the csv source row by row */
  if (($handle = fopen($path, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1024, ";")) !== FALSE) {
      $datas[$row] = $data;
      $row++;
      }
    }
  fclose($handle);

  /* return array of objects loaded in csv source file */
  return $datas;
}

}

?>