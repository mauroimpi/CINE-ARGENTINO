 document.querySelectorAll('.sidebar nav a').forEach(link => {
    link.addEventListener('click', e => {
      e.preventDefault();
      const targetId = link.getAttribute('data-section');

      // Ocultar todas las secciones
      document.querySelectorAll('.seccion').forEach(sec => {
        sec.classList.remove('activa');
      });

      // Mostrar la sección correspondiente
      const targetSection = document.getElementById(targetId);
      if (targetSection) {
        targetSection.classList.add('activa');
      }
    });
  });

  // Mostrar la sección de inicio por defecto
  document.getElementById('inicio').classList.add('activa');
  function mostrarTabla(categoria) {
  // Ocultar todas
  document.querySelectorAll('.tabla-categoria').forEach(tabla => {
    tabla.style.display = 'none';
  });

  // Mostrar la seleccionada
  document.getElementById('tabla-' + categoria).style.display = 'block';
}
/*buscar*/
function mostrarBusqueda(opcion) {
  // Oculta todo primero
  document.getElementById('tabla-usuarios-buscar').style.display = 'none';
  document.getElementById('opcion-peliculas').style.display = 'none';

  // Oculta todas las tablas de películas por si estaban activas
  document.getElementById('tabla-peliculas-mas-vistas').style.display = 'none';
  document.getElementById('tabla-peliculas-accion').style.display = 'none';
  document.getElementById('tabla-peliculas-estrenos').style.display = 'none';

  if (opcion === 'usuarios') {
    document.getElementById('tabla-usuarios-buscar').style.display = 'block';
  } else if (opcion === 'peliculas') {
    document.getElementById('opcion-peliculas').style.display = 'block';
  }
}

function mostrarTablaPeliculasBuscar() {
  const valor = document.getElementById('categoria-select').value;

  // Oculta todas primero
  document.getElementById('tabla-peliculas-mas-vistas').style.display = 'none';
  document.getElementById('tabla-peliculas-accion').style.display = 'none';
  document.getElementById('tabla-peliculas-estrenos').style.display = 'none';

  if (valor === 'mas-vistas') {
    document.getElementById('tabla-peliculas-mas-vistas').style.display = 'block';
  } else if (valor === 'accion') {
    document.getElementById('tabla-peliculas-accion').style.display = 'block';
  } else if (valor === 'estrenos') {
    document.getElementById('tabla-peliculas-estrenos').style.display = 'block';
  }
}

/*agregar*/
function mostrarFormularioAgregar() {
  const select = document.getElementById('select-categoria');
  const form = document.getElementById('formulario-agregar');

  if (select.value !== "") {
    form.style.display = "block";
  } else {
    form.style.display = "none";
  }
}

/*modificar*/
function mostrarFormularioModificar() {
  const select = document.getElementById('select-categoria-modificar');
  const form = document.getElementById('formulario-modificar');

  if (select.value !== "") {
    form.style.display = "block";
  } else {
    form.style.display = "none";
  }
}
/*eliminar*/
function mostrarFormularioEliminar() {
  const select = document.getElementById('select-categoria-eliminar');
  const form = document.getElementById('formulario-eliminar');

  if (select.value !== "") {
    form.style.display = "block";
  } else {
    form.style.display = "none";
  }
}
