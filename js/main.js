/**
 * lister les informations concernées
 */
$('.rv-reserver').click(function () {
    const nouvelleRes = 1;
    const list_lieu = $(this).parent().parent().find('td.list');

    list_lieu.each(function (i) {
        const a = list_lieu[i].innerHTML;
        $('.rn-list-info').append(a + "\n");
    });

    /**
     * renvoyer la valeur de réservation
     * @type {*|string|string}
     */
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


