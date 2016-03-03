<?php

class Ping extends Controller
{

    function index()
    {
        $db = new mysqli(HOST, USER, PASSWORD, DATABASE);

        $data               = $_POST['data'];
        $user_id            = $data['member_id'];
        $should_regenerate  = $data['regenerate'];


        $result = $db->query('SELECT * from members WHERE id = ' . $user_id . ' LIMIT 1;');
        $member = $result->fetch_assoc();


        if (!$should_regenerate) {
            if ($member['api_key'] != '') {
                $data = array();
                $data['key'] = $member['api_key'];
                return json_encode($data);
                die();
            }
        }
        $data = array();
        $data['key'] = $this->getToken(30);

//    echo 'Key Generated: ' . $data['key'] . '</br>';

        $query = "UPDATE members SET api_key='" . $data["key"] . "' WHERE id = " . $user_id;
        $member = $db->query($query);

        return json_encode($data);
    }

    function add()
    {
        $db = new mysqli(HOST, USER, PASSWORD, DATABASE);

        $in_data        = $_POST['data'];
        $user_id        = $in_data['member_id'];


        $result = $db->query('SELECT * from members WHERE id = ' . $user_id . ' LIMIT 1;');
        $member = $result->fetch_assoc();

        if ($member['api_key'] != ''){
            $data           = array();
            $data['key']    = $member['api_key'];
        }

        if ($this->authenticate($data['key'])) {
            $this->addNewMonitor($db, $in_data, $user_id);
        }

        return json_encode($data);
    }

    function addNewMonitor($db, $data, $member_id)
    {

        $monitor_url        = $data['monitor_url'];
        $monitor_title      = $data['monitor_title'];

        $query          = "INSERT INTO monitors
                                (member_id, monitor_name, monitor_url)
                                VALUES (
                                    '" . $member_id . "',
                                    '" . $monitor_title . "',
                                    '" . $monitor_url . "'
                                );";

        $member         = $db->query($query);

        return true;
    }

    function doesMonitorExist($url, $member_id)
    {

    }

    function authenticate($api_key)
    {
        return true;
    }



    function crypto_rand_secure($min, $max)
    {
        $range = $max - $min;
        if ($range < 1) return $min; // not so random...
        $log = ceil(log($range, 2));
        $bytes = (int)($log / 8) + 1; // length in bytes
        $bits = (int)$log + 1; // length in bits
        $filter = (int)(1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd >= $range);
        return $min + $rnd;
    }

    function getToken($length)
    {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet .= "0123456789";
        $max = strlen($codeAlphabet) - 1;
        for ($i = 0; $i < $length; $i++) {
            $token .= $codeAlphabet[$this->crypto_rand_secure(0, $max)];
        }
        return $token;
    }

    public function pingHost($data)
    {
        $data = $_POST['data'];
        $host = $data['host'];
//        $host = str_replace('http://', '', $host);
        $timeout = 10;
        $port = 80;

        $tB = microtime(true);
        $fP = fsockopen($host, $port, $errno, $errstr, $timeout);

        if ($fP === false) {
            print($errno." : ".$errstr);
        }
        if (!$fP) { return "down"; }
        $tA = microtime(true);
        return round((($tA - $tB) * 1000), 0)." ms";

    }
}

?>
