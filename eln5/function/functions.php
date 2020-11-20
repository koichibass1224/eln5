<?php
// データベースに接続
function connectDB() {

        try {
          // return new PDO('mysql:dbname=end2_db;charset=utf8;host=localhost','root','root');
          return new PDO('mysql:dbname=stokyo_end2_db;charset=utf8;host=mysql57.stokyo.sakura.ne.jp','stokyo','koichi1224s');
        } catch (PDOException $e) {
          exit('DBConnectError:'.$e->getMessage());
        }     
      }
?>