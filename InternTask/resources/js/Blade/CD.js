const EditDetails = document.getElementById("edit-details");
const emptyarrow = document.getElementById('empty-arrow');
const filledArrow = document.getElementById('filled-arrow');
const edit_content = document.getElementById('edit-details-content')


// arrow change function while mouse hover and out
EditDetails.addEventListener('mouseover', () => {
    filledArrow.style.display = 'block';
    emptyarrow.style.display = 'none';
});

EditDetails.addEventListener('mouseout', () => {
    filledArrow.style.display = 'none';
    emptyarrow.style.display = 'block';
});


// edit details expand :

let isExpanded = false;

filledArrow.addEventListener ('click', () => {
    isExpanded = !isExpanded;
    edit_content.style.display = isExpanded ? 'block' : 'none';
})
