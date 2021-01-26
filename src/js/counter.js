const counters = document.querySelectorAll('.counter');
const speed = 1000;

counters.forEach(counter=>{
    const updateCount=()=>{
        const target = +counter.getAttribute('data-target');
        const count = +counter.innerText;

        const inc = target / speed;
        if(window.scrollY=5000){
            if(count < target){
            counter.innerText = count+inc;
            setTimeout(updateCount,1);
       }else{
        count.innerText = target;
       }
        }
       
    }

    updateCount();
})