/**
 * Entry Form
 * Author: Taigo Ito (https://qwel.design/)
 * Location: Fukui, Japan
 * @package Iwamidenko-Recruit
 */

export default class EntryForm {

  constructor(elem) {
    // 要素を取得
    const y = document.getElementById('your-birth-y');
    const m = document.getElementById('your-birth-m');
    const d = document.getElementById('your-birth-d');
    if (!(y && m && d)) return

    for (let i = 2007; i > 1950; i--) {
      const opt = document.createElement('option');
      opt.setAttribute('value', i);
      opt.textContent = i;
      y.appendChild(opt);
    }

    for (let i = 1; i <= 12; i++) {
      const opt = document.createElement('option');
      opt.setAttribute('value', i);
      opt.textContent = i;
      m.appendChild(opt);
    }

    for (let i = 1; i <= 31; i++) {
      const opt = document.createElement('option');
      opt.setAttribute('value', i);
      opt.textContent = i;
      d.appendChild(opt);
    }

  }

}
