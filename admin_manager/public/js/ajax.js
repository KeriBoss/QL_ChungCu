//Get change of value khu dat
const khudat = document.getElementById('khudat');
const lodat = document.getElementById('lodat');
const ten_duan = document.getElementById('name_duan');
const id_duan = document.getElementById('id_duan');

// Create our number formatter.
const formatter = new Intl.NumberFormat('vi-VN', {
    style: 'currency',
    currency: 'VND',

    // These options are needed to round to whole numbers if that's what you want.
    //minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
    //maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
});

if(khudat){
    khudat.addEventListener('change', function(event){
        event.preventDefault();
        let khudat_id = khudat.value;
        
        $.ajax({
            url: 'ajax_get_lodat.php',
            type: 'GET',
            dataType: 'json',
            data: {
                khudat_id: khudat_id
            }
        }).done(function (reponse) {
            lodat.innerHTML = ``;
            reponse.forEach(item => {
                lodat.innerHTML += `
                    <option value="${item['id']}">${item['ten_lodat']}</option>
                `
            });
            if(reponse.length > 0){
                ten_duan.value = reponse[0]['ten_duan'];
            }else{
                ten_duan.value = '';
            }
        });
    })
}

if(lodat){
    lodat.addEventListener('change', function(event){
        event.preventDefault();
        let lodat_id = lodat.value;
        
        $.ajax({
            url: 'ajax_get_khudat.php',
            type: 'GET',
            dataType: 'json',
            data: {
                lodat_id: lodat_id
            }
        }).done(function (reponse) {
            khudat.innerHTML = ``;
            reponse.forEach(item => {
                khudat.innerHTML += `
                    <option value="${item['khudat_id']}">${item['ten_khudat']}</option>
                `
            });
            if(reponse.length > 0){
                ten_duan.value = reponse[0]['ten_duan'];
            }else{
                ten_duan.value = '';
            }
        });
    })
}

window.addEventListener('load', function(event){
    if(khudat){
        let khudat_id = khudat.value;
        $.ajax({
            url: 'ajax_get_lodat.php',
            type: 'GET',
            dataType: 'json',
            data: {
                khudat_id: khudat_id
            }
        }).done(function (reponse) {
            if(reponse.length > 0){
                ten_duan.value = reponse[0]['ten_duan'];
            }else{
                ten_duan.value = '';
            }
        });
    }
})

const id_duan_kh = document.getElementById('id_duan_kh');
const id_lodat_kh = document.getElementById('id_lodat_kh');

window.addEventListener('load', function(event){
    if(id_duan_kh){
        getNendatByDuan();
    }
})

if(id_duan_kh){
    id_duan_kh.addEventListener('change', function(){
        getNendatByDuan();
    })
}

function getNendatByDuan(){
    let duan_id_kh = id_duan_kh.value;
    $.ajax({
        url: 'ajax_get_nendat.php',
        type: 'GET',
        dataType: 'json',
        data: {
            id_duan: duan_id_kh
        }
    }).done(function (reponse) {
        if(id_lodat_kh){
            id_lodat_kh.innerHTML = ``;
            reponse.forEach(item => {
                id_lodat_kh.innerHTML += `
                <option class="nendatDiv" value="${item['ID_nendat']}">${item['ten_nendat']}</option>
                `;
            })
            if(typeof ID_NENDAT != 'undefined' && ID_NENDAT > 0){
                
                for (var i = 0; i < document.querySelectorAll('.nendatDiv').length; i++) {
                    console.log(document.querySelectorAll('.nendatDiv')[i]);
                    if (document.querySelectorAll('.nendatDiv')[i].value == ID_NENDAT) {
                        document.querySelectorAll('.nendatDiv')[i].selected = true;
                        // break;
                    }
                }
            }
        }
        
    });
}
//-------------------Hop dong ---------------------------//

const change_duan = document.getElementById('change_duan');

if(change_duan){
    getIDDuan();
    change_duan.addEventListener('change', function(event){
        getIDDuan();
    })
}

function getIDDuan(){
    var id_duan = change_duan.value;
    $.ajax({
        url: 'ajax_get_nendat.php',
        type: 'GET',
        dataType: 'json',
        data: {
            id_duan: id_duan
        }
    }).done(function (reponse) {
        var nendat_id = document.getElementById('nendat_id');
        if(nendat_id){
            nendat_id.innerHTML = ``;
            reponse.forEach(item => {
                nendat_id.innerHTML += `
                <option value="${item['ID_nendat']}">${item['ten_nendat']}</option>
                `;
            })
        }
    });
}

//---------------------------------HOP DONG-------------------------------------//
const selectKH = document.getElementById('id_khachhang');
const infoKH = document.querySelector('.card.info-customer');

window.addEventListener('load', function(event){
    if(selectKH){
        var id_kh = selectKH.value;
        $.ajax({
            url: 'ajax_get_khachhang.php',
            type: 'GET',
            dataType: 'json',
            data: {
                id_kh: id_kh
            }
        }).done(function(reponse){
            getInfoKH(reponse);
        })

        selectKH.addEventListener('change', function(event){
            event.preventDefault();
            var id_kh = selectKH.value;
            $.ajax({
                url: 'ajax_get_khachhang.php',
                type: 'GET',
                dataType: 'json',
                data: {
                    id_kh: id_kh
                }
            }).done(function(reponse){
                getInfoKH(reponse);
            })
        })
    }
})



function getInfoKH(reponse){
    if(infoKH){
        infoKH.innerHTML = ``;
        infoKH.innerHTML = `
            <h5>Thông tin khách hàng:</h5>
            <p>Tên: ${reponse['ten_kh']}</p>
            <p>Tên: ${reponse['gioitinh']}</p>
            <p>Số điện thoại: ${reponse['phone']}</p>
            <p>Email: ${reponse['email']}</p>
            <p>Địa chỉ: ${reponse['diachi']}</p>
        `;

    }
}
