<?php
// Simfor ( Simple Forum CMS )
// Copyright (c)2019 - Afrizal F.A - ICWR-TECH

include("weasty.php");
$site="http://xbyte.id/";
$judul="X-Byte Forum";
$deskripsi="Unreserved Information";
$icon="icwr.ico";
date_default_timezone_set('Asia/Jakarta');
$tgl_waktu=date("r");
$konek=mysqli_connect("localhost", "root", "", "forum");
if(!$konek) {
?>
<title>Maintenance</title>
<style>
    html {
        background: black;
        color: white;
    }
</style>
<table height="100%" width="100%">
    <td align="center">
        <h1>Feature Maintenance</h1>
        Copyleft &copy;2019 - ICWR-TECH
    </td>
</table>
<?php
    exit;
}
ob_start();
session_start();
if($_GET['logout'] == "true") {
    session_destroy();
    header("location:index.php");
    exit;
}
// Filter
function simfor_string_replace($str) {
    return str_replace(["<",">","\n"," ","\t"], ["&lt;","&gt;","<br>","&nbsp;","&nbsp;&nbsp;&nbsp;"], $str);
}
$cat_id=mysqli_real_escape_string($konek, $_GET[cat_id]);
$filter_user=mysqli_real_escape_string($konek, $_GET[user]);
$filter_code=mysqli_real_escape_string($konek, $_GET[code]);
$filter_view=mysqli_real_escape_string($konek, $_GET[view]);
$get_user=mysqli_real_escape_string($konek, $_GET[user]);
$username=mysqli_real_escape_string($konek, simfor_string_replace($_POST['username']));
$email=mysqli_real_escape_string($konek, simfor_string_replace($_POST['email']));
?>
<html>
<!-- Theme & CMS By ICWR-TECH -->
<head>
    <title><!-- sub --></title>
<?php
$retitle="$judul";
?>
    <meta name="description" content="Hacking Forum">
    <link rel="icon" href="<?php echo $icon; ?>">
    <link href="https://fonts.googleapis.com/css?family=News%20Cycle" rel='stylesheet'>
    <style>
      html {
        background: black;
        font-size: 10px;
      }
      * {
        font-family: "News Cycle";
      }
      input {
        background: white;
        border: 1px solid black;
        border-radius: 5px;
        color: black;
      }
      .total {
        margin: 0 auto;
        width: 90%;
        overflow:  auto;
        background: white;
        color: black;
      }
      .judul {
        background: black;
        margin: 20px;
        padding: 20px;
        color: white;
        text-align: center;
      }
      .font-judul {
        font-size: 50px;
      }
      .font-bawah-judul {
        font-size: 20px;
      }
      .menu {
        background: black;
        margin: 20px;
        padding: 20px;
        color: white;
        text-align: center;
      }
      .menu a {
        text-decoration: none;
        color: black;
        font-size: 20px;
      }
      .menu li{
        display: inline;
        background: white;
        padding: 10px;
        margin: 10px;
        color: white;
      }
      .tengah {
        overflow: auto;
        background: black;
        margin: 20px;
        padding: 20px;
        color: white;
      }
      .tengah .judul-konten {
        background: black;
        color: white;
        padding: 10px;
      }
      .tengah .isi-konten {
        background: white;
        color: black;
        padding: 10px;
      }
      .tengah .isi-konten a {
        text-decoration: lined;
        color: black;
      }
      .tengah .kiri {
        float: left;
        margin: 0 auto;
        overflow: auto;
        padding: 20px;
        background: white;
        color: black;
        width: 65%;
      }
      .tengah .kiri .chat {
        margin: 0 auto;
        overflow: auto;
        background: black;
        color: white;
        padding: 10px;
      }
      .tengah .kiri .chat a {
        text-decoration: lined;
        color: white;
      }
      .tengah .kiri .chatpriv {
        margin: 0 auto;
        overflow: auto;
        background: black;
        height: 40%;
        color: white;
        padding: 10px;
      }
      .tengah .kiri .chatpriv a {
        text-decoration: lined;
        color: white;
      }
      .tengah .kiri .chatpriv .dalam {
        background: black;
        color: white;
        padding: 10px;
      }
      .tengah .kiri .tambah-topik {
        background: black;
        color: white;
        padding: 10px;
        font-size: 15px;
      }
      .tengah .kiri .tambah-topik a {
        text-decoration: lined;
        color: white;
      }
      .tengah .kiri .tambah-topik .detail {
        width: 100%;
        height: 20%;
        background: white;
        color: black;
      }
      .tengah .kiri .topik {
        font-size: 15px;
      }
      .tengah .kiri .topik a {
        text-decoration: lined;
        color: black;
      }
      .tengah .kiri .komentar {
        padding: 20px;
        font-size: 15px;
        background: black;
        color: white;
      }
      .tengah .kiri .komentar a {
        text-decoration: lined;
        color: white;
      }
      .tengah .kiri .komentar .foto {
        height: 30px;
        width: 30px;
      }
      .tengah .kiri .komentar .reply {
        width: 100%;
        height: 20%;
        background: white;
        color: black;
      }
      .tengah .kiri .profil {
        font-size: 15px;
      }
      .tengah .kiri .profil a {
        text-decoration: lined;
        color: black;
      }
      .tengah .kanan {
        float: right;
        margin: 0 auto;
        overflow: auto;
        padding: 20px;
        background: white;
        color: black;
        width: 20%;
      }
      .copyleft {
        background: black;
        margin: 20px;
        padding: 20px;
        color: white;
      }
    </style>
