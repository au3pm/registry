<?php

namespace Au3pm\Registry\Components;

use Genius257\View\Component;

class Tr extends Component {
    protected function _render() {
        ?>
        <tr>
            <?= $this->renderChildren() ?>
        </tr>
        <?php
    }
}