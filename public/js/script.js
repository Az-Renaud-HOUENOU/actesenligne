function exportPdf(element, format = "a4", orientation = "portrait") {
    var opt = {
        margin: 0,
        filename: 'document.pdf',
        image: { type: 'png', quality: 1 },
        html2canvas: { dpi: 1000, scale: 4 },
        jsPDF: { unit: 'in', format: format, orientation: orientation }
    };
    

    html2pdf().set(opt).from(element).save();
}