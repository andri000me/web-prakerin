<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img {
            width: 70px;

        }
    </style>
</head>

<body>
    <table style="text-align: center;">
        <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>Jam</th>
            <th>Foto Absen</th>
            <th>Nama Siswa</th>
            <th>Nama Perusahaan</th>
        </tr>

        <?php $no = 1;
        foreach ($cetak as $a) : ?>

            <tr>
                <td><?= $no++ ?></td>
                <td><?= $a->tanggal; ?></td>
                <td><?= $a->jam; ?></td>
                <td><img src="<?= $a->foto; ?>"></td>
                <td><?= $a->siswa; ?></td>
                <td><?= $a->perusahaan; ?></td>

            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>