import './bootstrap';
import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import sidebar from './components/sidebar';
import theme from './components/theme';
import userMenu from './components/user-menu';
import dataWarga from './components/data-warga';
import dataSurat from './components/data-surat';
import dataIuran from './components/data-iuran';

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

Alpine.start();
