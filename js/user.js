const contentDiv = document.querySelector('.content-container');



function toggleContainer(){
    if(contentDiv.style.display == 'flex'){
        contentDiv.style.display = 'none';
    }else{
        contentDiv.style.display = 'flex';
    }

}
toggleContainer();