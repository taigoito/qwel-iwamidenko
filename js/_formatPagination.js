/**
 * Format pagination
 * Author: Taigo Ito (https://qwel.design/)
 * Location: Fukui, Japan
 * @package Iwamidenko
 */

export default class FormatPagination {
  constructor() {
    const prev = document.querySelector('.wp-block-query-pagination-previous');
    const next = document.querySelector('.wp-block-query-pagination-next');

    if (prev) prev.textContent = '◀ prev';
    if (next) next.textContent = 'next ▶';

    const myPrev = document.querySelector('.wp-block-query-my-pagination-previous a');
    const myNext = document.querySelector('.wp-block-query-my-pagination-next a');

    if (myPrev) myPrev.textContent = '◀ prev';
    if (myNext) myNext.textContent = 'next ▶';
  }
}
