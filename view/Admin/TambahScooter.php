<?php
$halamanSekarangNav = 'tambahScooterAdmin';
$halamanSekarangButton = 'logout';
?>

<div class="flex-container">
    <form method="GET" action="tambah-scooter-process">
        <div class="flex-form">
            <h1>Tambah Scooter</h1>
            <div class="input">
                <p>Warna : </p>
                <input type="text" name="newColor">
            </div>
            <div class="input">
                <input type="submit" value="Tambah" class="tombol">
                <button class="tombol" onclick="window.location = `./scooter-admin`; return false;">Kembali</button>
            </div>
        </div>
    </form>
</div>