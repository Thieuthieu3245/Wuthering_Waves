<?php

namespace Services;

class LogService
{
    const INFO = "INFO";
    const SUCCESS = "SUCCESS";
    const ERROR = "ERROR";

    private static string $logFolder = __DIR__ . '/../logs/'; 
    private static string $sitePrefix = "WW";

    /**
     * Return the filename for the daily log file.
     * The filename is built by concatenating the site prefix, the current date in the format "y_m_d", and the extension ".txt".
     * @return string The filename for the daily log file.
     */
    public static function getDailyLogFilename(): string
    {
        $date = date("y_m_d");
        return self::$sitePrefix . "_" . $date . ".txt";
    }

    private static function getDailyLogFilepath(): string
    {
        return self::$logFolder . self::getDailyLogFilename();
    }

    /**
     * Check if the daily log file exists.
     * @return bool True if the file exists, false otherwise.
     */
    public static function logFileExists(): bool
    {
        return file_exists(self::getDailyLogFilepath());
    }

    /**
     * Creates the daily log file if it does not already exist.
     * If the log folder does not exist, it is created with the correct permissions.
     * The log file is initialized with a header containing the date.
     */
    public static function createTodayLogFile(): void
    {
        if (!is_dir(self::$logFolder)) {
            mkdir(self::$logFolder, 0777, true);
        }

        if (!self::logFileExists()) {
            file_put_contents(self::getDailyLogFilepath(), "=== LOG DU " . date("d/m/Y") . " ===\n\n");
        }
    }

    /**
     * Add a log entry to the daily log file.
     * @param string $type The type of log entry (INFO, SUCCESS, ERROR). Defaults to INFO.
     * @param string $message The log entry message.
     */
    public static function addLog(string $type = "INFO", string $message = ""): void
    {
        $type = strtoupper($type);

        if (!in_array($type, [self::INFO, self::SUCCESS, self::ERROR])) {
            $type = self::INFO;
        }

        self::createTodayLogFile();

        $line = "[" . date("H:i:s") . "] [$type] " . $message . "\n";

        file_put_contents(
            self::getDailyLogFilepath(),
            $line,
            FILE_APPEND
        );
    }

    /**
     * Returns an array of the log files in the log folder, sorted by date (newest first).
     * If the log folder does not exist, an empty array is returned.
     * @return array The array of log files.
     */
    public static function listLogs(): array
    {
        if (!is_dir(self::$logFolder)) {
            return [];
        }

        $files = scandir(self::$logFolder);
        $logs = [];

        foreach ($files as $f) {
            if (str_ends_with($f, '.txt')) {
                $logs[] = $f;
            }
        }

        rsort($logs);

        return $logs;
    }

    /**
     * Reads the contents of a log file.
     * @param string $filename The name of the log file to read.
     * @return string|null The contents of the log file, or null if the file does not exist.
     */
    public static function readLog(string $filename): ?string
    {
        $path = self::$logFolder . $filename;

        if (!file_exists($path)) {
            return null;
        }

        return file_get_contents($path);
    }
}
