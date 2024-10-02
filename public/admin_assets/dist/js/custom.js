$("#pofferprice").keyup(function () {
    let discountInput = $("#pdiscount");
    let productActualPrice = $("#pprice").val();
    let productOfferPrice = $("#pofferprice").val();
    let discountPrice = productActualPrice - productOfferPrice;
    let discountPercent = Math.round(discountPrice * 100 / productActualPrice);

    discountInput.val(`${discountPercent}%`);

});

function preview_image() {
    let total_file = document.getElementById("upload_file").files.length;
    for (var i = 0; i < total_file; i++) {
        $('#image_preview').append("<div class='col-md-2'><img src='" + URL.createObjectURL(event.target.files[i]) + "'height='150px' width='150px'></div>");
    }
}

$("#pcategory").change(function () {
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  
    $.ajax({
        url: "getsubcat",
        type: 'post',
        
        data: {
            catId: $("#pcategory").val()
        },
        dataType: 'json',
        success: function (result) {
            $("#subcategory").empty();
           $.each(result,function(index,row){
            
            $("#subcategory").append(`<option value='${row.id}' >${row.name}</option>`);
           });
        },
        error: function (result) {
            console.log(result);
        }

    });
});

function showeye(obj, nm) {
    var dataitem = $(obj).attr('data-item');
    if (dataitem == 'fa-eye') {
        $(obj).removeClass(dataitem).addClass('fa-eye-slash').attr('data-item', 'fa-eye-slash');
        $("input[name='" + nm + "']").attr('type', 'text');
    } else {
        $(obj).removeClass(dataitem).addClass('fa-eye').attr('data-item', 'fa-eye');
        $("input[name='" + nm + "']").attr('type', 'password');
    }
}





