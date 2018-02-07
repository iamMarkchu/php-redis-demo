<?php
/**
 * redis 数据类型 string, list, set, sorted set, hash, bitmap
 *
 * keys *
 * # string 常见操作
 * set get strlen append getrange mset mget exists incr decr incrBy decrBy bitcount bitsets
 *
 */
$redis = new Redis();
$redis->connect('127.0.0.1');
echo '------------------'. PHP_EOL;
$list = $redis->keys('*');
echo 'keys: '. PHP_EOL;

foreach ($list as $key => $value) {
  echo ($key+1). ': '.$value. PHP_EOL;
}

echo '------------------'. PHP_EOL;

// 存储字符串
$redis->set('name', 'chukui');
echo 'name: '. $redis->get('name') .PHP_EOL;

// 字符串长度
echo 'length: '. $redis->strlen('name'). PHP_EOL;

// append
$redis->append('name', ' niu bi');
echo 'after append: '. $redis->get('name') .PHP_EOL;

// getrange
echo 'getrange(2 to 7): '. $redis->getrange('name', 2, 7) .PHP_EOL;

// 统计1的个数
echo 'bitcount: '. $redis->bitcount('name') .PHP_EOL;

echo '------------------'. PHP_EOL;