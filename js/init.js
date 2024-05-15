/**
 * Init
 * Author: Taigo Ito (https://qwel.design/)
 * Location: Fukui, Japan
 * @package Qwel-Assets
 */

// Drawer Menu
import DrawerMenu from './_drawerMenu.js';
const pathname = location.pathname;
const arr = pathname.split('/');
if (arr[1] && (arr[1] !== 'recruit' || (arr[2] && arr[2].slice(0, 2) == '20'))) {
  new DrawerMenu({darkMode: true, mode: 'main'});
} else if (arr[1] === 'recruit') {
  new DrawerMenu({darkMode: true, mode: 'recruit'});
} 

// Evil Icons
import EvilIcons from './_evilIcons.js';
new EvilIcons();

// Responsive Header
import ResponsiveHeader from './_responsiveHeader.js';
new ResponsiveHeader();

// Format Pagination
import FormatPagination from './_formatPagination.js';
new FormatPagination();

// Format Text
import FormatText from './_formatText.js';
new FormatText();

// Entry Form
import EntryForm from './_entryForm.js';
new EntryForm();
