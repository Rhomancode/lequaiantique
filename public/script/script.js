$(document).ready(function(){
    $('#infoReservation').hide();
    $('#reservationCheck').hide();
    $('#reservationLunch').hide();
    $('#reservationDiner').hide();
    
      
    $("input[type = 'radio']").checkboxradio({
        icon: false
    });
    $('#select-container-din').hide();
    $('#select-container-lun').hide();
    $('#radiodinSat').hide();
    $('#radiolunSun').hide();

    $(function(){
        $('#datepicker').datepicker({
            altField: "#datepicker",
            closeText: 'Fermer',
            prevText: 'Précédent',
            nextText: 'Suivant',
            currentText: 'Aujourd\'hui',
            monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
            monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
            dayNames: ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'],
            dayNamesShort: ['Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.', 'Dim.'],
            dayNamesMin: ['L', 'M', 'M', 'J', 'V', 'S', 'D',],
            weekHeader: 'Sem.',
            dateFormat: 'yy-mm-dd'
        }).change(function(){
            var dateReservation = $('#datepicker').datepicker('getDate');
            switch (dateReservation.getDay()){
                case 0:
                    $('#infoReservation').show();
                    $('#reservationCheck').hide();
                    break;
                case 1:
                    $('#infoReservation').show();
                    $('#reservationCheck').hide();
                    break;
                case 2:
                    $('#infoReservation').hide();
                    $('#reservationCheck').show();
                    $('#select-container').hide();
                    $('#select-container-lun').show();
                    $('#select-container-din').show();
                    break;
                case 3:
                    $('#infoReservation').hide();
                    $('#reservationCheck').show();
                    $('#select-container').hide();
                    $('#select-container-lun').show();
                    $('#select-container-din').show();
                    break;
                case 4:
                    $('#infoReservation').hide();
                    $('#reservationCheck').show();
                    $('#select-container').hide();
                    $('#select-container-lun').show();
                    $('#select-container-din').show();
                    break;
                case 5:
                    $('#infoReservation').hide();
                    $('#reservationCheck').show();
                    $('#select-container').hide();
                    $('#select-container-lun').show();
                    $('#select-container-din').show();
                    $('#radiodinSat').show();
                    break;
                case 6:
                    $('#infoReservation').hide();
                    $('#reservationCheck').show();
                    $('#select-container').hide();
                    $('#select-container-lun').show();
                    $('#select-container-din').show();
                    $('#radiolunSun').show();
            };
        });
    });
});



