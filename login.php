<?php 
require_once "lib/MysqliDb.php"; 
$db = new MysqliDb('localhost','root', '', 'db_lesson_security_php'); // ma wbudiowany sql ingection plus połaczenie samo się zamyka

// $db = null;
// $db =  MysqliDb::getInstance(); // można pobierać instancje


// $db->where('id_comment',14);
// $db->where('name', null, 'IS'); // gdzie jest null 
// $db->orderBy('dt', 'DESC');  // sortowanie 
// $db->where('name', null, 'IS NOT'); // gdzie nie jest null 
// $db->where('is_moderate','0','!='); // gdzie nie jest 0 to samo z  <>
// $db->where('text','%img%','LIKE');
/*
   $db->insert('comments',[
       'name' => 'Andre',
        'text' => '<img src="https://static10.tgstat.ru/channels/_0/42/4223e2e713c0b5c8f7dc8dab551775ba.jpg" alt="" srcset="">'
   ]); // wstawianie zwraca id utworzonego obiektu
*/
/*
    $db->where('id',6);
    echo $db->update('comments',[
        'name' => 'Incognito'
    ]); // wstawianie zwraca true false lub 0 1
*/

$db->where('id', 19, '>');
//$db->delete('comments');
if($db->delete('comments')) echo 'successfully deleted';
$rows = $db->get('comments'); // pobiera wszystkie elementy 

// $rows = $db->getOne('comments'); // pobiera jeden element
// echo $rows['text']; 

 var_dump($rows);