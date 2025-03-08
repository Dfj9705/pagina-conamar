<div class="row">
    <div class="col-lg-10">
        <h1>Ingreso de entradas de noticias</h1>
    </div>
    <div class="col-lg-1 d-flex align-items-center">
        <a href="/entradas" class="btn btn-outline-success w-100"><i class="bi bi-eye"></i></a>
    </div>
    <div class="col-lg-1 d-flex align-items-center">
        <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalNoticia"><i
                class="bi bi-plus-circle"></i></button>
    </div>
</div>

<div class="row">
    <div class="col table-responsive">
        <table id="datatableProductos" class="table table-hover table-stripped table-bordered">
        </table>

    </div>
</div>
<div class="modal fade" id="modalNoticia" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleIdProducto">
                    Crear entrada de noticias
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formNoticia" class="modal-body needs-validation" novalidate>
                <!-- Nombre del producto -->
                <input type="hidden" name="not_id" id="not_id">
                <div class="mb-3">
                    <label for="not_titulo" class="form-label">Título</label>
                    <input type="text" class="form-control" id="not_titulo" name="not_titulo" required>
                    <div class="invalid-feedback">
                        Por favor, ingresa el titulo de la noticia.
                    </div>
                </div>

                <!-- Descripción del producto -->
                <div class="mb-3">
                    <label for="not_contenido" class="form-label">Cuerpo de la noticia</label>
                    <textarea class="form-control" id="not_contenido" name="not_contenido" rows="3"></textarea>
                    <div class="invalid-feedback">
                        Por favor, ingrese el cuerpo de la noticia.
                    </div>
                </div>

                <!-- Imagen del producto -->
                <div class="mb-3">
                    <label for="not_imagen" class="form-label">Imagen principal</label>
                    <input type="file" class="form-control" id="not_imagen" name="not_imagen[]" accept="image/*"
                        required>
                    <div class="invalid-feedback">
                        Por favor, sube una imagen del producto.
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">
                    Cerrar
                </button>
                <button class="btn btn-primary" type="submit" form="formNoticia" id="btnGuardar">Guardar<span
                        id="spanLoader" class="spinner-border spinner-border-sm ms-2"
                        aria-hidden="true"></span></button>
                <button class="btn btn-warning" type="button" id="btnModificar">Modificar<span id="spanLoaderModificar"
                        class="spinner-border spinner-border-sm ms-2" aria-hidden="true"></span></button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalImagenes" tabindex="-1" data-bs-keyboard="false" role="dialog"
    aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalImagenId">
                    Fotografias cargadas
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="datatableImagenes" class="table table-hover text-center table-stripped table-bordered">
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<script src="<?= asset('./build/js/admin/entradas.js') ?>"></script>