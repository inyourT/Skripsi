<!-- proses menampilkan hasil konsultasi -->
<?php 
// mengambil dari id parameteer
$idkonsultasi=$_GET['idkonsultasi'];

$sql = "SELECT * FROM konsultasi WHERE idkonsultasi='$idkonsultasi'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!-- tampilan hasil konsultasi -->
<div class="row">
<div class="col-sm-12">
    <form action="" method="POST">
        <div class="card border-dark">
            <div class="card">
            <div class="card-header bg-primary text-white border-dark"><strong>HASIL KONSULTASI</strong></div>
                <div class="card-body">

            <div class="form-group">
            <label for="">Nama Pasien</label>
            <input type="text" class="form-control" value="<?php echo $row['nama']?>" name="nama" readonly>
                </div>

                <!-- tampilan tabel gejala -->
                 <label for="">Gejala-gejala Penyakit yang dipilih :</label>
                <table class="table table-bordered">
                <thead>
                <tr>
                    <th width="40px">No.</th>
                    <th width="700px">Nama Gejala</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $no=1;
                    $sql = "SELECT detail_konsultasi.idkonsultasi, detail_konsultasi.idgejala, gejala.nmgejala FROM detail_konsultasi INNER JOIN gejala ON detail_konsultasi.idgejala=gejala.idgejala WHERE idkonsultasi='$idkonsultasi'";                    
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()) {
                ?>
                <tr> 
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['nmgejala']; ?></td>
                </tr>
               
                <?php
                    }
                ?>
                </tbody>
            </table>

            <!-- hasil konsultasi penyakit -->
                 <label for="">Hasil Konsultasi Penyakit</label>
                <table class="table table-bordered">
                <thead>
                <tr>
                    <th width="40px">No.</th>
                    <th width="150px">Nama Penyakit</th>
                    <th width="100px">Presentase</th>
                    <th width="400px">Solusi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $no=1;
                    $sql = "SELECT detail_penyakit.idkonsultasi, detail_penyakit.idpenyakit, penyakit.nmpenyakit, penyakit.solusi, detail_penyakit.persentase FROM detail_penyakit INNER JOIN penyakit ON detail_penyakit.idpenyakit=penyakit.idpenyakit WHERE idkonsultasi='$idkonsultasi' ORDER BY persentase DESC";                    
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()) {
                ?>
                <tr> 
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['nmpenyakit']; ?></td>
                    <td><?php echo $row['persentase'] . "%"; ?></td>
                    <td><?php echo $row['solusi']; ?></td>
                </tr>
               
                <?php
                    }
                    $conn->close();
                ?>
                </tbody>
            </table>
            <a class="btn btn-danger" href="?page=konsultasi">kembali</a>

            </div>
        </div>
    </form>
</div>
</div>



