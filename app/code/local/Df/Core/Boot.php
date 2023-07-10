<?php
namespace Df\Core;
# # 2023-07-10 https://github.com/magento-russia/3/blob/2023-07-10/app/code/local/Df/Core/Boot.php
class Boot {
	/**
	 * @used-by Mage_Core_Model_App::_callObserverMethod()
	 */
	function _default() {self::run();}

	/**
	 * 2015-08-03
	 * При установке РСМ одновременно с CE controller_front_init_before — это первое событие,
	 * которое становится доступно подписчикам.
	 * @used-by Mage_Core_Model_App::_callObserverMethod()
	 */
	function controller_front_init_before() {self::run();}

	/**
	 * @used-by Mage_Core_Model_App::_callObserverMethod()
	 * @param \Varien_Event_Observer $observer
	 * @return void
	 */
	function resource_get_tablename(\Varien_Event_Observer $observer) {
		if (!self::done() && self::needInitNow($observer['table_name'])) {
			self::run();
		}
	}

	/**
	 * @used-by self::resource_get_tablename()
	 * @return bool
	 */
	public static function done() {return self::$_done;}

	/**
	 * 2015-03-06
	 * Вероятно, часть этих вызовов уже избыточны,
	 * потому что инициализация за последние годы развития Российской сборки Magento
	 * стала более «умной»: @see self::resource_get_tablename()
	 * @used-by self::resource_get_tablename()
	 */
	public static function run() {
		if (!self::$_done) {
			self::init();
			self::$_done = true;
		}
	}

	/**
	 * Этот метод содержит код инициализации, который должен выполняться как можно раньше:
	 * вне зависимости, был ли уже инициализирован текущий магазин системы.
	 * Соответственно, в этом методе мы не можем работать с объектами-магазинами.
	 * В том числе, в частости, не можем прочитывать настройки текущего магазина.
	 * @used-by self::run()
	 */
	private static function init() {self::lib();;}

	/** 
	 * @used-by self::needInitNow()
	 * @return bool 
	 */
	private static function isCompilationFromCommandLine() {static $r; return $r ?: $r =
		@class_exists('Mage_Shell_Compiler', false)
	;}

	/**
	 * 2023-07-10 https://github.com/itsapiece/all/blob/2023-07-10/app/code/local/ItsAPiece/PinkTown/Importer.php#L159-L183
	 * @used-by self::init()
	 */
	private static function lib() {
		// 2017-04-25, 2017-12-13
		// Unfortunately, I have not found a way to make this code reusable among my modules.
		// I tried to move this code to a `/lib` function like df_lib(), but it raises a «chicken and egg» problem,
		// because Magento runs the `registration.php` scripts before any `/lib` functions are initalized,
		// whereas the `/lib` functions are initalized from the `registration.php` scripts.
		$base = dirname(__FILE__); /** @var string $base */
		if (is_dir($libDir = "{$base}/lib")) { /** @var string $libDir */
			// 2017-11-13
			// Today I have added the subdirectories support inside the `lib` folders,
			// because some lib/*.php files became too big, and I want to split them.
			$requireFiles = function($libDir) use(&$requireFiles) {
				// 2015-02-06
				// array_slice removes «.» and «..».
				// http://php.net/manual/function.scandir.php#107215
				foreach (array_slice(scandir($libDir), 2) as $c) {  /** @var string $resource */
					is_dir($resource = "{$libDir}/{$c}") ? $requireFiles($resource) : require_once "{$libDir}/{$c}";
				}
			};
			// 2015-02-06
			// array_slice removes «.» and «..».
			// http://php.net/manual/function.scandir.php#107215
			foreach (array_slice(scandir($libDir), 2) as $c) { /** @var string $resource */
				is_dir($resource = "{$libDir}/{$c}") ? $requireFiles($resource) : require_once "{$libDir}/{$c}";
			}
		}
	}

	/**
	 * Мы бы рады инициализировать нашу библиотеку при загрузке таблицы «core_resource»,
	 * однако в тот момент система оповещений о событиях ещё не работает,
	 * и мы сюда всё равно не попадём.
	 * Обратите внимание, что проблема инициализации Российской сборки Magento
	 * при работе стороронних установочных скриптов
	 * удовлетворительно решается методом @see Df_Core_Helper_DataM::useDbCompatibleMode()
	 * @used-by self::resource_get_tablename()
	 * @param string $t
	 * @return bool
	 */
	private static function needInitNow($t) {return
		'core_website' === $t || 'index_process' === $t && self::isCompilationFromCommandLine();
	}

	/**
	 * @used-by self::done()
	 * @used-by self::run()
	 * @var bool
	 */
	private static $_done = false;
}