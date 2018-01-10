<?php

function isAjax() {
   return isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
}

require 'body-class.php';

require 'breadcrumbs.php';

require 'excerpt.php';

require 'pagination.php';

require 'url-thumbnail.php';

require 'integrations.php';



?>