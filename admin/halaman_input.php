<?php include("header.php"); 
?>
<?php
$judul       = "";
$kutipan     = "";
$isi         = "";
$harga       = "";
$error       = "";
$sukses      = "";

if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    $id = "";
}

if($id != ""){
    $sql1   = "select * from beranda where id = '$id'";
    $q1     = mysqli_query($koneksi,$sql1);
    $r1     = mysqli_fetch_array($q1);
    $judul  = $r1['judul'];
    $kutipan    = $r1['kutipan'];
    $isi        = $r1['isi'];
    $harga      = $r1['harga'];

    if($isi == ''){
        $error  = "Data tidak ditemukan";
    }
}

if(isset($_POST['simpan'])){
    $judul     = $_POST['judul'];
    $isi       = $_POST['isi'];
    $kutipan   = $_POST['kutipan'];
    $harga     = $_POST['harga'];

    if($judul =='' or $isi ==''){
        $error     ="Silakan masukan semua data yakni data isi dan judul";
    }

    if(empty($error)){
        if($id != ""){
            $sql1   = "update beranda set judul = '$judul',kutipan='$kutipan',isi='$isi',harga='$harga',tgl_isi=now() where id = '$id'";
        }else{
            $sql1       = "insert into beranda(judul,kutipan,isi,harga) values ('$judul','$kutipan','$isi','$harga')";
        }
        
        $q1        = mysqli_query($koneksi,$sql1);
        if ($q1){
            $sukses   = "Sukses memasukan data";
        }else{
            $error    ="Gagal memasukan data";
        }
    }
}

?>
<h1>Halaman Admin Input</h1>
<div class="mb-3 row">
    <a href="beranda.php">Kembali Ke halaman admin</a>
</div>
<?php
if ($sukses){
    ?>
    <div class="alert alert-primary" role="alert">
       <?php echo $sukses ?>
    <?php
}
?>
<?php
if ($error){
    ?>
    <div class="alert alert-danger" role="alert">
       <?php echo $error ?>
    <?php
}
?>
<form anction="" method="post">
    <div class="mb-3 row">
        <label for="judul" class="col-sm-2 col-form-label">Judul</label>
        <div class="col-sm-10">
            <input type="text"  class="form-control" id="judul" value="<?php echo $judul ?>" name="judul">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="kutipan" class="col-sm-2 col-form-label">Kutipan</label>
        <div class="col-sm-10">
            <input type="text"  class="form-control" id="kutipan" value="<?php echo $kutipan ?>" name="kutipan">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="isi" class="col-sm-2 col-form-label">Isi</label>
        <div class="col-sm-10">
           <textarea name="isi" class="form-control" id="summernote"><?php echo $isi ?></textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
        <div class="col-sm-10">
            <input type="number"  class="form-control" id="harga" value="<?php echo $harga ?>" name="harga">
        </div>
    </div>
    <div class="mb-3 row">
       <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary"/>
        </div>
    </div>
    
    <?php include("footer.php"); ?>