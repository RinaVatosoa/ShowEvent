/**
 * lister le lieu
 */
$('.rv-reserver').click(function () {
    const nouvelleRes = 1;
    console.log(nouvelleRes);
    const list_lieu = $(this).parent().parent().find('td.list');
    console.log(list_lieu);

    list_lieu.each(function (i) {
        let a = list_lieu[i].innerHTML;
        console.log(a);
    });

    const id_info = list_lieu[0].innerHTML;
    console.log("aiza le " + id_info);
    $.ajax({
        type: "POST",
        url: "back/reservation.php",
        data: {reservation: nouvelleRes, id_info: id_info},
        cache: false,
        success: function (data) {
            console.log("mise à jour avec succès " + data);
        },
        error: function(){
            console.log('erreur');
        }
    });

});


/*
if reserver is clicked {
    alert (
        info +
        boutton payer
)
}

if payer is clicked {
    alert (
        "payer par" +
        mvola || orange +
        boutton ok
)
}

if ok is clicked {
    alert (
        "place réservé n° " + idBillet + "à" +
        info
    )
}
*/


