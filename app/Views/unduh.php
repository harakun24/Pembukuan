<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="/assets/js/jszip.js"></script>
    <script src="/assets/js/xslx.core.js"></script>
    <script src="/assets/js/alasql.js"></script>
</head>

<body>
    <button onclick="saveFile()">Save XLSX file</button>
    <script>
        window.saveFile = function saveFile() {
            // var data1 = [{
            //     a: 1,
            //     b: 10
            // }, {
            //     a: 2,
            //     b: 20
            // }];
            // var data2 = [{
            //     a: 100,
            //     b: 10
            // }, {
            //     a: 200,
            //     b: 20
            // }];
            // var opts = [{
            //     sheetid: 'One',
            //     header: true
            // }, {
            //     sheetid: 'Two',
            //     header: false
            // }];
            // var res = alasql('SELECT * INTO XLSX("restest344b.xlsx",?) FROM ?',
            //     [opts, [data1, data2]]);
            fetch('http://localhost:8080/siswa/tes')
                .then(res => res.json())
                .then(res => {
                    console.log(res);
                    data = [];
                    for (i = 0; i < 3; i++)
                        data.push([])
                    for (const [key, value] of Object.entries(res.status)) {
                        for (const [k, v] of Object.entries(value)) {
                            if (v == "" || v== null)
                                res.status[key][k] = "-";
                        }
                        let temp = new Object();
                        temp.nama = value.siswa_nama;
                        temp.nis = value.siswa_nis;
                        temp.panggilan = value.siswa_nick;
                        temp['jenis kelamin'] = value.siswa_jk;
                        temp.ttl = value.siswa_tempat_lahir + "," + value.siswa_tanggal_lahir;
                        temp.agama = value.siswa_agama;
                        temp['orang tua'] = value.wali;
                        temp.kewarganegaraan = value.siswa_kewarganegaraan;
                        temp['anak ke'] = value.siswa_order;
                        temp['saudara kandung'] = value.siswa_kandung;
                        temp['saudara tiri'] = value.siswa_tiri;
                        temp['saudara angkat'] = value.siswa_angkat;
                        temp['bahasa sehari-hari'] = value.siswa_bahasa;
                        data[0].push(temp);

                        console.log(value)
                        temp = new Object();
                        temp.nama = value.siswa_nama;
                        temp['alamat'] = value.siswa_alamat;
                        temp['alamat wali'] = value.siswa_alamat_wali;
                        temp['nomor telepon'] = value.siswa_telepon;
                        temp['status tinggal'] = value.siswa_tinggal;
                        temp['jarak'] = value.siswa_jarak+" Km";
                        data[1].push(temp);

                        temp = new Object();
                        temp.nama = value.siswa_nama;
                        temp['lulusan dari'] = value.siswa_dari;
                        temp['tanggal & no STTB'] = value.siswa_sebelum_tanggal + ", " + value.siswa_sebelum_sttb;
                        temp['lama belajar'] = value.siswa_sebelum_lama;
                        temp['pindahan dari'] = value.siswa_pindah_dari;
                        temp['alasan pindah'] = value.siswa_pindah_alasan;
                        temp['kelas diterima'] = value.siswa_kelas;
                        temp['program studi'] = value.siswa_prodi;
                        temp['tanggal'] = value.siswa_tanggal_diterima;
                        data[2].push(temp);

                    }

                    var res2 = alasql('SELECT * INTO XLSX("siswa.xlsx",?) FROM ?',
                        [
                            [{
                                sheetid: 'data pribadi',
                                header: true,
                            }, {
                                sheetid: 'tempat tinggal',
                                header: true
                            }, {
                                sheetid: 'pendidikan',
                                header: true
                            }],
                            data
                        ]);
                })
        }
    </script>
</body>

</html>