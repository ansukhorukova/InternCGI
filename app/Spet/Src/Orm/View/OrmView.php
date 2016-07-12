<?php

/**
 * Connect with database contained in $dbh var.
 *
 * To work with logger, use $logger var
 */

// 1. Creating a record

$user1 = new User($dbh);

$user1->setName('Frank');
$user1->setEmail('Frank123@exe.com');
$user1->save();

echo $user1->getId();
echo '<br>';
echo $user1->getName();
echo '<br>';
var_dump($user1->loadAll());
// 2. Loading / updating a record

$user2 = new User($dbh);
$user2->load(15);

echo $user2->getId();
echo '<br>';
echo $user2->getName();
echo '<br>';
echo $user2->getEmail();

$user2->setEmail('eppp@il.com');
$user2->save();
echo '<br>';
echo $user2->getEmail();
echo '<br>';
var_dump($user2->loadAll());


// 3. Deleting record

$user3 = new User($dbh);
$user3->load(9);
$user3->delete();
var_dump($user3->loadAll());

// Object comparison

echo 'User1:';
echo '<br>';
echo $user1->getId();
echo '<br>';
echo $user1->getName();
echo '<br>';

echo 'User2:';
echo '<br>';
echo $user2->getId();
echo '<br>';
echo $user2->getName();
echo '<br>';

echo 'User3:';
echo '<br>';
echo $user3->getId();