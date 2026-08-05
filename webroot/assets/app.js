//import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';

global.getTime = function getTime(){
    let t = new Date();
    let d = document.getElementById('time');
    d.innerText = 'Nous sommes le '+ t.getDate().toString() + '/' +
        (t.getMonth() +1).toString() + '/' +
        t.getFullYear().toString() + '\n'+
        'Il est '+ t.getHours().toString() + ':' +
        t.getMinutes().toString() + ':' +
        t.getSeconds().toString()
}

global.displayTime = function displayTime(){
    return  setInterval('getTime()',1000)
}

global.hideContent = function hideContent(n){
    const el = n.nextElementSibling;
    if (el) {
        el.classList.toggle('hidden');
    }
}

global.setpoliticalmap = function setpoliticalmap(){
    let img = document.getElementById("map");
    img.setAttribute( "src", "../../Images/Carte_Ogma_politique.jpg");
}

global.setnormalmap = function setnormalmap(){
    let img = document.getElementById("map");
    img.setAttribute( "src", "../../Images/Carte_Ogma.jpg");
}

/* Sidebar: overlay, opens when the cursor nears the left edge of the screen */
function initNavBar() {
    const navBar = document.getElementById('mySidenav');
    if (!navBar) return;

    const EDGE = 10;             // px from the left edge that opens the menu
    const CLOSE_GAP = 24;        // px beyond the nav's right edge before closing
    const CLOSE_DELAY = 250;     // ms of mouseleave before closing (avoids flicker)

    const isOpen = function () {
        return document.body.classList.contains('nav-open');
    };
    const openNav = function () {
        document.body.classList.add('nav-open');
    };
    const closeNav = function () {
        document.body.classList.remove('nav-open');
    };

    let closeTimer = null;
    const scheduleClose = function () {
        if (closeTimer) clearTimeout(closeTimer);
        closeTimer = setTimeout(closeNav, CLOSE_DELAY);
    };
    const cancelClose = function () {
        if (closeTimer) {
            clearTimeout(closeTimer);
            closeTimer = null;
        }
    };

    navBar.addEventListener('click', function (e) {
        const btn = e.target.closest('[data-nav-toggle]');
        if (!btn) return;

        const sub = btn.nextElementSibling;
        if (!sub) return;

        const isExpanded = btn.getAttribute('aria-expanded') === 'true';

        if (!isExpanded) {
            const siblings = btn.parentElement.parentElement.querySelectorAll(
                ':scope > li > [data-nav-toggle][aria-expanded="true"]'
            );
            siblings.forEach(function (other) {
                if (other.classList.contains('sidenav__toggle--root')) return;
                other.setAttribute('aria-expanded', 'false');
                if (other.nextElementSibling) {
                    other.nextElementSibling.classList.add('hidden');
                }
            });
        }

        btn.setAttribute('aria-expanded', String(!isExpanded));
        sub.classList.toggle('hidden');
    });

    document.addEventListener('mousemove', function (e) {
        if (e.clientX <= EDGE) {
            cancelClose();
            openNav();
        } else if (isOpen() && e.clientX > navBar.offsetWidth + CLOSE_GAP) {
            scheduleClose();
        }
    });

    navBar.addEventListener('mouseenter', cancelClose);
    navBar.addEventListener('mouseleave', scheduleClose);

    const navTab = document.querySelector('.nav-tab');
    if (navTab) {
        navTab.addEventListener('mouseenter', openNav);
        navTab.addEventListener('click', openNav);
    }

    document.addEventListener('touchstart', function (e) {
        const touch = e.touches[0];
        if (touch && touch.clientX <= EDGE) {
            openNav();
        }
    }, { passive: true });

    document.addEventListener('click', function (e) {
        if (navBar.contains(e.target)) return;
        if (e.target.closest('.nav-tab')) return;
        closeNav();
    });
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initNavBar);
} else {
    initNavBar();
}



global.openCloseTable = function openCloseTable(n) {
    let x = document.getElementById(n);
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

global.sortTable = function sortTable(id,n, num=false) {
    let table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById(id);
    switching = true;
    // Set the sorting direction to ascending:
    dir = "asc";
    /* Make a loop that will continue until
    no switching has been done: */
    while (switching) {
        // Start by saying: no switching is done:
        switching = false;
        rows = table.rows;
        /* Loop through all table rows (except the
        first, which contains table headers): */
        for (i = 1; i < (rows.length - 1); i++) {
            // Start by saying there should be no switching:
            shouldSwitch = false;
            /* Get the two elements you want to compare,
            one from current row and one from the next: */
            x = rows[i].getElementsByTagName("TD")[n];
            let offset = 0;
            if(x.rowSpan === 2){
                offset =1
            }
            y = rows[i + 1 + offset].getElementsByTagName("TD")[n];
            /* Check if the two rows should switch place,
            based on the direction, asc or desc: */
            if (dir === "asc") {
                if(num){
                    if (Number(x.innerHTML) > Number(y.innerHTML)) {
                        shouldSwitch = true;
                        break;
                    }
                }
                else{
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        // If so, mark as a switch and break the loop:
                        shouldSwitch = true;
                        break;
                    }
                }
            } else if (dir === "desc") {
                if(num){
                    if (Number(x.innerHTML) < Number(y.innerHTML)) {
                        shouldSwitch = true;
                        break;
                    }
                }
                else{
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                        // If so, mark as a switch and break the loop:
                        shouldSwitch = true;
                        break;
                    }
                }
            }
        }
        if (shouldSwitch) {
            /* If a switch has been marked, make the switch
            and mark that a switch has been done: */
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            // Each time a switch is done, increase this count by 1:
            switchcount ++;
        } else {
            /* If no switching has been done AND the direction is "asc",
            set the direction to "desc" and run the while loop again. */
            if (switchcount === 0 && dir === "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}
