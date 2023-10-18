<?php

namespace Au3pm\Registry\Components;

use Genius257\View\Component;

class Tbody extends Component
{
    protected function _render() {
        ?>
        <tbody id="search-results">
            <?= $this->renderChildren() ?>
            <tr hx-get="./packages/?page=1" hx-trigger="revealed" hx-swap="afterend">
                <td>name</td>
                <td>email</td>
                <td>id</td>
            </tr>
        </tbody>
        <?php
    }
}