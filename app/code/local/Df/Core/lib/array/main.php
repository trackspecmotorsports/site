<?php
/**
 * 2021-01-29
 * @param array(int|string => mixed) $a
 * @param string|string[]|int|null $k
 * @param mixed $d
 * @return mixed|null|array(string => mixed)
 */
function dfa(array $a, $k, $d = null) {return is_null($k) ? $a : (isset($a[$k]) ? $a[$k] : $d);}

/**
 * 2017-02-18
 * [array|callable, array|callable] => [array, callable]
 * @param callable|array(int|string => mixed)|array[]\Traversable $a
 * @param null|callable|array(int|string => mixed)|array[]|\Traversable $b [optional]
 * @return array(int|string => mixed)
 */
function dfaf($a, $b) {return is_callable($a) ? [$b, $a] : [$a, $b];}

/**
 * 2021-01-29
 * @param array $a
 * @return mixed|null
 */
function df_first(array $a) {return !$a ? null : reset($a);}

/**
 * 2015-02-11
 * Эта функция отличается от @see iterator_to_array() тем, что допускает в качестве параметра
 * не только @see \Traversable, но и массив.
 * @param \Traversable|array $t
 * @return array
 */
function df_ita($t) {return is_array($t) ? $t : iterator_to_array($t);}

/**
 * Функция возвращает null, если массив пуст.
 * Если использовать @see end() вместо @see df_last(),
 * то указатель массива после вызова end сместится к последнему элементу.
 * При использовании @see df_last() смещения указателя не происходит,
 * потому что в @see df_last() попадает лишь копия массива.
 *
 * Обратите внимание, что неверен код
 *	$result = end($array);
 *	return (false === $result) ? null : $result;
 * потому что если @uses end() вернуло false, это не всегда означает сбой метода:
 * ведь последний элемент массива может быть равен false.
 * http://www.php.net/manual/en/function.end.php#107733
 * @param mixed[] $array
 * @return mixed|null
 */
function df_last(array $array) {return !$array ? null : end($array);}

/**
 * 2021-01-29
 * @param int|string $v
 * @param array(int|string => mixed) $map
 * @return int|string|mixed
 */
function df_tr($v, array $map) {return dfa($map, $v, $v);}

/**
 * 2016-09-02
 * @see dfa_deep_unset()
 * @uses array_flip() корректно работает с пустыми массивами.
 * @param array(string => mixed) $a
 * @param string[] $keys
 * @return array(string => mixed)
 */
function dfa_unset(array $a, array $keys) {return array_diff_key($a, array_flip($keys));}