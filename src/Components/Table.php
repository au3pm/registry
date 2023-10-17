<?php

namespace Au3pm\Registry\Components;
use Genius257\View\Component;

class Table extends Component
{
    protected function _render() {
        ?>
        <table hx-indicator=".htmx-indicator">
            <?= $this->renderChildren() ?>
        </table>
        <?php
    }
}