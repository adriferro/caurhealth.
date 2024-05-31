import { hamburguerMenu } from './hamburguer.js';
import { initializeSwiper } from './swiper.js';
import { initializeLoadMore, showMore, cancelShow } from './helpers.js';
import { sendEmail } from './new.js';

document.addEventListener('DOMContentLoaded', () => {
  hamburguerMenu();
  initializeSwiper();
  initializeLoadMore();

  const showButtons = document.querySelectorAll('.btn.show-more');
  const cancelButtons = document.querySelectorAll('.btn.cancel-show');
  let emailForm = document.querySelector('new-form');

  showButtons.forEach(button => {
    button.addEventListener('click', function() {
        const dialogId = this.getAttribute('data-dialog-id');
        showMore(dialogId);
    });
  });
  
  cancelButtons.forEach(button => {
    const dialogId = button.getAttribute('data-dialog-id');
    button.addEventListener('click', function() {
        cancelShow(dialogId);
    });
});

  
  if (emailForm) {
    emailForm.onsubmit = (e) => {
      e.preventDefault();
      sendEmail();
    };
  }
});