</head>
<body>
<?php
if($_GET['page'] == "activation") {
$query_aktif_akun="SELECT * FROM pengguna WHERE username='$filter_user' AND status='$filter_code'";
if(mysqli_query($konek, $query_aktif_akun)) {
    $query_ganti_status_akun="UPDATE pengguna SET status='aktif' WHERE username='$filter_user'";
    if(mysqli_query($konek, $query_ganti_status_akun)) {
        echo "Your Account Is Actived <a href='?'>Click For Login</a>";
    }
}
}
?>
<div class="total">
    <div class="judul">
        <font class="font-judul"><?php echo $judul; ?></font>
        <br><br>
        <font class="font-bawah-judul"><?php echo $deskripsi; ?></font>
    </div>
    <div class="menu">
        <li><a href="?">Home</a></li>
<?php
if($_SESSION['login'] == "logged") {
?>
        <li><a href="?page=chat">Chat</a></li>
        <li><a href="?page=profile&user=<?php echo $_SESSION['username']; ?>">Profile</a></li>
<?php
}
?>
        <li><a href="?page=about">About</a></li>
        <li><a href="?page=disc">Disclaimer</a></li>
<?php
if($_SESSION['login'] == "logged") {
?>
        <li><a href="?logout=true">Logout</a></li>
<?php
}
?>
    </div>
    <div class="tengah">
        <div class="kiri">
