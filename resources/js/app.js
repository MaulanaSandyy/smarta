import './bootstrap';
import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import sidebar from './components/sidebar';
import theme from './components/theme';
import userMenu from './components/user-menu';
import dataWarga from './components/data-warga';
import dataSurat from './components/data-surat';
import dataIuran from './components/data-iuran';
import dataLaporan from './components/data-laporan';
import dataAgenda from './components/data-agenda';
import dataKas from './components/data-kas';
import dataRonda from './components/data-ronda';
import dataDirektori from './components/data-direktori';
import dataKalender from './components/data-kalender';
import dataPortalKos from './components/data-portal-kos';
import dataJamaah from './components/data-jamaah';
import dataKeuangan from './components/data-keuangan';
import dataDonasi from './components/data-donasi';
import dataKajian from './components/data-kajian';

window.Alpine = Alpine;

Alpine.plugin(focus);
Alpine.data('sidebar', sidebar);
Alpine.data('theme', theme);
Alpine.data('userMenu', userMenu);

window.dataWarga = function(items, perPage) {
    return dataWarga(items, perPage);
};
window.dataSurat = function(items, perPage) {
    return dataSurat(items, perPage);
};
window.dataIuran = function(items, perPage) {
    return dataIuran(items, perPage);
};
window.dataLaporan = function(items, perPage) {
    return dataLaporan(items, perPage);
};
window.dataAgenda = function(items, bulan, tahun) {
    return dataAgenda(items, bulan, tahun);
};
window.dataKas = function(items, perPage) {
    return dataKas(items, perPage);
};
window.dataRonda = function(jadwal, posList) {
    return dataRonda(jadwal, posList);
};
window.dataDirektori = function(items, perPage) {
    return dataDirektori(items, perPage);
};
window.dataKalenderLingkungan = function() {
    return dataKalender();
};
window.dataPortalKos = function() {
    return dataPortalKos();
};
window.dataJamaah = function(items, perPage) {
    return dataJamaah(items, perPage);
};
window.dataKeuangan = function(items, perPage) {
    return dataKeuangan(items, perPage);
};
window.dataDonasi = function(items, perPage) {
    return dataDonasi(items, perPage);
};
window.dataKajian = function() {
    return dataKajian();
};

Alpine.start();
