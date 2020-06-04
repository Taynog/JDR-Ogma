function getTime(){
    let t = new Date();
    let d = document.getElementById('time');
    d.innerText = 'Nous sommes le '+ t.getDate().toString() + '/' +
        (t.getMonth() +1).toString() + '/' +
        t.getFullYear().toString() + '\n'+
        'Il est '+ t.getHours().toString() + ':' +
        t.getMinutes().toString() + ':' +
        t.getSeconds().toString()
}

function displayTime(){
    return  setInterval('getTime()',1000)
}

function sendMail(){
    let mailto = document.getElementById("mail");
    let mail = "mailto:tanguy.smodis@gmail.com?subject=" + "Retour sur Ogma";
    mailto.setAttribute("href",mail)
}

function hideContent(n){
    if(n.nextElementSibling.className === 'hidden'){
        n.nextElementSibling.className = 'shown'
    }
    else {
        n.nextElementSibling.className = 'hidden'
    }
}

function setpoliticalmap(){
    let img = document.getElementById("map");
    img.setAttribute( "src", "../../Images/Carte_Ogma_politique.jpg");
}

function setnormalmap(){
    let img = document.getElementById("map");
    img.setAttribute( "src", "../../Images/Carte_Ogma.jpg");
}

/* toggle the side navigation */
function toggleNav() {
    if (document.getElementById("mySidenav").style.display === "none") {
        document.getElementById("mySidenav").style.display = "block";
        document.getElementById("main").style.marginLeft = "200px";

    } else {
        document.getElementById("mySidenav").style.display = "none";
        document.getElementById("main").style.marginLeft = "0px";
    }
}



function openCloseTable(n) {
    let x = document.getElementById(n);
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}