<?php
 require_once 'vendor/autoload.php';
 try{
  $channelName = 'chat-messages';
  $recipient= 'ExponentPushToken[bLxtxLPkcaF3IbjFeYAkUn]';

  // You can quickly bootup an expo instance
  $expo = \ExponentPhpSDK\Expo::normalSetup();

  // Subscribe the recipient to the server
  $expo->subscribe($channelName, $recipient);

  // Build the notification data
  $notification = ['body' => 'Hello World!'];
  // Notify an interest with a notification
  var_dump($expo->notify([$channelName], $notification));
  }catch (Exception $e) {
          var_dump($e);
   }
 ?>