<?php
if($_SESSION['login'] == "logged") {
if($_SESSION['aktif'] == "non") {
?>
Your Account Not Actived, <a href="?logout=true">Logout</a>
<?php
exit;
}
}
?>
<?php
if(!$_GET){
?>
            <table width="100%">
                <tr>
                    <td class="judul-konten" width="70%">Category</td>
                    <td class="judul-konten">Detail</td>
                </tr>
<?php
$query_kategori=mysqli_query($konek, "SELECT * FROM kategori ORDER BY id DESC");
while($data_kategori = mysqli_fetch_assoc($query_kategori)) {
?>
                <tr>
                    <td class="isi-konten" width="70%"><a href="?page=topic&cat_id=<?php echo $data_kategori['id']; ?>"><?php echo $data_kategori['judul']; ?></a></td>
                    <td class="isi-konten"><?php echo $data_kategori['detail']; ?></td>
                </tr>
<?php
}
?>
            </table>
<?php
}
?>
<?php
if($_GET['page'] == "topic") {
$get_kategori=mysqli_fetch_assoc(mysqli_query($konek, "SELECT * FROM kategori WHERE id='$cat_id'"));
$retitle="$judul | Topic For, $get_kategori[judul]";
if(!$_GET['view'] && !$_GET['new'] && !$_GET['edit'] && !$_GET['del']) {
?>
<?php
if($_SESSION['login'] == "logged") {
?>
            <div class="tambah-topik">
                <a href="?page=topic&cat_id=<?php echo $get_kategori['id']; ?>&new=true">Add Topic</a>
            </div>
<?php
}
?>
            <table width="100%">
                <tr>
                    <td class="judul-konten" width="70%">Topic From, <?php echo $get_kategori['judul']; ?></td>
                    <td class="judul-konten">Date</td>
                </tr>
<?php
$hal_pagging="10";
$paging=isset($_GET['pg'])?(int)$_GET["pg"]:1;
$mulai_page=($paging>1)?($paging * $hal_pagging)-$hal_pagging:0;
$topik_query=mysqli_query($konek, "SELECT * FROM topik WHERE id_kategori='$cat_id' ORDER BY id DESC LIMIT $mulai_page, $hal_pagging");
$cek_total_topik=mysqli_query($konek, "SELECT * FROM topik");
$total_row=mysqli_num_rows($cek_total_topik);
$pages_paging=ceil($total_row/$hal_pagging);
?>
<?php
while($data_topik = mysqli_fetch_assoc($topik_query)) {
?>
                <tr>
                    <td class="isi-konten" width="70%"><a href="?page=topic&cat_id=<?php echo $data_topik['id_kategori']; ?>&view=<?php echo $data_topik['id']; ?>"><?php echo $data_topik['judul']; ?></a></td>
                    <td class="isi-konten"><?php echo $data_topik['tgl']; ?></td>
                </tr>
<?php
}
?>
            </table>
<?php
for ($i_h=1;$i_h<=$pages_paging;$i_h++) {
?>
            <a href="?page=topic&cat_id=<?php echo $_GET['cat_id']; ?>&view=<?php echo $_GET['view']; ?>&pg=<?php echo $i_h; ?>"><?php echo $i_h; ?></a>
<?php
}
?>
<?php
}
?>
<?php
if($_GET['new'] == "true") {
if($_SESSION['login'] == "logged") {
?>
            <div class="tambah-topik">
                <font size="20">Add Topic</font>
                <br><br>
                <form enctype="multipart/form-data" method="post">
                    Topic : <input type="text" name="judul">
                    <br><br>
                    Detail :
                    <br><br>
                    <textarea class="detail" name="detail"></textarea>
                    <br><br>
                    <input type="submit" name="tambah_topik" value="Add Topic">
                </form>
<?php
if($_POST['tambah_topik']) {
    $detail=mysqli_real_escape_string($konek, simfor_string_replace($_POST['detail']));
    $judul_topik=mysqli_real_escape_string($konek, simfor_string_replace($_POST['judul']));
    if(!empty($_POST['judul']) && !empty($_POST['detail'])) {
        $query_tambah_topic=mysqli_query($konek, "INSERT INTO topik(judul, detail, id_kategori, tgl, username) VALUES('$judul_topik', '$detail', '$cat_id', '$tgl_waktu', '$_SESSION[username]')");
        if($query_tambah_topic) {
?>
                <br>Topic Added !!<br>
<?php
        }
    }
}
?>
            </div>
<?php
} else {
?>
            <div class="tambah-topik">
                <center>You Need Login For Access</center>
            </div>
<?php
}
}
?>
<?php
if($_GET['del'] == "true") {
if($_SESSION['login'] == "logged") {
$gdt=mysqli_fetch_assoc(mysqli_query($konek, "SELECT * FROM topik WHERE id='$_GET[t_id]'"));
if($gdt['username'] == $_SESSION['username'] ) {
$hapus_topik=mysqli_query($konek, "DELETE FROM topik WHERE id='$_GET[t_id]'");
if($hapus_topik) {
?>
            <div class="tambah-topik">
                Topic Deleted
                <script>window.location='?page=topic&cat_id=<?php echo $_GET['cat_id']; ?>'</script>
            </div>
<?php
}
}
}
}
?>
<?php
if($_GET['edit'] == "true") {
if($_SESSION['login'] == "logged") {
$gdt=mysqli_fetch_assoc(mysqli_query($konek, "SELECT * FROM topik WHERE id='$_GET[t_id]'"));
if($gdt['username'] == $_SESSION['username'] ) {
?>
            <div class="tambah-topik">
                <font size="20">Edit Topic</font>
                <br><br>
                <form enctype="multipart/form-data" method="post">
                    Topic : <input type="text" name="judul" value="<?php echo $gdt['judul']; ?>">
                    <br><br>
                    Detail :
                    <br><br>
                    <textarea class="detail" name="detail"><?php echo str_replace("<br>", "\n", $gdt['detail']); ?></textarea>
                    <br><br>
                    <input type="submit" name="edit_topik" value="Edit Topic">
                </form>
<?php
if($_POST['edit_topik']) {
    $detail=mysqli_real_escape_string($konek, simfor_string_replace($_POST['detail']));
    $judul_topik=mysqli_real_escape_string($konek, simfor_string_replace($_POST['judul']));
    if(!empty($_POST['judul']) && !empty($_POST['detail'])) {
        $query_tambah_topic=mysqli_query($konek, "UPDATE topik SET judul='$judul_topik', detail='$detail', tgl='$tgl_waktu' WHERE id='$_GET[t_id]'");
        if($query_tambah_topic) {
?>
                <br>Topic Edited !!<br>
<?php
        }
    }
}
?>
            </div>
<?php
}
} else {
?>
            <div class="tambah-topik">
                <center>You Need Login For Access</center>
            </div>
<?php
}
}
?>
<?php
if($_GET['view']) {
$get_topik=mysqli_fetch_assoc(mysqli_query($konek, "SELECT * FROM topik WHERE id='$filter_view'"));
$retitle="$judul | $get_topik[judul]";
?>
            <div class="topik">
                <a href="?page=topic&cat_id=<?php echo $get_topik['id_kategori']; ?>&view=<?php echo $get_topik['id']; ?>"><font size="20"><?php echo str_replace("&nbsp;", " " , $get_topik['judul']); ?></font></a>
<?php
if($get_topik['username'] == $_SESSION['username'] ) {
?>
                [ <a href="?page=topic&cat_id=<?php echo $get_topik['id_kategori']; ?>&t_id=<?php echo $get_topik['id']; ?>&edit=true">Edit Topic</a> ]
                [ <a href="?page=topic&cat_id=<?php echo $get_topik['id_kategori']; ?>&t_id=<?php echo $get_topik['id']; ?>&del=true">Delete Topic</a> ]
<?php
}
?>
                <hr>
                Category <a href="?page=topic&cat_id=<?php echo $get_kategori['id']; ?>"><?php echo $get_kategori['judul']; ?></a> By, <a href="?page=profile&user=<?php echo $get_topik['username']; ?>"><?php echo $get_topik['username']; ?></a> ( <?php echo $get_topik['tgl']; ?> )
                <hr>
                <?php echo $get_topik['detail']; ?>
                <br><br>
            </div>
<?php
if($_SESSION['login'] == "logged") {
?>
            <div class="komentar">
                <font size="5">Reply</font>
                <hr>
<?php
$reply_pagging="5";
$paging_reply=isset($_GET['pg_r'])?(int)$_GET["pg_r"]:1;
$mulai_reply=($paging_reply>1)?($paging_reply * $reply_pagging)-$reply_pagging:0;
$query_reply=mysqli_query($konek, "SELECT * FROM reply WHERE id_topik='$filter_view' ORDER BY id DESC LIMIT $mulai_reply, $reply_pagging");
$cek_total_reply=mysqli_query($konek, "SELECT * FROM reply WHERE id_topik='$filter_view'");
$total_row_reply=mysqli_num_rows($cek_total_reply);
$pages_paging=ceil($total_row_reply/$reply_pagging);
while($data_reply = mysqli_fetch_assoc($query_reply)) {
    $get_foto=mysqli_fetch_assoc(mysqli_query($konek, "SELECT * FROM pengguna WHERE username='$data_reply[username]'"));
?>
                <img class="foto" src="<?php echo $get_foto['foto']; ?>"/> <a href="?page=profile&user=<?php echo $data_reply['username']; ?>"><?php echo $data_reply['username']; ?></a> ( <?php echo $data_reply['tgl']; ?> )
                <br><br>
                <?php echo $data_reply['reply']; ?>
                <br>
                <hr>
<?php
}
?>
<?php
for ($i_r=1;$i_r<=$pages_paging;$i_r++) {
?>
                <a href="<?php echo $_SERVER['REQUEST_URI']; ?>&pg_r=<?php echo $i_r; ?>"><?php echo $i_r; ?></a>
<?php
}
?>
                <form enctype="multipart/form-data" method="post">
                    Reply :
                    <br><br>
                    <textarea class="reply" name="reply"></textarea>
                    <br><br>
                    <input type="submit" name="komentar" value="Reply">
                </form>
<?php
if($_POST["komentar"]) {
    $reply_post=mysqli_real_escape_string($konek, simfor_string_replace($_POST['reply']));
    $query_kirim_reply=mysqli_query($konek, "INSERT INTO reply(username, reply, tgl, id_topik) VALUES('$_SESSION[username]', '$reply_post', '$tgl_waktu', '$filter_view')");
    if($query_kirim_reply) {
?>
                    <br>Reply Sended !!<br>
                    <script>window.location='<?php echo $_SERVER['REQUEST_URI']; ?>'</script>
<?php
    }
}
?>
            </div>
<?php
} else {
?>
<?php
if($_GET['view']) {
?>
            <div class="topik">
                <center>You Need Login For Access</center>
            </div>
<?php
}
?>
<?php
}
}
}
?>
<?php
if($_GET['page'] == "profile") {
$retitle="$judul | Profile, $_GET[user]";
?>
<?php
$get_pengguna=mysqli_fetch_assoc(mysqli_query($konek, "SELECT * FROM pengguna WHERE username='$filter_user'"));
?>
            <div class="profil">
                <a href="?page=profile&user=<?php echo $get_pengguna['username']; ?>"><font size="20"><?php echo $get_pengguna['username']; ?></font></a>
                <br><br>
                <img width="200" src="<?php echo $get_pengguna['foto']; ?>"/>
                <br><br>
                Email : <?php echo $get_pengguna['email']; ?>
                <br><br>
<?php
if($_GET['user'] == $_SESSION['username']) {
?>
                [ <a href="?page=edit-profile&user=<?php echo $_GET[user]; ?>">Edit Profile</a> ]
<?php
} else {
?>
                [ <a href="?page=chat&user=<?php echo $_GET[user]; ?>">Chat User</a> ]
<?php
}
?>
            </div>
<?php
}
?>
<?php
if($_GET['page'] == "edit-profile" && $_GET['user'] == $_SESSION['username']) {
$get_foto_user=mysqli_fetch_assoc(mysqli_query($konek, "SELECT * FROM pengguna WHERE username='$filter_user'"));
?>
            <div class="profil">
                <h1>Edit Profile, <?php echo $get_foto_user['username']; ?></h1>
                <img width="200" src="<?php echo $get_foto_user['foto']; ?>"/>
                <br><br>
                <form enctype="multipart/form-data" method="post">
                    Photo : <input type="file" name="foto" onchange="javascript:this.form.submit();">
                </form>
<?php
if($_FILES['foto']) {
if(empty($_FILES['foto'])) {
$foto_edit="$site/default.jpg";
} else {
$cek_foto=scandir("img_user");
if(preg_match("/".md5($_FILES['foto']['name']).".jpg"."/", $cek_foto)) {
$foto_edit="img_user/".md5(rand(10000000000, 99999999999).$_FILES['foto']['name']).".jpg";
copy($_FILES['foto']['tmp_name'], $foto_edit);
} else {
$foto_edit="img_user/".md5($_FILES['foto']['name']).".jpg";
copy($_FILES['foto']['tmp_name'], $foto_edit);
}
}
unlink($get_foto_user['foto']);
$edit_profile_query=mysqli_query($konek, "UPDATE pengguna SET foto='$foto_edit' WHERE username='$_SESSION[username]'");
}
?>
                <form enctype="multipart/form-data" method="post">
                    Old Password : <input type="password" name="oldpass">
                    <br><br>
                    New Password : <input type="password" name="newpass">
                    <br><br>
                    <input type="Submit" name="cpass" value="Change Password">
                </form>
                <br>
<?php
if($_POST['cpass']) {
    $passmd=md5($_POST['newpass']);
    if(mysqli_query($konek, "UPDATE pengguna SET password='$passmd' WHERE username='$_SESSION[username]'")) {
        echo "Password Changed";
    } else {
        echo "Password Not Changed";
    }
}
?>
            </div>
<?php
}
?>
<?php
if($_GET['page'] == "chat") {
if($_SESSION['login'] == "logged") {
?>
            <div class="chat">
<?php
if(!$_GET['user']) {
$retitle="$judul | Chatting";
?>
                <font size="5">Chatting</font>
<br>
<hr>
<br>
<?php
$query_chat=mysqli_query($konek, "SELECT * FROM pesan WHERE to_user='$_SESSION[username]' ORDER BY id DESC LIMIT 0, 10");
while($data_chat = mysqli_fetch_array($query_chat)) {
?>
                <a href="?page=chat&user=<?php echo $data_chat['from_user']; ?>"><b><?php echo $data_chat['from_user']; ?></b></a> : <?php echo $data_chat['pesan']; ?>
                <hr>
<?php
}
}
?>
<?php
if($_GET['user']) {
$retitle="$judul | Chat From, $_GET[user]";
?>
                <font size="5">Chat From, <?php echo $_GET['user']; ?></font>
                <hr>
            </div>
            <div class="chatpriv">
                <div class="dalam">
<?php
$query_direct_chat=mysqli_query($konek, "SELECT * FROM pesan WHERE to_user='$_SESSION[username]' OR from_user='$_SESSION[username]' ORDER BY id ASC");
while($data_direct_chat = mysqli_fetch_array($query_direct_chat)) {
?>
<?php
if($data_direct_chat['from_user'] == $_GET['user'] and $data_direct_chat['to_user'] == $_SESSION['username']) {
?>
                    <a href="?page=profile&user=<?php echo $data_direct_chat['from_user']; ?>"><b><?php echo $data_direct_chat['from_user']; ?></b></a> : <?php echo $data_direct_chat['pesan']; ?><hr>
<?php
}
?>
<?php
if($data_direct_chat['to_user'] == $_GET['user'] and $data_direct_chat['from_user'] == $_SESSION['username']) {
?>
                    <a href="?page=profile&user=<?php echo $data_direct_chat['from_user']; ?>"><b><?php echo $data_direct_chat['from_user']; ?></b></a> : <?php echo $data_direct_chat['pesan']; ?><hr>
<?php
}
}
?>
                </div>
            </div>
            <br>
            <div class="chat">
                <form enctype="multipart/form-data" method="post">
                    <input size="70" type="text" name="chat">
                    <input type="submit" name="send_chat" value="Send">
                </form>
<?php
if($_POST['send_chat']) {
$msg_chat=mysqli_real_escape_string($konek, simfor_string_replace($_POST['chat']));
$query_kirim_chat="INSERT INTO pesan(from_user, to_user, pesan) VALUES('$_SESSION[username]', '$get_user', '$msg_chat')";
if(mysqli_query($konek, $query_kirim_chat)) {
?>
                <br>Msg Sended<br>
                <script>window.location='<?php echo $_SERVER['REQUEST_URI']; ?>'</script>
<?php
}
}
?>
<?php
}
?>
            </div>
<?php
} else {
?>
<?php
if($_GET['page'] == "chat") {
?>
            <div class="chat">
                <center>You Need Login For Access</center>
            </div>
<?php
}
?>
<?php
}
}
?>
<?php
if($_GET['page'] == "about") {
$retitle="$judul | About";
?>
<h1>Hacker Forum</h1>
This A Hacker Forum
<?php
}
?>
<?php
if($_GET['page'] == "register") {
if(!$_SESSION['login'] == "logged") {
$retitle="$judul | Register";
?>
<h1>Register</h1>
<form enctype="multipart/form-data" method="post">
    Username : <input type="text" name="username">
    <br><br>
    Photo : <input type="file" name="foto"> * JPG Only
    <br><br>
    Email : <input type="email" name="email">
    <br><br>
    Password : <input type="password" name="password">
    <br><br>
    <input type="submit" name="daftar" value="Register">
</form>
<?php
if($_POST['daftar']) {
if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
$cek_daftar=mysqli_query($konek, "SELECT * FROM pengguna WHERE username='$username' OR email='$email'");
if(mysqli_num_rows($cek_daftar) > 0 ) {
?>
<br>Sorry Username Or Email Is Already Taken<br>
<?php
} else {
if(empty($_FILES['foto'])) {
$foto_daftar="$site/default.jpg";
} else {
$cek_foto=scandir("img_user");
if(preg_match("/".md5($_FILES['foto']['name']).".jpg"."/", $cek_foto)) {
$foto_daftar="img_user/".md5(rand(10000000000, 99999999999).$_FILES['foto']['name']).".jpg";
copy($_FILES['foto']['tmp_name'], $foto_daftar);
} else {
$foto_daftar="img_user/".md5($_FILES['foto']['name']).".jpg";
copy($_FILES['foto']['tmp_name'], $foto_daftar);
}
}
$password_daftar=md5($_POST['password']);
$aktif_kode=rand(1000000000, 9999999999);
$query_daftar="INSERT INTO pengguna(username, email, password, foto, tgl_daftar, level, total, status) VALUES('$username', '$email', '$password_daftar', '$foto_daftar', '$tgl_waktu', 'user', '0', '$aktif_kode')";
if(mysqli_query($konek, $query_daftar)) {
mail(simfor_string_replace($_POST['email']), "$judul, Activation Code", "Hallo, $_POST[username]\nLink For Activation Your Account, $site/?page=activation&user=$username&code=$aktif_kode");
?>
<br>Register Success, <?php echo $_POST['username']; ?></br>
<?php
} else {
?>
<br>Register Failed</br>
<?php
}
}
}
}
}
}
?>
<?php
if($_GET['page'] == "disc") {
$retitle="$judul | Disclaimer";
?>
<h1>Disclaimer</h1>
We Are Not Responsible For Whatever Happens.
<?php
}
?>
        </div>
        <div class="kanan">
            <table width="100%">
