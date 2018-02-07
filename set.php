<?php 
$redis = new Redis();
$redis->connect('127.0.0.1');
$redis->flushAll();

$redisAKey = 'user:mark:friends';
$redisBKey = 'user:jerry:friends';

// 添加 mark 的 friends 列表
$markFriends = [
  'jack', 'bonbon', 'ike', 'seven', 'amy', 'buck', 'charles'
];
foreach ($markFriends as $key => $value) {
  $redis->sadd($redisAKey, $value);
}

$jerryFriends = [
  'bonbon', 'ike', 'seven', 'amy', 'buck', 'charles', 'dannel', 'hopper'
];

foreach ($jerryFriends as $key => $value) {
  $redis->sadd($redisBKey, $value);
}

// mark info
echo 'mark friends: ';
print_r($redis->sMembers($redisAKey));
echo PHP_EOL;

echo 'mark friends count: '. $redis->sCard($redisAKey). PHP_EOL;


// jerry info
echo 'jerry friends: ';
print_r($redis->sMembers($redisBKey));
echo PHP_EOL;

echo 'jerry friends count: '. $redis->sCard($redisBKey). PHP_EOL;

echo 'mark & jerry common friends';
print_r($redis->sInter($redisAKey, $redisBKey));

// sIsMember
echo 'jerry is mark friend ?'. PHP_EOL;

var_dump($redis->sIsMember($redisAKey, 'jerry'));

echo 'after add jerry to mark\'s friends list'. PHP_EOL;

$redis->sadd($redisAKey, 'jerry');

echo 'jerry is mark friend ?'. PHP_EOL;

var_dump($redis->sIsMember($redisAKey, 'jerry'));

// sRem
echo 'mark delete buck from his friends list';
$redis->sRem($redisAKey, 'buck');