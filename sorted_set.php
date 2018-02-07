<?php
/**
 * # sorted set
 * 排行榜应用
 */
$redis = new Redis();
$redis->connect('127.0.0.1');
// $redis->flushAll();

$userList = [
    'liwei', 'mark', 'ike', 'yuki', 'little p', 'jack', 'pie', '3.14', 'luke', 'www', 'eee', '123', 'asd', '123111'
];
$redisKey = 'royalcrash:clan:2P0YUGG:rank';
/*foreach ($userList as $k => $v) {
    $score = mt_rand(2000, 4000);
    $redis->zadd($redisKey, $score, $v);
    echo $v. ': '. $score. PHP_EOL;
}*/

// echo 'sort by score asc ';
// print_r($redis->zRange($redisKey, 0, -1, TRUE));

echo 'sort by score desc ';
print_r($redis->zRevRange($redisKey, 0, -1, TRUE));

// liwei play win 4 games;
for ($i=0; $i < 4; $i++) { 
    $redis->zIncrBy($redisKey, mt_rand(28, 35), 'mark');
}

echo 'sort by score desc ';
print_r($redis->zRevRange($redisKey, 0, -1, TRUE));