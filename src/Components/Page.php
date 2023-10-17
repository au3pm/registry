<?php

namespace Au3pm\Registry\Components;

use Genius257\View\Component;

class Page extends Component {
    protected function _render() {
        ?>
        <!DOCTYPE html>
        <html>

        <head>
            <title>AutoIt3 Package Registry</title>
            <script src="https://unpkg.com/htmx.org@1.9.5"></script>
        </head>

        <body>
            <?= $this->renderChildren(); ?>
        </body>

        </html>
        <?php
    }
}
