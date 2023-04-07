/**
 * Responsive Header
 * Author: Taigo Ito (https://qwel.design/)
 * Location: Fukui, Japan
 * @package Qwel-Assets
 */

export default class ResponsiveHeader {

  constructor(elem) {
    // 要素を取得
    this._elem = elem || document.querySelector('.header');
    if (!this._elem) return;

    // スクロールを監視
    window.addEventListener('scroll', () => this._change());

  }

  // 位置を検出し .--active を付与
  _change() {
    const isFront = document.getElementById('hero') ? true : false;

    let h;
    if (isFront) {
      h = window.innerHeight;
    } else {
      const header = document.querySelector('.main__header');
      h = header.clientHeight;
    }

    if (window.scrollY < h) {
      this._elem.classList.add('--change');
    } else {
      this._elem.classList.remove('--change');
    }
  }

}
