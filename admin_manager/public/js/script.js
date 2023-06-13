
// Get the modal
var modal = document.getElementById("newModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.querySelectorAll(".close");

if(modal && btn && span){
    if (modal.dataset.display == 'true') {
        modal.style.display = 'block'
    } else if (modal.dataset.display == 'false') {
        modal.style.display = 'none'
    }
    
    
    // When the user clicks the button, open the modal 
    btn.onclick = function () {
        modal.style.display = "block";
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
     "ordering": false // false to disable sorting (or any other option)
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