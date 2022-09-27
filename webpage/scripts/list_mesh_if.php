<?php
echo shell_exec("batctl if | egrep -o '^[^:]+'");

?>
