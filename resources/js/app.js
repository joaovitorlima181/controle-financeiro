import './bootstrap';
import 'flowbite';
import {openSidebar, collapseSidebar} from './sidebar';
window.openSidebar = openSidebar;
window.collapseSidebar = collapseSidebar;

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
