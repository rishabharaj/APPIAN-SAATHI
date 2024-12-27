<?php
class Logger {
    private static function writeLog($message, $logFile) {
        $logMessage = "[" . date("Y-m-d H:i:s") . "] " . $message . PHP_EOL;
        file_put_contents($logFile, $logMessage, FILE_APPEND);
    }

    public static function error($message) {
        self::writeLog("ERROR: " . $message, __DIR__ . '/../logs/error.log');
    }

    public static function info($message) {
        self::writeLog("INFO: " . $message, __DIR__ . '/../logs/access.log');
    }

    public static function debug($message) {
        self::writeLog("DEBUG: " . $message, __DIR__ . '/../logs/debug.log');
    }
}
?>
