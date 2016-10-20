var togglebutton = document.getElementsByClassName('toggle');
console.log(togglebutton);

for (var i = 0; i<togglebutton.length; i++){
    togglebutton[i].addEventListener('click', function(e){
        button = e.target;

        console.log(button.id);
    })
}