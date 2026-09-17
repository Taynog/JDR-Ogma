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
        const collapsed = el.classList.contains('hidden');
        n.setAttribute('aria-expanded', String(!collapsed));
        n.classList.toggle('is-collapsed', collapsed);
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

/* Sidebar: overlay, opens from a hamburger button, on cursor hover near the
   left edge of the screen, or via the small edge tab */
function initNavBar() {
    const navBar = document.getElementById('mySidenav');
    if (!navBar) return;

    const navToggle = document.querySelector('[data-nav-toggle-btn]');
    const navTab = document.querySelector('.nav-tab');

    const EDGE = 10;             // px from the left edge that opens the menu
    const CLOSE_GAP = 24;        // px beyond the nav's right edge before closing
    const CLOSE_DELAY = 250;     // ms of mouseleave before closing (avoids flicker)

    let closeTimer = null;
    let openSource = 'pointer';  // 'pointer' (hover/tab) or 'toggle' (hamburger)

    const isOpen = function () {
        return document.body.classList.contains('nav-open');
    };

    const syncToggleState = function () {
        const state = String(isOpen());
        if (navToggle) navToggle.setAttribute('aria-expanded', state);
        if (navTab) navTab.setAttribute('aria-expanded', state);
    };

    const openNav = function (source) {
        document.body.classList.add('nav-open');
        openSource = source || 'pointer';
        syncToggleState();
    };

    const closeNav = function () {
        document.body.classList.remove('nav-open');
        openSource = null;
        syncToggleState();
    };

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

    // Auto-close only makes sense when the menu was opened by the cursor.
    const shouldAutoClose = function () {
        return openSource === 'pointer';
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
                other.setAttribute('aria-expanded', 'false');
                if (other.nextElementSibling) {
                    other.nextElementSibling.classList.add('hidden');
                }
            });
        }

        btn.setAttribute('aria-expanded', String(!isExpanded));
        sub.classList.toggle('hidden');
    });

    if (navToggle) {
        navToggle.addEventListener('click', function (e) {
            e.stopPropagation();
            if (isOpen()) closeNav();
            else openNav('toggle');
        });
    }

    document.addEventListener('mousemove', function (e) {
        if (e.clientX <= EDGE) {
            cancelClose();
            openNav('pointer');
        } else if (isOpen() && shouldAutoClose() && e.clientX > navBar.offsetWidth + CLOSE_GAP) {
            scheduleClose();
        }
    });

    navBar.addEventListener('mouseenter', cancelClose);
    navBar.addEventListener('mouseleave', function () {
        if (shouldAutoClose()) scheduleClose();
    });

    if (navTab) {
        navTab.addEventListener('mouseenter', function () { openNav('pointer'); });
        navTab.addEventListener('click', function (e) {
            e.stopPropagation();
            openNav('pointer');
        });
    }

    document.addEventListener('touchstart', function (e) {
        const touch = e.touches[0];
        if (touch && touch.clientX <= EDGE) {
            openNav('pointer');
        }
    }, { passive: true });

    document.addEventListener('click', function (e) {
        if (navBar.contains(e.target)) return;
        if (e.target.closest('.nav-tab')) return;
        if (e.target.closest('[data-nav-toggle-btn]')) return;
        closeNav();
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && isOpen()) {
            closeNav();
            if (navToggle) navToggle.focus();
        }
    });

    /* Un seul dossier racine ouvert à la fois : à l'ouverture du menu on ne
       garde dépliée que la racine contenant le lien de la page active
       (sinon la première racine, "Lore") */
    const roots = navBar.querySelectorAll('[data-nav-toggle].sidenav__toggle--root');
    const activeRoot = Array.prototype.find.call(roots, function (r) {
        const sub = r.nextElementSibling;
        return sub instanceof Element && sub.querySelector('.sidenav__link.is-active');
    }) || roots[0];

    roots.forEach(function (r) {
        if (r === activeRoot) return;
        r.setAttribute('aria-expanded', 'false');
        r.classList.add('is-collapsed');
        r.classList.remove('is-expanded');
        const sub = r.nextElementSibling;
        if (sub) sub.classList.add('hidden');
    });
}

