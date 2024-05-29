<!DOCTYPE html>
<html>
<head>
    <title>Data Pegawai</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
</head>
<body>
    <h1>Data Pegawai</h1>

    <form action="<?= site_url('pegawai/tambah'); ?>" method="post">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama"><br>
        <label for="jabatan">Jabatan:</label><br>
        <input type="text" id="jabatan" name="jabatan"><br>
        <label for="gaji">Gaji:</label><br>
        <input type="text" id="gaji" name="gaji"><br>
        <input type="submit" value="Submit">
    </form>

    <form id="updateForm" action="<?= site_url('pegawai/update/'); ?>" method="post" style="display: none;">
    <input type="hidden" id="id" name="id">
    <!-- Rest of your form here -->
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama"><br>
        <label for="jabatan">Jabatan:</label><br>
        <input type="text" id="jabatan" name="jabatan"><br>
        <label for="gaji">Gaji:</label><br>
        <input type="text" id="gaji" name="gaji"><br>
        <input type="submit" value="Update">
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Gaji</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($pegawai as $p) : ?>
                <tr>
                    <td><?= $p['id']; ?></td>
                    <td><?= $p['nama']; ?></td>
                    <td><?= $p['jabatan']; ?></td>
                    <td><?= $p['gaji']; ?></td>
                    <td>
                        <a href="<?= site_url('pegawai/delete/'.$p['id']); ?>">Hapus</a>
                        <a href="#" class="edit" data-id="<?= $p['id']; ?>" data-nama="<?= $p['nama']; ?>" data-jabatan="<?= $p['jabatan']; ?>" data-gaji="<?= $p['gaji']; ?>">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $('a.edit').click(function(e) {
    e.preventDefault();

    var id = $(this).data('id');
                var jabatan = $(this).data('jabatan');
                var gaji = $(this).data('gaji');

                $('#updateForm input[name="id"]').val(id);
                $('#updateForm input[name="nama"]').val(nama);
                $('#updateForm input[name="jabatan"]').val(jabatan);
                $('#updateForm input[name="gaji"]').val(gaji);
                $('#updateForm').attr('action', '<?= site_url('pegawai/update/'); ?>' + id);
    $('#updateForm').show();
});;
        });
    </script>
  
</body>
</html>