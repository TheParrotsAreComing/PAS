<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="message success" data-ix="page-load-fade-in" onclick="this.classList.add('hidden')"><span class="flash-text"><?= $message ?></span></div>
