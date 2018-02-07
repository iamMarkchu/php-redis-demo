<?php
/**
 * # hash 常见操作
 * hset hset hexists hgetall hincrBy
 */
$userID = isset($argv[1])? $argv[1]: 1;
$redis = new Redis();
$redis->connect('127.0.0.1');

$redisKey = "user:{$userID}:info";

$userInfo = [
  'name' => 'mark',
  'sex' => 'male',
  'age' => 18,
  'email' => '45408551@qq.com'
];

// hSet
/*foreach ($userInfo as $key => $value) {
  $redis->hSet($redisKey, $key, $value);
}*/

// hMset
$redis->hMSet($redisKey, $userInfo);

// hLen 一共有几项
echo 'hLen: ';
print_r($redis->hLen($redisKey). PHP_EOL);

// 获取所有的键值对 hGetAll
echo 'hGetAll: ';
print_r($redis->hGetAll($redisKey));

// 获取指定的键值对
echo 'hMGET: ';
print_r($redis->hMGET($redisKey, ['name', 'email']));

// 邮箱变更了
$redis->hSet($redisKey, 'email', 'chukui521@qq.com');
// 年龄增长了 hIncrBy
$redis->hIncrBy($redisKey, 'age', 1);

// 增加一项 身份证号  hSet
$idCard = '4209231992062758xx';
$redis->hSet($redisKey, 'idCard', $idCard);

// 不再记录 email  hDel
$redis->hDel($redisKey, 'email');

// 获取所有的key值
echo 'hKeys: ';
print_r($redis->hKeys($redisKey));

// 获取所有的value值
echo 'hVals: ';
print_r($redis->hVals($redisKey));

print_r($redis->hGetAll($redisKey));




