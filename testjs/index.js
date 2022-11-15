// selecteurs
//document.querySelector('h4').style.background="yellow";

//const baliseHTML= document.querySelector('h4');

//click event

const questionContainer= document.querySelector(".click-event");
const btn1 = document.querySelector('#btn-1');
const btn2 = document.getElementById('btn-2');
const response = document.querySelector("p");


questionContainer.addEventListener("click", () => {
    questionContainer.classList.toggle('question-click');
});

btn1.addEventListener('click', () => {
    response.classList.add('show-response');
    response.style.background = "green";
});

btn2.addEventListener('click', () => {
    response.classList.add('show-response');
    response.style.background="red";
});


//-----------------------------------------//

// Mouse Events

const mousemove= document.querySelector(".mousemove");

window.addEventListener('mousemove', (e) => {
    mousemove.style.left = e.pageX + "px";
    mousemove.style.top = e.pageY + "px";

});


window.addEventListener("mousedown", () => {
    mousemove.style.transform = "scale(2) translate(-25%,-50%)";
});

window.addEventListener("mouseup", () => {
    mousemove.style.transform = "scale(1) translate(-50%,-50%)";
    mousemove.style.border = "2px solid teal";
});

questionContainer.addEventListener('mouseenter', () => {
    questionContainer.style.background = "rgba(0,0,0,0.6)";
});

questionContainer.addEventListener('mouseout', () => {
    questionContainer.style.background = "pink";
});

response.addEventListener('mouseover', () => {
    response.style.transform = "rotate(2deg)";
});


//-------------------------------------------------

//keyPress event

const keypresscontainer = document.querySelector('.keypress');
const key = document.getElementById('key');

const ring = () => {
    const audio = new Audio();
    audio.src = key + ".mp3";
    audio.play();
}

document.addEventListener('keypress', (e) => {
    key.textContent = e.key;

    if(e.key==="j"){
        keypresscontainer.style.background = "yellow";
    }else if(e.key==="h"){
        keypresscontainer.style.background = "green";
    }else{
        keypresscontainer.style.background = "purple";
    }

    if(e.key==="z") ring(e.key);
});

//--------------------------------------
// Scroll event

const nav = document.querySelector("nav");

window.addEventListener('scroll', () => {
   if(window.scrollY > 120){
    nav.style.top = 0;
   } else{
    nav.style.top = "-50px";
   }
});


//---------------------------------------------
// form events


const inputName = document.querySelector('input[type="text"]');
const select = document.querySelector("select");
const form = document.querySelector("form");
let pseudo = "";
let language = "";

inputName.addEventListener("input", (e) => {
    pseudo = e.target.value;
});

select.addEventListener("input", (e) => {
    language = e.target.value;
});

form.addEventListener("submit", (e) => {
    e.preventDefault(); //annule le changement de page

    if(cgv.checked) {
        document.querySelector("form > div").innerHTML = `
        <h3>Pseudo : ${pseudo}</h3>
        <h4>Langage préféré : ${language}</h4>
        `;
    }else{
        alert("Veuillez accepter les CGV");
    }
});

//-------------------------------------------
//load event

window.addEventListener("load", () => {

});

//------------------------------------------
//foreach
const boxes = document.querySelectorAll(".box");

// boxes.forEach((box) => {
//     box.addEventListener("click", (e) => {
//         e.target.style.transform = "scale(0.7)";
//     });
// });

//--------------------------------------------------------
// addEventListener Vs onclick

// document.body.onclick = function(){
//     console.log("scroll !");
// };

// bubbling => fin (de abse l'eventlistener est paramétré en mode bubbling)

document.body.addEventListener(
    "click", 
    () =>  {
    },
    false    
);

//Usecapture
document.body.addEventListener(
    "click",
    () => {
        
    },
    true
);

//*--------------------------------------------------
// stop propagation

// questionContainer.addEventListener('click', (e) => {
//     alert('test !');
//     e.stopPropagation();
// });

//removeEventListener

//--------------------------------------------------------
// BOM

// console.log(window.innerHeight);
// console.log(window.scrollY);
// window.open("https://google.com", "cours js", "height=600,width=800");
// window.close();

//Evènemnt adossés à window
//alert("hello");

//confirm
btn2.addEventListener('click', () => {
    confirm("Voulez vous vaiment vous tromper ?");
});

// prompt
btn1.addEventListener('click', () =>{
    let answer=prompt("Entrez votre nom");

    questionContainer.innerHTML += "<h3>Bravo " + answer +"</h3>";
});

//timer, compte à rebours
setTimeout(() => {
    //logique à executer
    questionContainer.style.borderRadius = "300px";
},2000);

// setInterval(() => {
//     document.body.innerHTML +=
//     ` 
//         <div class='box'>
//             <h2>Nouvelle boîte !</h2>
//         </div>
//     `; 
// },1000);

// document.body.addEventListener('click', (e) => {
//     e.target.remove();
//     clearInterval(interval);
// });

// Location
// console.log(location.href);
// console.log(location.host);
// console.log(location.pathname);
// console.log(location.search);
// location.replace("http://lequipe.fr");

// window.onload = () => {
//   location.href = "http://twitter.fr"  ;
// };

// se faire localiser est possible aussi conf internet avec des API

// History

//---------------------------------------------------------


//setProperty
window.addEventListener('mousemove', (e) => {
    nav.style.setProperty('--x', e.layerX + "px");
    nav.style.setProperty('--y', e.layerY + "px");
});

