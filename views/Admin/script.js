// ---- SECCIONES DINÁMICAS ----
const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');
const sections = document.querySelectorAll('main .section');

// Mapeo nombres del sidebar → IDs de sección
const nameToId = {
	'dashboard': 'dashboard',
	'mi tienda': 'tienda',
	'usuarios': 'usuarios',
	'clientes': 'clientes'
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

// ---- MODAL ----
const modal = document.getElementById('modal');
const modalTitle = document.getElementById('modal-title');
const modalForm = document.getElementById('modal-form');
const closeBtn = document.querySelector('.modal .close');

// Abrir modal según la sección
document.querySelectorAll('.btn-download').forEach(btn => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        const section = btn.closest('.section').id;

        modal.style.display = 'block';

        switch(section) {
            case 'usuarios':
                modalTitle.textContent = 'Agregar Usuario';
                modalForm.innerHTML = `
                    <input type="text" placeholder="Nombre completo" required>
                    <input type="email" placeholder="Email" required>
                    <select>
                        <option value="cliente">Cliente</option>
                        <option value="admin">Administrador</option>
                    </select>
                    <button type="submit">Guardar</button>
                `;
                break;

            case 'clientes':
                modalTitle.textContent = 'Agregar Cliente';
                modalForm.innerHTML = `
                    <input type="text" placeholder="Nombre completo" required>
                    <input type="email" placeholder="Email" required>
                    <input type="tel" placeholder="Teléfono" required>
                    <button type="submit">Guardar</button>
                `;
                break;

            case 'tienda':
                modalTitle.textContent = 'Agregar Producto';
                modalForm.innerHTML = `
                    <input type="text" placeholder="Nombre del producto" required>
                    <input type="number" placeholder="Precio" required>
                    <input type="number" placeholder="Stock" required>
                    <button type="submit">Guardar</button>
                `;
                break;

            default:
                modalTitle.textContent = 'Agregar';
                modalForm.innerHTML = `<p>No hay formulario definido para esta sección.</p>`;
        }
    });
});

// Cerrar modal
closeBtn.onclick = () => { modal.style.display = 'none'; }
window.onclick = (e) => { if(e.target == modal) modal.style.display = 'none'; }

// Manejo del formulario (por ahora solo muestra en consola)
modalForm.addEventListener('submit', (e) => {
    e.preventDefault();
    alert("Datos enviados (simulado)");
    modal.style.display = 'none';
});


// Inicializar botones al cargar la página
window.addEventListener('DOMContentLoaded', initIconButtons);
