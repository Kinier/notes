let notes = document.querySelectorAll('.note');
if (notes !== null) {
    notes.forEach((note)=>{

        note.addEventListener('click', async (e) => {


            document.location.href = ('/note/preview?id=' + `${note.id}`)


        })
    })

}