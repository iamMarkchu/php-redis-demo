<?php
/**
 * # list  先进先出
 */
$redis = new Redis();
$redis->connect('127.0.0.1');

$redisKey = 'work:queue';
$queueIndexKey = 'queue:index';
$redis->setNx($queueIndexKey, 1);

// 增加 1000个 job到队列
for ($i=0; $i < 1000; $i++) { 
  $redis->lPush($redisKey, 'a job '. ($i + 10));
}

// 将一个item 从队尾取出
echo $redis->rPop($redisKey). PHP_EOL;

// 获取队列长度
echo $redis->lLen($redisKey);

// 获取指定范围的队列元素
print_r($redis->lRange($redisKey, 0, -1));