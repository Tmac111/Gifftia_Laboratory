<?PHP
include "config.inc.php";
include "header.inc.php";
?>
<script language='javascript'>

    setTimeout("countdown()", 2000);
    function countdown() {
        window.location.reload(true);
    }

</script>
<?PHP
$action = isset($_GET['action']) ? $_GET['action'] : "public";
$to = isset($_GET['to']) ? $_GET['to'] : "";
$username = $_SESSION['username'];
if ($action == "public") {
    $mysql = "select * from chatboard where 1=1 order by time asc ";//升序排列


} elseif ($action == "private") {
    $mysql = "select id ,time, fromname AS username ,message from private_chatboard where (fromname='$username' and toname='$to' and delfrom=0)
	or (fromname='$to' and  toname='$username' and delto=0 ) order by time asc";
}
$result = mysql_query($mysql);
$num = mysql_num_rows($result);
if ($num == 0) {//无聊天记录啊
    echo "当前还没人聊天呢";


} else {//获取聊天记录
    while ($rows = mysql_fetch_assoc($result)) {
        //ch处理行颜色
        if ($bgrow == 1) {
            $bgcolor = "row1";
            $bgrow = 0;
        } else {
            $bgcolor = "row2";
            $bgrow = 1;
        }
        ?>
        <div class="<?PHP echo $bgcolor ?> ">
            <b style="color:red "><?PHP echo $rows['username']?></b>[<?PHP echo $rows['time']?>
            ]<b>说:</b><?PHP echo $rows['message'] ?>
        </div>

    <?PHP }
}

?>



