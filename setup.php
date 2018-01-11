<?php

error_reporting(1);


function sendMessage($message)
{
    $message = $message . "\n";
    echo $message;
}

sendMessage("Welcome to Auto Discord bot setup script");


sendMessage("--------Installation--------");

sendMessage("Installing NODEJS V8(Ignore this if your operating system is not Linux.)");
$output = shell_exec('curl -sL https://deb.nodesource.com/setup_8.x | sudo -E bash');
echo " $output ";

$output1 = shell_exec('sudo apt-get install -y nodejs');
echo " $output1 ";

sendMessage("Installing DiscordJS module(Ignore this if your operating system is not Linux.)");
$output = shell_exec('npm install discord.js');
echo " $output ";

sendMessage("--------Configuration Setup--------");

echo " Enter the prefix you want for the bot: ";
$prefix = trim(fgets(STDIN));
echo "\n";
echo " Enter your token, make sure you created the app: ";
$token = trim(fgets(STDIN));
echo "\n";

sendMessage("--------Creating the  file--------");

$content = "
const Discord = require('discord.js');
const client = new Discord.Client();
const prefix = '$prefix';

client.on('ready', () => {
  console.log('I am ready!');
});

client.on('message', message => {
  if (msg.content === prefix + 'ping') {
    message.reply('pong');
  }
});

client.login('$token');
";

$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "bot.js", "wb");
fwrite($fp, $content);
fclose($fp);

sendMessage("--------The file has been created--------");

sendMessage("Make sure you have installed nodeJS which can be found here: nodejs.org/en/download/. Version recommended: NodeJS 8.0.0");
sendMessage("To manually start the bot, type node bot.js");

sendMessage("Would you like to start the script?");
$protocol = trim(fgets(STDIN));
$protocol = strtolower($protocol);

$answer = array(
    'yes'
);

$no = array(
    'no'
);

if (in_array($protocol, $no)) {
    die("Alright! Have fun starting your first bot.");
}

while (!in_array($protocol, $answer)) {
    sendMessage("You can only respond using yes or no");
    sendMessage("Would you like to start the script?");
    $protocol = trim(fgets(STDIN));
    $protocol = strtolower($protocol);
}

$output = shell_exec('node bot.js');
echo " $output ";
?>
