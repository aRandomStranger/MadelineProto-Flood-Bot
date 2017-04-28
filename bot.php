#!/usr/bin/env php
<?php
require 'vendor/autoload.php';
$settings = [];
$MadelineProto = \danog\MadelineProto\Serialization::deserialize($argv[1]);


function sm($chatID, $text)
{
global $update;
global $MadelineProto;
var_export($MadelineProto->messages->sendMessage(['peer' => $chatID, 'message' => $text, ]));
}

$offset = 0;
while (true) {
    $updates = $MadelineProto->API->get_updates(['offset' => $offset, 'limit' => 50, 'timeout' => 0]); // Just like in the bot API, you can specify an offset, a limit and a timeout
    foreach ($updates as $update) {
        $offset = $update['update_id'] + 1; // Just like in the bot API, the offset must be set to the last update_id
        
                 try {
$res = json_encode($update, JSON_PRETTY_PRINT);
                if ($res == '') {
                    $res = var_export($update, true);
                }

                    include("config.php");
            }
catch (\danog\MadelineProto\RPCErrorException $e) {
echo "rip";
}
catch (\danog\MadelineProto\Exception $e)
{
echo "rip";
}
       

    }
    
}
