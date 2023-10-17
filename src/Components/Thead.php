<?php

namespace Au3pm\Registry\Components;

use Genius257\View\Component;

class Thead extends Component {
    protected function _render() {
        ?>
        <thead>
            <tr>
                <?php foreach ($this->getProperty('children') as $child) {
                    ?>
                        <th><?=$child?></th>
                    <?php
                } ?>
            </tr>
        </thead>
        <?php
    }
}
