<?= $this->extend('layout/main'); ?>
<?= $this->extend('layout/menu'); ?>

<?= $this->section('title'); ?>
<h3>Manajemen Data Kategori</h3>
<?= $this->endSection(); ?>


<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <button type="button" class="btn btn-primary" id="addButton">
            <i class="fas fa-plus"></i>Tambah Data
        </button>
    </div>
    <div class="card-body">
        <table class="table table-sm table-striped" id="data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Kategori</th>
                    <th>Nama Kategori</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($categories as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['katid']; ?></td>
                        <td><?= $row['katnama']; ?></td>
                        <td>
                            <button class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-danger btn-sm" onclick="
                                deleteData('<?= $row['katid']; ?>', 
                                           '<?= $row['katnama']; ?>')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal-container" style="display: none;"></div>

<script>
    function deleteData(id, nama) {
        Swal.fire({
            title: 'Hapus Kategori',
            html: `Apakah Anda yakin menghapus <strong>${nama}</strong>?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Tunda'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: "<?= site_url('category/deleteCategory') ?>",
                    data: {
                        'id-category': id
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            window.location.reload();
                        }
                    },
                    error: function(xhr, thrownError) {
                        alert(`${xhr.status} ${xhr.responseText} ${thrownError}`);
                    }
                });
            }
        })
    }

    $(document).ready(function() {
        $('#addButton').click(function(e) {
            e.preventDefault();

            $.ajax({
                url: "<?= site_url('category/addFormModal') ?>",
                dataType: "json",
                success: function(response) {
                    const uniqueId = 'KAT' + Math.random().toString(8).slice(16);

                    if (response.data) {
                        $('.modal-container').html(response.data).show();
                        $('#addModalCategory').on('shown.bs.modal', function(event) {
                            $('#nameCategory').focus();
                        });
                        $('#addModalCategory').modal('show');
                        $('#idCategory').val(uniqueId);
                    }
                },
                error: function(xhr, thrownError) {
                    alert(`${xhr.status} ${xhr.responseText} ${thrownError}`);
                }
            });
        });
    });
</script>

<?= $this->endSection(); ?>