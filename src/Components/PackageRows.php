<?php

namespace Au3pm\Registry\Components;

use Au3pm\Registry\Database;
use Genius257\View\Component;

class PackageRows extends Component
{
    protected $properties = [
        'children' => null,
        'page' => 1,
    ];

    protected function _render()
    {
        $children = $this->getProperty('children');
        if ($children === null) {
            $children = Database::getInstance()->getPackages($this->getProperty('page'));
        }

        for ($i = 0; $i < count($children); $i++) {
            $child = $children[$i];
            if ($i === count($children) - 1) {
                ?>
                <tr hx-get="./packages/?page=<?=$this->getProperty('page') + 1?>" hx-trigger="revealed" hx-swap="afterend">
                    <td><?=$child['name']?></td>
                    <td><?=$child['external_id']?></td>
                </tr>
                <?php
            } else {
                ?>
                <tr>
                    <td><?=$child['name']?></td>
                    <td><?=$child['external_id']?></td>
                </tr>
                <?php
            }
        }
    }
}