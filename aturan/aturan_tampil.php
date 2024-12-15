<div class="card">
    <div class="card-header bg-primary text-white border-dark"><strong>DATA BASIS ATURAN</strong></div>
    <div class="card-body">
    <a class="btn btn-primary mb-2" href="?page=aturan&action=tambah">Tambah</a>
    <table class="table table-bordered" id="myTable">
        <thead>
        <tr>
            <th width="10px">No.</th>
            <th widht="100px">Nama Penyakit</th>
            <th widht="300px">Keterangan</th>
            <th widht="400px"></th>
        </tr>
        </thead>
        <tbody>
        <?php

        $no=1;
        $sql = "SELECT basis_aturan.idaturan, basis_aturan.idpenyakit, penyakit.nmpenyakit, penyakit.keterangan FROM basis_aturan INNER JOIN penyakit ON  basis_aturan.idpenyakit=penyakit.idpenyakit ORDER BY nmpenyakit ASC";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
    ?>
        <tr>
        <td><?php echo $no++; ?></td>
	    <td><?php echo $row['nmpenyakit']; ?></td>
	    <td><?php echo $row['keterangan']; ?></td>
	    <td align="center">
            <a class="btn btn-primary" href="?page=aturan&action=detail&id=<?php echo $row['idaturan']; ?>">
            <i class="fas fa-list"></i>
            </a>
            <a class="btn btn-warning" href="?page=aturan&action=update&id=<?php echo $row['idaturan']; ?>">
            <i class="fas fa-edit"></i>
            </a>
            <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=aturan&action=hapus&id=<?php echo $row['idaturan']; ?>">
                <i class="fas fa-window-close"></i>
            </a>
        </td>
     </tr>
 <?php
     }
     $conn->close();
 ?>
    </tbody>
    </table>
    </div>
</div>