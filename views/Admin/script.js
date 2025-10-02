// ---- SECCIONES DINÁMICAS ----
const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');
const sections = document.querySelectorAll('main .section');

// Mapeo nombres del sidebar → IDs de sección
const nameToId = {
	'dashboard': 'dashboard',
	'mi tienda': 'tienda',
	'usuarios': 'usuarios'
};

allSideMenu.forEach(item => {
	const li = item.parentElement;
	const target = nameToId[item.textContent.trim().toLowerCase()];

	item.addEventListener('click', function(e) {
		e.preventDefault();

		// Activar menú
		allSideMenu.forEach(i => i.parentElement.classList.remove('active'));
		li.classList.add('active');

		// Mostrar sección correspondiente
		sections.forEach(sec => sec.classList.remove('active'));
		document.getElementById(target).classList.add('active');
	});
});

// ---- TOGGLE SIDEBAR ----
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
});

// ---- BÚSQUEDA RESPONSIVE ----
const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
	if(window.innerWidth < 576) {
		e.preventDefault();
		searchForm.classList.toggle('show');
		if(searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('bx-search', 'bx-x');
		} else {
			searchButtonIcon.classList.replace('bx-x', 'bx-search');
		}
	}
});

// ---- AJUSTE INICIAL SEGÚN PANTALLA ----
if(window.innerWidth < 768) {
	sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-x', 'bx-search');
	searchForm.classList.remove('show');
}

// ---- REDIMENSIONAMIENTO DE PANTALLA ----
window.addEventListener('resize', function () {
	if(this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-x', 'bx-search');
		searchForm.classList.remove('show');
	}
});

// ---- MODO OSCURO ----
const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {
	if(this.checked) {
		document.body.classList.add('dark');
	} else {
		document.body.classList.remove('dark');
	}
});

// ---------------- ACCIONES DE ICONOS ----------------
function initIconButtons() {
    const iconButtons = document.querySelectorAll('.icon-btn');

    iconButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const action = btn.getAttribute('data-action');
            const item = btn.getAttribute('data-item') || btn.getAttribute('data-user');
            console.log(`Acción: ${action} sobre: ${item}`);
            // Aquí luego agregarás la lógica real (editar, eliminar, bloquear, etc.)
        });
    });
}

// Inicializar botones al cargar la página
window.addEventListener('DOMContentLoaded', initIconButtons);

