<?php

class Config
{
    private const DBHOST = '127.0.0.1';
    private const DBUSER = 'root';
    private const DBPASS = "";
    private const DBNAME = "classroom";
    private $dsn = "mysql:host=" . self::DBHOST . ";dbname=" . self::DBNAME . '';

    protected $conn = null;

    public function __construct()
    {
        try {
            $this->conn = new PDO($this->dsn, self::DBUSER, self::DBPASS);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $this->conn;
    }

    /**
     * @param $data
     * @description: This function is used to sanitize the data
     * @return string
     *
     */
    public function testInput($data): string
    {
        return strip_tags(trim(stripslashes(htmlspecialchars($data))));
    }

    public function returnedMessage($content, $status)
    {
        return json_encode(['message' => $content, "error" => $status]);
    }

    public function convertput(string $name): string
    {

        $lines = file('php://input');
        $keyLinePrefix = 'Content-Disposition: form-data; name="';

        $PUT = [];
        $findLineNum = null;

        foreach ($lines as $num => $line) {
            if (str_contains($line, $keyLinePrefix)) {
                if ($findLineNum) {
                    break;
                }
                if ($name !== substr($line, 38, -3)) {
                    continue;
                }
                $findLineNum = $num;
            } else if ($findLineNum) {
                $PUT[] = $line;
            }
        }

        array_shift($PUT);
        array_pop($PUT);

        return mb_substr(implode('', $PUT), 0, -2, 'UTF-8');

    }

}