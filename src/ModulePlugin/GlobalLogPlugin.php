<?php
namespace Log\ModulePlugin;

use Common\Module\Plugin;
use Exception;
use Log\Log;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LogLevel;

class GlobalLogPlugin implements Plugin
{
	/**
	 * @throws Exception
	 */
	public function execute()
	{
		$logger = new Logger('application');
		$logger->pushHandler(
			new StreamHandler('data/log/application.log')
		);
		$logger->pushHandler(
			new StreamHandler('data/log/error.log', LogLevel::ERROR)
		);

		Log::setLogger($logger);
	}
}