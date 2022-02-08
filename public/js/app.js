$.fn.modal.Constructor.prototype._enforceFocus = function () { };
$.fn.hasAttr = function (name) {
    return this.attr(name) !== undefined;
};

/**
 * Number.prototype.format(n, x)
 * 
 * @param integer n: length of decimal
 * @param integer x: length of sections
 */
Number.prototype.format = function (n, x) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
};

var rpVal = function (i) {
    return typeof i === 'string' ?
        +(i.replaceAll(',', '').replace('Rp', '').replaceAll(' ', '')) :
        typeof i === 'number' ?
            i : 0;
};


function setFooter(column, value) {
    var text = document.createElement("p");
    $(text).appendTo($(column.footer()).empty()).text(value);
}

function generateSumFooter(api) {
    api.columns().every(function () {
        var column = this;

        var text = document.createElement("p");
        var total = column.data().reduce(function (a, b) {
            return rpVal(a) + rpVal(b);
        }, 0);

        if (!isNaN(total) && column.index() != 0) {
            $(text).appendTo($(column.footer()).empty()).text("Rp " + total.format());
        }
    });
}

$(function () {
    $.ajaxSetup({
        headers:
        { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    Inputmask.extendAliases({
        rupiah: {
            prefix: "Rp ",
            groupSeparator: ".",
            alias: "numeric",
            autoGroup: true,
            digits: 0,
            digitsOptional: false,
            clearMaskOnLostFocus: false
        }
    });
    bsCustomFileInput.init();

    $("[data-rupiah]").inputmask({ "alias": "rupiah" });

    $('form').on('submit', function(){
        blockPage();
    });
});

function rupiahToInt(rupiah) {
    nominal = rupiah.replace("Rp ", "");
    nominal = nominal.replaceAll(".", "");
    nominal = parseInt(nominal);
    return nominal;
}

/**
 * Number.prototype.format(n, x)
 * 
 * @param integer n: length of decimal
 * @param integer x: length of sections
 */
Number.prototype.toRupiah = function (n, x) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
    return "Rp " + this.toFixed(Math.max(0, ~~n), 0).replace(new RegExp(re, 'g'), '$&.');
};

function blockPage() {
    $.blockUI({
        message: "<img src='/images/typing.svg' class='mb-5'></img><h3>Please wait </h3> Don't refresh or close page !",
        baseZ: 2000,
        css: {
            color: 'white',
            backgroundColor: 'transparent',
            borderColor: 'transparent'
        }
    });
}


function unblockPage() {
    $.unblockUI();
}
// $(document).on('submit', 'form', function (e) {
//     $.blockUI({
//         message: "<h3>Mohon Tunggu </h3> Jangan Refresh Atau Close Halaman !",
//         baseZ: 2000,
//         css: {
//             color: 'white',
//             backgroundColor: 'transparent',
//             borderColor: 'transparent'
//         }
//     });
// });
Dropzone.autoDiscover = false;





$(document).on('click', "button[warning]", function (e, from) {
    if (from == null) {


        var btn = $(this);
        e.preventDefault();

        /** Fire Normal Confirm Dialog */
        Swal.fire({
            type: "warning",
            title: $(this).attr('warning'),
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'Cancel',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                btn.trigger('click', ['kobantitar']);

            } else {
            }
        });
    }

})

