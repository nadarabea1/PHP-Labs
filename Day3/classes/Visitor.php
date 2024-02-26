<?php
class Visitor {
    private $visitFilePath;

    public function __construct($visitFilePath) {
        $this->visitFilePath = $visitFilePath;
    }

    public function addVisitor() {
        $ip = $_SERVER['REMOTE_ADDR'];
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        $visitData = "$ip|$userAgent\n";
        $result = file_put_contents($this->visitFilePath, $visitData, FILE_APPEND);

        if ($result === false) {
            die('Failed to write to visit file.');
        }
    }

    public function getUniqueVisits() {
        if (!file_exists($this->visitFilePath)) {
            return 0;
        }

        $visits = file($this->visitFilePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $uniqueVisits = [];
        foreach ($visits as $visit) {
            list($ip, $userAgent) = explode('|', $visit);
            $uniqueVisits["$ip|$userAgent"] = true;
        }
        return count($uniqueVisits);
    }
}
?>
