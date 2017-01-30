<?php

function loadTemplate($page, $params, $layout = true) {
    global $config;

    if ($layout) {
        ob_start();
    }
    ob_start();
    extract($params, EXTR_SKIP);
    require_once(THEMES_PATH . $page . '.php');
    $content = ob_get_clean();
    if ($layout) {
        require_once(THEMES_PATH . '/layout.php');
        return ob_get_clean();
    }
    return $content;
}
