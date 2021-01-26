//accordion
document.querySelectorAll('.accordionButton').forEach(button => {
    button.addEventListener('click', ()=>{
        const accordionContent = button.nextElementSibling;
        
        button.classList.toggle('accordionButtonActive');

        if(button.classList.contains('accordionButtonActive')){
            accordionContent.style.maxHeight = accordionContent.scrollHeight + "px";
        }else{
            accordionContent.style.maxHeight= 0;
        }
    })
})