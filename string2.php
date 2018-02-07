<?php

/**
 * ID为 1-1000000的文章
 * ID为 1-10000的用户
 * 统计每位用户一天的浏览量，点赞量, 浏览的是哪些，点赞的是哪些
 * 统计每篇文章的浏览量， 点赞量, 被谁浏览，被谁点赞
 */

$redis = new Redis();
$redis->connect('127.0.0.1');
// 存储数字
$key = 'user.1.visits';

// 判断是否存在key
if(!$redis->exists($key))
  $redis->set($key, 0);

// 自增 1
$redis->incr($key);
echo $redis->get($key) .PHP_EOL;

// 自增 num
$redis->incrBy($key, 10);
echo $redis->get($key) .PHP_EOL;

echo '------------------'. PHP_EOL;