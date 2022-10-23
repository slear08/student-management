const addRecord = document.querySelector('#add-record');
const addForm = document.querySelector('#add-form');
const updateRecord = document.querySelector('#update-record');
const searchForm = document.querySelector('#search-form');
const updateForm = document.querySelector('#update-form');
const closeBtn = document.querySelectorAll('#close-btn');
const searchBtn = document.querySelector('#search-btn');


addRecord.addEventListener('click', () => {
    addForm.showModal();
})
updateRecord.addEventListener('click', () => {
    searchForm.showModal();
})
searchBtn.addEventListener('click', () => {
    updateForm.showModal();
});
closeBtn.forEach((btn) => {
    btn.onclick = () =>{
        var x = (btn.closest('.modal'));
        x.close();
    }
});