<?php
if(!$_SESSION['login'] == "logged") {
?>
                <form enctype="multipart/form-data" method="post">
                    <font size="5">Login</font>
                    <br><br>
<?php
if($_POST['login']) {
$pass = md5($_POST['passwd']);
$data = mysqli_query($konek,"SELECT * FROM pengguna WHERE email='$email' AND password='$pass'");
$user_get=mysqli_query($konek,"SELECT * FROM pengguna WHERE email='$email'");
$g_user = mysqli_fetch_array($user_get);
$cek = mysqli_num_rows($data);
    if($cek > 0){
        $_SESSION['login'] = "logged";
        $_SESSION['username'] = $g_user['username'];
        if(!$g_user == "aktif") {
            $_SESSION['aktif'] = "non";
        }
        header("location:index.php");
        echo "<script>window.location='$site'</script>";
    }else{
        header("location:index.php?login=true");
        echo "<script>window.location='$site'</script>";
    }
}
?>
                    Email :
                    <br>
                    <input type="email" name="email">
                    <br><br>
                    password :
                    <br>
                    <input type="password" name="passwd">
                    <br><br>
                    <input type="submit" name="login" value="Login">
                    <br><br>
                    <a href="?page=register">Register</a>
                </form>
                <br><br>
<?php
}
?>
                <tr>
                    <td class="judul-konten">News Topic</td>
                </tr>
                <tr>
<?php
$topik_baru_query=mysqli_query($konek, "SELECT * FROM topik ORDER BY id DESC LIMIT 0, 5");
while($data_topik_baru = mysqli_fetch_assoc($topik_baru_query)) {
?>
                <tr>
                    <td class="isi-konten" width="70%"><a href="?page=topic&cat_id=<?php echo $data_topik_baru['id_kategori']; ?>&view=<?php echo $data_topik_baru['id']; ?>"><?php echo str_replace("&nbsp;", " ", $data_topik_baru['judul']); ?></a></td>
                </tr>
<?php
}
?>
                </tr>
            </table>
        </div>
    </div>
    <div class="copyleft">
        Copyleft &copy;2019 - Unreserved - ICWR-TECH
    </div>
</div>
</body>
</html>
<?php
if(!empty($retitle)) {
    $ob_konten = ob_get_contents();
    ob_end_clean ();
    echo str_replace("<!-- sub -->", $retitle, $ob_konten);
}
?>
