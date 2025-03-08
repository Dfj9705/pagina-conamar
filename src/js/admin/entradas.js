import { Dropdown, Modal } from "bootstrap";
import DataTable from "datatables.net-bs5";
import { lenguaje } from "../lenguaje";
import { confirmacion, Toast } from "../funciones";
import tinymce, { TinyMCE } from "tinymce";
import 'tinymce/themes/silver'
import 'tinymce/icons/default'
import 'tinymce/plugins/advlist'
import 'tinymce/plugins/lists'
import 'tinymce/models/dom/model'
let editor = '';
document.addEventListener('DOMContentLoaded', () => {
    editor = tinymce.init({
        selector: '#not_contenido',
        license_key: 'gpl',
        promotion: false,
        height: 600,
        menubar: true,
        plugins: [
            'lists ',
            'advlist',
            'image',
            'fullscreen',
            'visualblocks',

        ],
        advlist_number_styles: 'default,lower-alpha,lower-greek,lower-roman,upper-alpha,upper-roman',
        toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist advlist outdent indent | ' +
            'removeformat | help' +
            '| link image | fullscreen | visualblocks | importword',
        image_title: true,
        /* enable automatic uploads of images represented by blob or data URIs*/
        automatic_uploads: true,
        image_dimensions: true, // Habilita la edición de dimensiones
        image_description: true,
        file_picker_types: 'image',
        /* and here's our custom image picker*/
        file_picker_callback: (cb, value, meta) => {
            const input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');

            input.addEventListener('change', (e) => {
                const file = e.target.files[0];

                const reader = new FileReader();
                reader.addEventListener('load', () => {
                    /*
                      Note: Now we need to register the blob in TinyMCEs image blob
                      registry. In the next release this part hopefully won't be
                      necessary, as we are looking to handle it internally.
                    */
                    const id = 'blobid' + (new Date()).getTime();
                    const blobCache = tinymce.activeEditor.editorUpload.blobCache;
                    const base64 = reader.result.split(',')[1];
                    const blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);

                    /* call the callback and populate the Title field with the file name */
                    cb(blobInfo.blobUri(), { title: file.name });
                });
                reader.readAsDataURL(file);
            });

            input.click();
        },
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });
})


const formNoticia = document.getElementById('formNoticia')
const modalNoticiaElement = document.getElementById('modalNoticia')
const modalBsNoticia = new Modal(modalNoticiaElement)
const modalImagenesElement = document.getElementById('modalImagenes')
const modalBsImagen = new Modal(modalImagenesElement)
const btnGuardar = document.getElementById('btnGuardar')
const spanLoader = document.getElementById('spanLoader')
const btnModificar = document.getElementById('btnModificar')
const spanLoaderModificar = document.getElementById('spanLoaderModificar')
const modalTitleIdProducto = document.getElementById('modalTitleIdProducto')

btnModificar.disabled = true
btnModificar.style.display = 'none'
spanLoader.style.display = 'none'
spanLoaderModificar.style.display = 'none'
btnGuardar.disabled = false
let tablaProductos = new DataTable('#datatableProductos', {
    language: lenguaje,
    data: null,
    columns: [
        {
            title: 'No.',
            render: (data, type, row, meta) => meta.row + 1
        },
        {
            title: 'Categoria',
            data: 'cat_nombre'
        },
        {
            title: 'Nombre',
            data: 'pro_nombre'
        },
        {
            title: 'Descripcion',
            data: 'pro_descripcion'
        },
        {
            title: 'Precio',
            data: 'pro_precio'
        },
        {
            title: 'Estado',
            data: 'pro_estado',
            render: (data, type, row, meta) => data == 1 ? `<p class="text-success fs-3 text-center"><i style="cursor: pointer" data-id = "${row.pro_id}" data-estado = "${data}" class="fas fa-toggle-on estado"></i></p>` : `<p class="text-secondary fs-3 text-center"><i style="cursor: pointer" data-id = "${row.pro_id}" data-estado = "${data}" class="fas fa-toggle-off estado"></i></p>`
        },
        {
            title: 'Acciones',
            data: 'pro_id',
            render: (data, type, row, meta) => {
                let html = `<div class="dropdown">`
                html += `   <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Acciones
                            </button>`
                html += `<ul class="dropdown-menu">`
                html += `<li><a style="cursor:pointer" class="dropdown-item fotos" data-id = "${data}" title='Ver fotos'><i class="fas fa-images me-2" ></i>Fotos</a></li>`
                html += `<li><a style="cursor:pointer" class="dropdown-item estado" data-id = "${data}" data-estado = "${row.pro_estado}" title='Desactivar/Activar'><i class="fas fa-${row.pro_estado == 1 ? 'toggle-on' : 'toggle-off'} me-2" ></i>${row.pro_estado == 1 ? 'Activo' : 'Inactivo'}</a></li>`
                html += `<li><a style="cursor:pointer" class="dropdown-item modificar" data-id = "${data}" data-nombre = "${row.pro_nombre}" data-precio = "${row.pro_precio}" data-categoria = "${row.pro_cat_id}" data-descripcion = "${row.pro_descripcion}"  data-tallas = "${row.tallas}" title='Modificar'><i class="fas fa-pen-to-square me-2" ></i>Modificar</a></li>`
                html += `</ul>`
                html += `</div>`

                return html;
            }
        },
    ]
});
let tablaImagenes = new DataTable('#datatableImagenes', {
    language: lenguaje,
    data: null,
    columns: [
        {
            title: 'No.',
            render: (data, type, row, meta) => meta.row + 1
        },
        {
            title: 'Imagen',
            data: 'imagen',
            render: (data, type, row, meta) => {
                let html = `<img src="${data}" width="150px">`
                return html;
            }

        },
        {
            title: 'Acciones',
            data: 'id',
            render: (data, type, row, meta) => {
                let html = `<div class="dropdown">`
                html += `   <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Acciones
                            </button>`
                html += `<ul class="dropdown-menu">`
                html += `<li><a style="cursor:pointer" class="dropdown-item eliminar-foto text-danger" data-id = "${data}" title='Eliminar Foto'><i class="fas fa-trash me-2" ></i>Eliminar</a></li>`
                html += `</ul>`
                html += `</div>`

                return html;
            }
        },
    ]
});

