<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div data-ix="page-load-fade-in" class="message error" onclick="this.classList.add('hidden');"><span class="flash-text"><b>Error:</b> <?= $message ?></span></div>
