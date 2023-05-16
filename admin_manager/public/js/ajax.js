//Get change of value khu dat
const khudat = document.getElementById('khudat');
const lodat = document.getElementById('lodat');

// Create our number formatter.
const formatter = new Intl.NumberFormat('vi-VN', {
    style: 'currency',
    currency: 'VND',

    // These options are needed to round to whole numbers if that's what you want.
    //minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
    //maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
});

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
    });
})

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
    });
})


