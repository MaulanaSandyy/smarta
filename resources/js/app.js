import './bootstrap';
import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import sidebar from './components/sidebar';
import theme from './components/theme';
import userMenu from './components/user-menu';

window.Alpine = Alpine;

Alpine.plugin(focus);
Alpine.data('sidebar', sidebar);
Alpine.data('theme', theme);
Alpine.data('userMenu', userMenu);

Alpine.start();
