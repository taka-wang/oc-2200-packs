<?php
$this->db->query("DELETE FROM " . DB_PREFIX . "modification WHERE code = 'timezone'");
?>