/* Accordeons de contenu (titres cliquables via onclick="hideContent(this)") :
   état a11y initial + navigation clavier */
function initCollapsibles() {
    const toggles = document.querySelectorAll('#main [onclick]');
    toggles.forEach(function (el) {
        if (!/hideContent/.test(el.getAttribute('onclick') || '')) return;
        const target = el.nextElementSibling;
        if (!target) return;

        el.setAttribute('role', 'button');
        el.setAttribute('tabindex', '0');

        const collapsed = target.classList.contains('hidden');
        el.setAttribute('aria-expanded', String(!collapsed));
        el.classList.toggle('is-collapsed', collapsed);

        el.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                el.click();
            }
        });
    });
}

/* Enveloppe les tableaux de #main dans un conteneur défilable pour éviter
   de casser la mise en page sur les petits écrans */
function initResponsiveTables() {
    const tables = document.querySelectorAll('#main table');
    tables.forEach(function (table) {
        if (table.parentElement && table.parentElement.classList.contains('table-scroll')) return;
        const wrapper = document.createElement('div');
        wrapper.className = 'table-scroll';
        table.parentNode.insertBefore(wrapper, table);
        wrapper.appendChild(table);
    });
}

/* Header: user menu open/close */
function initUserMenu() {
    const menu = document.querySelector('[data-user-menu]');
    if (!menu) return;

    const trigger = menu.querySelector('[data-user-menu-toggle]');
    const dropdown = menu.querySelector('[data-user-menu-dropdown]');
    if (!trigger || !dropdown) return;

    const isOpen = function () {
        return trigger.getAttribute('aria-expanded') === 'true';
    };
    const setOpen = function (open) {
        trigger.setAttribute('aria-expanded', String(open));
        dropdown.hidden = !open;
    };

    trigger.addEventListener('click', function (e) {
        e.stopPropagation();
        setOpen(!isOpen());
    });

    document.addEventListener('click', function (e) {
        if (!menu.contains(e.target)) setOpen(false);
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && isOpen()) {
            setOpen(false);
            trigger.focus();
        }
    });
}

/* Profile edit: live feedback on the avatar field */
function initAvatarField() {
    const field = document.querySelector('[data-avatar-field]');
    if (!field) return;

    const input = field.querySelector('[data-avatar-input]');
    const nameEl = field.querySelector('[data-avatar-name]');
    const statusEl = field.querySelector('[data-avatar-status]');
    let preview = field.querySelector('[data-avatar-preview]');
    if (!input) return;

    const originalPreviewSrc = preview && preview.tagName === 'IMG' ? preview.getAttribute('src') : null;
    const ALLOWED_TYPES = ['image/png', 'image/jpeg', 'image/webp', 'image/gif'];
    const MAX_BYTES = 2 * 1024 * 1024;
    let objectUrl = null;

    const showError = function (msg) {
        field.classList.remove('is-valid');
        field.classList.add('is-invalid');
        statusEl.textContent = msg;
        statusEl.className = 'avatar-field__status avatar-field__status--invalid';
    };

    const setValid = function () {
        field.classList.remove('is-invalid');
        field.classList.add('is-valid');
        statusEl.textContent = 'Fichier prêt à être enregistré.';
        statusEl.className = 'avatar-field__status avatar-field__status--valid';
    };

    const resetState = function () {
        if (objectUrl) URL.revokeObjectURL(objectUrl);
        objectUrl = null;
        nameEl.textContent = 'Aucun fichier sélectionné';
        statusEl.textContent = '';
        statusEl.className = 'avatar-field__status';
        field.classList.remove('is-valid', 'is-invalid');
        if (!preview) return;
        preview.classList.remove('avatar-field__img--selected');
        if (preview.tagName === 'IMG' && originalPreviewSrc) {
            preview.src = originalPreviewSrc;
            preview.alt = 'Avatar actuel';
        }
    };

    const showPreview = function (file) {
        if (objectUrl) URL.revokeObjectURL(objectUrl);
        objectUrl = URL.createObjectURL(file);
        if (preview.tagName !== 'IMG') {
            const img = document.createElement('img');
            img.className = 'avatar-field__img avatar-field__img--selected';
            preview.replaceWith(img);
            preview = img;
        }
        preview.alt = 'Aperçu du fichier sélectionné';
        preview.src = objectUrl;
        preview.classList.add('avatar-field__img--selected');
    };

    input.addEventListener('change', function () {
        const file = input.files && input.files[0];

        if (!file) {
            resetState();
            return;
        }

        nameEl.textContent = file.name;

        if (!ALLOWED_TYPES.includes(file.type)) {
            showError('Format non accepté (PNG, JPEG, WebP ou GIF).');
            return;
        }
        if (file.size > MAX_BYTES) {
            showError('Fichier trop lourd (2 Mo maximum).');
            return;
        }

        setValid();
        showPreview(file);
    });
}

