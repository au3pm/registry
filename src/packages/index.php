<?php

$page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);

$page = match ($page) {
    false, null => 1,
    default => $page <= 0 ? 1 : $page,
};

$search = filter_input(INPUT_GET, 'search', FILTER_UNSAFE_RAW);
?>

<tr>
    <td>name</td>
    <td>email</td>
    <td>id</td>
</tr>
<tr>
    <td>name</td>
    <td>email</td>
    <td>id</td>
</tr>
<tr>
    <td>name</td>
    <td>email</td>
    <td>id</td>
</tr>
<tr>
    <td>name</td>
    <td>email</td>
    <td>id</td>
</tr>
<tr>
    <td>name</td>
    <td>email</td>
    <td>id</td>
</tr>
<tr>
    <td>name</td>
    <td>email</td>
    <td>id</td>
</tr>
<tr>
    <td>name</td>
    <td>email</td>
    <td>id</td>
</tr>
<tr>
    <td>name</td>
    <td>email</td>
    <td>id</td>
</tr>
<tr>
    <td>name</td>
    <td>email</td>
    <td>id</td>
</tr>
<tr hx-get="./packages/?page=<?=$page + 1?>" hx-trigger="revealed" hx-swap="afterend">
    <td>name</td>
    <td>email</td>
    <td>id</td>
</tr>
