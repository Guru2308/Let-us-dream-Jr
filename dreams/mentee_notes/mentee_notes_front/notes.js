
var notes = document.querySelectorAll(".note-items");
//adding an event listener for clicking of events in NOTES ITEMS
notes.forEach(function(note){
    note.addEventListener("click", () => {
        
        let nt = note.querySelector("h5");
        
        //changing the body title to the selected note
        let header = document.querySelector(".notes-header");
        header.value = nt.textContent;
        //change the body content
        console.log("ehll");
        let vl = note.querySelector(".body-n");
        let body = document.querySelector(".notes_body");
        body.value = vl.textContent;
        console.log(vl.textContent);
        let date_n = note.querySelector(".date-n");

        let date_k = document.querySelector(".date_input");
        console.log(date_n.textContent);
        date_k.setAttribute("value",date_n.textContent);
    });
});

var add_note = document.querySelector(".add-note");
add_note.addEventListener("click",()=>{
    console.log("ahasd");
    let header = document.querySelector(".notes-header"); 
    header.value = "";
})