const guardar = async (e) => {
    e.preventDefault();
    let contenido = tinymce.get('not_contenido').getContent();
    spanLoader.style.display = ''
    btnGuardar.disabled = true
    formNoticia.classList.add('was-validated')

    if (!formNoticia.checkValidity() || contenido == '') {
        Toast.fire({
            icon: 'info',
            title: "Debe llenar todos los campos"
        })
        spanLoader.style.display = 'none'
        btnGuardar.disabled = false

        return
    }
    try {

        const body = new FormData(formNoticia)
        body.append('not_contenido', contenido)
        const url = "/API/admin/entradas/guardar"
        const headers = new Headers()
        headers.append('X-Requested-With', 'fetch');
        const config = {
            method: 'POST',
            body,
            headers
        }

        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        const { codigo, mensaje, detalle } = data;

        let icon = 'info'
        console.log(data);
        if (codigo == 1) {
            icon = 'success'
            formNoticia.reset()
            modalBsNoticia.hide()
            formNoticia.classList.remove('was-validated')
            buscar();
        } else if (codigo == 2) {
            icon = 'warning'

            console.log(detalle);
        } else if (codigo == 0) {
            icon = 'error'
            console.log(detalle);

        }

        Toast.fire({
            icon,
            title: mensaje
        })

    } catch (error) {
        console.log(error);
    }
    spanLoader.style.display = 'none'
    btnGuardar.disabled = false
}

const buscar = async () => {
    try {
        const url = `/API/admin/productos/buscar`
        const headers = new Headers();
        headers.append('X-Requested-With', 'fetch');
        const config = {
            method: 'GET',
            headers,
        }

        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        const { datos, mensaje, codigo, detalle } = data;
        tablaProductos.clear().draw();
        console.log(data);
        if (codigo == 1) {
            tablaProductos.rows.add(datos).draw();
        } else {
            Toast.fire({
                icon: 'info',
                title: mensaje,
            })
            console.log(detalle);
        }

    } catch (error) {
        console.log(error);
    }
}
// buscar();

const verFotos = async (e) => {
    let element = e.currentTarget
    let id = element.dataset.id;

    try {
        const url = `/API/admin/productos/fotos?id=${id}`
        const headers = new Headers();
        headers.append('X-Requested-With', 'fetch');
        const config = {
            method: 'GET',
            headers,
        }

        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        const { datos, mensaje, codigo, detalle } = data;
        console.log(data);
        tablaImagenes.clear().draw();
        if (codigo == 1) {
            tablaImagenes.rows.add(datos).draw();
            modalBsImagen.show();
        } else {
            Toast.fire({
                icon: 'info',
                title: mensaje,
            })
            console.log(detalle);
        }

    } catch (error) {
        console.log(error);
    }
}

