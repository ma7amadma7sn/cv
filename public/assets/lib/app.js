// var prog = ''; /* The text */

// var text = document.getElementById('text');
// let idx = 1;
// setInterval(writeText, 80);

// function writeText(){
//     text.innerText = prog.slice(0, idx);
//     idx++;
//     if(idx > prog.length){
//       var mainSection = document.getElementById('mainSection');
//       mainSection.style.display = 'block';

//     }
// }


function toggle(id){
    const modal = document.querySelector("#modal"+id);
    const close = document.querySelector("#close-modal"+id);
    const openModal = document.querySelector("#openModal"+id);
    modal.classList.toggle('hidden');
    modal.classList.toggle('flex');
}

function update(id){
    const update = document.querySelector("#update"+id);
    const close = document.querySelector("#close-modal"+id);
    const openModal = document.querySelector("#openModalUpdate"+id);
    update.classList.toggle('hidden');
    update.classList.toggle('flex');
}
