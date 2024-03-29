<?php

namespace Au3pm\Registry\Components;

use Au3pm\Registry\Database;
use Genius257\View\Component;

class PackageRows extends Component
{
    protected $properties = [
        'children' => null,
        'page' => 1,
        'search' => null,
    ];

    protected function _render()
    {
        $children = $this->getProperty('children');
        if ($children === null) {
            $children = Database::getInstance()->getPackages($this->getProperty('page'), $this->getProperty('search'));
        }

        for ($i = 0; $i < count($children); $i++) {
            $child = $children[$i];
            ?>
            <tr <?php if ($i === count($children) - 1) { ?> hx-get="./packages/?page=<?=$this->getProperty('page') + 1?>&search=<?=$this->getProperty('search')?>" hx-trigger="revealed" hx-swap="afterend" <?php } ?>>
                <td><a href="/package/<?=$child['id']?>/"><?=$child['name']?></a></td>
                <td><a href="/user/<?=$child['owner_id']?>/"><?=$child['external_id']?></a></td>
            </tr>
            <?php
        }
    }
}