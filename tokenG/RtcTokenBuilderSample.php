<?php
$sheduleId=$_REQUEST['sheduleid'];
$servername = "localhost";
$username = "root";
$password = "mego@2021"; 
$dbname ="mego";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

include("src/RtcTokenBuilder.php");
$channel_id=$_REQUEST['chanel_id'];
$appID = "7601114608204952b496f90e2890c6d1";//"a8aec89c437e4b2cbb5271e59bff725c";
$appCertificate = "6f7f4339b0d64adab28ca56ef850a387";//"71d14840eb5a4601b8247ee613630e2e";
$channelName =$channel_id;
$uid = 0;
$uidStr = "0";
$role = RtcTokenBuilder::RoleAttendee;
$expireTimeInSeconds = 3600;
$currentTimestamp = (new DateTime("now", new DateTimeZone('UTC')))->getTimestamp();
$privilegeExpiredTs = $currentTimestamp + $expireTimeInSeconds;

$token = RtcTokenBuilder::buildTokenWithUid($appID, $appCertificate, $channelName, $uid, $role, $privilegeExpiredTs);
 $uid=$token.PHP_EOL;

$token = RtcTokenBuilder::buildTokenWithUserAccount($appID, $appCertificate, $channelName, $uidStr, $role, $privilegeExpiredTs);
 $account=$token.PHP_EOL;

$sql = "UPDATE pr_meeting_shedule SET PR_UID_TOKEN='".$uid."',PR_ACCOUNT_TOKEN='".$account."',PR_ROOM_ID='".$channel_id."' where PR_MEETING_SHEDULE_ID='".$_REQUEST['sheduleid']."'";
$conn->query($sql);

$conn->close();






?>