function initMapViewer() {
    var mainMap = document.querySelector('#map');
    if (!mainMap) return;

    var trigger = document.querySelector('[data-map-open]');
    if (!trigger) {
        trigger = document.createElement('button');
        trigger.type = 'button';
        trigger.className = 'map-frame';
        trigger.setAttribute('aria-label', 'Ouvrir la carte en grand');
        var badge = document.createElement('span');
        badge.className = 'map-frame__badge';
        badge.setAttribute('aria-hidden', 'true');
        badge.innerHTML = 'Agrandir &#9670;';
        mainMap.parentNode.insertBefore(trigger, mainMap);
        trigger.appendChild(mainMap);
        trigger.appendChild(badge);
    }

    var imgEl = trigger.querySelector('img');
    var viewer = document.createElement('div');
    viewer.className = 'map-viewer';
    viewer.innerHTML =
        '<div class="map-viewer__bar">' +
        '<p class="map-viewer__hint" aria-hidden="true">Molette / pincement : zoom &#183; glisser : déplacer</p>' +
        '<button type="button" class="map-viewer__btn" data-map-zoom-in aria-label="Zoomer">+</button>' +
        '<button type="button" class="map-viewer__btn" data-map-zoom-out aria-label="Dézoomer">&#8722;</button>' +
        '<button type="button" class="map-viewer__btn map-viewer__close" data-map-close aria-label="Fermer">&#10005;</button>' +
        '</div>' +
        '<div class="map-viewer__viewport">' +
        '<img class="map-viewer__img" alt="Carte d\'Ogma — molette pour zoomer, glisser pour déplacer" draggable="false"/>' +
        '</div>';
    document.body.appendChild(viewer);

    var hint = viewer.querySelector('.map-viewer__hint');
    var hintTimer = null;

    var viewport = viewer.querySelector('.map-viewer__viewport');
    var img = viewer.querySelector('.map-viewer__img');
    img.src = imgEl.src;

    var state = { x: 0, y: 0, scale: 1, fit: 1 };
    var pointers = new Map();
    var dragging = false;

    function apply() {
        img.style.transform = 'translate(' + state.x + 'px,' + state.y + 'px) scale(' + state.scale + ')';
    }

    function fitScale() {
        return Math.min(viewport.clientWidth / img.naturalWidth, viewport.clientHeight / img.naturalHeight) || 1;
    }

    function enforceBounds() {
        var vw = viewport.clientWidth;
        var vh = viewport.clientHeight;
        var iw = img.naturalWidth * state.scale;
        var ih = img.naturalHeight * state.scale;
        state.x = iw <= vw ? (vw - iw) / 2 : Math.min(0, Math.max(vw - iw, state.x));
        state.y = ih <= vh ? (vh - ih) / 2 : Math.min(0, Math.max(vh - ih, state.y));
        apply();
    }

    function setScale(scale) {
        state.scale = Math.min(Math.max(scale, state.fit), state.fit * 10);
        enforceBounds();
    }

    function zoomAt(px, py, factor) {
        var rect = viewport.getBoundingClientRect();
        var mx = px - rect.left;
        var my = py - rect.top;
        var newScale = Math.min(Math.max(state.scale * factor, state.fit), state.fit * 10);
        var f = newScale / state.scale;
        state.x = mx - (mx - state.x) * f;
        state.y = my - (my - state.y) * f;
        state.scale = newScale;
        enforceBounds();
    }

    function resetToFit() {
        img.style.left = '0';
        img.style.top = '0';
        state.scale = state.fit;
        state.x = 0;
        state.y = 0;
        enforceBounds();
    }

    function open() {
        viewer.classList.add('is-open');
        document.body.classList.add('map-viewer-open');
        state.fit = fitScale();
        resetToFit();
        hint.classList.remove('is-hidden');
        clearTimeout(hintTimer);
        hintTimer = setTimeout(function () {
            hint.classList.add('is-hidden');
        }, 4000);
        viewer.querySelector('.map-viewer__close').focus();
    }

    function close() {
        clearTimeout(hintTimer);
        viewer.classList.remove('is-open');
        document.body.classList.remove('map-viewer-open');
        trigger.focus();
    }

    trigger.addEventListener('click', open);

    viewport.addEventListener('wheel', function (e) {
        e.preventDefault();
        zoomAt(e.clientX, e.clientY, e.deltaY < 0 ? 1.15 : 1 / 1.15);
    }, { passive: false });

    viewport.addEventListener('dblclick', function (e) {
        if (state.scale > state.fit * 1.05) {
            resetToFit();
        } else {
            zoomAt(e.clientX, e.clientY, 2.5);
        }
    });

    img.addEventListener('pointerdown', function (e) {
        pointers.set(e.pointerId, { x: e.clientX, y: e.clientY, scale: state.scale, x0: state.x, y0: state.y });
        img.setPointerCapture(e.pointerId);
        dragging = true;
        img.classList.add('is-dragging');
    });

    img.addEventListener('pointermove', function (e) {
        if (!pointers.has(e.pointerId)) return;
        var p = pointers.get(e.pointerId);

        if (pointers.size === 1) {
            state.x = p.x0 + (e.clientX - p.x);
            state.y = p.y0 + (e.clientY - p.y);
            enforceBounds();
        } else if (pointers.size === 2) {
            var others = Array.from(pointers.entries()).filter(function (entry) {
                return entry[0] !== e.pointerId;
            });
            var other = others[0][1];
            var prevDist = Math.hypot(other.x - p.x, other.y - p.y);
            var curDist = Math.hypot(other.x - e.clientX, other.y - e.clientY);
            if (prevDist > 0 && curDist > 0) {
                var rect = viewport.getBoundingClientRect();
                var midX = (other.x + e.clientX) / 2 - rect.left;
                var midY = (other.y + e.clientY) / 2 - rect.top;
                var fl = curDist / prevDist;
                var newScale = Math.min(Math.max(state.scale * fl, state.fit), state.fit * 10);
                var f = newScale / state.scale;
                state.x = midX - (midX - state.x) * f;
                state.y = midY - (midY - state.y) * f;
                state.scale = newScale;
                enforceBounds();
            }
            pointers.set(e.pointerId, { x: e.clientX, y: e.clientY, scale: state.scale, x0: state.x, y0: state.y });
        }
    });

    function releasePointer(e) {
        if (pointers.delete(e.pointerId)) {
            if (pointers.size === 0) {
                dragging = false;
                img.classList.remove('is-dragging');
            } else if (pointers.size === 1) {
                var remaining = Array.from(pointers.values())[0];
                remaining.x = e.clientX;
                remaining.y = e.clientY;
                remaining.x0 = state.x;
                remaining.y0 = state.y;
            }
        }
    }

    img.addEventListener('pointerup', releasePointer);
    img.addEventListener('pointercancel', releasePointer);

    viewer.querySelector('[data-map-zoom-in]').addEventListener('click', function () {
        zoomAt(viewport.clientWidth / 2, viewport.clientHeight / 2, 1.3);
    });
    viewer.querySelector('[data-map-zoom-out]').addEventListener('click', function () {
        zoomAt(viewport.clientWidth / 2, viewport.clientHeight / 2, 1 / 1.3);
    });
    viewer.querySelector('[data-map-close]').addEventListener('click', close);

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && viewer.classList.contains('is-open')) {
            close();
        }
    });
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', function () {
        initNavBar();
        initUserMenu();
        initAvatarField();
        initCollapsibles();
        initResponsiveTables();
        initMapViewer();
    });
} else {
    initNavBar();
    initUserMenu();
    initAvatarField();
    initCollapsibles();
    initResponsiveTables();
    initMapViewer();
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
