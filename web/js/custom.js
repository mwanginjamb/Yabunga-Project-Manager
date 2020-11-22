/**
 * Created by HP ELITEBOOK 840 G5 on 11/22/2020.
 */

$(function(){

    const footerHeight = $('footer').outerHeight(true);
    let stickyFooter = function() {

        const { scrollTop, scrollHeight, clientHeight } = document.documentElement;

        let footerLevel = +scrollHeight - +footerHeight;
        console.log(`
        scroll Top: ${scrollTop} 
        clientHeight: ${clientHeight}
        scroll Height ${scrollHeight}
        total scroll: ${scrollTop+clientHeight}
        footer Height: ${footerHeight}
        footer Levl Scroll: ${ footerLevel }
        `);

        if(scrollTop + clientHeight >= scrollHeight - +footerHeight) {
            $('footer').addClass('sticky-footer');
        }else{
            $('footer').removeClass('sticky-footer');
        }
    };

    stickyFooter();

    // Call the function when window scrolls

    $(window).scroll(function(){
        stickyFooter();
    });

});
