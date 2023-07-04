
// Get the modal
var modal = document.getElementById("newModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");
var modalTransfer = document.querySelectorAll(".modalTransfer");

// Get the <span> element that closes the modal
var span = document.querySelectorAll(".close");

if(modal && span){
    if (modal.dataset.display == 'true') {
        modal.style.display = 'block'
    } else if (modal.dataset.display == 'false') {
        modal.style.display = 'none'
    }
    
    if(btn){
        // When the user clicks the button, open the modal 
        btn.onclick = function () {
            modal.style.display = "block";
        }
    }

    if(modalTransfer){
        modalTransfer.forEach(item => {
            item.onclick = function () {
                modal.style.display = "block";

                var id_hd = item.dataset.transfer;

                $.ajax({
                    url: 'ajax_get_hopdong.php',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        id_hd: id_hd
                    }
                }).done(function (reponse) {
                    modal.innerHTML = ``;
                    modal.innerHTML = `
                    
                    `;
                });
            }
        })
    }
    
    // When the user clicks on <span> (x), close the modal
    span.forEach(item => {
        item.onclick = function () {
            if (item.dataset.modal == 'close') {
                modal.style.display = "none";
            }
        }
    
    })
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// Basic example
$(document).ready(function () {
    $('#dataTable1').DataTable({
     "ordering": false, // false to disable sorting (or any other option)
     "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
    });
    $('.dataTables_length').addClass('bs-select');
});


//-----------------------Hop dong------------------------//
const trigia_hd = document.getElementById('trigia_hd');
const trigia_hd_usd = document.getElementById('trigia_hd_usd');
const gia_hd = document.getElementById('gia_hd');
const dientich_hd = document.getElementById('dientich_hd');
const giadat_usd = document.getElementById('giadat_usd');

if(trigia_hd && gia_hd && dientich_hd && giadat_usd){
    gia_hd.addEventListener('keyup', function(event){
        keyUpVND();
    })
    dientich_hd.addEventListener('keyup', function(event){
        keyUpVND();
        keyUpUSD();
    })
    giadat_usd.addEventListener('keyup', function(event){
        keyUpUSD();
    })
}

function keyUpVND(){
    trigia_hd.value = gia_hd.value * dientich_hd.value;
}
function keyUpUSD(){
    trigia_hd_usd.value = giadat_usd.value * dientich_hd.value;
}

const gia_thucte = document.getElementById('gia_thucte');
const dientich_thucte = document.getElementById('dientich_thucte');
const trigia_thucte = document.getElementById('trigia_thucte');

if(gia_thucte && dientich_thucte && trigia_thucte){
    gia_thucte.addEventListener('keyup', function(event){
        trigia_thucte.value = gia_thucte.value * dientich_thucte.value;
    })
    dientich_thucte.addEventListener('keyup', function(event){
        trigia_thucte.value = gia_thucte.value * dientich_thucte.value;
    })
}

//Change tab
const cardBody = document.querySelectorAll('.card-body');

if(cardBody){
    cardBody.forEach(item => {
        var tabInfo1 = item.querySelector('#home');
        var tabInfo2 = item.querySelector('#menu1');

        var tabPill1 = item.querySelector('ul.nav-tabs li:first-child a');
        var tabPill2 = item.querySelector('ul.nav-tabs li:nth-child(2) a');

        const btnNext = document.getElementById('next-info');
        if(btnNext){
            btnNext.onclick = () => {
                tabPill1.classList.remove('active');
                tabPill2.classList.add('active');

                tabInfo1.classList.remove('active');
                tabInfo1.classList.remove('show');
                tabInfo2.classList.add('active');
                tabInfo2.classList.add('show');
            }
        }
    })
}

//Check form hop dong when submit
const formHD = document.querySelector('#form-hopdong');
const requiredInput = document.querySelectorAll('#form-hopdong input[required]');

if(formHD && requiredInput){
    formHD.addEventListener('submit', (event) => {
        // const tabNav = document.querySelectorAll('.card-body .nav-tabs li a');
        var CHECK = true;
    
        requiredInput.forEach(item => {
            if(item.value.trim() === ''){
                CHECK = false;
            }
        })
        if(CHECK == false){
            event.preventDefault();
            alert("Vui lòng nhập đầy đủ thông tin!");
            return;
        }
        event.submit();
    });

}

const allInputDate = document.querySelectorAll('input[type=date]');

if(allInputDate){
    if(allInputDate.value == ''){
        allInputDate.forEach(item => {
            const today = new Date();
            const year = today.getFullYear();
            const month = (today.getMonth() + 1) < 10 ? '0'+(today.getMonth() + 1) : (today.getMonth() + 1); // add 1 to get the correct month (January is 0)
            const day = today.getDate() < 10 ? '0'+today.getDate() : today.getDate();
    
            var currentDate = `${year}-${month}-${day}`// output: e.g. 2021-10-15
    
            item.value = currentDate;
        })
    }
}



// $(document).ready(function () {
//     var currentPage = 1;

//     $('table.display').dataTable({
//         "pageLength": 5,
//     "lengthMenu": [[5,10, 20, 50, -1], [5,10, 20, 50, "All"]],
//     responsive: true,
//     language: {
//     search: "_INPUT_",
//     searchPlaceholder: "Search records",
//     },
//     'displayStart': (currentPage-1)*5
    
