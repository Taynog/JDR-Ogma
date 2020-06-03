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

/* Set the width of the side navigation to 200px */
function openNav() {
    document.getElementById("mySidenav").style.width = "200px";
    document.getElementById("main").style.marginLeft = "200px";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
}