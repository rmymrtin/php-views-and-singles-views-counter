<?php
function getIPAdress()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

function getUniqueViews()
{
    $db = Database::getDB();
    $req = $db->prepare('SELECT id FROM uniques_views');
    $req->execute();
    $rowCount = $req->rowCount();
    return $rowCount;
    var_dump($rowCount);
}

function getViews()
{
    $db = Database::getDB();
    $req = $db->prepare('SELECT id FROM views');
    $req->execute();
    $rowCount = $req->rowCount();
    return $rowCount;
}

function checkUniqueViewAndAddView()
{
    $db = Database::getDB();
    $req = $db->prepare('SELECT id FROM uniques_views WHERE ip_adress = ?');
    $req->execute(array(getIPAdress()));
    $rowCount = $req->rowCount();
    addView();
    if ($rowCount == 0) {
        addUniqueView();
    };
}

function addUniqueView()
{
    $db = Database::getDB();
    $req = $db->prepare('INSERT INTO uniques_views(ip_adress, date) VALUES(?, ?)');
    $req->execute(array(getIPAdress(), date('Y-m-d H:i:s')));
}

function addView()
{
    $db = Database::getDB();
    $req = $db->prepare('INSERT INTO views(ip_adress, date) VALUES(?, ?)');
    $req->execute(array(getIPAdress(), date('Y-m-d H:i:s')));
}
