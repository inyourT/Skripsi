<?php

    $idaturan=$_GET['id'];
// hapus basis aturan 
        $sql = "DELETE FROM basis_aturan WHERE idaturan='$idaturan'";
        $conn->query($sql);

// hapus detai aturan
    $sql = "DELETE FROM detail_basis_aturan WHERE idaturan='$idaturan'";
    $conn->query($sql);
    header("Location:?page=aturan");
    $conn->close();
?>