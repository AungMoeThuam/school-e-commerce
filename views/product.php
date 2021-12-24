<?php

function product($data)
{
    return "<div>
    <h1>$data['name']</h1>
    <p>$data['description']</p>
    <img src='<?php $data['photo'] ?>' >
    <h4>$data["price"]</h4>
</div>";
}

?>


