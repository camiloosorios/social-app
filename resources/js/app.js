import  Dropzone  from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    //Configuración básica de Dropzone
    dictDefaultMessage: 'Sube tu imagen',
    acceptedFiles: '.png, .jpg, .jpeg, .gif',
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar archivo',
    maxFiles: 1,
    uploadMultiple: false,

    init: function() {
        if(document.querySelector('[name="imagen"]').value.trim()) {
            //Se crea el objeto de la imagn inicializado en vacio
            const imagenPublicada = {};

            //Se agregan propiedades al objeto
            imagenPublicada.size = 1234;
            imagenPublicada.name = document.querySelector('[name="imagen"]').value;

            //se agregan opciones a dropzone para llamar la imagen
            this.options.addedfile.call(this, imagenPublicada);
            //se agregan opciones para llamar la imagen pequeña
            this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`);

            imagenPublicada.previewElement.classList.add('dz-success', 'dz-complete');
        }
    }
});

dropzone.on('success', (file, response) => {

    document.querySelector('[name="imagen"]').value = response.imagen;

});

dropzone.on('removedfile', () => {
    
    document.querySelector('[name="imagen"]').value = '';

});
