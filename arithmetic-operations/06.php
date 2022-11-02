<?php

for ($i = 1; $i <= 110; $i++) {

    // ======== MULTIPLES OF 3 AND 5 ========= \\
    if ($i % 3 == 0 & $i % 5 == 0) {
        echo "CozaLoza ";

        // ========== MULTIPLES OF 3  ============ \\
    } elseif ($i % 3 == 0) {
        echo "Coza ";

        // ========== MULTIPLES OF 5 ============ \\
    } elseif ($i % 5 == 0) {
        echo "Loza ";

        // ========== MULTIPLES OF 7 ============ \\
    } elseif ($i % 7 == 0) {
        echo "Woza ";
    } else {
        echo $i . " ";
    }
    if ($i % 11 == 0) { // 11 characters per column
        echo PHP_EOL;
    }
}
