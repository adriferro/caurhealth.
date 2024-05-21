export function initializeLoadMore() {
  let loadMoreBtn = document.querySelector('.helpers .load-more .btn');
  let currentItem = 3;

  if (loadMoreBtn) {
    loadMoreBtn.onclick = () => {
      let boxes = [...document.querySelectorAll('.helpers .box-container .box')];
      for (let i = currentItem; i < currentItem + 3; i++) {
        if (boxes[i]) {
          boxes[i].style.display = 'inline-block';
        }
      }
      currentItem += 3;
      if (currentItem >= boxes.length) {
        loadMoreBtn.style.display = 'none';
      }
    };
  }
}



export function showMore(){
  const showDialog = document.getElementById("show-dialog");
  if(showDialog){
    showDialog.showModal();
  }
}

export function cancelShow(){
  const showDialog = document.getElementById("show-dialog");
  if(showDialog){
    showDialog.close();
  }
}