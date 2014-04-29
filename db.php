<?php
mysql_connect("localhost", "root", "") or die ("Oops! Detta gikk itte"); // Forsøker å koble opp mot phpMyadmin
mysql_select_db("centralpub") or die ("Oops! Detta gikk itte"); // Velger riktig database
?>