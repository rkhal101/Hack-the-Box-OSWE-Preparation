var droppedFiles = false;
var fileName = '';
var $dropzone = $('.dropzone');

$dropzone.on('drag dragstart dragend dragover dragenter dragleave drop', function(e) {
    e.preventDefault();
    e.stopPropagation();
})
    .on('dragover dragenter', function() {
        $dropzone.addClass('is-dragover');
    })
    .on('dragleave dragend drop', function() {
        $dropzone.removeClass('is-dragover');
    })
    .on('drop', function(e) {
        droppedFiles = e.originalEvent.dataTransfer.files;
        fileName = droppedFiles[0]['name'];
        $('.filename').html(fileName);
        $('.dropzone .upload').hide();
    });


$("input:file").change(function (){
    fileName = $(this)[0].files[0].name;
    $('.filename').html(fileName);
    $('.dropzone .upload').hide();
});
