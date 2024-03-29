<?php

namespace Au3pm\Registry\Components;

use Genius257\View\Component;

class PackageTable extends Component
{
    protected function _render()
    {
        ?>
        <input
            class="form-control"
            type="search"
            name="search"
            placeholder="Begin typing to search package names..."
            hx-get="./packages/"
            hx-trigger="keyup changed delay:500ms, search"
            hx-target="#search-results"
            hx-indicator=".htmx-indicator"
        />
        <table hx-indicator=".htmx-indicator">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Author</th>
                </tr>
            </thead>
            <tbody id="search-results">
                <?=$this->renderChildren()?>
            </tbody>
        </table>
        <center>
            <img class="htmx-indicator" width="60" src="/img/bars.svg">
        </center>
        <?php
    }
}