<?php

    $history = isset($_SESSION['history']) && is_array($_SESSION['history']) ? $_SESSION['history'] : [];
    $start = microtime(true);
    $setup_script = false;
    if (isset($_GET['X']) && isset($_GET['Y']) && isset($_GET['R']) && is_numeric ($_GET['Y'])) {
        $y = $_GET['Y'];
        $y = substr(str_ireplace(",", ".", $y), 0, 4);

        $x = $_GET['X'];
        $r = $_GET['R'];
	$setup_script = true;

	
 }

  ?>