//     });
//     $('table.display').dataTable();
//     $('.dataTables_length').addClass('bs-select');
// });


//Export HTML to pdf, xls, doc
const type_print = document.getElementById('type_print');

function exportHTML(){
    if(type_print){
        const btnType = type_print.querySelectorAll('input[type=radio]');
        btnType.forEach(item => {
            if(item.value === 'pdf' && item.checked === true){
                const element = document.getElementById("content_word");

                if(element){
                    //easy
                    // html2pdf().from(element).save();

                    //Custom file name
                    // html2pdf().set({filename: js.AutoCode()+'.pdf'}).from(element).save();

                    //more custom setting
                    var opt = {
                        margin: 1,
                        filename: 'Bảng báo cáo.pdf',
                        image: {type: 'jpeg', quantity: 0.98},
                        html2canvas:  { scale: 2 },
                        jsPDF: { 
                            unit: 'in',
                            format: 'letter',
                            orientation: 'portrait'
                        }
                    };
                    
                    html2pdf().set(opt).from(element).save();
                }

            }else if(item.value === "xls" && item.checked === true){
                var data = document.getElementById('dataTable2');
                var excelFile = XLSX.utils.table_to_book(data, {sheet: "sheet1"});
                XLSX.write(excelFile, { bookType: "xls", bookSST: true, type: 'base64' });
                XLSX.writeFile(excelFile, 'Bảng báo cáo.' + "xls");
            }else if(item.value === 'doc' && item.checked === true){
                var element = 'content_word';
                var filename = "Bảng báo cáo";
                 //  _html_ will be replace with custom html
                var meta= "Mime-Version: 1.0\nContent-Base: " + location.href + "\nContent-Type: Multipart/related; boundary=\"NEXT.ITEM-BOUNDARY\";type=\"text/html\"\n\n--NEXT.ITEM-BOUNDARY\nContent-Type: text/html; charset=\"utf-8\"\nContent-Location: " + location.href + "\n\n<!DOCTYPE html>\n<html>\n_html_</html>";
                //  _styles_ will be replaced with custome css
                var head= "<head>\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\n<style>\n_styles_\n</style>\n</head>\n";
    
                var html = document.getElementById(element).innerHTML ;
                
                var blob = new Blob(['\ufeff', html], {
                    type: 'application/msword'
                });
                
                var  css = (
                    '<style>' +
                    'img {width:300px;}table {border-collapse: collapse; border-spacing: 0;}td{padding: 6px;} table,td,th {border: 1px solid;} h1,h2,h3,h4 {text-align: center}' +
                    '</style>'
                    );
    //  Image Area %%%%
                var options = { maxWidth: 624};
                var images = Array();
                var img = $("#"+element).find("img");
                for (var i = 0; i < img.length; i++) {
                    // Calculate dimensions of output image
                    var w = Math.min(img[i].width, options.maxWidth);
                    var h = img[i].height * (w / img[i].width);
                    // Create canvas for converting image to data URL
                    var canvas = document.createElement("CANVAS");
                    canvas.width = w;
                    canvas.height = h;
                    // Draw image to canvas
                    var context = canvas.getContext('2d');
                    context.drawImage(img[i], 0, 0, w, h);
                    // Get data URL encoding of image
                    var uri = canvas.toDataURL("image/png");
                    $(img[i]).attr("src", img[i].src);
                    img[i].width = w;
                    img[i].height = h;
                    // Save encoded image to array
                    images[i] = {
                        type: uri.substring(uri.indexOf(":") + 1, uri.indexOf(";")),
                        encoding: uri.substring(uri.indexOf(";") + 1, uri.indexOf(",")),
                        location: $(img[i]).attr("src"),
                        data: uri.substring(uri.indexOf(",") + 1)
                    };
                }

                // Prepare bottom of mhtml file with image data
                var imgMetaData = "\n";
                for (var i = 0; i < images.length; i++) {
                    imgMetaData += "--NEXT.ITEM-BOUNDARY\n";
                    imgMetaData += "Content-Location: " + images[i].location + "\n";
                    imgMetaData += "Content-Type: " + images[i].type + "\n";
                    imgMetaData += "Content-Transfer-Encoding: " + images[i].encoding + "\n\n";
                    imgMetaData += images[i].data + "\n\n";
                    
                }
                imgMetaData += "--NEXT.ITEM-BOUNDARY--";
    // end Image Area %%

                var output = meta.replace("_html_", head.replace("_styles_", css) +  html) + imgMetaData;

                var url = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(output);


                filename = filename ? filename + '.doc' : 'document.doc';


                var downloadLink = document.createElement("a");

                document.body.appendChild(downloadLink);

                if (navigator.msSaveOrOpenBlob) {
                    navigator.msSaveOrOpenBlob(blob, filename);
                } else {

                    downloadLink.href = url;
                    downloadLink.download = filename;
                    downloadLink.click();
                }

                document.body.removeChild(downloadLink);
            }
        })
    }
}

//Format number to price
// const inputPrice = document.querySelectorAll('input[type=number]');

// if(inputPrice){
//     inputPrice.forEach(item => {
//         if(item.dataset.type == 'price'){
//             item.addEventListener('keyup', function(event){
//                 event.preventDefault();
//                 formatPrice();
//             })
//         }
//     })
// }

