<?php
use Exception as E;

/**
 * 2020-01-21
 * @param mixed $cond
 * @param null $m
 * @return mixed
 * @throws E
 */
function df_assert($cond, $m = null) {return $cond ?: df_error($m);}


/**
 * 2020-01-21
 * @used-by df_assert()
 * @param string|string[]|mixed|E|null ...$m
 * @throws E
 */
function df_error(...$m) {throw $m instanceof E ? $m : new E(
	is_null($m) ? null : (is_array($m) ? implode("\n\n", $m) : sprintf(...$m))
);}