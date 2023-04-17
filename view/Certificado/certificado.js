const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');


/* Inicializamos la imagen */
const image = new Image();
/* ruta de la imagen */
image.src="../../public/0.png"

 



$(document).ready(function(){
    var curd_id = getUrlParameter("curd_id");

    /* Para utilizar el microservicio */
    $.post("../../controller/usuario.php?op=mostrar_curso_detalle", {curd_id : curd_id}, function (data) {
        data = JSON.parse(data);
        
        /* Dimensionamos la imagen */
        ctx.drawImage(image, 0, 0, canvas.width, canvas.height);

        /* definimos el tamaño de la fuente */
        ctx.font = '55px Arial';
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        var x = canvas.width / 2;
        ctx.fillText(data.usu_nom + ' ' + data.usu_apep + ' ' + data.usu_apem,x,335);

        ctx.font = '35px Arial';
        ctx.fillText(data.cur_nom,x,450);

        ctx.font = '25px Arial';
        ctx.fillText(data.inst_nomb + ' ' + data.inst_apep + ' ' + data.inst_apem,x,490);

        ctx.font = '20px Arial';
        ctx.fillText("Instructor",x,515);

        ctx.font = '15px Arial';
        ctx.fillText('Fecha de Inicio: ' + data.cur_fecinicio + ' / ' + 'Fecha de Finalización: ' + data.cur_fecfin ,x,570);
        
        $("#cur_descripcion").html(data.cur_descripcion);
    });


});


$(document).on("click","#btnpng",function(){
    let lblpng = document.createElement('a');
    lblpng.download = "Certificado.png";
    lblpng.href = canvas.toDataURL();
    lblpng.click();
});

$(document).on("click","#btnpdf",function(){
    var imgData = canvas.toDataURL('image/png');
    var doc = new jsPDF('l', 'mm');
    doc.addImage(imgData, 'PNG', 1, 1);
    doc.save('Certificado.pdf');
});

/* Funcion para obtener las variables enviadas mediante url */
var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};
