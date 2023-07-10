<?php
/**
 * 2015-02-07
 * Обратите внимание, что алгоритмов проверки массива на ассоциативность найдено очень много:
 * http://stackoverflow.com/questions/173400/how-to-check-if-php-array-is-associative-or-sequential
 * Я уже давно (несоколько лет) использую приведённый ниже.
 * Пока он меня устраивает, да и сама задача такой проверки
 * возникает у меня в Российской сборке Magento редко
 * и не замечал её особого влияния на производительность системы.
 * Возможно, другие алгоритмы лучше, лень разбираться.
 * 2017-10-29 It returns `true` for an empty array.
 * @param array(int|string => mixed) $a
 * @return bool
 */
function df_is_assoc(array $a) {
	if (!($r = !$a)) { /** @var bool $r */
		foreach (array_keys($a) as $k => $v) {
			// 2015-02-07
			// Согласно спецификации PHP, ключами массива могут быть целые числа, либо строки.
			// Третьего не дано.
			// http://php.net/manual/language.types.array.php
			// 2017-02-18
			// На самом деле ключом может быть и null, что неявно приводится к пустой строке:
			// http://stackoverflow.com/a/18247435
			// 2015-02-07
			// Раньше тут стояло !is_int($key)
			// Способ проверки $key !== $value нашёл по ссылке ниже:
			// http://www.php.net/manual/en/function.is-array.php#84488
			if ($k !== $v) {
				$r = true;
				break;
			}
		}
	}
	return $r;
}