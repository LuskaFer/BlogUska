
var slide_wrp = ".side-menu-wrapper"; //Menu Wrapper
var open_button = ".menu-open"; //Menu Open Button
var close_button = ".menu-close"; //Menu Close Button
var overlay = ".menu-overlay"; //Overlay

//Initial menu position
$(slide_wrp).hide().css({ "right": -$(slide_wrp).outerWidth() + 'px' }).delay(50).queue(function () { $(slide_wrp).show() });

$(open_button).click(function (e) { //On menu open button click
    e.preventDefault();
    $(slide_wrp).css({ "right": "0px" }); //move menu right position to 0
    setTimeout(function () {
        $(slide_wrp).addClass('active'); //add active class
    }, 50);
    $(overlay).css({ "opacity": "1", "width": "100%" });
});

$(close_button).click(function (e) { //on menu close button click
    e.preventDefault();
    $(slide_wrp).css({ "right": -$(slide_wrp).outerWidth() + 'px' }); //hide menu by setting right position 
    setTimeout(function () {
        $(slide_wrp).removeClass('active'); // remove active class
    }, 50);
    $(overlay).css({ "opacity": "0", "width": "0" });
});

$(document).on('click', function (e) { //Hide menu when clicked outside menu area
    if (!e.target.closest(slide_wrp) && $(slide_wrp).hasClass("active")) { // check menu condition
        $(slide_wrp).css({ "right": -$(slide_wrp).outerWidth() + 'px' }).removeClass('active');
        $(overlay).css({ "opacity": "0", "width": "0" });
    }
});

