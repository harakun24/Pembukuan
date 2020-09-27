<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css?v=2">
    <link rel="stylesheet" href="/assets/fa/css/all.css">

    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/sweetalert2-all.js"></script>
    <script src="/assets/js/jszip.js"></script>
    <script src="/assets/js/xslx.core.js"></script>
    <script src="/assets/js/alasql.js"></script>
</head>

<body>
    <button onclick="saveFile()">Save XLSX file</button>
    <!-- <div class="col-12 d-flex flex-wrap">
        <div class="row">
            <div class="col-12">
                <input type="checkbox" name="all" id="all">
                <label for="all"><b>Semua</b></label>
            </div>
        </div>
        <div class="col-6 mt-2 d-flex">
            <div class="col-12">
                <input type="checkbox" name="pribadi" id="pribadi">
                <label for="pribadi"><b>Pribadi</b></label>
            </div>
        </div>
        <div class="col-6 mt-2 d-flex">
            <div class="col-12">
                <input type="checkbox" name="tt" id="tt">
                <label for="tt"><b>Tempat tinggal</b></label>
            </div>
        </div>
        <div class="col-6 mt-2 d-flex">
            <div class="col-12">
                <input type="checkbox" name="kesehatan" id="kesehatan">
                <label for="kesehatan"><b>Kesehatan</b></label>
            </div>
        </div>
        <div class="col-6 mt-2 d-flex">
            <div class="col-12">
                <input type="checkbox" name="pendidikan" id="pendidikan">
                <label for="pendidikan"><b>Pendidikan</b></label>
            </div>
        </div>
        <div class="col-6 mt-2 d-flex">
            <div class="col-12">
                <input type="checkbox" name="kegemaran" id="kegemaran">
                <label for="kegemaran"><b>Kegemaran</b></label>
            </div>
        </div>
        <div class="col-6 mt-2 d-flex">
            <div class="col-12">
                <input type="checkbox" name="beasiswa" id="beasiswa">
                <label for="beasiswa"><b>Beasiswa</b></label>
            </div>
        </div>
        <div class="col-6 mt-2 d-flex">
            <div class="col-12">
                <input type="checkbox" name="perkembangan" id="perkembangan">
                <label for="perkembangan"><b>perkembangan</b></label>
            </div>
        </div>
        <div class="col-6 mt-2 d-flex">
            <div class="col-12">
                <input type="checkbox" name="bekerja" id="bekerja">
                <label for="bekerja"><b>Setelah selesai</b></label>
            </div>
        </div>
    </div> -->
    <script>
        function klik(arg, t) {
            var dd = document.getElementsByClassName(arg);
            Array.prototype.forEach.call(dd, el => {
                el.checked = t.checked;
            })
        }

        function subklik(prt, t) {
            var dd = document.getElementsByClassName(prt);
            let p = document.getElementById(prt);
            let status = false;
            Array.prototype.forEach.call(dd, el => {
                if (el.checked)
                    status = true;
            })
            p.checked = status;


        }
        window.saveFile = function saveFile() {
            ko = `
            <div class="col-12 d-flex flex-wrap align-items-start">
        <div class="row">
            <div class="col-12 d-flex justify-content-start align-items-center">
                <input type="checkbox" name="all" id="all">
                <label for="all" class="ml-1"><b>Semua Kategori</b></label>
            </div>
        </div>
        <div class="col-6 mt-2 d-flex flex-wrap">
            <div class="col-12 d-flex justify-content-start align-items-center">
                <input type="checkbox" name="pribadi" id="pribadi" onclick="klik('pribadi',this)">
                <label for="pribadi" class="ml-1"><b>Pribadi</b></label>
            </div>
            <div style="font-size:80%" class="ml-3 col-12 d-flex justify-content-start align-items-center">
                <input class="pribadi child-c" onclick="subklik('pribadi',this)" type="checkbox" name="pribadi_nama" id="pribadi_nama">
                <label for="pribadi_nama" class="ml-1">Nama Lengkap</label>
            </div>
            <div style="font-size:80%" class="ml-3 col-12 d-flex justify-content-start align-items-center">
                <input onclick="subklik('pribadi',this)"  class=" child-c pribadi" type="checkbox" name="pribadi_nis" id="pribadi_nis">
                <label for="pribadi_nis" class="ml-1">NIS</label>
            </div>
            <div style="font-size:80%" class="ml-3 col-12 d-flex justify-content-start align-items-center">
                <input onclick="subklik('pribadi',this)"  class="pribadi child-c" type="checkbox" name="pribadi_nick" id="pribadi_nick">
                <label for="pribadi_nick" class="ml-1">Nama Panggilan</label>
            </div>
            <div style="font-size:80%" class="ml-3 col-12 d-flex justify-content-start align-items-center">
                <input onclick="subklik('pribadi',this)"  class="pribadi child-c" type="checkbox" name="pribadi_jk" id="pribadi_jk">
                <label for="pribadi_jk" class="ml-1">Jenis Kelamin</label>
            </div>
            <div style="font-size:80%" class="ml-3 col-12 d-flex justify-content-start align-items-center">
                <input onclick="subklik('pribadi',this)"  class="pribadi child-c" type="checkbox" name="pribadi_ttl" id="pribadi_ttl">
                <label for="pribadi_ttl" class="ml-1">TTL</label>
            </div>
            <div style="font-size:80%" class="ml-3 col-12 d-flex justify-content-start align-items-center">
                <input onclick="subklik('pribadi',this)"  class="pribadi child-c" type="checkbox" name="pribadi_agama" id="pribadi_agama">
                <label for="pribadi_agama" class="ml-1">Agama</label>
            </div>
            <div style="font-size:80%" class="ml-3 col-12 d-flex justify-content-start align-items-center">
                <input onclick="subklik('pribadi',this)"  class="pribadi child-c" type="checkbox" name="pribadi_ot" id="pribadi_ot">
                <label for="pribadi_ot" class="ml-1">Orang tua</label>
            </div>
            <div style="font-size:80%" class="ml-3 col-12 d-flex justify-content-start align-items-center">
                <input onclick="subklik('pribadi',this)"  class="pribadi child-c" type="checkbox" name="pribadi_k" id="pribadi_k">
                <label for="pribadi_k" class="ml-1">Kewarganegaraan</label>
            </div>
            <div style="font-size:80%" class="ml-3 col-12 d-flex justify-content-start align-items-center">
                <input onclick="subklik('pribadi',this)"  class="pribadi child-c" type="checkbox" name="pribadi_s" id="pribadi_s">
                <label for="pribadi_s" class="ml-1">Jumlah saudara</label>
            </div>
            <div style="font-size:80%" class="ml-3 col-12 d-flex justify-content-start align-items-center">
                <input onclick="subklik('pribadi',this)"  class="pribadi child-c" type="checkbox" name="pribadi_bahasa" id="pribadi_bahasa">
                <label for="pribadi_bahasa" class="ml-1">Bahasa</label>
            </div>
        </div>
        <div class="col-6 mt-2 d-flex flex-wrap">
            <div class="col-12 d-flex justify-content-start align-items-center">
                <input type="checkbox" name="pendidikan" id="pendidikan" onclick="klik('pendidikan',this)">
                <label for="pendidikan" class="ml-1"><b>Pendidikan</b></label>
            </div>
            <div style="font-size:80%" class="ml-3 col-12 d-flex justify-content-start align-items-center">
                <input onclick="subklik('pendidikan',this)" class="pendidikan child-c" type="checkbox" name="pendidikan_ld" id="pendidikan_ld">
                <label for="pendidikan_ld" class="ml-1">Lulusan dari</label>
            </div>
            <div style="font-size:80%" class="ml-3 col-12 d-flex justify-content-start align-items-center">
                <input onclick="subklik('pendidikan',this)" class="pendidikan child-c" type="checkbox" name="pendidikan_tsttb" id="pendidikan_tsttb">
                <label for="pendidikan_tsttb" class="ml-1">Tanggal & no STTB</label>
            </div>
            <div style="font-size:80%" class="ml-3 col-12 d-flex justify-content-start align-items-center">
                <input onclick="subklik('pendidikan',this)" class="pendidikan child-c" type="checkbox" name="pendidikan_lb" id="pendidikan_lb">
                <label for="pendidikan_lb" class="ml-1">Lama belajar</label>
            </div>
            <div style="font-size:80%" class="ml-3 col-12 d-flex justify-content-start align-items-center">
                <input onclick="subklik('pendidikan',this)" class="pendidikan child-c" type="checkbox" name="pendidikan_pd" id="pendidikan_pd">
                <label for="pendidikan_pd" class="ml-1">Pindahan dari</label>
            </div>
            <div style="font-size:80%" class="ml-3 col-12 d-flex justify-content-start align-items-center">
                <input onclick="subklik('pendidikan',this)" class="pendidikan child-c" type="checkbox" name="pendidikan_alasan" id="pendidikan_alasan">
                <label for="pendidikan_alasan" class="ml-1">Alasan pindah</label>
            </div>
            <div style="font-size:80%" class="ml-3 col-12 d-flex justify-content-start align-items-center">
                <input onclick="subklik('pendidikan',this)" class="pendidikan child-c" type="checkbox" name="pendidikan_kelas" id="pendidikan_kelas">
                <label for="pendidikan_kelas" class="ml-1">Kelas diterima</label>
            </div>
            <div style="font-size:80%" class="ml-3 col-12 d-flex justify-content-start align-items-center">
                <input onclick="subklik('pendidikan',this)" class="pendidikan child-c" type="checkbox" name="pendidikan_prodi" id="pendidikan_prodi">
                <label for="pendidikan_prodi" class="ml-1">Program studi</label>
            </div>
            <div style="font-size:80%" class="ml-3 col-12 d-flex justify-content-start align-items-center">
                <input onclick="subklik('pendidikan',this)" class="pendidikan child-c" type="checkbox" name="pendidikan_diterima" id="pendidikan_diterima">
                <label for="pendidikan_diterima" class="ml-1">Tanggal diterima</label>
            </div>
        </div>
        
        <div class="col-6 mt-2 d-flex flex-wrap">
            <div class="col-12 d-flex justify-content-start align-items-center">
                <input type="checkbox" name="kesehatan" id="kesehatan" onclick="klik('kesehatan',this)">
                <label for="kesehatan" class="ml-1"><b>Kesehatan</b></label>
            </div>
            <div style="font-size:80%" class="ml-3 col-12 d-flex justify-content-start align-items-center">
                <input onclick="subklik('kesehatan',this)"  class="kesehatan child-c" type="checkbox" name="kesehatan_gd" id="kesehatan_gd">
                <label for="kesehatan_gd" class="ml-1">Golongan darah</label>
            </div>
            <div style="font-size:80%" class="ml-3 col-12 d-flex justify-content-start align-items-center">
                <input onclick="subklik('kesehatan',this)"  class="kesehatan child-c" type="checkbox" name="kesehatan_penyakit" id="kesehatan_penyakit">
                <label for="kesehatan_penyakit" class="ml-1">Penyakit</label>
            </div>
            <div style="font-size:80%" class="ml-3 col-12 d-flex justify-content-start align-items-center">
                <input onclick="subklik('kesehatan',this)"  class="kesehatan child-c" type="checkbox" name="kesehatan_kj" id="kesehatan_kj">
                <label for="kesehatan_kj" class="ml-1">Kelainan Jasmani</label>
            </div>
            <div style="font-size:80%" class="ml-3 col-12 d-flex justify-content-start align-items-center">
                <input onclick="subklik('kesehatan',this)"  class="kesehatan child-c" type="checkbox" name="kesehatan_tinggi" id="kesehatan_tinggi">
                <label for="kesehatan_tinggi" class="ml-1">Tinggi badan</label>
            </div>
            <div style="font-size:80%" class="ml-3 col-12 d-flex justify-content-start align-items-center">
                <input onclick="subklik('kesehatan',this)"  class="kesehatan child-c" type="checkbox" name="kesehatan_berat" id="kesehatan_berat">
                <label for="kesehatan_berat" class="ml-1">Berat badan</label>
            </div>
        </div>
        <div class="col-6 mt-2 d-flex flex-wrap">
            <div class="col-12 d-flex justify-content-start align-items-center">
                <input onclick="klik('tt',this)" type="checkbox" name="tt" id="tt">
                <label for="tt" class="ml-1"><b>Tempat tinggal</b></label>
            </div>
            <div style="font-size:80%" class="ml-3 col-12 d-flex justify-content-start align-items-center">
                <input onclick="subklik('tt',this)"  class="tt child-c" type="checkbox" name="tt_alamat" id="tt_alamat">
                <label for="tt_alamat" class="ml-1">Alamat</label>
            </div>
            <div style="font-size:80%" class="ml-3 col-12 d-flex justify-content-start align-items-center">
                <input onclick="subklik('tt',this)"  class="tt child-c" type="checkbox" name="tt_wali" id="tt_wali">
                <label for="tt_wali" class="ml-1">Alamat wali</label>
            </div>
            <div style="font-size:80%" class="ml-3 col-12 d-flex justify-content-start align-items-center">
                <input onclick="subklik('tt',this)"  class="tt child-c" type="checkbox" name="tt_telepon" id="tt_telepon">
                <label for="tt_telepon" class="ml-1">Telepon</label>
            </div>
            <div style="font-size:80%" class="ml-3 col-12 d-flex justify-content-start align-items-center">
                <input onclick="subklik('tt',this)"  class="tt child-c" type="checkbox" name="tt_st" id="tt_st">
                <label for="tt_st" class="ml-1">Status tinggal</label>
            </div>
            <div style="font-size:80%" class="ml-3 col-12 d-flex justify-content-start align-items-center">
                <input onclick="subklik('tt',this)"  class="tt child-c" type="checkbox" name="tt_jarak" id="tt_jarak">
                <label for="tt_jarak" class="ml-1">Jarak</label>
            </div>
        </div>
        <div class="col-6 mt-2 d-flex flex-wrap">
            <div class="col-12 d-flex justify-content-start align-items-center">
                <input onclick="klik('kegemaran',this)" type="checkbox" name="kegemaran" id="kegemaran">
                <label for="kegemaran" class="ml-1"><b>Kegemaran</b></label>
            </div>
            <div style="font-size:80%" class="ml-3 col-12 d-flex justify-content-start align-items-center">
                <input onclick="subklik('kegemaran',this)"  class="kegemaran child-c" type="checkbox" name="kegemaran_kesenian" id="kegemaran_kesenian">
                <label for="kegemaran_kesenian" class="ml-1">Kesenian</label>
            </div>
            <div style="font-size:80%" class="ml-3 col-12 d-flex justify-content-start align-items-center">
                <input onclick="subklik('kegemaran',this)"  class="kegemaran child-c" type="checkbox" name="kegemaran_or" id="kegemaran_or">
                <label for="kegemaran_or" class="ml-1">Olahraga</label>
            </div>
            <div style="font-size:80%" class="ml-3 col-12 d-flex justify-content-start align-items-center">
                <input onclick="subklik('kegemaran',this)"  class="kegemaran child-c" type="checkbox" name="kegemaran_organisasi" id="kegemaran_organisasi">
                <label for="kegemaran_organisasi" class="ml-1">Organisasi</label>
            </div>
            <div style="font-size:80%" class="ml-3 col-12 d-flex justify-content-start align-items-center">
                <input onclick="subklik('kegemaran',this)"  class="kegemaran child-c" type="checkbox" name="kegemaran_dll" id="kegemaran_dll">
                <label for="kegemaran_dll" class="ml-1">Lain-lain</label>
            </div>
        </div>
        
        <div class="col-6 mt-2 d-flex flex-wrap">
            <div class="col-12 d-flex justify-content-start align-items-center">
                <input onclick="klik('perkembangan',this)" type="checkbox" name="perkembangan" id="perkembangan">
                <label for="perkembangan" class="ml-1"><b>Perkembangan</b></label>
            </div>
            <div style="font-size:80%" class="ml-3 col-12 d-flex justify-content-start align-items-center">
                <input onclick="subklik('perkembangan',this)"  class="perkembangan child-c" type="checkbox" name="perkembangan_tm" id="perkembangan_tm">
                <label for="perkembangan_tm" class="ml-1">Tanggal meninggalkan</label>
            </div>
            <div style="font-size:80%" class="ml-3 col-12 d-flex justify-content-start align-items-center">
                <input onclick="subklik('perkembangan',this)"  class="perkembangan child-c" type="checkbox" name="perkembangan_am" id="perkembangan_am">
                <label for="perkembangan_am" class="ml-1">Alasan meninggalkan</label>
            </div>
            <div style="font-size:80%" class="ml-3 col-12 d-flex justify-content-start align-items-center">
                <input onclick="subklik('perkembangan',this)"  class="perkembangan child-c" type="checkbox" name="perkembangan_sttb" id="perkembangan_sttb">
                <label for="perkembangan_sttb" class="ml-1">no STTB</label>
            </div>
            <div style="font-size:80%" class="ml-3 col-12 d-flex justify-content-start align-items-center">
                <input onclick="subklik('perkembangan',this)"  class="perkembangan child-c" type="checkbox" name="perkembangan_tt" id="perkembangan_tt">
                <label for="perkembangan_tt" class="ml-1">Tamat tahun</label>
            </div>
            <div style="font-size:80%" class="ml-3 col-12 d-flex justify-content-start align-items-center">
                <input onclick="subklik('perkembangan',this)"  class="perkembangan child-c" type="checkbox" name="perkembangan_md" id="perkembangan_md">
                <label for="perkembangan_md" class="ml-1">Tempat melanjutkan</label>
            </div>
        </div>
        <div class="col-6 mt-2 d-flex flex-wrap">
            <div class="col-12 d-flex justify-content-start align-items-center">
                <input type="checkbox" name="beasiswa" id="beasiswa">
                <label for="beasiswa" class="ml-1"><b>Beasiswa</b></label>
            </div>        
        </div>
        <div class="col-6 mt-2 d-flex flex-wrap">
            <div class="col-12 d-flex justify-content-start align-items-center">
                <input type="checkbox" name="bekerja" id="bekerja">
                <label for="bekerja" class="ml-1"><b>Karir Alumni</b></label>
            </div>
        </div>
    </div>
            `;

            Swal.fire({
                title: 'Data Laporan',
                html: ko,
            }).then(ej => {
                let pribadi = document.getElementById('pribadi');
                let pendidikan = document.getElementById('pendidikan');
                let kesehatan = document.getElementById('kesehatan');
                let tt = document.getElementById('tt');
                let kegemaran = document.getElementById('kegemaran');
                let perkembangan = document.getElementById('perkembangan');
                let beasiswa = document.getElementById('beasiswa');
                let bekerja = document.getElementById('bekerja');
                //child
                let pribadi_nama = document.getElementById('pribadi_nama');
                let pribadi_nis = document.getElementById('pribadi_nis');
                let pribadi_nick = document.getElementById('pribadi_nick');
                let pribadi_jk = document.getElementById('pribadi_jk');
                let pribadi_ttl = document.getElementById('pribadi_ttl');
                let pribadi_agama = document.getElementById('pribadi_agama');
                let pribadi_ot = document.getElementById('pribadi_ot');
                let pribadi_k = document.getElementById('pribadi_k');
                let pribadi_s = document.getElementById('pribadi_s');
                let pribadi_bahasa = document.getElementById('pribadi_bahasa');

                let pendidikan_ld = document.getElementById('pendidikan_ld');
                let pendidikan_tsttb = document.getElementById('pendidikan_tsttb');
                let pendidikan_lb = document.getElementById('pendidikan_lb');
                let pendidikan_pd = document.getElementById('pendidikan_pd');
                let pendidikan_alasan = document.getElementById('pendidikan_alasan');
                let pendidikan_kelas = document.getElementById('pendidikan_kelas');
                let pendidikan_prodi = document.getElementById('pendidikan_prodi');
                let pendidikan_diterima = document.getElementById('pendidikan_diterima');

                let kesehatan_gd = document.getElementById('kesehatan_gd');
                let kesehatan_penyakit = document.getElementById('kesehatan_penyakit');
                let kesehatan_kj = document.getElementById('kesehatan_kj');
                let kesehatan_tinggi = document.getElementById('kesehatan_tinggi');
                let kesehatan_berat = document.getElementById('kesehatan_berat');

                let tt_alamat = document.getElementById('tt_alamat');
                let tt_wali = document.getElementById('tt_wali');
                let tt_telepon = document.getElementById('tt_telepon');
                let tt_st = document.getElementById('tt_st');
                let tt_jarak = document.getElementById('tt_jarak');

                let kegemaran_kesenian = document.getElementById('kegemaran_kesenian');
                let kegemaran_or = document.getElementById('kegemaran_or');
                let kegemaran_organisasi = document.getElementById('kegemaran_organisasi');
                let kegemaran_dll = document.getElementById('kegemaran_dll');

                let perkembangan_tm = document.getElementById('perkembangan_tm');
                let perkembangan_am = document.getElementById('perkembangan_am');
                let perkembangan_sttb = document.getElementById('perkembangan_sttb');
                let perkembangan_tt = document.getElementById('perkembangan_tt');
                let perkembangan_md = document.getElementById('perkembangan_md');

                //eksport
                fetch("/siswa/tes")
                    .then(res => res.json())
                    .then(res => {
                        data = [];
                        let bea = [];
                        let gg = true;
                        for (i = 0; i < 8; i++)
                            data.push([])
                        for (const [key, value] of Object.entries(res.status)) {
                            for (const [k, v] of Object.entries(value)) {
                                if ((v == "" || v == null) && k != 'tracker')
                                    res.status[key][k] = "-";
                            }
                            let temp = new Object();
                            if (pribadi_nama.checked)
                                temp.nama = value.siswa_nama;
                            if (pribadi_nis.checked)
                                temp.nis = value.siswa_nis;
                            if (pribadi_nick.checked)
                                temp.panggilan = value.siswa_nick;
                            if (pribadi_jk.checked)
                                temp['jenis kelamin'] = value.siswa_jk;
                            if (pribadi_ttl.checked)
                                temp.ttl = value.siswa_tempat_lahir + "," + value.siswa_tanggal_lahir;
                            if (pribadi_agama.checked)
                                temp.agama = value.siswa_agama;
                            if (pribadi_ot.checked)
                                temp['orang tua'] = value.wali;
                            if (pribadi_k.checked)
                                temp.kewarganegaraan = value.siswa_kewarganegaraan;
                            if (pribadi_s.checked) {

                                temp['anak ke'] = value.siswa_order;
                                temp['saudara kandung'] = value.siswa_kandung;
                                temp['saudara tiri'] = value.siswa_tiri;
                                temp['saudara angkat'] = value.siswa_angkat;
                            }
                            if (pribadi_bahasa.checked)
                                temp['bahasa sehari-hari'] = value.siswa_bahasa;
                            data[0].push(temp);

                            temp = new Object();
                            temp.nama = value.siswa_nama;
                            if (tt_alamat.checked)
                                temp['alamat'] = value.siswa_alamat;
                            if (tt_wali.checked)
                                temp['alamat wali'] = value.siswa_alamat_wali;
                            if (tt_telepon.checked)
                                temp['nomor telepon'] = value.siswa_telepon;
                            if (tt_st.checked)
                                temp['status tinggal'] = value.siswa_tinggal;
                            if (tt_jarak.checked)
                                temp['jarak'] = value.siswa_jarak + " Km";
                            data[1].push(temp);

                            temp = new Object();
                            temp.nama = value.siswa_nama;
                            if (kesehatan_gd.checked)
                                temp["golongan darah"] = value.siswa_golongan_darah;
                            if (kesehatan_penyakit.checked)
                                temp.penyakit = value.penyakit;
                            if (kesehatan_kj.checked)
                                temp.kelainan = value.siswa_kelainan;
                            if (kesehatan_tinggi.checked)
                                temp.tinggi = value.siswa_tinggi + " cm";
                            if (kesehatan_berat.checked)
                                temp.berat = value.siswa_berat + " Kg";
                            data[2].push(temp);


                            temp = new Object();
                            temp.nama = value.siswa_nama;
                            if (pendidikan_ld.checked)
                                temp['lulusan dari'] = value.siswa_dari;
                            if (pendidikan_tsttb.checked)
                                temp['tanggal & no STTB'] = value.siswa_sebelum_tanggal + ", " + value.siswa_sebelum_sttb;
                            if (pendidikan_lb.checked)
                                temp['lama belajar'] = value.siswa_sebelum_lama;
                            if (pendidikan_pd.checked)
                                temp['pindahan dari'] = value.siswa_pindah_dari;
                            if (pendidikan_alasan.checked)
                                temp['alasan pindah'] = value.siswa_pindah_alasan;
                            if (pendidikan_kelas.checked)
                                temp['kelas diterima'] = value.siswa_kelas;
                            if (pendidikan_prodi.checked)
                                temp['program studi'] = value.siswa_prodi;
                            if (pendidikan_diterima.checked)
                                temp['tanggal'] = value.siswa_tanggal_diterima;
                            data[3].push(temp);

                            temp = new Object();
                            temp.nama = value.siswa_nama;
                            if (kegemaran_kesenian.checked)
                                temp.kesenian = value.siswa_kesenian;
                            if (kegemaran_or.checked)
                                temp.olahraga = value.siswa_olahraga;
                            if (kegemaran_organisasi.checked)
                                temp.organisasi = value.siswa_organisasi;
                            if (kegemaran_dll.checked)
                                temp.lainnya = value.siswa_lain_lain;
                            data[4].push(temp);


                            if (value.beasiswa != "-") {
                                value.beasiswa.forEach((kk, vv) => {
                                    data[5].push(kk);
                                })
                            } else {
                                gg = false;
                            }
                            temp = new Object();
                            temp.nama = value.siswa_nama;
                            if (perkembangan_tm.checked)
                                temp["tanggal meninggalkan"] = value.siswa_tanggal_meninggalkan;
                            if (perkembangan_am.checked)
                                temp["alasan meninggalkan"] = value.siswa_alasan_meninggalkan;
                            if (perkembangan_sttb.checked)
                                temp['Nomor STTB'] = value.siswa_tamat_sttb;
                            if (perkembangan_tt.checked)
                                temp['Tahun tamat'] = value.siswa_tamat_tahun;
                            if (perkembangan_md.checked)
                                temp['melanjutkan ke'] = value.siswa_melanjutkan;
                            data[6].push(temp);

                            value.tracker.forEach((kk, vv) => {
                                data[7].push(kk);
                            })
                        }


                        let tie = [];
                        let out = [];
                        let stat = false;
                        if (pribadi.checked) {
                            tie.push({
                                sheetid: 'pribadi',
                                header: true,
                            });
                            out.push(data[0]);
                            stat = true;
                        }
                        if (tt.checked) {
                            tie.push({
                                sheetid: 'tempat tinggal',
                                header: true,
                            });
                            out.push(data[1]);
                            stat = true;

                        }
                        if (kesehatan.checked) {
                            tie.push({
                                sheetid: 'kesehatan',
                                header: true,
                            });
                            out.push(data[2]);
                            stat = true;

                        }
                        if (pendidikan.checked) {
                            tie.push({
                                sheetid: 'pendidikan',
                                header: true,
                            });
                            out.push(data[3]);
                            stat = true;

                        }
                        if (kegemaran.checked) {
                            tie.push({
                                sheetid: 'kegemaran',
                                header: true,
                            });
                            out.push(data[4]);
                            stat = true;

                        }
                        if (beasiswa.checked && gg) {
                            tie.push({
                                sheetid: 'beasiswa',
                                header: true,
                            });
                            out.push(data[5]);
                            stat = true;

                        }
                        if (perkembangan.checked) {
                            tie.push({
                                sheetid: 'perkembangan',
                                header: true,
                            });
                            out.push(data[6]);
                            stat = true;

                        }
                        if (bekerja.checked) {
                            if (data[7][0] != null) {
                                tie.push({
                                    sheetid: 'karir alumni',
                                    header: true,
                                });
                                out.push(data[7]);
                                stat = true;
                            }
                        }
                        if (ej.isConfirmed) {

                            if (data[7][0] == null || !gg) {
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                    }
                                })

                                Toast.fire({
                                    icon: 'error',
                                    title: 'Data kosong atau tidak valid!'
                                })
                            }
                            if (stat) {

                                try {
                                    const Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 3000,
                                        timerProgressBar: true,
                                        didOpen: (toast) => {
                                            toast.addEventListener('mouseenter', Swal.stopTimer)
                                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                                        }
                                    })

                                    Toast.fire({
                                        icon: 'success',
                                        title: 'Sedang mengunduh laporan'
                                    })
                                    var res2 = alasql('SELECT * INTO XLSX("siswa.xlsx",?) FROM ?',
                                        [
                                            tie, out
                                        ]);
                                    
                                } catch (e) {
                                    const Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 3000,
                                        timerProgressBar: true,
                                        didOpen: (toast) => {
                                            toast.addEventListener('mouseenter', Swal.stopTimer)
                                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                                        }
                                    })

                                    Toast.fire({
                                        icon: 'error',
                                        title: 'Data kosong atau tidak valid!'
                                    })
                                }
                            }
                        }
                    });
            });

            let g = document.getElementById('all');
            g.onclick = () => {
                let pribadi = document.getElementById('pribadi');
                let kesehatan = document.getElementById('kesehatan');
                let kegemaran = document.getElementById('kegemaran');
                let perkembangan = document.getElementById('perkembangan');
                let tt = document.getElementById('tt');
                let pendidikan = document.getElementById('pendidikan');
                let beasiswa = document.getElementById('beasiswa');
                let bekerja = document.getElementById('bekerja');
                if (g.checked) {

                    if (!pribadi.checked)
                        pribadi.click();
                    if (!pendidikan.checked)
                        pendidikan.click();
                    if (!kesehatan.checked)
                        kesehatan.click();
                    if (!kegemaran.checked)
                        kegemaran.click();
                    if (!perkembangan.checked)
                        perkembangan.click();
                    if (!tt.checked)
                        tt.click();
                    beasiswa.checked = true;
                    bekerja.checked = true;
                    let c = document.getElementsByClassName('child-c');
                    Array.prototype.forEach.call(c, el => {
                        el.checked = true;
                    })
                }

            }



        }
    </script>
</body>

</html>