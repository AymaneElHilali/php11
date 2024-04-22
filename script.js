function editRow(id){
    window.open(`editer.php?id=${id}`, '_blank');
};
function chekboxsChecked(){
    const allCheckboxes = document.querySelectorAll('input[type="checkbox"]');
    a12=[];
    allCheckboxes.forEach(checkbox => {
        if (checkbox.checked) {
            onlyNumberABrother=checkbox.id.match(/\d+/g);
            a12.push(onlyNumberABrother);
        }
    });
    return a12;
    a12=[]
}
document.querySelector('#sp').addEventListener('click', (e) => {
    a12=chekboxsChecked();
    document.querySelector('#indexs').value=a12;
});

document.querySelector('#md').addEventListener('click', () => {
    a12=chekboxsChecked();
    if(a12.length===0){
        alert('chosé chi wa7da')
    }
    else if(a12.length>1){
        a12.forEach(aydi => {
            editRow(aydi);
        });
        location.reload();
        
    }
    else{
        editRow(a12[0]);
        location.reload();
    }
    
});