const eliminarFoto = async (e) => {
    let confirm = await confirmacion('¿Esta seguro que desea eliminar esta imagen?', 'question', 'Si, eliminar')
    let button = e.currentTarget;
    let id = button.dataset.id

    if (confirm) {
        try {
            const url = `/API/admin/productos/fotos/eliminar`
            const headers = new Headers();
            const body = new FormData()
            body.append('img_id', id)
            headers.append('X-Requested-With', 'fetch');
            const config = {
                method: 'POST',
                headers,
                body
            }

            const respuesta = await fetch(url, config);
            const data = await respuesta.json();
            const { datos, mensaje, codigo, detalle } = data;

            if (codigo == 1) {
                Toast.fire({
                    icon: 'success',
                    title: mensaje,
                })
                modalBsImagen.hide();

            } else {
                Toast.fire({
                    icon: 'info',
                    title: mensaje,
                })
                console.log(detalle);
            }
        } catch (error) {
            console.log(error);
        }
    }
}

const cambiarEstado = async (e) => {
    let confirm = await confirmacion('¿Esta seguro que desea cambiar el estado del producto?', 'question', 'Si, cambiar')
    let button = e.currentTarget;
    let id = button.dataset.id
    let estado = button.dataset.estado == 1 ? 0 : 1;

    if (confirm) {
        try {
            const url = `/API/admin/productos/estado`
            const headers = new Headers();
            const body = new FormData()
            body.append('pro_id', id)
            body.append('pro_estado', estado)
            headers.append('X-Requested-With', 'fetch');
            const config = {
                method: 'POST',
                headers,
                body
            }

            const respuesta = await fetch(url, config);
            const data = await respuesta.json();
            const { datos, mensaje, codigo, detalle } = data;

            if (codigo == 1) {
                Toast.fire({
                    icon: 'success',
                    title: mensaje,
                })
                buscar();

            } else {
                Toast.fire({
                    icon: 'info',
                    title: mensaje,
                })
                console.log(detalle);
            }
        } catch (error) {
            console.log(error);
        }
    }
}

const asignarValores = (e) => {
    const dataset = e.currentTarget.dataset;
    const tallas = dataset.tallas.split(',')
    formNoticia.pro_id.value = dataset.id
    formNoticia.pro_nombre.value = dataset.nombre
    formNoticia.pro_precio.value = dataset.precio
    formNoticia.pro_descripcion.value = dataset.descripcion
    formNoticia.pro_cat_id.value = dataset.categoria
    formNoticia.prod_imagen.required = false
    btnGuardar.style.display = 'none'
    btnGuardar.disabled = true

    const select = document.getElementById('prod_tallas');

    for (let i = 0; i < select.options.length; i++) {
        if (tallas.includes(select.options[i].value)) {
            select.options[i].selected = true;
        }
    }


    btnModificar.style.display = ''
    btnModificar.disabled = false
    modalTitleIdProducto.textContent = 'Modificar producto'
    modalBsNoticia.show();
}

const modificar = async (e) => {
    e.preventDefault();
    spanLoaderModificar.style.display = ''
    btnModificar.disabled = true
    formNoticia.classList.add('was-validated')
    if (!formNoticia.checkValidity()) {
        Toast.fire({
            icon: 'info',
            title: "Debe llenar todos los campos"
        })
        spanLoaderModificar.style.display = 'none'
        btnModificar.disabled = false

        return
    }

    try {

        const body = new FormData(formNoticia)
        const url = "/API/admin/productos/modificar"
        const headers = new Headers()
        headers.append('X-Requested-With', 'fetch');
        const config = {
            method: 'POST',
            body,
            headers
        }

        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        const { codigo, mensaje, detalle } = data;

        let icon = 'info'
        console.log(data);
        if (codigo == 1) {
            icon = 'success'
            formNoticia.reset()
            modalBsNoticia.hide()
            formNoticia.classList.remove('was-validated')
            buscar();
        } else if (codigo == 2) {
            icon = 'warning'

            console.log(detalle);
        } else if (codigo == 0) {
            icon = 'error'
            console.log(detalle);

        }

        Toast.fire({
            icon,
            title: mensaje
        })

    } catch (error) {
        console.log(error);
    }
    spanLoaderModificar.style.display = 'none'
    btnModificar.disabled = false
}

formNoticia.addEventListener('submit', guardar)
btnModificar.addEventListener('click', modificar)
tablaProductos.on('click', '.fotos', verFotos)
tablaProductos.on('click', '.estado', cambiarEstado)
tablaProductos.on('click', '.modificar', asignarValores)
tablaImagenes.on('click', '.eliminar-foto', eliminarFoto)
modalNoticiaElement.addEventListener('hide.bs.modal', () => {
    btnGuardar.style.display = ''
    btnGuardar.disabled = false
    btnModificar.style.display = 'none'
    btnModificar.disabled = true
    modalTitleIdProducto.textContent = 'Crear producto'
    formNoticia.prod_imagen.required = true
    formNoticia.classList.remove('was-validated')
    const select = document.getElementById('prod_tallas');

    for (let i = 0; i < select.options.length; i++) {

        select.options[i].selected = false;

    }
    formNoticia.reset()
})