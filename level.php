<style>
/* Dasar Card dengan Efek Glassmorphism */
.card-dark {
    background: rgba(11, 31, 23, 0.8);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(34, 197, 94, 0.2);
    border-radius: 20px;
    color: white;
    overflow: hidden;
}

/* Header Card dengan Gradasi Modern */
.card-header-dark {
    background: linear-gradient(135deg, #15803d, #166534);
    color: white;
    border-bottom: 1px solid rgba(34, 197, 94, 0.3);
    padding: 20px;
}

/* Form Styling */
.form-control {
    background: #0a1f16 !important;
    border: 1px solid #1f4d3a !important;
    color: #ecfdf5 !important;
    border-radius: 10px !important;
    padding: 12px 15px !important;
    transition: all 0.3s ease;
}

.form-control::placeholder {
    color: #4b6358;
}

.form-control:focus {
    background: #0f2a1f !important;
    border-color: #22c55e !important;
    box-shadow: 0 0 0 0.25rem rgba(34, 197, 94, 0.15) !important;
}

/* Table Styling */
.table {
    color: #ecfdf5;
    margin-top: 10px;
}

.table thead {
    background: rgba(22, 163, 74, 0.1);
    color: #4ade80;
    text-transform: uppercase;
    font-size: 0.85rem;
    letter-spacing: 1px;
}

.table thead th {
    border-bottom: 2px solid #1f4d3a !important;
    padding: 15px;
}

.table-striped tbody tr:nth-of-type(odd) {
    background: rgba(15, 42, 31, 0.5);
}

.table-hover tbody tr:hover {
    background: rgba(20, 83, 45, 0.4);
    transition: 0.3s;
}

.table td {
    padding: 15px;
    border-color: rgba(31, 77, 58, 0.5) !important;
    vertical-align: middle;
}

/* Button Customization */
.btn {
    border-radius: 10px;
    padding: 10px 20px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-primary {
    background: linear-gradient(135deg, #22c55e, #16a34a);
    border: none;
    box-shadow: 0 4px 15px rgba(22, 163, 74, 0.2);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(22, 163, 74, 0.3);
}

.btn-warning {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    border: none;
    color: white;
}

.btn-danger {
    background: linear-gradient(135deg, #ef4444, #dc2626);
    border: none;
}

.btn-secondary {
    background: #1f4d3a;
    border: none;
}

/* Alert Styling */
.alert-danger {
    background: #450a0a;
    border-left: 5px solid #ef4444;
    color: #fca5a5;
    border-radius: 12px;
}
</style>

<?php
if(!isset($_SESSION['user'])){
    echo "<div class='alert alert-danger shadow-sm'>
            <i class='bi bi-exclamation-triangle-fill me-2'></i> Akses Ditolak. Silakan login terlebih dahulu.
          </div>";
    return;
}

// Logika Database Tetap Sama (INSERT, DELETE, EDIT, UPDATE)
if(isset($_POST['simpan'])){
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    mysqli_query($conn, "INSERT INTO level (nama) VALUES ('$nama')");
    header("Location: index.php?page=level");
}

if(isset($_GET['hapus'])){
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM level WHERE id='$id'");
    header("Location: index.php?page=level");
}

$edit = null;
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $edit = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM level WHERE id='$id'"));
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    mysqli_query($conn, "UPDATE level SET nama='$nama' WHERE id='$id'");
    header("Location: index.php?page=level");
}
?>

<div class="card card-dark shadow-lg">
    <div class="card-header card-header-dark d-flex align-items-center">
        <i class="bi bi-bar-chart-steps me-2 fs-5"></i>
        <h5 class="mb-0 fw-bold">Manajemen Data Level</h5>
    </div>

    <div class="card-body p-4">
        <!-- FORM INPUT -->
        <form method="POST" class="mb-5">
            <?php if($edit): ?>
                <input type="hidden" name="id" value="<?= $edit['id']; ?>">
            <?php endif; ?>

            <label class="form-label text-success small fw-bold mb-2">
                <?= $edit ? 'Edit Nama Level' : 'Tambah Level Baru' ?>
            </label>
            <div class="input-group">
                <input type="text" 
                       name="nama" 
                       class="form-control" 
                       placeholder="Misal: Sarjana, Diploma, dll..." 
                       value="<?= $edit ? $edit['nama'] : '' ?>" 
                       required>
                
                <?php if($edit): ?>
                    <button type="submit" name="update" class="btn btn-warning">
                        <i class="bi bi-check-circle me-1"></i> Update
                    </button>
                    <a href="index.php?page=level" class="btn btn-secondary">
                        Batal
                    </a>
                <?php else: ?>
                    <button type="submit" name="simpan" class="btn btn-primary">
                        <i class="bi bi-plus-lg me-1"></i> Tambah
                    </button>
                <?php endif; ?>
            </div>
        </form>

        <!-- TABLE DATA -->
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th width="80">ID</th>
                        <th>Kategori Level Pendidikan</th>
                        <th width="200" class="text-center">Aksi Manajemen</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $data = mysqli_query($conn, "SELECT * FROM level ORDER BY id DESC");
                if(mysqli_num_rows($data) > 0):
                    while($row = mysqli_fetch_assoc($data)):
                ?>
                    <tr>
                        <td class="text-muted fw-bold"><?= $no++; ?></td>
                        <td>
                            <span class="fw-bold text-white"><?= $row['nama']; ?></span>
                        </td>
                        <td class="text-center">
                            <a href="index.php?page=level&edit=<?= $row['id']; ?>" 
                               class="btn btn-sm btn-warning me-1 shadow-sm">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="index.php?page=level&hapus=<?= $row['id']; ?>" 
                               class="btn btn-sm btn-danger shadow-sm" 
                               onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php 
                    endwhile; 
                else:
                ?>
                    <tr>
                        <td colspan="3" class="text-center py-4 text-muted small">
                            Belum ada data level tersedia.
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>