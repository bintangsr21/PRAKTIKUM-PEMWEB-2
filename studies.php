<style>
/* Dasar Body dengan Gradasi Halus */
body {
    background: radial-gradient(circle at top left, #0b2e1f, #05140e);
    background-attachment: fixed;
    color: #e2e8f0;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
}

/* Tipografi */
h4 {
    color: #4ade80;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-size: 1.25rem;
    border-left: 4px solid #16a34a;
    padding-left: 15px;
}

/* Card Styling */
.card-dark {
    background: rgba(15, 42, 31, 0.7);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(34, 197, 94, 0.2);
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
    margin-top: 20px;
}

/* Form Elements */
.form-control,
.form-select,
textarea {
    background-color: #0a1f16 !important;
    border: 1px solid #1f4d3a !important;
    color: #ecfdf5 !important;
    border-radius: 10px !important;
    padding: 12px 15px !important;
    transition: all 0.3s ease !important;
}

.form-control::placeholder,
textarea::placeholder {
    color: #4b6358;
}

.form-control:focus,
.form-select:focus,
textarea:focus {
    background-color: #0f2a1f !important;
    border-color: #4ade80 !important;
    box-shadow: 0 0 0 0.25rem rgba(74, 222, 128, 0.15) !important;
}

/* Table Styling */
.table {
    color: #ecfdf5;
    border-collapse: separate;
    border-spacing: 0 8px;
    margin-top: 20px;
}

.table-bordered {
    border: none;
}

.table thead th {
    background: #16a34a;
    color: white;
    border: none;
    padding: 15px;
    font-weight: 600;
}

.table thead th:first-child { border-radius: 10px 0 0 10px; }
.table thead th:last-child { border-radius: 0 10px 10px 0; }

.table tbody tr {
    background-color: #0f2a1f;
    transition: transform 0.2s ease;
}

.table tbody tr td {
    padding: 15px;
    border: none;
    vertical-align: middle;
}

.table tbody tr td:first-child { border-radius: 10px 0 0 10px; }
.table tbody tr td:last-child { border-radius: 0 10px 10px 0; }

.table-hover tbody tr:hover {
    background-color: #14532d !important;
    transform: scale(1.01);
    box-shadow: 0 4px 12px rgba(0,0,0,0.3);
}

/* Button Customization */
.btn {
    border-radius: 8px;
    padding: 8px 20px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-primary {
    background: linear-gradient(135deg, #22c55e, #16a34a);
    box-shadow: 0 4px 15px rgba(22, 163, 74, 0.3);
    border: none;
}

.btn-warning {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    border: none;
    color: white !important;
}

.btn-danger {
    background: linear-gradient(135deg, #ef4444, #dc2626);
    border: none;
}

.btn-secondary {
    background-color: #166534;
    border: none;
}

.btn-sm {
    padding: 5px 12px;
    font-size: 0.85rem;
}

/* Image styling */
img.rounded {
    border: 2px solid #22c55e;
    padding: 2px;
    background: #071a12;
    object-fit: cover;
}

/* Alert Styling */
.alert-danger {
    background-color: #450a0a;
    border-left: 5px solid #ef4444;
    color: #fca5a5;
    border-radius: 10px;
    border: none;
}
</style>

<?php
if(!isset($_SESSION['user'])){
    echo "<div class='alert alert-danger'>Silakan login terlebih dahulu</div>";
    return;
}

if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $idlevel = $_POST['idlevel'];
    $ket = $_POST['keterangan'];
    $tahun = $_POST['tahun_lulus'];

    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    if($foto){
        move_uploaded_file($tmp, "uploads/".$foto);
    }

    mysqli_query($conn, "INSERT INTO studies 
    (nama, idlevel, keterangan, tahun_lulus, foto_sekolah)
    VALUES ('$nama','$idlevel','$ket','$tahun','$foto')");

    header("Location: index.php?page=studies");
}

if(isset($_GET['hapus'])){
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM studies WHERE id='$id'");
    header("Location: index.php?page=studies");
}

$edit = null;

if(isset($_GET['edit'])){
    $id = $_GET['edit'];

    $edit = mysqli_fetch_assoc(
        mysqli_query($conn,
        "SELECT * FROM studies WHERE id='$id'")
    );
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $idlevel = $_POST['idlevel'];
    $ket = $_POST['keterangan'];
    $tahun = $_POST['tahun_lulus'];

    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    if($foto){
        move_uploaded_file($tmp, "uploads/".$foto);
        mysqli_query($conn, "UPDATE studies SET 
            nama='$nama',
            idlevel='$idlevel',
            keterangan='$ket',
            tahun_lulus='$tahun',
            foto_sekolah='$foto'
            WHERE id='$id'");
    } else {
        mysqli_query($conn, "UPDATE studies SET 
            nama='$nama',
            idlevel='$idlevel',
            keterangan='$ket',
            tahun_lulus='$tahun'
            WHERE id='$id'");
    }

    header("Location: index.php?page=studies");
}
?>

<div class="card-dark">
    <h4 class="mb-4 fw-bold">Data Studies</h4>

    <form method="POST" enctype="multipart/form-data" class="mb-4">
        <div class="row g-3">
            <div class="col-md-6">
                <input type="text" name="nama" class="form-control" placeholder="Nama Sekolah" value="<?= $edit ? $edit['nama'] : '' ?>" required>
            </div>

            <div class="col-md-3">
                <select name="idlevel" class="form-select" required>
                    <option value="">Pilih Level</option>
                    <?php
                    $level = mysqli_query($conn, "SELECT * FROM level");
                    while($l = mysqli_fetch_assoc($level)):
                    ?>
                    <option value="<?= $l['id'] ?>" <?= ($edit && $edit['idlevel']==$l['id'])?'selected':'' ?>>
                        <?= $l['nama'] ?>
                    </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="col-md-3">
                <input type="number" name="tahun_lulus" class="form-control" placeholder="Tahun Lulus" value="<?= $edit ? $edit['tahun_lulus'] : '' ?>">
            </div>

            <div class="col-12">
                <textarea name="keterangan" class="form-control" placeholder="Keterangan" rows="3"><?= $edit ? $edit['keterangan'] : '' ?></textarea>
            </div>

            <div class="col-md-6">
                <input type="file" name="foto" class="form-control">
            </div>

            <?php if($edit && $edit['foto_sekolah']): ?>
            <div class="col-md-2">
                <img src="uploads/<?= $edit['foto_sekolah'] ?>" width="80" height="80" class="rounded">
            </div>
            <?php endif; ?>

            <div class="col-12 mt-4">
                <?php if($edit): ?>
                    <input type="hidden" name="id" value="<?= $edit['id'] ?>">
                    <button name="update" class="btn btn-warning">Update Data</button>
                    <a href="index.php?page=studies" class="btn btn-secondary">Batal</a>
                <?php else: ?>
                    <button name="simpan" class="btn btn-primary">Tambah Data</button>
                <?php endif; ?>
            </div>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="50">No</th>
                    <th width="100">Foto</th>
                    <th>Nama Sekolah</th>
                    <th>Level</th>
                    <th>Tahun</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $data = mysqli_query($conn, "
                    SELECT studies.*, level.nama AS level_nama
                    FROM studies
                    JOIN level ON studies.idlevel = level.id
                ");
                while($row = mysqli_fetch_assoc($data)):
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td>
                        <?php if($row['foto_sekolah']): ?>
                            <img src="uploads/<?= $row['foto_sekolah'] ?>" width="60" height="60" class="rounded shadow-sm">
                        <?php else: ?>
                            <span class="text-muted small">No Image</span>
                        <?php endif; ?>
                    </td>
                    <td class="fw-bold"><?= $row['nama']; ?></td>
                    <td><span class="badge bg-success bg-opacity-25 text-success px-3"><?= $row['level_nama']; ?></span></td>
                    <td><?= $row['tahun_lulus']; ?></td>
                    <td>
                        <a href="index.php?page=studies&edit=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="index.php?page=studies&hapus=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>