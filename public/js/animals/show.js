function showform() {
    $.ajax({
        type: 'GET',
        url: '/showform',
        success: function (response) {
            $('.modal-content').empty().append(response);
        }
    });
}

function showContact(id) {
    $.ajax({
        type: 'GET',
        url: '/showcontact/' + id,
        success: function (response) {
            $('.modal-content').empty().append(response);
        }
    });
}

$('.without-caption').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    closeBtnInside: false,
    mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
    image: {
        verticalFit: true
    },
    zoom: {
        enabled: true,
        duration: 300 // don't foget to change the duration also in CSS
    },
    gallery: {enabled: true},
    callbacks: {
        buildControls: function () {
            // re-appends controls inside the main container
            this.contentContainer.append(this.arrowLeft.add(this.arrowRight));
        }

    }
});