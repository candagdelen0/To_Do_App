<?php
    include "connection.php";

    class System {
        public function safety($data) {
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        public function genelsorgu($vt, $sql, $tercih) {
            $sorgu = $vt->prepare($sql);
            $sorgu->execute();
            if ($tercih == 1) {
                return $sonuc = $sorgu->get_result();
            }
        }
    }
?>