const addRecord = document.querySelector('#add-record');
const updateRecord = document.querySelector('#update-record');
const viewRecord = document.querySelector('#view-record');


const addForm = document.querySelector('#add-form');
const viewTable = document.querySelector('#view-table');
const updateForm = document.querySelector('#update-form');
const searchForm = document.querySelector('#search-form');

const closeBtn = document.querySelectorAll('#close-btn');
const searchBtn = document.querySelector('#search-btn');


addRecord.addEventListener('click', () => {
    addForm.showModal();
})
updateRecord.addEventListener('click', () => {
    searchForm.showModal();
})
// searchBtn.addEventListener('click', (e) => {
//     // updateForm.showModal();
// });
viewRecord.addEventListener('click', () =>{
    viewTable.showModal();
});
closeBtn.forEach((btn) => {
    btn.onclick = () =>{
        var x = (btn.closest('.modal'));
        x.close();
    }
});
