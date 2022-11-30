import  Dropzone  from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Sube tu imagen',
    acceptedFiles: '.png, .jpg, .jpeg, .gif',
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar archivo',
    maxFiles: 1,
    uploadMultiple: false,
});

dropzone.on('success', (file, response) => {

    console.log(response);

})
